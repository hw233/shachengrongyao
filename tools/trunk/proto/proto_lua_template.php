-- 自动生成，请勿修改 
-- 时间：2015-1-16  11:52:22
-- zhangshunqiu <21102585@qq.com_addref>

local GameProtocol = class("GameProtocol")
function GameProtocol:ctor()
    -- GameProtocol.super.ctor(self)
    self.cmds={}

<?php


//print_r($data_array['type_array']);


function make_param($param,$data_array)
{
	$param_num = count($param) - 1;

	for ($i = 0; $i <= $param_num; $i++) 
	{
		make_selfDefine($param[$i]["type"],$param[$i],$data_array);
		if ($i != $param_num) {
			echo ",";
		}
	}

}
function make_selfDefine($type,$param,$data_array)
{
	switch ($type) {
					case "int8":
						echo "{\"".$param['name']."\",\"".$param['type']."\"}";
						break;
					case "int16":
						echo "{\"".$param['name']."\",\"".$param['type']."\"}";
						break;
					case "int32":
						echo "{\"".$param['name']."\",\"".$param['type']."\"}";
						break;
					case "int64":
						echo "{\"".$param['name']."\",\"".$param['type']."\"}";
						break;
					case "string":
						echo "{\"".$param['name']."\",\"".$param['type']."\"}";
						break;
					case "list":
						if (strcmp($param['sub_type'], "int64") == 0 || strcmp($param['sub_type'], "string") == 0 || strcmp($param['sub_type'], "int32") == 0 || strcmp($param['sub_type'], "int16") == 0 || strcmp($param['sub_type'], "int8") == 0 )
						{
							echo "{\"".$param['name']."\",\""."array"."\",\"".$param['sub_type']."\"}";
						}
						else
						{
							echo "{\"".$param['name']."\",\""."array"."\",";
							
							foreach ($data_array['type_array'] as $type_info) 
							{
								if (strcmp($type_info['name'], $param['sub_type']) == 0)
								{
									$paraml = $type_info['param_array'];
									$param_n = count($paraml) - 1;
									echo "{";
									for ($i = 0; $i <= $param_n; $i++)
									{
										make_selfDefine($paraml[$i]['type'],$paraml[$i],$data_array);
										if ($i != $param_n) {
											echo ",";
										}
									}
									echo "}";
									break;
								}
							}
							echo "}";
						}
						break;
					default:
						echo "{\"".$param['name']."\",\""."object"."\",";
						foreach ($data_array['type_array'] as $type_info) 
							{
								if (strcmp($type_info['name'], $type) == 0)
								{
									$paraml = $type_info['param_array'];
									$param_n = count($paraml) - 1;
									echo "{";
									for ($i = 0; $i <= $param_n; $i++)
									{
										make_selfDefine($paraml[$i]['type'],$paraml[$i],$data_array);
										if ($i != $param_n) {
											echo ",";
										}
									}
									echo "}";
									break;
								}
							}
						echo "}";
						break;
	}
	
}


//print_r($data_array);
//foreach ($data_array['type_array'] as $type_info) {
    //make_record($type_info);
	//echo $type_info['name'];
//}

foreach ($data_array['module_array'] as $module_info) {
    foreach ($module_info['packet_array'] as $packet_info) {
       // make_record($packet_info);
	  // print_r($packet_info);
	   if (strcmp($packet_info['type'], "c2s") == 0) 
	   {
		   echo "\t"."self.cmds[\"C_".$packet_info['proto']."\"] = {";
		   make_param($packet_info['param_array'],$data_array);
	   }
	   else
	   {
		   echo "\t"."self.cmds[\"S_".$packet_info['proto']."\"] = {";
		   make_param($packet_info['param_array'],$data_array);
	   }
	   echo "}"."\n";
    }
}

?>

end

function GameProtocol:getCmdDesc(cmdId)
    return self.cmds[cmdId]
end

return GameProtocol