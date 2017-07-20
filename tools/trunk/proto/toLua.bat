@set root=%cd%
cd C:\wamp\bin\php\php5.3.10
php C:\work2\tool\proto\proto_script.php
@echo "creat complete"
copy C:\work2\tool\tag\proto\GameProtocol.lua C:\work2\client\src_lua\app\gamenet
pause
