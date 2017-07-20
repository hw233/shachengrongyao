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

-record(task_conf, {
	id, %% 任务id
	sort_id, %% 任务类型id
	type_id, %% 大任务类型
	min_lv, %% 需要最小等级
	limit_lv, %% 需要等级
	front_task_id, %% 前置任务id
	accept_npc_id, %% 接取任务npcid
	accept_dec, %% 接受描述
	accept_info, %% 接受对话信息
	openinstance, %% 打开副本
	tool, %% 公用字段
	need_num, %% 需要数量
	finish_npc_id, %% 完成任务npcid
	finish_info, %% 完成对话信息
	finish_dec, %% 完成描述
	goods_zhanshi, %% 战士奖励
	goods_daoshi, %% 道士奖励
	goods_fashi, %% 法师奖励
	goods_extra, %% 额外奖励
	goods_extra_probability, %% 额外奖励获得几率（0必得）
	active, %% 活跃值
	monsterid_arr %% 击杀怪物收集道具任务使用，怪物id
}).