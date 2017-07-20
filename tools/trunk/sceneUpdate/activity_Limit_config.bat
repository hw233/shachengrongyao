@set root=%cd%

rem php E:\chuanqi\tools\trunk\mconfig\config_script.php activity_list
rem php E:\chuanqi\tools\trunk\mconfig\config_script.php function
rem copy E:\chuanqi\tools\trunk\sceneUpdate\monster.xml E:\chuanqi\tools\trunk\data\config

php E:\chuanqi\tools\trunk\mconfig\config_script.php activity_limit


copy E:\chuanqi\tools\trunk\tag\config\activity_limitConfig.lua E:\chuanqi\client\trunk\src_lua\app\conf

copy E:\chuanqi\tools\trunk\tag\config\activity_limit_config.erl E:\chuanqi\server\trunk\server\src\config


@echo "task complete"


pause
