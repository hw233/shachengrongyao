<?php
error_reporting(E_ALL ^E_NOTICE);
define('ROOT', str_replace('\\', '/', realpath(dirname(__FILE__).'/../')));
define('DATA_DIR', ROOT.'/data/');
define('TPL_DIR', ROOT.'/tpl/');
define('TARGET_DIR', ROOT.'/../../server/src/data/');
define('INCLUDE_DIR', ROOT.'/include/');

include(INCLUDE_DIR."db.class.php");
include(INCLUDE_DIR."ErlConfig.php");
include(INCLUDE_DIR."rd.excel.xml.php");

function echo_meta_date()
{
    //echo date("Y\/m\/d") . "\n";
    echo '2016/10/12' . "\n";
}

function print_tab($tab_num)
{
    for($i = 1; $i <= $tab_num; $i++)
    {
        echo "\t";
    }
}

function print_table($table_info, $tab_num = 0)
{
    if(is_array($table_info))
    {
        echo "[\n";
        $count = 0;
        foreach($table_info as $k => $v)
        {
            $count++;
            print_tab($tab_num+1);
            echo $k, " = ";
            if(is_array($v))
            {
                print_table($v, $tab_num + 1);
            }
            else
            {
                echo $v;
            }
            if($count < count($table_info))
            {
                echo ",\n";
            }
        }
        echo "\n";
        print_tab($tab_num);
        echo "]";
    }
    else
    {
        echo $table_info;
    }
}

//根据模板文件生成目标文件的内容
function parseTemplate($tpl_file, $data_array=array(), $target_file_name=""){
    ob_start();
    include $tpl_file;
    $content = ob_get_contents();
    ob_end_clean();

    return $content;
}
//写文件
function writeFile($target_file, $content, $mode='wb'){
    $oldMask= umask(0);
    $fp = @fopen($target_file, $mode);
    fwrite($fp, $content);
    fclose($fp);
    umask($oldMask);
}

//基础属性相关 中英文转换  {仙力,20}
function char_conv($pro_zh,$pro_en,$string){	
    if (!isset($pro_zh) || !isset($pro_en)){
        echo '中英文配置文件数据不存在，请检查后重试！';
        exit();
    }
    if (count($pro_en) != count($pro_zh)){
        echo '配置文件数据不匹配，请检查后重试！';
        exit();
    }
    return str_replace($pro_zh, $pro_en, $string);
}

function pack_str($str){
    //如果是gbk,要转成utf8
    // $str = iconv('gbk','utf-8',$str);
    $utflen = strlen($str);
    if ($utflen > 65535) die('too long');
    $in = "";
    $in .= pack('C2',$utflen>>8,$utflen>>0);
    return $in.$str;
}

//把类似于 0:固定 的数据取出0
function get_number($input){
    return substr($input, 0, strpos($input,":"));
}

//把类似于 0:固定 的字符取出
function get_string($input){
    return substr($input, strpos($input,":")+1);
}

// 判断是否为空行
// 如果一行的数据都为空行，即视为空行，否则为不空行
function is_line_empty($row_data) {
    if($row_data && ($row_data[0] || is_numeric($row_data[0]))){
        return false;
    }
    return true;
}

//检查列的数值是否为空
function check_num($number) {
    if ($number == "") return 0;
    else return $number;
}

//检查列的字符是否为空
function check_string($string) {
    if ($string == "") return '';
    else return $string;
}

//获取单元格中以换行分隔的元组数据组合为列表
function tuple_to_list($data){
    $arr_attr = explode("\n",$data);
    $output="";
    for($i = 0; $i < sizeof($arr_attr); $i++){
        if((trim($arr_attr[$i]))!=""){
            $output .= $arr_attr[$i].',';
        }
    }
    $output = substr($output, 0, strlen($output)-1);
    return $output;
}

// 获取由start_chat,和end_chat分割的闭合字符串
// 例如：
// start_chat: '[', end_chat: ']',
// str: "[1, 2, 3]", return: "1, 2, 3"
// str: "[1, [2, 3]]", return: "1, [2, 3]"
// str: "1, [2, 3]", return: "2, 3"
function get_close_str($str, $start_chat, $end_chat)
{
    $s_index = strpos($str, $start_chat);
    if($s_index !== false)
    {
        $num = 1;
        ++$s_index;
        $e_index = $s_index;
        for($i = $s_index + 1; $i < strlen($str); $i++)
        {
            if($str[$i] == $end_chat)
            {
                --$num;
            }
            elseif($str[$i] == $start_chat)
            {
                ++$num;
            }
            if($num == 0) {
                $e_index = $i - 1;
                break;
            }
        }
        $str1 = substr($str, $s_index, $e_index - $s_index + 1);
        return $str1;
    }
    return "";
}

