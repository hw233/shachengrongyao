@echo off
rem 生成游戏配置windows版

rem PHP路径
set phpdir=C:\wamp\bin\php\php5.5.12

if not "%1"=="" goto %1

:choices
echo ----------------------------------------------------------------------------
echo 功能列表
echo 1.生成单个配置
echo 2.生成全部配置
rem echo 3.生成协议
echo ----------------------------------------------------------------------------
set /p var="选择功能(1-10)?"
if %var%==1 GOTO config_input
if %var%==2 GOTO config_all
if %var%==3 GOTO proto
goto end

rem 根据用户输入生成单个配置
:config_input
call:fun_ready
set cfg=
set /p cfg="生成单个配置，请输入配置文件名称（回车退出）："
if "%cfg%"=="" goto end
call:fun_config %cfg%
echo;
if not "%cfg%"=="" goto config_input

rem 生成单个配置
:config
call:fun_config %2
goto end

rem 生成全部配置
:config_all
echo 生成全部配置
for %%i in (data\config\*.xml)  do (
   call:fun_config %%~ni
)
goto end

rem 生成协议
:proto
echo proto
%phpdir%\php .\proto\proto_script.php
goto end

rem 生成数据库
:db
echo db
%phpdir%\php .\db\db_script.php %2
goto end

rem 环境准备
:fun_ready
if not exist .\tag\config\erl md .\tag\config\erl
if not exist .\tag\config\hrl md .\tag\config\hrl
goto:eof

rem 生成单个配置的模块
:fun_config
echo 生成单个配置文件%1
set FILE_NAME=%1
%phpdir%\php .\mconfig\config_script.php %FILE_NAME%
goto:eof


:end
pause