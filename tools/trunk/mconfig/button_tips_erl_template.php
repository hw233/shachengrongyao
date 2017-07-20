%%%-------------------------------------------------------------------
%%% @author zhengsiying
%%% @doc
%%%		自动生成文件，不要手动修改
%%% @end
%%% Created : <?php date_default_timezone_set("PRC"); echo_meta_date(); ?>
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
-include("button_tips_config.hrl").

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

$parent_map = array();
for($i = 2; $i < count($data_array); $i++) {
    if($data_array[$i][3] != 0){
        $parent_map[$data_array[$i][0]] = $data_array[$i][3];
    }
}

// 所有按钮总数
$count = 1;
for($i = 2; $i < count($data_array); $i++) {
    $count++;
}

// 父辈列表，按照层级关系一直找到最老辈
$parent_list = array();
foreach($parent_map as $k => $v){
    $parent_list[$k] = array();
    array_push($parent_list[$k], $v);
    $a = $v;
    while($parent_map[$a]) {
        array_push($parent_list[$k], $parent_map[$a]);
        $a = $parent_map[$a];
    }
}

// 儿子列表，只包含直接儿子
$sun_list = array();
for($i = 2; $i < count($data_array); $i++) {
    if($data_array[$i][3] != 0) {
        if(!$sun_list[$data_array[$i][3]]) {
            $sun_list[$data_array[$i][3]] = array();
        }
       array_push($sun_list[$data_array[$i][3]], $data_array[$i][0]);
    }
}

// 寻找出没有儿子的所有元素
$list = array();
for($i = 2; $i < count($data_array); $i++) {
    $n = $data_array[$i][0];
    if(!$sun_list[$n]){
        $list[$n] = $n;
    }
}

// 判断是不是所有儿子辈的都被在关闭列表里面
function is_all_sun_load($n, $sun_list, $close_list) {
    $list = $sun_list[$n];
    if(!$list) {
        return true;
    }
    else {
        foreach($list as $k => $v) {
            if(!$close_list[$v]) {
                return false;
            }
        }
        return true;
    }
}

// 加载关系表
$load_list = array();
$close_list = array(); // 已经被检索过的元素列表
while($list){
    $ll = array();
    foreach($list as $k => $v) {
        $close_list[$k] = $v;
        array_push($ll, $k);
    }
    array_push($load_list, $ll);
    if(count($close_list) < $count){
        $list1 = array();
        foreach($list as $k => $v){
            if($parent_map[$v]) {
                $n = $parent_map[$v];
                if(is_all_sun_load($n, $sun_list, $close_list)) {
                    $list1[$n] = $n;
                }
            }
        }
        $list = $list1;
    }
    else
    {
        break;
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

foreach($sun_list as $k => $v) {
    echo "get_sun_list(";
    print_value($k);
    echo ") ->\n";
    echo "\t[";
    echo implode(", ", $v);
    echo "];\n";
}
echo "get_sun_list(_) -> [].\n\n";

foreach($parent_list as $k => $v) {
    echo "get_parent_list(";
    print_value($k);
    echo ") ->\n";
    echo "\t[";
    echo implode(", ", $v);
    echo "];\n";
}
echo "get_parent_list(_) -> [].\n\n";

echo "get_load_list() -> \n";
echo "\t[";
$data_num = count($load_list);
$i = 1;
foreach($load_list as $k => $v) {
    echo "[";
    echo implode(", ", $v);
    if($i < $data_num)
    {
        echo "],";
    }
    else
    {
        echo "]";
    }
    $i++;
}
echo "].\n\n";

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
echo "\tnull.";
?>