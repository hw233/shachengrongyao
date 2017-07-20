@set root=%cd%
cd C:\php-5.5.30

# goods.xml
php C:\tool\mconfig\config_script.php goods
@echo "creat complete"
copy C:\tool\tag\config\goodsConfig.lua C:\

pause