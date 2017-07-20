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
function print_record($field_list, $describe_list)
{
            echo "\tattr_base %% 基础属性\n";
}
?>

-record(<?php echo $record_name; ?>, {
<?php
print_record($field_list, $describe_list);
?>
}).