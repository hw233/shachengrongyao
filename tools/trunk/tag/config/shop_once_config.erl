%%%-------------------------------------------------------------------
%%% @author zhengsiying
%%% @doc
%%%		自动生成文件，不要手动修改
%%% @end
%%% Created : 2016/10/12
%%%-------------------------------------------------------------------

-module(shop_once_config).

-include("common.hrl").
-include("config.hrl").

-compile([export_all]).

get_list_conf() ->
	[ shop_once_config:get(X) || X <- get_list() ].

get_list() ->
	[1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18].

get(1) ->
	#shop_once_conf{
		id = 1,
		goods_id = 110109,
		lv = 45,
		pos = 1,
		is_bind = 1,
		num = 2,
		price_now = 20000
	};

get(2) ->
	#shop_once_conf{
		id = 2,
		goods_id = 110088,
		lv = 45,
		pos = 2,
		is_bind = 1,
		num = 10,
		price_now = 3200
	};

get(3) ->
	#shop_once_conf{
		id = 3,
		goods_id = 110140,
		lv = 45,
		pos = 3,
		is_bind = 1,
		num = 10,
		price_now = 2000
	};

get(4) ->
	#shop_once_conf{
		id = 4,
		goods_id = 110109,
		lv = 55,
		pos = 1,
		is_bind = 1,
		num = 4,
		price_now = 35000
	};

get(5) ->
	#shop_once_conf{
		id = 5,
		goods_id = 110303,
		lv = 55,
		pos = 2,
		is_bind = 1,
		num = 1,
		price_now = 13000
	};

get(6) ->
	#shop_once_conf{
		id = 6,
		goods_id = 110091,
		lv = 55,
		pos = 3,
		is_bind = 1,
		num = 10,
		price_now = 2950
	};

get(7) ->
	#shop_once_conf{
		id = 7,
		goods_id = 110163,
		lv = 65,
		pos = 1,
		is_bind = 1,
		num = 4,
		price_now = 96000
	};

get(8) ->
	#shop_once_conf{
		id = 8,
		goods_id = 110092,
		lv = 65,
		pos = 2,
		is_bind = 1,
		num = 10,
		price_now = 5900
	};

get(9) ->
	#shop_once_conf{
		id = 9,
		goods_id = 110260,
		lv = 65,
		pos = 3,
		is_bind = 1,
		num = 30,
		price_now = 12750
	};

get(10) ->
	#shop_once_conf{
		id = 10,
		goods_id = 110163,
		lv = 70,
		pos = 1,
		is_bind = 1,
		num = 6,
		price_now = 144000
	};

get(11) ->
	#shop_once_conf{
		id = 11,
		goods_id = 110003,
		lv = 70,
		pos = 2,
		is_bind = 1,
		num = 50,
		price_now = 1700
	};

get(12) ->
	#shop_once_conf{
		id = 12,
		goods_id = 110100,
		lv = 70,
		pos = 3,
		is_bind = 1,
		num = 20,
		price_now = 9000
	};

get(13) ->
	#shop_once_conf{
		id = 13,
		goods_id = 110260,
		lv = 75,
		pos = 1,
		is_bind = 1,
		num = 100,
		price_now = 25500
	};

get(14) ->
	#shop_once_conf{
		id = 14,
		goods_id = 110093,
		lv = 75,
		pos = 2,
		is_bind = 1,
		num = 10,
		price_now = 11000
	};

get(15) ->
	#shop_once_conf{
		id = 15,
		goods_id = 110101,
		lv = 75,
		pos = 3,
		is_bind = 1,
		num = 20,
		price_now = 17800
	};

get(16) ->
	#shop_once_conf{
		id = 16,
		goods_id = 110193,
		lv = 80,
		pos = 1,
		is_bind = 1,
		num = 100,
		price_now = 3300
	};

get(17) ->
	#shop_once_conf{
		id = 17,
		goods_id = 110003,
		lv = 80,
		pos = 2,
		is_bind = 1,
		num = 200,
		price_now = 6900
	};

get(18) ->
	#shop_once_conf{
		id = 18,
		goods_id = 110103,
		lv = 80,
		pos = 3,
		is_bind = 1,
		num = 20,
		price_now = 72000
	};

get(_Key) ->
	?ERR("undefined key from shop_once_config ~p", [_Key]).