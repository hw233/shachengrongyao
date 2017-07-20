@set root=%cd%

cd C:\Work\php\php
php C:\Work\Project\tool\mconfig\config_script.php scene
@echo "creat complete"
copy C:\Work\Project\tool\tag\config\sceneConfig.lua C:\Work\Project\client\src_lua\app\conf


pause
