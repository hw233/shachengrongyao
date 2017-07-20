#!/bin/bash
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
cd $DIR
php $DIR/config_script.php transfer
cp $DIR/../tag/config/transferConfig.lua $DIR/../../client/src_lua/app/conf
echo "create complete"
