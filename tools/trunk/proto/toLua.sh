#!/bin/bash
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
cd $DIR
php $DIR/proto_script.php
cp $DIR/../tag/proto/GameProtocol.lua $DIR/../../client/src_lua/app/gamenet
echo "create complete"
