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
            return "xmerl_ucs:to_utf8(\"".$value."\")";
        } else {
            return "<<\"".$value."\">>";
        }
    }
    elseif(is_array($value))
    {
        $data = str_replace("\r", '', $value["string"]);
        $data = str_replace("\n", '', $data);
        return  $data;
    }
    else
    {
        return $value;
    }
}

echo "get_list() ->\n";
echo "\t[ \n ";
        for($i = 2; $i < count($data_array); $i++) {
            $limit = array_search("hp_p", $data_array[0]);
            //$limit1 = array_search("min_res", $data_array[0]);
            
            echo "\t #".$record_name." { \n ";
            for($j = 0; $j <= $limit ; $j++)
            {
                if($j == $limit){
                       echo "\t\t attr_base = #attr_base{ \n ";
                       for ($new=$limit;$new<count($data_array[0]);$new++){
                           echo "\t\t".$data_array[0][$new]." = ";
                           echo print_value($data_array[$i][$new]);
                           if($new != count($data_array[0])- 1){
                               echo ",";
                           }
                           echo "\n";
                       }
                       echo "  \t}";
                }else if($j<$limit) {
                    echo "\t\t".$data_array[0][$j]." = ";
                    echo print_value($data_array[$i][$j]);
                }
                if($j<$limit){
                    echo ",";
                }
                echo "\n";
            }
            echo "\t}";
            if($i != count($data_array) - 1)
            {
                echo ",  \n";
            }
        }
echo "].\n\n";

for($i = 2; $i < count($data_array); $i++)
{
    $limit = array_search("hp_p", $data_array[0]);
    
    $temp= "get(Lv,Career) when Career=:=".
    print_value($data_array[$i][1])." andalso Lv=:= ".
    print_value($data_array[$i][2])." \n -> \n ";
    
    echo $temp;
    echo "\t#".$record_name."{\n";
    for($j = 0; $j <=$limit; $j++)
    {
        if($j==$limit){
            echo "\t\t attr_base = #attr_base{ \n ";
            for ($new=$limit;$new<count($data_array[0]);$new++){
                echo "\t\t".$data_array[0][$new]." = ";
                echo print_value($data_array[$i][$new]);
                if($new != count($data_array[0])- 1){
                    echo ",";
                }
                echo "\n";
            }
            echo "  \t}";
        }else {
            echo "\t\t".$data_array[0][$j]." = ";
            echo print_value($data_array[$i][$j]);
        }
        if($j < $limit ){
            echo ",";
        }
        echo "\n";
    }
    echo "\t};\n\n";
}
echo "get(_Lv,_Career) ->\n";
echo "\t  null . ";
?>