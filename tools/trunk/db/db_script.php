<?php
/**----------------------------------------------------+
 * 解析数据库表结构生成对应的erlang数据库脚本
 * @author zhengsiying
 +-----------------------------------------------------*/
//执行方法：php db_script.php 数据库表名
//例如：php db_script.php player
define('ROOT', str_replace('\\', '/', realpath(dirname(__FILE__).'/../')));
define('INCLUDE_DIR', ROOT.'/include/');
include(INCLUDE_DIR . "header.php");

$input_table = isset($argv[1]) ? $argv[1] : "";
if(empty($input_table)){
    $input_table=$_GET['name'];
}
//$input_table = "player_friend";
$module_name = "db_agent_" . $input_table;
$output_hrl = ROOT . "/tag/db/" . $module_name . ".hrl";
$output_erl = ROOT . "/tag/db/" . $module_name . ".erl";

main($input_table, $output_hrl, $output_erl);
function main($input_table, $output_hrl, $output_erl){
	if($input_table == ""){
        exit("input is empty!\n");
    }
	$db_instance = Db::getInstance("database");
    $config_temp= Db::$config_temp;
    $table_info = $db_instance->getAll("SELECT COLUMN_NAME AS `Field`,
		DATA_TYPE AS `Type`,
		COLUMN_KEY AS `Key`,
		COLUMN_DEFAULT AS `Default`,
		COLUMN_COMMENT AS `Comment`
		FROM INFORMATION_SCHEMA.COLUMNS
		WHERE table_schema='".$config_temp['dbname']."' and table_name = '{$input_table}'");

	// 主键列表
	$pri_key_list = array();
	// 普通字段列表
	$other_field_list = array();
	$info_list=array();
	foreach ($table_info as $info) {
		if ($info['Key'] == "PRI") {
			array_push($pri_key_list, $info['Field']);
		}
		else
		{
			array_push($other_field_list, $info['Field']);	
		}
		$info_list[]=$info['Comment'];
	}

	$arr_data = array(
		'pri_key_list' => $pri_key_list,
		'other_field_list' => $other_field_list,
	    'info_list'=>$info_list
	);
	make_hrl($arr_data, $input_table, $output_hrl);
	make_erl($arr_data, $input_table, $output_erl);
}

function make_hrl($arr_data, $input_table, $output_hrl){
	$tpl_file = ROOT."/db/db_hrl_template.php";
	$content = parseTemplate($tpl_file, $arr_data, $input_table);
	writeFile($output_hrl, $content);
}

function make_erl($arr_data, $input_table, $output_erl){
	$tpl_file = ROOT."/db/db_erl_template.php";
	$content = parseTemplate($tpl_file, $arr_data, $input_table);
	writeFile($output_erl, $content);
}
?>