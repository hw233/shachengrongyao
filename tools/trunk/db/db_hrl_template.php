%%%-------------------------------------------------------------------
%%% @author zhengsiying
%%% @doc
%%%		自动生成文件，不要手动修改
%%% @end
%%% Created : <?php date_default_timezone_set("PRC"); echo date("Y/m/d") . "\n"; ?>
%%%-------------------------------------------------------------------
<?php
$pri_key_list = $data_array['pri_key_list'];
$other_field_list = $data_array['other_field_list'];
$info_list=$data_array['info_list'];
$field_list = array_merge($pri_key_list, $other_field_list);
$db_record_name = "db_" . $target_file_name;
?>

%% ===================================================================
%% record
%% ===================================================================
<?php
function print_record($field_list,$info_list){
	for ($i = 0; $i < count($field_list); $i++) { 
		if ($i == count($field_list) - 1) {
			echo "\t", $field_list[$i], " %% ".$info_list[$i]." \n";
		}
		else
		{
			echo "\t", $field_list[$i], ", %% ".$info_list[$i]."\n";	
		}
	}
}
?>
-record(<?php echo $db_record_name; ?>, {
<?php
	print_record($field_list,$info_list);
?>
}).

%% ===================================================================
%% define
%% ===================================================================
<?php 
$table_name = strtoupper($target_file_name);
$imp_str = implode(", ", $field_list);
$imp_str1 = implode(" = '~p', ", $pri_key_list) . " = '~p'";
$imp_str2 = implode(" = '~p', ", $field_list) . " = '~p'";
$imp_str3 = implode(" = '~p', ", $other_field_list) . " = '~p'";
?>
-define(<?php echo "SELECT_ALL_" . $table_name . "_INFO";?>, <<"SELECT <?php echo $imp_str; ?> FROM <?php echo $target_file_name; ?>">>).
-define(<?php echo "SELECT_ROW_" . $table_name . "_INFO";?>, <<"SELECT <?php echo $imp_str; ?> FROM <?php echo $target_file_name; ?> WHERE <?php echo $imp_str1; ?>">>).

-define(<?php echo "INSERT_" . $table_name . "_INFO";?>, <<"INSERT INTO <?php echo $target_file_name; ?> (<?php echo $imp_str; ?>) VALUES (<?php 
for($i = 0; $i < count($field_list); $i++){
	if ($i == count($field_list) - 1) {
			echo "'~p'";
		}
		else
		{
			echo "'~p', ";
		}
} 
?>)">>).

-define(<?php echo "REPLACE_" . $table_name . "_INFO";?>, <<"REPLACE INTO <?php echo $target_file_name; ?> (<?php echo $imp_str; ?>) VALUES (<?php 
for($i = 0; $i < count($field_list); $i++){
	if ($i == count($field_list) - 1) {
			echo "'~p'";
		}
		else
		{
			echo "'~p', ";
		}
} 
?>)">>).

-define(<?php echo "UPDATE_" . $table_name . "_INFO";?>, <<"UPDATE <?php echo $target_file_name; ?> SET <?php echo $imp_str3; ?> WHERE <?php echo $imp_str1; ?>">>).

-define(<?php echo "DELETE_ALL_" . $table_name . "_INFO";?>, <<"DELETE FROM <?php echo $target_file_name; ?>">>).
-define(<?php echo "DELETE_" . $table_name . "_INFO";?>, <<"DELETE FROM <?php echo $target_file_name; ?> WHERE <?php echo $imp_str1; ?>">>).