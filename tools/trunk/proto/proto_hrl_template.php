%%%-------------------------------------------------------------------
%%% @author zhengsiying
%%% @doc
%%%        自动生成文件，不要手动修改
%%% @end
%%% Created : <?php date_default_timezone_set("PRC");
echo date("Y/m/d") . "\n"; ?>
%%%-------------------------------------------------------------------

<?php
/**
 * Created by PhpStorm.
 * User: apple1
 * Date: 15/4/21
 * Time: 上午10:39
 */

function make_record($info)
{
    echo "%% ".$info['describe']."\n";
    echo "-record(".$info['name'].", {\n";
    $param_array = $info['param_array'];
    $param_num = count($param_array) - 1;
    for ($i = 0; $i <= $param_num; $i++) {
        switch ($param_array[$i]['type']) {
            case "int8":
                echo "\t".$param_array[$i]['name']." = 0 ";
                break;
            case "int16":
                echo "\t".$param_array[$i]['name']." = 0";
                break;
            case "int32":
                echo "\t".$param_array[$i]['name']." = 0";
                break;
            case "int64":
                echo "\t".$param_array[$i]['name']." = 0";
                break;
            case "string":
                echo "\t".$param_array[$i]['name']." = <<\"\">>";
                break;
            case "list":
                echo "\t".$param_array[$i]['name']." = []";
                break;
            default:
                echo "\t".$param_array[$i]['name']." = #".$param_array[$i]['type']."{}";
                break;
        }
        if ($i != $param_num) {
            echo ",  %%  ".$param_array[$i]["describe"]; 
        }else {
            echo "  %%  ".$param_array[$i]["describe"];
        }
        echo "\n";
    }
    echo "}).\n\n";
}

foreach ($data_array['type_array'] as $type_info) {
    make_record($type_info);
}

foreach ($data_array['module_array'] as $module_info) {
    foreach ($module_info['packet_array'] as $packet_info) {
        make_record($packet_info);
    }
}
?>