#!/bin/bash
# 游戏配置更新
# @author: qhb
# @date: 2015.12.26
#

server_id=100
src_dir=./tag/config/erl
#传送文件
scp ./tag/config/erl/*.* cfguser@101.201.223.153:~/config_update/$server_id/
#更新配置
ssh cfguser@101.201.223.153 "config_update.sh $server_id"

