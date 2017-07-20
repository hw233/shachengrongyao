<?php
/*-----------------------------------------------------+
 * 数据库操作类(继承自PDO)
 +-----------------------------------------------------*/
class Db extends PDO{
    private static $instance;
    public static $config_temp;
    /**
     * 是否输出调试信息
     */
    public
        $debug = false;

    /**
     * 获取单例
     */
    public static function getInstance($dbname=''){
        $config = require("db.cfg.php");
		if(!$dbname){
			$dsn = $config['database'];
		}else{
			$dsn = $config[$dbname];
        }
        self::$config_temp=$dsn;
        try{
	    	if(!$dsn){
	    		throw new PDOException("数据库配置错误");
	    	}
            if(isset(self::$instance[$dsn['dbname']])){
                return self::$instance[$dsn['dbname']];
            }
            self::$instance[$dsn['dbname']] = new self("{$dsn['driver']}:host={$dsn['host']};port={$dsn['port']};dbname={$dsn['dbname']}", $dsn['user'], $dsn['pass']);
        }catch(PDOException $e){
            self::_halt($e,'数据库连接失败');
        }
        if($dsn['encode']){
            self::$instance[$dsn['dbname']]->query("set names '{$dsn['encode']}'");
        }
        return self::$instance[$dsn['dbname']];
    }

    /**
     * 构造函数
     *
     * @param string $dsn 数据库地址
     * @param string $user 用户名
     * @param string $pass 密码
     */
    public function __construct($dsn, $user, $pass) {
        parent::__construct($dsn, $user, $pass);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    }

    /**
     * 执行一个查询
     *
     * @param string $sql SQL语句
     * @return Object 返回一个结果集句柄
     */
    public function query($sql){
        if($this->debug) $this->printSql($sql);
		try{
			$rs = parent::query($sql);
			$rs->setFetchMode(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
            self::_halt($e,'执行sql失败');
		}
        return $rs;
    }

    /**
     * 执行一个SQL语句
     * @param string $sql SQL语句
     * @return bool 返回执行结果
     */
    public function exec($sql){
        if($this->debug) $this->printSql($sql);
		try{
			 return parent::exec($sql);
		}catch(PDOException $e){
            self::_halt($e,'执行sql失败');
		}
    }

    /**
     * 返回一个查询结果集中的第一行,第一列
     * @param string $sql SQL语句
     * @return string|int
     */
    public function getOne($sql){
        $rs = $this->query($sql);
        return $rs->fetchColumn();
    }

    /**
     * 返回一个查询结果集中的第一行
     * @param string $sql SQL语句
     * @return array 
     */
    public function getRow($sql){
        $rs = $this->query($sql);
        return $rs->fetch();
    }

    /**
     * 得到一个SQL查询的所有结果集
     * @param string $sql SQL语句
     * @return array
     */
    public function getAll($sql){
        $rs = $this->query($sql);
        return $rs->fetchAll();
    }

    /**
     * 输出SQL调试信息
     */
    private function printSql($sql){
        echo $sql."\n";
    }
    /**
     * 输出错误信息
     */
    private static function _halt($err,$msg=''){
        $error = $err->getMessage();
        $errno = $err->getCode();
        $debug_info = $err->getTrace();
        echo "$error,$errno:\n";
        print_r($debug_info);
        exit();
	}
}
