@echo off
rem config update for windows
rem author qhb
rem date 2016.12.26

set server_id=100
set src_dir=./tag/config/erl

set bindir=.\support\bin
set primatekey=.\support\data\pkcfg.ppk
rem copy file
%bindir%\pscp -i %primatekey% .\tag\config\erl\*.* cfguser@101.201.223.153:/home/cfguser/config_update/%server_id%/
rem update config
%bindir%\plink -i %primatekey% -ssh cfguser@101.201.223.153 "config_update.sh %server_id%"

