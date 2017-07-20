%%%-------------------------------------------------------------------
%%% @author zhengsiying
%%% @doc
%%%        自动生成文件，不要手动修改
%%% @end
%%% Created : <?php date_default_timezone_set("PRC");
echo_meta_date(); ?>
%%%-------------------------------------------------------------------
<?php
foreach($data_array as $table)
{
    $data_array = $table;
    break;
}
$field_list = $data_array[0];
$describe_list = $data_array[1];
$record_name = $target_file_name . "_conf";

?>

%% ===================================================================
%% record
%% ===================================================================
<?php
$ATTR_START=array_search("hp",$data_array[0]);
$ATTR_END=array_search("holy", $data_array[0]);
function print_record($field_list, $describe_list,$ATTR_START,$ATTR_END)
{
    for ($i = 0; $i < count($field_list); $i++) {
        if ($i == $ATTR_START) {
            echo "\tattr_base, %% 基础属性\n";
        }
        elseif($i < $ATTR_START || $i > $ATTR_END)
        {
            if($i == count($field_list) - 1)
            {
                echo "\t", $field_list[$i], " %% ", $describe_list[$i], "\n";
            }
            else
            {
                echo "\t", $field_list[$i], ", %% ", $describe_list[$i], "\n";
            }
        }
    }
}
?>

-record(<?php echo $record_name; ?>, {
<?php
print_record($field_list, $describe_list,$ATTR_START,$ATTR_END);
?>
}).