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
for ($i = 2; $i < count($data_array); $i++) {
    $temp= "-define(".$data_array[$i][2].", ".$data_array[$i][0].").  %% ".$data_array[$i][1]."\n";
    echo $temp;
}
?>

%% ===================================================================
%% define
%% ===================================================================
<?php

?>