/*
 * 格式化tuple list，默认匹配'/{\w+,-?\d+.?\d*}/'，返回{key = val, key1 = val1}的格式
 */
function formatCnfString($data,$reg='/{\w+,-?\d+.?\d*}/'){
    return '{'. formatCnfKeyValue($data,$reg).'}';
}

/*
 * 格式化tuple list，默认匹配'/{\w+,\d+}/'，返回key = val, key1 = val1的格式
 */
function formatCnfKeyValue($data,$reg='/{\w+,\d+.?\d+}/'){
    $items_arr=array();     
    preg_match_all($reg,$data,$match);
    foreach($match[0] as $val){
        $val=str_replace('{','',$val);
        $val=str_replace('}','',$val);
        $vals=explode(',',$val);
        $items_arr[] = "{$vals[0]}={$vals[1]}";
    }
    return implode(',',$items_arr);
}

/*
List = array()
*/
function formatlist($list) {
	$array = json_decode($list,1);
	return $array;
}

// 分组,$list中的相同元素合并
function make_group($list){
	for($i=1, $j=1, $new_list[0] = $list[0]; $i < count($list); $i++)
	{
		if(!in_array($list[$i], $new_list))
		{
			$new_list[$j] = $list[$i];
			$j++;
		}
	}
	return $new_list;
}

// 根据xml生成php配置
function gen_php_cfg_from_xml($php_cfg, $arrData){
    $rt = array();
    $cfg_arr = array();
    //分割配置
    $cfgs = explode("\n", $php_cfg);
    foreach($cfgs as $cfg){
        $c = explode(",", $cfg);
        $cfg_arr[] = array(
            'file' => trim($c[0]),
            'sheet' => trim($c[1]),
            'key_column' => trim($c[2]),
            'name_column' => trim($c[3]),
        );
    }
    //写入
    foreach($cfg_arr as $cfg){
        $out_arr = array();
        if(array_key_exists($cfg['sheet'], $arrData)){
            $sheet_data = $arrData[$cfg['sheet']];
            for($i = 1; $i < count($sheet_data); $i++){
                $out_arr[] = "    '{$sheet_data[$i][$cfg['key_column']]}' => '{$sheet_data[$i][$cfg['name_column']]}',";
            }
            $file_name = $cfg['file'].".cfg.php";
            $rt[] = $file_name;
            $content =  "<?php\n return array(\n".implode("\n", $out_arr)."\n);\n?>";
            writeFile(TARGET_DIR.$file_name, $content);
        }
    }
    return implode(",", $rt);
}

// 根据db表生成php配置
function gen_php_cfg_from_db($english_name, $php_cfg, $arrData){
    $cfg = array();
    $c = explode(",", $php_cfg);
    $cfg = array(
        'key_column' => trim($c[0]),
        'name_column' => trim($c[1]),
    );
    //写入
    $out_arr = array();
    for($i = 0; $i < count($arrData); $i++){
        $out_arr[] = "    '{$arrData[$i][$cfg['key_column']]}' => '{$arrData[$i][$cfg['name_column']]}',";
    }
    $file_name = $english_name.".cfg.php";
    $content =  "<?php\n return array(\n".implode("\n", $out_arr)."\n);\n?>";
    writeFile(TARGET_DIR.$file_name, $content);
    return  $file_name;
}
/*
 * 对数组进行urlencode
 */
function urlencodeArr($vars){
    return is_array ( $vars ) ? array_map ( __FUNCTION__, $vars ) : urlencode ( $vars );
}
/*
 * 对数组进行urldecode
 */
function urldecodeArr($vars){
    return is_array ( $vars ) ? array_map ( __FUNCTION__, $vars ) : urldecode ( $vars );
}
/*
 * 扩展的json_encode 兼容中文
 */
function json_encode_ext($vars){
    return json_encode(urlencodeArr($vars));
}

/*
 * 扩展的json_decode 兼容中文
 */
function json_decode_ext($vars, $flag){
    return urldecodeArr(json_decode($vars, $flag));
}
