#!/bin/bash
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
cd $DIR
php $DIR/config_script2.php wing
cp $DIR/../tag/config/wingConfig.lua $DIR/../../client/src_lua/app/conf
echo "create complete"
