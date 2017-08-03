%%%-------------------------------------------------------------------
%%% @author zhengsiying
%%% @doc
%%%		自动生成文件，不要手动修改
%%% @end
%%% Created : 2016/10/12
%%%-------------------------------------------------------------------

-module(dailySign_config).

-include("common.hrl").
-include("config.hrl").

-compile([export_all]).

get_list_conf() ->
	[ dailySign_config:get(X) || X <- get_list() ].

get_list() ->
	[1, 2, 3, 4, 5].

get(1) ->
	#dailySign_conf{
		key = 1,
		count = 2,
		reward = [{110009,1,500000},{110045,1,1000},{110148,1,1},{110127,1,30}]
	};

get(2) ->
	#dailySign_conf{
		key = 2,
		count = 5,
		reward = [{110009,1,500000},{110045,1,1500},{110148,1,1},{110127,1,60}]
	};

get(3) ->
	#dailySign_conf{
		key = 3,
		count = 10,
		reward = [{110009,1,500000},{110045,1,2000},{110148,1,1},{110127,1,90}]
	};

get(4) ->
	#dailySign_conf{
		key = 4,
		count = 17,
		reward = [{110009,1,500000},{110045,1,2500},{110148,1,2},{110127,1,120}]
	};

get(5) ->
	#dailySign_conf{
		key = 5,
		count = 26,
		reward = [{110009,1,500000},{110045,1,3000},{110149,1,1},{110140,1,10}]
	};

get(_Key) ->
	?ERR("undefined key from dailySign_config ~p", [_Key]).