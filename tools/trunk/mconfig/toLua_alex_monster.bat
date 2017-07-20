@set root=%cd%
cd C:\php-5.5.30

# monster.xml
php C:\tool\mconfig\config_script.php monster
@echo "creat complete"
copy C:\tool\tag\config\monsterConfig.lua C:\

pause