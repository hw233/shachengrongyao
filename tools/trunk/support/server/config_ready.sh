#!/bin/sh

target_dir=$1
if [ ! -d $target_dir/db_script ]; then
	echo "not project dir"
	exit 1
fi
find $target_dir/src -type d -exec chmod 711 {} \;
chmod 755 $target_dir/src/config
chmod 666 $target_dir/src/config/*
chown -R cfguser:cfguser $target_dir/ebin
