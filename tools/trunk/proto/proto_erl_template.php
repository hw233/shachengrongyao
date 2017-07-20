%%%-------------------------------------------------------------------
%%% @author zhengsiying
%%% @doc
%%%        自动生成文件，不要手动修改
%%% @end
%%% Created : <?php date_default_timezone_set("PRC");
echo date("Y/m/d") . "\n"; ?>
%%%-------------------------------------------------------------------

-module(proto_config).
-include("common.hrl").
-export([
	type/1,
	read/1,
	write/1
]).

%% 用户自定义类型
<?php
function get_type_str($type)
{
    switch ($type) {
        case "int8":
            return "8";
        case "int16":
            return "16";
        case "int32":
            return "32";
        case "int64":
            return "64";
        case "string":
            return "string";
        default:
            return $type;
    }
}

function make_data($param_info)
{
    $data_str = "{".$param_info['name'].", [";

    $param_array = $param_info['param_array'];
    $param_num = count($param_array) - 1;
    for ($i = 0; $i <= $param_num; $i++) {
        switch ($param_array[$i]['type']) {
            case "list":
                $data_str .= "[".get_type_str($param_array[$i]['sub_type'])."]";
                break;
            default:
                $data_str .= get_type_str($param_array[$i]['type']);
                break;
        }
        if ($i != $param_num) {
            $data_str .= ", ";
        }
    }
    $data_str .= "]}";
    return $data_str;
}

function make_type_data($type_info)
{
    $data_str = "[";
    $param_array = $type_info['param_array'];
    $param_num = count($param_array) - 1;
    for ($i = 0; $i <= $param_num; $i++) {
        switch ($param_array[$i]['type']) {
            case "list":
                $data_str .= "[".get_type_str($param_array[$i]['sub_type'])."]";
                break;
            default:
                $data_str .= get_type_str($param_array[$i]['type']);
                break;
        }
        if ($i != $param_num) {
            $data_str .= ", ";
        }
    }
    $data_str .= "]";
    return $data_str;
}

foreach ($data_array['type_array'] as $type_info) {
    echo "type(" . $type_info['name'] . ") ->\n";
    echo "\t" . make_type_data($type_info) . ";\n";
}
echo "type(Type) ->\n";
echo "\tTrace = try throw(42) catch 42 -> erlang:get_stacktrace() end, \n";
echo "\t?ERR(\"undefined type ~p ~p\", [Type,Trace]).\n\n";

$c2s_array = array();
$s2c_array = array();
foreach ($data_array['module_array'] as $module_info) {
    foreach ($module_info['packet_array'] as $packet_info) {
        if (strcmp($packet_info['type'], "c2s") == 0) {
            array_push($c2s_array, $packet_info);
        } else {
            array_push($s2c_array, $packet_info);
        }
    }
}

foreach ($c2s_array as $packet_info) {
    echo "%% " . $packet_info['describe'] . "\n";
    echo "read(" . $packet_info['proto'] . ") ->\n";
    echo "\t" . make_data($packet_info) . ";\n";
}
echo "read(N) ->\n";
echo "\tTrace = try throw(42) catch 42 -> erlang:get_stacktrace() end, \n";
echo "\t?ERR(\"undefined read protocol ~p ~p\", [N,Trace]).\n\n";

foreach ($s2c_array as $packet_info) {
    echo "%% " . $packet_info['describe'] . "\n";
    echo "write(" . $packet_info['proto'] . ") ->\n";
    echo "\t" . make_data($packet_info) . ";\n";
}
echo "write(N) ->\n";
echo "\tTrace = try throw(42) catch 42 -> erlang:get_stacktrace() end, \n";
echo "\t?ERR(\"undefined write protocol ~p ~p\", [N,Trace]).\n\n";
?>
