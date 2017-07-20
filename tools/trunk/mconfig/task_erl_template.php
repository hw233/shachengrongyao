%%%-------------------------------------------------------------------
%%% @author aidan
%%% @doc
%%%		自动生成文件，不要手动修改
%%% @end
%%% Created : <?php date_default_timezone_set("PRC"); echo date("Y/m/d") . "\n"; ?>
%%%-------------------------------------------------------------------
<?php
$module_name = $target_file_name . "_config";
$record_name = $target_file_name . "_conf";
foreach($data_array as $table)
{
	$data_array = $table;
	break;
}
?>

-module(<?php echo $module_name; ?>).

-include("common.hrl").
-include("config.hrl").

-compile([export_all]).

<?php
function print_value($value)
{
    if(is_string($value) && $value[0] != '{')
    {
        if (preg_match("/[\x7f-\xff]/", $value)) {  //判断字符串中是否有中文
            echo "xmerl_ucs:to_utf8(\"".$value."\")";
        } else {
            echo "<<\"".$value."\">>";
        }
    }
    elseif(is_array($value))
    {
        $data = str_replace("\r", '', $value["string"]);
        $data = str_replace("\n", '', $data);
        echo $data;
    }
    elseif ($value===null){
        echo "<<\"".$value."\">>";
    }
    else
    {
        echo $value;
    }
}
echo "get_list_conf() ->\n";
echo "\t[ ".$module_name.":get(X) || X <- get_list() ].\n\n";

echo "get_list() ->\n";
echo "\t[";
for($i = 2; $i < count($data_array); $i++) {
    print_value($data_array[$i][0]);
    if($i != count($data_array) - 1)
    {
        echo ", ";
    }
}
echo "].\n\n";

echo "%% {任务id,最小等级,最大等级,前置id} \n";
$type_index = array_search("type_id", $data_array[0]);
$min_lv_index = array_search("min_lv", $data_array[0]);
$limit_lv_index = array_search("limit_lv", $data_array[0]);
$front_task_id_index = array_search("front_task_id", $data_array[0]);
$type_array = array();
for($i = 2; $i < count($data_array); $i++)
{
    $type = $data_array[$i][$type_index];
    $min_lv = $data_array[$i][$min_lv_index];
    $limit_lv = $data_array[$i][$limit_lv_index];
    $front_task_id = $data_array[$i][$front_task_id_index];
    $task_id = $data_array[$i][0];
    if($type==1 || $type==7 || $type==2 || $type==6){
        $type_array[$type.",0,999"][]="{{$task_id},{$min_lv},{$limit_lv},{$front_task_id}}";
    }else {
        $type_array[$type.",".$min_lv.",".$limit_lv][]="{{$task_id},{$min_lv},{$limit_lv},{$front_task_id}}";
    }
}

$count = count($type_array);
foreach($type_array as $k => $v)
{
    $arr=explode(",", $k);
    $type=$arr[0];
    $minlv=$arr[1];
    $maxlv=$arr[2];
    echo "get_type_list({$type},Lv) when Lv>={$minlv} andalso Lv=<{$maxlv} ->\n";
    echo "\t[";
    for($j = 0; $j < count($v); $j++)
    {
        print_value($v[$j]);
        if($j != count($v) - 1)
        {
            echo ", ";
        }
    }
    echo "];\n";
}
echo "get_type_list(_,_)->
	[]. \n";


for($i = 2; $i < count($data_array); $i++)
{

    echo "get(";
    print_value($data_array[$i][0]);
    echo ") ->\n";
    echo "\t#".$record_name."{\n";
    for($j = 0; $j < count($data_array[$i]); $j++)
    {
        echo "\t\t".$data_array[0][$j]." = ";
        print_value($data_array[$i][$j]);
        if($j != count($data_array[$i]) - 1){
            echo ",";
        }
        echo "\n";
    }
    echo "\t};\n\n";
}
echo "get(_Key) ->\n";
echo "\t?ERR(\"undefined key from ".$module_name." ~p\", [_Key]).";
?>