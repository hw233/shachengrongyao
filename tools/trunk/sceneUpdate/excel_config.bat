@set root=%cd%

rem php E:\chuanqi\tools\trunk\mconfig\config_script.php activity_list
rem php E:\chuanqi\tools\trunk\mconfig\config_script.php function
copy E:\chuanqi\tools\trunk\sceneUpdate\monster.xml E:\chuanqi\tools\trunk\data\config
php E:\chuanqi\tools\trunk\mconfig\config_script.php monster
copy E:\chuanqi\tools\trunk\tag\config\monsterConfig.lua E:\chuanqi\client\trunk\src_lua\app\conf
copy E:\chuanqi\tools\trunk\tag\config\monster_config.erl E:\chuanqi\server\trunk\server\src\config


copy E:\chuanqi\tools\trunk\sceneUpdate\scene.xml E:\chuanqi\tools\trunk\data\config
php E:\chuanqi\tools\trunk\mconfig\config_script.php scene
copy E:\chuanqi\tools\trunk\tag\config\sceneConfig.lua E:\chuanqi\client\trunk\src_lua\app\conf
copy E:\chuanqi\tools\trunk\tag\config\scene_config.erl E:\chuanqi\server\trunk\server\src\config

copy E:\chuanqi\tools\trunk\sceneUpdate\scene_transport.xml E:\chuanqi\tools\trunk\data\config
php E:\chuanqi\tools\trunk\mconfig\config_script.php scene_transport
copy E:\chuanqi\tools\trunk\tag\config\scene_transportConfig.lua E:\chuanqi\client\trunk\src_lua\app\conf
copy E:\chuanqi\tools\trunk\tag\config\scene_transport_config.erl E:\chuanqi\server\trunk\server\src\config

copy E:\chuanqi\tools\trunk\sceneUpdate\random_monster.xml E:\chuanqi\tools\trunk\data\config
php E:\chuanqi\tools\trunk\mconfig\config_script.php random_monster
copy E:\chuanqi\tools\trunk\tag\config\random_monsterConfig.lua E:\chuanqi\client\trunk\src_lua\app\conf
copy E:\chuanqi\tools\trunk\tag\config\random_monster_config.erl E:\chuanqi\server\trunk\server\src\config

copy E:\chuanqi\tools\trunk\sceneUpdate\goods_map.xml E:\chuanqi\tools\trunk\data\config
php E:\chuanqi\tools\trunk\mconfig\config_script.php goods_map
copy E:\chuanqi\tools\trunk\tag\config\goods_mapConfig.lua E:\chuanqi\client\trunk\src_lua\app\conf
copy E:\chuanqi\tools\trunk\tag\config\goods_map_config.erl E:\chuanqi\server\trunk\server\src\config


@echo "task complete"


pause
