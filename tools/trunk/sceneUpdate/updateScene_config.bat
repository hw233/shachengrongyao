@set root=%cd%

copy E:\chuanqi\tools\trunk\sceneUpdate\monster_area.xml E:\chuanqi\tools\trunk\data\config
copy E:\chuanqi\tools\trunk\sceneUpdate\npc.xml E:\chuanqi\tools\trunk\data\config
copy E:\chuanqi\tools\trunk\sceneUpdate\scene.xml E:\chuanqi\tools\trunk\data\config
copy E:\chuanqi\tools\trunk\sceneUpdate\transfer.xml E:\chuanqi\tools\trunk\data\config
copy E:\chuanqi\tools\trunk\sceneUpdate\task.xml E:\chuanqi\tools\trunk\data\config

cd C:\wamp\bin\php\php5.3.10
php E:\chuanqi\tools\trunk\mconfig\config_script.php npc
@echo "npc complete"

php E:\chuanqi\tools\trunk\mconfig\config_script.php monster_area
@echo "monster_area complete"

php E:\chuanqi\tools\trunk\mconfig\config_script.php scene
@echo "scene complete"

php E:\chuanqi\tools\trunk\mconfig\config_script.php transfer
@echo "transfer complete"
php E:\chuanqi\tools\trunk\mconfig\config_script.php task
@echo "task complete"

copy E:\chuanqi\tools\trunk\tag\config\monster_areaConfig.lua E:\project\client\trunk\src_lua\app\conf
copy E:\chuanqi\tools\trunk\tag\config\npcConfig.lua E:\project\client\trunk\src_lua\app\conf
copy E:\chuanqi\tools\trunk\tag\config\sceneConfig.lua E:\project\client\trunk\src_lua\app\conf
copy E:\chuanqi\tools\trunk\tag\config\transferConfig.lua E:\project\client\trunk\src_lua\app\conf
copy E:\chuanqi\tools\trunk\tag\config\taskConfig.lua E:\project\client\trunk\src_lua\app\conf

copy E:\chuanqi\tools\trunk\tag\config\monster_areaConfig.lua E:\chuanqi\client\trunk\src_lua\app\conf
copy E:\chuanqi\tools\trunk\tag\config\npcConfig.lua E:\chuanqi\client\trunk\src_lua\app\conf
copy E:\chuanqi\tools\trunk\tag\config\sceneConfig.lua E:\chuanqi\client\trunk\src_lua\app\conf
copy E:\chuanqi\tools\trunk\tag\config\transferConfig.lua E:\chuanqi\client\trunk\src_lua\app\conf
copy E:\chuanqi\tools\trunk\tag\config\taskConfig.lua E:\chuanqi\client\trunk\src_lua\app\conf


copy E:\chuanqi\tools\trunk\tag\config\npc_config.erl E:\chuanqi\server\trunk\server\src\config
copy E:\chuanqi\tools\trunk\tag\config\scene_config.erl E:\chuanqi\server\trunk\server\src\config
copy E:\chuanqi\tools\trunk\tag\config\transfer_config.erl E:\chuanqi\server\trunk\server\src\config
copy E:\chuanqi\tools\trunk\tag\config\task_config.erl E:\chuanqi\server\trunk\server\src\config

copy E:\chuanqi\tools\trunk\tag\config\npc_config.erl D:\server22\src\config
copy E:\chuanqi\tools\trunk\tag\config\scene_config.erl D:\server22\src\config
copy E:\chuanqi\tools\trunk\tag\config\transfer_config.erl D:\server22\src\config
copy E:\chuanqi\tools\trunk\tag\config\task_config.erl D:\server22\src\config


@echo "copy config complete"

pause
