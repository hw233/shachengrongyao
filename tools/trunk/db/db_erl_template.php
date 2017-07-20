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
$field_list = array_merge($pri_key_list, $other_field_list);
$module_name = "db_agent_" . $target_file_name;
$db_record_name = "db_data_" . $target_file_name;
$cache_record_name = "cache_" . $target_file_name;
$table_name = strtoupper($target_file_name);
?>

-module(<?php echo $module_name; ?>).

-include("common.hrl").
-include("<?php echo $module_name; ?>.hrl").

-compile([export_all]).

<?php 
$macro = "?SELECT_ALL_" . $table_name . "_INFO"; 
$pri_key_list1 = array();
foreach ($pri_key_list as $value) {
	array_push($pri_key_list1, ucfirst($value));
}
$imp_pri_key_str = implode(", ", $pri_key_list1);

$field_list1 = array();
foreach ($field_list as $value) {
	array_push($field_list1, ucfirst($value));
}
$imp_field_str = implode(", ", $field_list1);

function print_record1($flag, $field_list){
	for ($i = 0; $i < count($field_list); $i++) { 
		if ($i == count($field_list) - 1) {
			echo $flag, $field_list[$i], " = ", ucfirst($field_list[$i]), "\n";
		}
		else
		{
			echo $flag, $field_list[$i], " = ", ucfirst($field_list[$i]), ",\n";	
		}
	}
}
?>
get_all() ->
	Sql = <?php echo $macro; ?>,
	case db:get_all(Sql) of
		List when is_list(List) ->
			[
			#<?php echo $cache_record_name; ?>{
				key = {<?php echo $imp_pri_key_str; ?>},
<?php print_record1("\t\t\t\t", $other_field_list) ?>
			} || [<?php echo $imp_field_str; ?>] <- List];
		_ ->
			[]	
	end.

<?php 
$macro = "?SELECT_ROW_" . $table_name . "_INFO"; 
?>
get_row(<?php echo $imp_pri_key_str; ?>) ->
	Sql = io_lib:format(<?php echo $macro , ", [", $imp_pri_key_str, "]"; ?>),
	case db:get_row(Sql) of 
		[<?php echo $imp_field_str; ?>] ->
			#<?php echo $cache_record_name; ?>{
				key = {<?php echo $imp_pri_key_str; ?>},
<?php print_record1("\t\t\t\t", $other_field_list) ?>
			};
		_ ->
			none
	end.

<?php 
$macro = "?INSERT_" . $table_name . "_INFO";
?>
insert(Record) ->
	#<?php echo $cache_record_name; ?>{
		key = {<?php echo $imp_pri_key_str; ?>},
<?php print_record1("\t\t", $other_field_list) ?>
	} = Record,
	Sql = io_lib:format(<?php echo $macro , ", [", $imp_field_str, "]"; ?>),
	db:execute(Sql).

<?php 
$macro = "?REPLACE_" . $table_name . "_INFO";
?>
replace(Record) ->
	#<?php echo $cache_record_name; ?>{
		key = {<?php echo $imp_pri_key_str; ?>},
<?php print_record1("\t\t", $other_field_list) ?>
	} = Record,
	Sql = io_lib:format(<?php echo $macro , ", [", $imp_field_str, "]"; ?>),
	db:execute(Sql).

<?php 
$macro = "?UPDATE_" . $table_name . "_INFO";
$_field_list = array_merge($other_field_list, $pri_key_list);
$_field_list1 = array();
foreach ($_field_list as $value) {
	array_push($_field_list1, ucfirst($value));
}
$_imp_field_str = implode(", ", $_field_list1);
?>
update(Record) ->
	#<?php echo $cache_record_name; ?>{
		key = {<?php echo $imp_pri_key_str; ?>},
<?php print_record1("\t\t", $other_field_list) ?>
	} = Record,
	Sql = io_lib:format(<?php echo $macro , ", [", $_imp_field_str, "]"; ?>),
	db:execute(Sql).

<?php 
$macro = "?DELETE_ALL_" . $table_name . "_INFO";
?>
delete_all() ->
	Sql = <?php echo $macro; ?>,
	db:execute(Sql).

<?php 
$macro = "?DELETE_" . $table_name . "_INFO";
?>
delete(<?php echo $imp_pri_key_str; ?>) ->
	Sql = io_lib:format(<?php echo $macro , ", [", $imp_pri_key_str, "]"; ?>),
	db:execute(Sql).