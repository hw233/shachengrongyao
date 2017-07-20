#!/bin/bash
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
cd $DIR
php $DIR/config_script.php top_navigation_menu
cp $DIR/../tag/config/top_navigation_menuConfig.lua $DIR/../../client/src_lua/app/conf
echo "create complete"
