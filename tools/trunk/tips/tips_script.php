<?php
/**
 * Created by PhpStorm.
 * User: zhengsiying
 * Date: 2015/4/18
 * Time: 16:11
 */
define('ROOT', str_replace('\\', '/', realpath(dirname(__FILE__).'/../')));
define('INCLUDE_DIR', ROOT.'/include/');
include(INCLUDE_DIR . "header.php");

$input_table = "tips";
$module_name = "config_" . $input_table;
$output_hrl = ROOT . "/tag/tips/" . $input_table . ".hrl";
$output_erl = ROOT . "/tag/tips/" . $module_name . ".erl";

main($input_table, $output_hrl, $output_erl);
function main($input_table, $output_hrl, $output_erl){
    $input_file = ROOT."/data/tips/".$input_table.".xml";
    $table_info = rdExcel_XML($input_file);
    $table_info = removeNullAttr($table_info);
    foreach ($table_info as $table){
        make_hrl($table, $input_table, $output_hrl);
        make_erl($table, $input_table, $output_erl);
    }
}

function make_hrl($arr_data, $input_table, $output_hrl){
    $tpl_file = ROOT."/tips/tips_hrl_template.php";
    $content = parseTemplate($tpl_file, $arr_data, $input_table);
    writeFile($output_hrl, $content);
}

function make_erl($arr_data, $input_table, $output_erl){
    $tpl_file = ROOT."/tips/tips_erl_template.php";
    $content = parseTemplate($tpl_file, $arr_data, $input_table);
    writeFile($output_erl, $content);
}
?>