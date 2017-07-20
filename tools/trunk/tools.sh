#!/bin/bash
# 游戏工具脚本
# @author: zhengsiying
# @date: 2015.04.09
#

fun_make_db_script(){
    TABLE_NAME=${1}
    php ./db/db_script.php ${TABLE_NAME}
}

fun_proto(){
    php ./proto/proto_script.php
}

fun_config(){
    if [ ! -d "./tag/config/erl" ]; then
        mkdir ./tag/config/erl
    fi
    if [ ! -d "./tag/config/hrl" ]; then
        mkdir ./tag/config/hrl
    fi
    FILE_NAME=${1}
    echo "make config : ${FILE_NAME}"
    php ./mconfig/config_script.php ${FILE_NAME}
}

fun_config_all(){
    cd data/config/
    FILES=$(ls | grep .xml)
    cd ../../
    for FILE in ${FILES}
    do
    	fun_config ${FILE}
    done
}

fun_tips(){
    php ./tips/tips_script.php
}

fun_make_table(){
    php ./make_table/make_table.php
}

fun_help(){
    echo "================================================"
    echo "db [table name]: 生成数据库脚本"
    echo "proto : 生产协议配置"
    echo "config [config file name]: 生产游戏配置"
    echo "================================================"
}

case ${1} in
    db) fun_make_db_script $2;;
    proto) fun_proto;;
    config) fun_config $2;;
    tips) fun_tips;;
    make_table) fun_make_table;;
    config_all) fun_config_all;;
    *) fun_help;;
esac