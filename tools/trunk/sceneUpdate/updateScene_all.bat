@set root=%cd%
@set xmlName=npc
@set luaAdress=E:\chuanqi\client\trunk\src_lua\app\conf
@set erlAdress=E:\chuanqi\server\trunk\server\src\config

@set xmlName=npc
copy %root%\sceneUpdate\%xmlName%.xml %root%\data\config
php %root%\mconfig\config_script.php %xmlName%
copy %root%\tag\config\%xmlName%Config.lua %luaAdress%
copy %root%\tag\config\%xmlName%_config.erl %erlAdress%

@set xmlName=monster_area
copy %root%\sceneUpdate\%xmlName%.xml %root%\data\config
php %root%\mconfig\config_script.php %xmlName%
copy %root%\tag\config\%xmlName%Config.lua %luaAdress%
copy %root%\tag\config\%xmlName%_config.erl %erlAdress%


@set xmlName=scene
copy %root%\sceneUpdate\%xmlName%.xml %root%\data\config
php %root%\mconfig\config_script.php %xmlName%
copy %root%\tag\config\%xmlName%Config.lua %luaAdress%
copy %root%\tag\config\%xmlName%_config.erl %erlAdress%


@set xmlName=transfer
copy %root%\sceneUpdate\%xmlName%.xml %root%\data\config
php %root%\mconfig\config_script.php %xmlName%
copy %root%\tag\config\%xmlName%Config.lua %luaAdress%
copy %root%\tag\config\%xmlName%_config.erl %erlAdress%


@set xmlName=task
copy %root%\sceneUpdate\%xmlName%.xml %root%\data\config
php %root%\mconfig\config_script.php %xmlName%
copy %root%\tag\config\%xmlName%Config.lua %luaAdress%
copy %root%\tag\config\%xmlName%_config.erl %erlAdress%



set map1=20224
copy D:\cupmap\map\%map1%\*.* E:\chuanqi\client\trunk\res\map\%map1%
copy D:\cupmap\miniMap\%map1%.jpg E:\chuanqi\client\trunk\res\map\miniMap
copy D:\res\map\complete\%map1%\M%map1%.lua E:\chuanqi\client\trunk\src_lua\app\conf\map
copy D:\res\map\complete\%map1%\map_%map1%.erl  E:\chuanqi\server\trunk\src\map_data

set map1=20233
copy D:\cupmap\map\%map1%\*.* E:\chuanqi\client\trunk\res\map\%map1%
copy D:\cupmap\miniMap\%map1%.jpg E:\chuanqi\client\trunk\res\map\miniMap
copy D:\res\map\complete\%map1%\M%map1%.lua E:\chuanqi\client\trunk\src_lua\app\conf\map
copy D:\res\map\complete\%map1%\map_%map1%.erl  E:\chuanqi\server\trunk\src\map_data

set map1=32101
copy D:\cupmap\map\%map1%\*.* E:\chuanqi\client\trunk\res\map\%map1%
copy D:\cupmap\miniMap\%map1%.jpg E:\chuanqi\client\trunk\res\map\miniMap
copy D:\res\map\complete\%map1%\M%map1%.lua E:\chuanqi\client\trunk\src_lua\app\conf\map
copy D:\res\map\complete\%map1%\map_%map1%.erl  E:\chuanqi\server\trunk\src\map_data

set map1=32102
copy D:\cupmap\map\%map1%\*.* E:\chuanqi\client\trunk\res\map\%map1%
copy D:\cupmap\miniMap\%map1%.jpg E:\chuanqi\client\trunk\res\map\miniMap
copy D:\res\map\complete\%map1%\M%map1%.lua E:\chuanqi\client\trunk\src_lua\app\conf\map
copy D:\res\map\complete\%map1%\map_%map1%.erl  E:\chuanqi\server\trunk\src\map_data

set map1=32112
copy D:\cupmap\map\%map1%\*.* E:\chuanqi\client\trunk\res\map\%map1%
copy D:\cupmap\miniMap\%map1%.jpg E:\chuanqi\client\trunk\res\map\miniMap
copy D:\res\map\complete\%map1%\M%map1%.lua E:\chuanqi\client\trunk\src_lua\app\conf\map
copy D:\res\map\complete\%map1%\map_%map1%.erl  E:\chuanqi\server\trunk\src\map_data

set map1=32118
copy D:\cupmap\map\%map1%\*.* E:\chuanqi\client\trunk\res\map\%map1%
copy D:\cupmap\miniMap\%map1%.jpg E:\chuanqi\client\trunk\res\map\miniMap
copy D:\res\map\complete\%map1%\M%map1%.lua E:\chuanqi\client\trunk\src_lua\app\conf\map
copy D:\res\map\complete\%map1%\map_%map1%.erl  E:\chuanqi\server\trunk\src\map_data

set map1=32119
copy D:\cupmap\map\%map1%\*.* E:\chuanqi\client\trunk\res\map\%map1%
copy D:\cupmap\miniMap\%map1%.jpg E:\chuanqi\client\trunk\res\map\miniMap
copy D:\res\map\complete\%map1%\M%map1%.lua E:\chuanqi\client\trunk\src_lua\app\conf\map
copy D:\res\map\complete\%map1%\map_%map1%.erl  E:\chuanqi\server\trunk\src\map_data

set map1=32120
copy D:\cupmap\map\%map1%\*.* E:\chuanqi\client\trunk\res\map\%map1%
copy D:\cupmap\miniMap\%map1%.jpg E:\chuanqi\client\trunk\res\map\miniMap
copy D:\res\map\complete\%map1%\M%map1%.lua E:\chuanqi\client\trunk\src_lua\app\conf\map
copy D:\res\map\complete\%map1%\map_%map1%.erl  E:\chuanqi\server\trunk\src\map_data

set map1=32122
copy D:\cupmap\map\%map1%\*.* E:\chuanqi\client\trunk\res\map\%map1%
copy D:\cupmap\miniMap\%map1%.jpg E:\chuanqi\client\trunk\res\map\miniMap
copy D:\res\map\complete\%map1%\M%map1%.lua E:\chuanqi\client\trunk\src_lua\app\conf\map
copy D:\res\map\complete\%map1%\map_%map1%.erl  E:\chuanqi\server\trunk\src\map_data

set map1=32123
copy D:\cupmap\map\%map1%\*.* E:\chuanqi\client\trunk\res\map\%map1%
copy D:\cupmap\miniMap\%map1%.jpg E:\chuanqi\client\trunk\res\map\miniMap
copy D:\res\map\complete\%map1%\M%map1%.lua E:\chuanqi\client\trunk\src_lua\app\conf\map
copy D:\res\map\complete\%map1%\map_%map1%.erl  E:\chuanqi\server\trunk\src\map_data

set map1=32124
copy D:\cupmap\map\%map1%\*.* E:\chuanqi\client\trunk\res\map\%map1%
copy D:\cupmap\miniMap\%map1%.jpg E:\chuanqi\client\trunk\res\map\miniMap
copy D:\res\map\complete\%map1%\M%map1%.lua E:\chuanqi\client\trunk\src_lua\app\conf\map
copy D:\res\map\complete\%map1%\map_%map1%.erl  E:\chuanqi\server\trunk\src\map_data

pause
