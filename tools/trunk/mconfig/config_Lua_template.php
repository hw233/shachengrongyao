-- 自动生成，请勿修改 
-- 时间：<?php date_default_timezone_set("PRC"); echo_meta_date(); ?>
-- 21102585@qq.com
<?php

function parseArray($arr,$str){
	//print_r($arr);
	echo "{";
	//echo count($arr);
	for($kk = 0; $kk < count($arr); $kk++) {
		if (is_string($arr[$kk]))
		{
			echo "\"".$arr[$kk]."\"";
		}
		elseif (is_int($arr[$kk]) || is_numeric($arr[$kk]))
		{
			echo $arr[$kk];
		}
		elseif (is_array($arr[$kk]))
		{
			parseArray($arr[$kk],$str);
		}
        else
        {
            echo "\"\"";
        }
		if($kk != count($arr) - 1)
		{
			echo ",";
		}
	}
	echo "}";
}

//echo $target_file_name;
//print_r($data_array);
echo "\n"."local ".$target_file_name."Config = class(\"".$target_file_name."Config\")"."\n";
echo "function ".$target_file_name."Config:ctor()"."\n";
//foreach($data_array as $table)
//{
	//$data_array = $table;
	//echo "FFFF";
	//print_r($data_array["goods"][0]);
	//print_r($data_array);
	//break;
//}

echo "\t"."self.fields = {";

foreach ($data_array as $value) { 
	$content = $value;
	break;
} 

$fields = $content[0];
for($i = 0; $i < count($fields); $i++) {
    echo "\"".$fields[$i]."\"";
    if($i != count($fields) - 1)
    {
        echo ", ";
	}
	else
	{
		
	}
}
echo "}"."\n";
echo "\t"."self.datas = {\n";

for($j = 2; $j < count($content); $j++) {
	$lineArr = $content[$j];
	echo "\t\t[".$lineArr[0]."] = {";  //这里设置KEY
	for($i = 0; $i < count($lineArr); $i++) {
		if (is_string($lineArr[$i]))
		{
			echo "\"".$lineArr[$i]."\"";
		}
		elseif (is_int($lineArr[$i]) || is_numeric($lineArr[$i]))
		{
			echo $lineArr[$i];
		}
		elseif (is_array($lineArr[$i]))
		{
			parseArray($lineArr[$i]["array"],"");
		}
        else
        {
		    echo "\"\"";
		}
		
		if($i != count($lineArr) - 1)
		{
			echo ", ";
		}
		else
		{
			echo "},"."\n";
		} 
	}
}
 
echo "\n\t"."}"."\n";
echo "end"."\n";
echo "return ".$target_file_name."Config";
?>

