<?php
//svn diff --summarize -r 8560:8612 http://192.168.0.134:81/svn/longames/starAct/trunk/client/sanguo/staract_2/res
//svn export -q --force "http://192.168.0.134:81/svn/longames/starAct/trunk/client/sanguo/staract_2/res/effect/effects_role_xuanfeng.ExportJson"@8612 "D:\a\res\effects_role_xuanfeng.ExportJson"
	
	include 'gamePackageconfig.php';
	
	function exec_sys_cmd($cmd_str)
    {
        echo "exec: $cmd_str\n";
        //system($cmd_str, $retval);
        exec($cmd_str, $out, $retval);
        // echo $retval."*******************\n";
        return $out;
    }
	
	$dir = getcwd();
	$quick_root = $_ENV["QUICK_V3_ROOT"];
	$php = $quick_root."quick\bin\win32\php.exe ";
	$script = $php.$quick_root."quick/bin/lib/compile_scripts.php";
	/*
	$sourceFileDire = "C:/other/pack/";
	$targetFileDire = "C:/other/pack/ww/tt/";
   $res_list = array(
	array("20",array(
		array("C:/other/pack/readme.txt","C:/other/pack/ttt/readme.txt"),
		array("C:/other/pack/readme.txt","C:/other/pack/ttt/readme.txt"),
		array("C:/other/pack/readme.txt","C:/other/pack/ttt/readme.txt"),
		array("C:/other/pack/readme.txt","C:/other/pack/ttt/readme.txt"),
		array("ttt2/",""),
	)),
	array("40",array(
		array("C:/other/pack/readme.txt","C:/other/pack/ttt/readme.txt"),
		array("C:/other/pack/readme.txt","C:/other/pack/ttt/readme.txt"),
		array("C:/other/pack/readme.txt","C:/other/pack/ttt/readme.txt"),
		array("C:/other/pack/readme.txt","C:/other/pack/ttt/readme.txt"),
		array("ttt2/",""),
	)),
   ); 
   */
   
   
	echo "begin\n";
	$path = "";
	
	
	
	function copyOnePackage($res_list,$sourceFileDire,$targetFileDire,$key,$isdelSource)
    {
		for ($i=0; $i<count($res_list); $i++)
		{
			if($res_list[$i][1] == "")
			{
				$sourceAdress = $sourceFileDire.$res_list[$i][0];
				$targetAdress = $targetFileDire.$key."/".$res_list[$i][0];
				//文件夹
				if(file_exists($sourceAdress))
				{
					if (file_exists($targetAdress))
					{
					}
					else
					{
						mkdir($targetAdress,0777,true);
					}
					
					echo "ok  ".$sourceAdress."\n";
					
					$dir = opendir($sourceAdress);
					while(false !== ( $file = readdir($dir)) ) 
					{
						if (( $file != '.' ) && ( $file != '..' )) 
						{
							if ( is_dir($sourceAdress . '/' . $file) ) 
							{
							  //recurse_copy($sourceAdress . '/' . $file,$targetAdress . '/' . $file);
							}
							else 
							{
								copy($sourceAdress . '/' . $file,$targetAdress . '/' . $file);
								if($isdelSource) 
								{
									unlink($sourceAdress . '/' . $file);
								}
							}
						}
					}
					closedir($dir);
					//copy($sourceAdress,$targetAdress);
				}
				else
				{
					echo "not  ".$sourceAdress."\n";
				}
				
			}
			else
			{
				$sourceAdress = $sourceFileDire.$res_list[$i][0];
				$targetAdress = $targetFileDire.$key."/".$res_list[$i][0];	
				//文件夹
				if(file_exists($sourceAdress))
				{
					if (file_exists($targetAdress))
					{
					}
					else
					{
						echo $targetAdress;
						mkdir($targetAdress,0777,true);
					}
					echo "ok  ".$sourceAdress.$res_list[$i][1]."\n";
					copy($sourceAdress.$res_list[$i][1],$targetAdress.$res_list[$i][1]);
					if($isdelSource) 
					{
						unlink($sourceAdress.$res_list[$i][1]);
					}
					
				}
				else
				{
					echo "not  ".$sourceAdress.$res_list[$i][1]."\n";
				}
				
			}
		}
		//打包
		
		$path = $targetFileDire.$key;
		$zip_file = $targetFileDire."\\".$key.".zip";
		chdir($path);
		$zip = "haozipC a -tzip ".$zip_file." *";
		exec_sys_cmd($zip);
		chdir($targetFileDire);
		//$zip_size[$i] = filesize($zip_file);
		
		//write ver.txt
		$ver_file = $key.".txt";
		$fp=fopen($ver_file,'w');
		$zip_size = filesize($zip_file);
		fwrite($fp, "\r\n"."size = ".$zip_size);
		fclose($fp);
		return $zip_size;
	}
	
	$packageConf = "<?php\r\n \$packageList = array(";
	for ($i=0; $i<count($package_res_Config); $i++)
	{
		//print_r($package_res_Config[$i]);
		$lvList = $package_res_Config[$i];
		$key = $lvList[0]; 
		$size = copyOnePackage($lvList[1],$sourceFileDire,$targetFileDire,$key,true);
		$lvList[3] = $size;
		$packageConf = $packageConf ."\r\n";
		$packageConf = $packageConf .'		array("'.$key.'","'.$lvList[2].'","'.$lvList[3].'","'.$lvList[4].'"),';
		//$packageConf = $packageConf ."\r\n";
		
	}
	$packageConf = $packageConf."\r\n	);\r\n?>";
	
	chdir($targetFileDire);
	$conf_file = "packageConf.php";
	$fp=fopen($conf_file,'w');
	fwrite($fp, $packageConf);
	fclose($fp);
	return $zip_size;
		
	echo "\nEND\n";
	
	
	
	
	
	
	
	
	
	
	
	
	

	
?>
