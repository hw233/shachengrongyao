@set root=%cd%

rem php E:\chuanqi\tools\trunk\mconfig\config_script.php activity_list
rem php E:\chuanqi\tools\trunk\mconfig\config_script.php function
copy E:\chuanqi\tools\trunk\sceneUpdate\robot.xml E:\chuanqi\tools\trunk\data\config

php E:\chuanqi\tools\trunk\mconfig\config_script.php robot


rem copy E:\chuanqi\tools\trunk\tag\config\monsterConfig.lua E:\chuanqi\client\trunk\src_lua\app\conf

copy E:\chuanqi\tools\trunk\tag\config\robot_config.erl C:\robot\robot\src\config


@echo "task complete"


pause
