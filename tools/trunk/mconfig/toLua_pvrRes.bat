@set root=%cd%

cd C:\wamp\bin\php\php5.3.10
php C:\work2\tool\mconfig\config_script.php pvrRes
@echo "creat complete"
copy C:\work2\tool\tag\config\pvrResConfig.lua C:\work2\client\src_lua\app\conf



pause
