@set root=%cd%

php E:\chuanqi\tools\trunk\mconfig\config_script.php goods


copy E:\chuanqi\tools\trunk\tag\config\goodsConfig.lua E:\chuanqi\client\trunk\src_lua\app\conf

copy E:\chuanqi\tools\trunk\tag\config\goods_config.erl E:\chuanqi\server\trunk\server\src\config

rem set map1=20207
rem copy D:\cupmap\map\%map1%\*.* E:\project\client\trunk\res\map\%map1%
rem copy D:\cupmap\miniMap\%map1%.jpg E:\project\client\trunk\res\map\miniMap
rem copy D:\res\map\complete\%map1%\M%map1%.lua E:\project\client\trunk\src_lua\app\conf\map
rem copy D:\res\map\complete\%map1%\map_%map1%.erl  E:\project\server\trunk\src\map_data

pause
