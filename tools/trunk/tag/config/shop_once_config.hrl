%%%-------------------------------------------------------------------
%%% @author zhengsiying
%%% @doc
%%%        自动生成文件，不要手动修改
%%% @end
%%% Created : 2016/10/12
%%%-------------------------------------------------------------------

%% ===================================================================
%% record
%% ===================================================================

-record(shop_once_conf, {
	id, %% id
	goods_id, %% 物品
	lv, %% 级别
	pos, %% 位置(1-3)
	is_bind, %% 绑定
	num, %% 数量
	price_now %% 现价
}).