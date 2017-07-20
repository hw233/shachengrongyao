@set root=%cd%

del /s /Q C:\wamp\www\tool\tag\config
del /s /Q C:\wamp\www\tool\tag\config\erl
del /s /Q C:\wamp\www\tool\tag\config\hrl
del /s /Q C:\wamp\www\tool\tag\db

cd C:\wamp\bin\php\php5.5.12



php C:\wamp\www\tool\mconfig\config_script_aidan.php word_map

rem php C:\wamp\www\tool\mconfig\config_script_aidan.php	scene
rem php C:\wamp\www\tool\mconfig\config_script_aidan.php	platform
rem php C:\wamp\www\tool\mconfig\config_script_aidan.php goods
 rem php C:\wamp\www\tool\mconfig\config_script_aidan.php monster




 rem php C:\wamp\www\tool\db\db_script.php scene_merge
  rem php C:\wamp\www\tool\db\db_script.php player_legion


pause