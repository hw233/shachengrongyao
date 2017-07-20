#!/bin/sh

if [ $# -lt 1 ]; then
	echo "miss paramater"
	exit 1
fi

if [ ! -d ~/config_update/$1 ]; then
	echo "not support server:"$1
	exit 1
fi

cfgcp(){
	for f in `ls $1`
	do
		if [ -f $2/$f ]; then
			#echo $f
			\cp -f $1/$f $2/
		fi
	done
}

server_id=$1
inter_server_id=$[700+server_id]
src_dir=~/config_update/$server_id
target_dir=/data/server/server_$server_id
inter_target_dir=/data/server/inter_server_$inter_server_id

cfgcp $src_dir $target_dir/src/config
cfgcp $src_dir $inter_target_dir/src/config
rm -rf $src_dir/*.*

echo "update local"
#\cp -f $src_dir/*.* $target_dir/src/config/
$target_dir/sh/make.sh
$target_dir/sh/hot.sh

echo "update cross"
#\cp -f $src_dir/*.* $inter_target_dir/src/config/
$inter_target_dir/sh/make.sh
$inter_target_dir/sh/hot.sh

echo "ok"
