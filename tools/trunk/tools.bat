@echo off
rem ������Ϸ����windows��

rem PHP·��
set phpdir=C:\wamp\bin\php\php5.5.12

if not "%1"=="" goto %1

:choices
echo ----------------------------------------------------------------------------
echo �����б�
echo 1.���ɵ�������
echo 2.����ȫ������
rem echo 3.����Э��
echo ----------------------------------------------------------------------------
set /p var="ѡ����(1-10)?"
if %var%==1 GOTO config_input
if %var%==2 GOTO config_all
if %var%==3 GOTO proto
goto end

rem �����û��������ɵ�������
:config_input
call:fun_ready
set cfg=
set /p cfg="���ɵ������ã������������ļ����ƣ��س��˳�����"
if "%cfg%"=="" goto end
call:fun_config %cfg%
echo;
if not "%cfg%"=="" goto config_input

rem ���ɵ�������
:config
call:fun_config %2
goto end

rem ����ȫ������
:config_all
echo ����ȫ������
for %%i in (data\config\*.xml)  do (
   call:fun_config %%~ni
)
goto end

rem ����Э��
:proto
echo proto
%phpdir%\php .\proto\proto_script.php
goto end

rem �������ݿ�
:db
echo db
%phpdir%\php .\db\db_script.php %2
goto end

rem ����׼��
:fun_ready
if not exist .\tag\config\erl md .\tag\config\erl
if not exist .\tag\config\hrl md .\tag\config\hrl
goto:eof

rem ���ɵ������õ�ģ��
:fun_config
echo ���ɵ��������ļ�%1
set FILE_NAME=%1
%phpdir%\php .\mconfig\config_script.php %FILE_NAME%
goto:eof


:end
pause