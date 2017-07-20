%%%-------------------------------------------------------------------
%%% @author zhengsiying
%%% @doc
%%%        自动生成文件，不要手动修改
%%% @end
%%% Created : <?php date_default_timezone_set("PRC");
echo_meta_date(); ?>
%%%-------------------------------------------------------------------
<?php
$record_name = $target_file_name . "_conf";
foreach($data_array as $table)
{
    $data_array = $table;
    break;
}
for ($i = 1; $i < count($data_array); $i++) {
    $temp= "-define(GAMECONFIG_".$data_array[$i][0].", ".$data_array[$i][1].").  %% ".$data_array[$i][2]."\n";
    echo $temp;
}
?>

%% ===================================================================
%% define
%% ===================================================================
<?php

?>
