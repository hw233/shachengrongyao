%%%-------------------------------------------------------------------
%%% @author zhengsiying
%%% @doc
%%%		自动生成文件，不要手动修改
%%% @end
%%% Created : 2016/10/12
%%%-------------------------------------------------------------------

-module(charge_config).

-include("common.hrl").
-include("config.hrl").

-compile([export_all]).

get_list_conf() ->
	[ charge_config:get(X) || X <- get_list() ].

get_list() ->
	[1, 2, 3, 4, 5, 6, 7, 8, 9].

get(1) ->
	#charge_conf{
		key = 1,
		jade = 9000,
		first_giving = 0,
		common_giving = 0,
		rmb = 30,
		counter_id = 10050,
		time_counter_id = 0,
		month_day = 30,
		month_jade = 3000
	};

get(2) ->
	#charge_conf{
		key = 2,
		jade = 1800,
		first_giving = 3600,
		common_giving = 1800,
		rmb = 6,
		counter_id = 10013,
		time_counter_id = 10131,
		month_day = 0,
		month_jade = 0
	};

get(3) ->
	#charge_conf{
		key = 3,
		jade = 7500,
		first_giving = 15000,
		common_giving = 7500,
		rmb = 25,
		counter_id = 10014,
		time_counter_id = 10131,
		month_day = 0,
		month_jade = 0
	};

get(4) ->
	#charge_conf{
		key = 4,
		jade = 20400,
		first_giving = 40800,
		common_giving = 20400,
		rmb = 68,
		counter_id = 10015,
		time_counter_id = 0,
		month_day = 0,
		month_jade = 0
	};

get(5) ->
	#charge_conf{
		key = 5,
		jade = 29400,
		first_giving = 58800,
		common_giving = 29400,
		rmb = 98,
		counter_id = 10016,
		time_counter_id = 0,
		month_day = 0,
		month_jade = 0
	};

get(6) ->
	#charge_conf{
		key = 6,
		jade = 98400,
		first_giving = 196800,
		common_giving = 98400,
		rmb = 328,
		counter_id = 10018,
		time_counter_id = 0,
		month_day = 0,
		month_jade = 0
	};

get(7) ->
	#charge_conf{
		key = 7,
		jade = 194400,
		first_giving = 388800,
		common_giving = 194400,
		rmb = 648,
		counter_id = 10019,
		time_counter_id = 0,
		month_day = 0,
		month_jade = 0
	};

get(8) ->
	#charge_conf{
		key = 8,
		jade = 599400,
		first_giving = 1198800,
		common_giving = 599400,
		rmb = 1998,
		counter_id = 10047,
		time_counter_id = 0,
		month_day = 0,
		month_jade = 0
	};

get(9) ->
	#charge_conf{
		key = 9,
		jade = 59400,
		first_giving = 118800,
		common_giving = 59400,
		rmb = 198,
		counter_id = 10017,
		time_counter_id = 0,
		month_day = 0,
		month_jade = 0
	};

get(_Key) ->
	?ERR("undefined key from charge_config ~p", [_Key]).