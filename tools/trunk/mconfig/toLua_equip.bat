@set root=%cd%

cd C:\wamp\bin\php\php5.3.10
php C:\work2\tool\mconfig\config_script.php equips
@echo "creat complete"
copy C:\work2\tool\tag\config\equipsConfig.lua C:\work2\client\src\app\conf

php C:\work2\tool\mconfig\config_script.php equips_baptize
@echo "creat complete"
copy C:\work2\tool\tag\config\equips_baptizeConfig.lua C:\work2\client\src\app\conf

php C:\work2\tool\mconfig\config_script.php equips_plus
@echo "creat complete"
copy C:\work2\tool\tag\config\equips_plusConfig.lua C:\work2\client\src\app\conf

php C:\work2\tool\mconfig\config_script.php equips_stren
@echo "creat complete"
copy C:\work2\tool\tag\config\equips_strenConfig.lua C:\work2\client\src\app\conf

php C:\work2\tool\mconfig\config_script.php fusion
@echo "creat complete"
copy C:\work2\tool\tag\config\fusionConfig.lua C:\work2\client\src\app\conf

pause
