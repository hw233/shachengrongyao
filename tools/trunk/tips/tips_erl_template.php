%%%-------------------------------------------------------------------
%%% @author zhengsiying
%%% @doc
%%%		自动生成文件，不要手动修改
%%% @end
%%% Created : <?php date_default_timezone_set("PRC"); echo date("Y/m/d") . "\n"; ?>
%%%-------------------------------------------------------------------
<?php
$module_name = "config_" . $target_file_name;
$record_name = "conf_" . $target_file_name;
?>

-module(<?php echo $module_name; ?>).

-include("common.hrl").
-include("tips.hrl").

-compile([export_all]).

<?php
function print_value($value)
{
    if(is_string($value) && $value[0] != '{')
    {
        echo "<<\"".$value."\">>";
    }
    else
    {
        echo $value;
    }
}

echo "get_version() -> ".time().".\n\n";

echo "get_list() ->\n";
echo "\t[";
for($i = 2; $i < count($data_array); $i++) {
    print_value($data_array[$i][1]);
    if($i != count($data_array) - 1)
    {
        echo ", ";
    }
}
echo "].\n\n";

for($i = 2; $i < count($data_array); $i++)
{
    echo "get(";
    print_value($data_array[$i][1]);
    echo ") ->\n";
    echo "\t#".$record_name."{\n";
    for($j = 1; $j < count($data_array[$i]); $j++)
    {
        echo "\t\t".$data_array[1][$j]." = ";
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