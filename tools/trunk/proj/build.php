<?php
    $dir = getcwd();

    function exec_sys_cmd($cmd_str)
    {
        echo "exec: $cmd_str\n";
        exec($cmd_str, $out, $retval);
        return $out;
    }

    //根据模板文件生成目标文件的内容
function parseTemplate($tpl_file, $proj_name="", $target_file_name=""){
    ob_start();
    include $tpl_file;
    $content = ob_get_contents();
    ob_end_clean();

    return $content;
}
//写文件
function writeFile($target_file, $content, $mode='wb'){
    $oldMask= umask(0);
    $fp = @fopen($target_file, $mode);
    fwrite($fp, $content);
    fclose($fp);
    umask($oldMask);
}

    $proj_path = $argv[1];
    $proj_name = $argv[2];
    $new_proj = $proj_path.'/chuangqi_'.$proj_name.'.xcodeproj';
    $cmd = 'mkdir '.$new_proj;
    exec_sys_cmd($cmd);
    $cmd = 'cp -R '.$dir.'/chuangqi_tmp.xcodeproj/* '.$new_proj;
    exec_sys_cmd($cmd);
    $content = parseTemplate($new_proj.'/project.pbxproj', $proj_name);
    writeFile($new_proj.'/project.pbxproj', $content);

    // $content = parseTemplate($new_proj.'/xcuserdata/shine.xcuserdatad/xcschemes/xcschememanagement.plist', $proj_name);
    // writeFile($new_proj.'/xcuserdata/shine.xcuserdatad/xcschemes/xcschememanagement.plist', $content);

    // $content = parseTemplate($new_proj.'/xcuserdata/shine.xcuserdatad/xcschemes/chuangqi_tmp iOS.xcscheme', $proj_name);
    // writeFile($new_proj.'/xcuserdata/shine.xcuserdatad/xcschemes/chuangqi_tmp iOS.xcscheme', $content);
    // $cmd = 'mv '.$new_proj.'/xcuserdata/shine.xcuserdatad/xcschemes/chuangqi_tmp iOS.xcscheme '.$new_proj.'/xcuserdata/shine.xcuserdatad/xcschemes/chuangqi_'.$proj_name.' iOS.xcscheme';
    // exec_sys_cmd($cmd);
    
    // $content = parseTemplate($new_proj.'/xcuserdata/shine.xcuserdatad/xcschemes/chuangqi_tmp Mac.xcscheme', $proj_name);
    // writeFile($new_proj.'/xcuserdata/shine.xcuserdatad/xcschemes/chuangqi_tmp Mac.xcscheme', $content);
    // $cmd = 'mv '.$new_proj.'/xcuserdata/shine.xcuserdatad/xcschemes/chuangqi_tmp Mac.xcscheme '.$new_proj.'/xcuserdata/shine.xcuserdatad/xcschemes/chuangqi_'.$proj_name.' Mac.xcscheme';
    // exec_sys_cmd($cmd);
    $sdkHelperPath = $proj_path.'/ios/'.$proj_name;
    $cmd = 'mkdir '.$sdkHelperPath;
    exec_sys_cmd($cmd);
    
    $content = parseTemplate($dir.'/tmpSDKHelper.h', $proj_name);
    writeFile($sdkHelperPath.'/'.strtoupper($proj_name).'SDKHelper.h', $content);

    $content = parseTemplate($dir.'/tmpSDKHelper.m', $proj_name);
    writeFile($sdkHelperPath.'/'.strtoupper($proj_name).'SDKHelper.m', $content);


    $cmd = 'cp '.$dir.'/Info_tmp.plist '.$proj_path.'/ios/Info_'.$proj_name.'.plist';
    exec_sys_cmd($cmd);
    $content = parseTemplate($dir.'/Prefix_tmp.pch', $proj_name);
    writeFile($proj_path.'/ios/Prefix_'.$proj_name.'.pch', $content);
?>
