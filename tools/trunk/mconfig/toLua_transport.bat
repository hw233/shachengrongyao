@set root=%cd%

cd C:\wamp\bin\php\php5.3.10
php C:\work2\tool\mconfig\config_script.php scene_transport
@echo "creat complete"
copy C:\work2\tool\tag\config\scene_transportConfig.lua C:\work2\client\src\app\conf

cd C:\wamp\bin\php\php5.3.10
php C:\work2\tool\mconfig\config_script.php transfer
@echo "creat complete"
copy C:\work2\tool\tag\config\transferConfig.lua C:\work2\client\src\app\conf

pause
