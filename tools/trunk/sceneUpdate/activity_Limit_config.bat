cd..
@set root=%cd%
@set xmlName=activity_limit

@set luaAdress=E:\chuanqi\client\trunk\src_lua\app\conf
@set erlAdress=E:\chuanqi\server\trunk\server\src\config

copy %root%\sceneUpdate\%xmlName%.xml %root%\data\config
php %root%\mconfig\config_script.php %xmlName%
copy %root%\tag\config\%xmlName%Config.lua %luaAdress%
copy %root%\tag\config\%xmlName%_config.erl %erlAdress%

@echo "complete"

pause
