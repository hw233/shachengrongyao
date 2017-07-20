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
-include("record.hrl").

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
    else
    {
        echo $value;
    }
}

for($i = 2; $i < count($data_array); $i++)
{
    echo "get(";
    echo "{";
    print_value($data_array[$i][0]);
    echo ", Count}) when ";
    echo "Count >= ". $data_array[$i][1] ." andalso Count =< ". $data_array[$i][2];
    echo " -> \n";
    echo "\t#".$record_name."{\n";
    for($j = 0; $j < count($data_array[$i]); $j++)
    {
        if($j < 3)
        {
            echo "\t\t".$data_array[0][$j]." = ";
            print_value($data_array[$i][$j]);
            echo ",";
        }
        else
        {
            if($j == 3)
            {
                echo "\t\tattr_base = #attr_base{\n";
            }
            echo "\t\t\t".$data_array[0][$j]." = ";
            print_value($data_array[$i][$j]);
            if($j != count($data_array[$i]) - 1){
                echo ",";
            }
            else
            {
                echo "\n\t\t}";
            }
        }
        echo "\n";
    }
    echo "\t};\n\n";
}

$equips_list = array();
for($i = 2; $i < count($data_array); $i++)
{
    $limit_lvl = array_search("key", $data_array[0]);
    $Key = "{".$data_array[$i][$limit_lvl]."}";
    if (array_key_exists($Key, $equips_list))
    {
        $equips_list[$Key] = $equips_list[$Key].",".$data_array[$i][1];
    }
    else
    {
        $equips_list[$Key] = $data_array[$i][1];
    }
};

foreach ($equips_list as $key => $value)
{
    echo "get(";
    print_value($key);
    echo ") ->\n";
    echo "\t"."[".$value."];";
    echo "\n\n";
};

echo "get(_Key) ->\n";
echo "\tskip.";
?>