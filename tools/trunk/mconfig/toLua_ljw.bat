@set root=%cd%

cd C:\php
php C:\work2\mconfig\config_script.php equips_plus
@echo "creat complete"
copy C:\work2\tag\config\equips_plusConfig.lua C:\mir\src\app\conf

pause
