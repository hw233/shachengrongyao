#!/bin/bash
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
cd $DIR/proj
php build.php  $DIR/../client/frameworks/runtime-src/proj.ios_mac $1
echo "创建完成"
