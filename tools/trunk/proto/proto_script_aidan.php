<?php
/**
 * Created by PhpStorm.
 * User: 余兵专用
 * Date: 15/4/17
 * Time: 下午5:04
 */
define('ROOT', str_replace('\\', '/', realpath(dirname(__FILE__) . '/../')));

define('DATA_FILE', ROOT . '/data/proto/proto.xml');
//define('DATA_FILE', ROOT . '/data/proto/proto20150401.xml');
define('INCLUDE_DIR', ROOT.'/include/');
include(INCLUDE_DIR . "header.php");

main();
function main()
{
    $data_array = rdProtoXML(DATA_FILE);
    make_proto_hrl($data_array);
    make_proto_erl($data_array);
	make_proto_lua($data_array);

    //测试
    $tpl_file = ROOT."/proto/test_map.php";
    $output_hrl = ROOT."/tag/proto/map_1.erl";
    $content = parseTemplate($tpl_file, $data_array);
    writeFile($output_hrl, $content);
}

function make_proto_lua($data_array)
{
    $tpl_file = ROOT."/proto/proto_lua_template.php";
    $output_hrl = ROOT."/tag/proto/GameProtocol.lua";
    $content = parseTemplate($tpl_file, $data_array);
    writeFile($output_hrl, $content);
}

function make_proto_hrl($data_array)
{
    $tpl_file = ROOT."/proto/proto_hrl_template.php";
    $output_hrl = "Y:/Documents/work/server/include/proto.hrl";
    $output_hrl1 = "Y:/Documents/work/Inter_service/include/proto.hrl";
    $output_hrl2 = "Y:/Documents/work/robot/include/proto.hrl";
    $content = parseTemplate($tpl_file, $data_array);
    writeFile($output_hrl, $content);
    writeFile($output_hrl1, $content);
    writeFile($output_hrl2, $content);
}

function make_proto_erl($data_array)
{
    $tpl_file = ROOT."/proto/proto_erl_template.php";
    $output_hrl = "Y:/Documents/work/server/src/proto/proto_config.erl";
    $output_hrl1 = "Y:/Documents/work/Inter_service/src/proto/proto_config.erl";
    $output_hrl2 = "Y:/Documents/work/robot/src/proto/proto_config.erl";
    $content = parseTemplate($tpl_file, $data_array);
    writeFile($output_hrl, $content);
    writeFile($output_hrl1, $content);
    writeFile($output_hrl2, $content);
}

function rdProtoXML($data_file)
{
    $doc = new DOMDocument('1.0', 'utf-8');
    $doc->load($data_file);
    $xml_data_array = array(
        'module_array' => array(),
        'type_array' => array()
    );

    $modules = $doc->getElementsByTagName("Module");
    foreach ($modules as $module) {
        $module_info = rdModule($module);
        array_push($xml_data_array['module_array'], $module_info);
    }

    $types = $doc->getElementsByTagName("Type");
    foreach ($types as $type) {
        $type_info = rdType($type);
        array_push($xml_data_array['type_array'], $type_info);
    }
    return $xml_data_array;
}

function rdModule($module)
{
    $proto_class = $module->getAttribute('proto_class');
    $proto_name = $module->getAttribute('name');
    $packets = $module->getElementsByTagName("Packet");
    $packet_array = array();
//    echo "============================================================\n";
//    echo "proto_class: " . $proto_class . "\n";
//    echo "name: " . $proto_name . "\n";
//    echo "------------------------------------------------------------\n";
    foreach ($packets as $packet) {
        $packet_info = rdPacket($packet);
        array_push($packet_array, $packet_info);
    }
    $module_info = array(
        'proto_class' => $proto_class,
        'proto_name' => $proto_name,
        'packet_array' => $packet_array
    );
    return $module_info;
}

function rdType($type)
{
    $name = $type->getAttribute('name');
    $describe = $type->getAttribute('describe');
    $params = $type->getElementsByTagName("Param");
//    echo "============================================================\n";
//    echo "name: " . $name . "\n";
//    echo "describe: " . $describe . "\n";
//    echo "------------------------------------------------------------\n";
    $param_array = array();
    foreach ($params as $param) {
        $param_info = rdParam($param);
        array_push($param_array, $param_info);
    }
    $type_info = array(
        'name' => $name,
        'describe' => $describe,
        'param_array' => $param_array
    );
    return $type_info;
}

function rdPacket($packet)
{
    $proto = $packet->getAttribute('proto');
    $type = $packet->getAttribute('type');
    $name = $packet->getAttribute('name');
    $describe = $packet->getAttribute('describe');
    $params = $packet->getElementsByTagName("Param");
//    echo "---------------------------------------------------\n";
//    echo "proto: " . $proto . "\n";
//    echo "type: " . $type . "\n";
//    echo "describe: " . $describe . "\n";
//    echo "---------------------------------------------------\n";
    $param_array = array();
    foreach ($params as $param) {
        $param_info = rdParam($param);
        array_push($param_array, $param_info);
    }
    $packet_info = array(
        'proto' => $proto,
        'name' => $name,
        'type' => $type,
        'describe' => $describe,
        'param_array' => $param_array
    );
    return $packet_info;
}

function rdParam($param)
{
    $name = $param->getAttribute('name');
    $type = $param->getAttribute('type');
    $describe = $param->getAttribute('describe');
    $sub_type = $param->getAttribute('sub_type');
//    echo "-------------------------------------\n";
//    echo "name: " . $name . "\n";
//    echo "type: " . $type . "\n";
//    echo "describe: " . $describe . "\n";
    $param_info = array(
        'name' => $name,
        'type' => $type,
        'describe' => $describe,
        'sub_type' => $sub_type
    );
    return $param_info;
}

?>