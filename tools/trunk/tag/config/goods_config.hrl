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

-record(goods_conf, {
	id, %% 道具id
	name, %% 道具名称
	type, %% 类型
	sub_type, %% 子类型
	quality, %% 品质
	limit_num, %% 堆叠上限
	limit_career, %% 职业限制
	limit_lvl, %% 等级限制
	sale, %% 出售价格
	extra, %% 额外效果
	is_use, %% 是否能使用
	res, %% 外观
	is_sell, %% 是否能出售
	drop_rate1, %% 普通掉落
	drop_rate2, %% 红名掉落
	sale_sort, %% 交易所分类
	suit_id, %% 套装id
	is_notice, %% 掉落是否公告
	is_timeliness, %% 是否具有时效性
	is_timeliness_delete, %% 过期是否删除(0删除 1不删除）
	sort, %% 背包排序
	secure_price, %% 投保价格
	is_decompose, %% 是否能按品质分解
	is_dorplist, %% 是否在掉落记录显示
	price_jade, %% 道具的元宝价值
	lv, %% 装备顺序等级
	drop_type, %% 跨服是否掉落
	drop_jade, %% 跨服掉落对应元宝价值
	cost, %% 开启消耗
	notice_id %% 获得道具公告ID
}).