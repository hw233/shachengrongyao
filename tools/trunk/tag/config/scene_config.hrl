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

-record(scene_conf, {
	map_data, %% 地图信息文件名
	scene_id, %% 场景id
	name, %% 地图名称
	map_id, %% 地图id
	type, %% 场景类型
	belong_scene_id, %% 所属场景
	activity_id, %% 活动id
	lv_limit, %% 最低等级
	lv_max, %% 最大等级
	power_limit, %% 战力需求
	rule_monster_list , %% 规则加载怪物列表
	monster_list, %% 怪物列表
	birth_area, %% 出生区域
	revive_area, %% 复活区域
	inplace_revive, %% 是否可以原地复活
	boss_refresh_limit, %% boss刷新时间限制
	pk_mode_list, %% 允许切换模式
	add_pk_value, %% 每杀一个人增加的PK值
	die_drop, %% 死亡是否掉落
	safety_area, %% 安全区
	exit_scene, %% 出口场景
	is_quick_transfer, %% 是否可以快速传送
	copy_num, %% 需要复制场景个数
	limit_num, %% 场景人数限制
	cost, %% 消耗
	is_leader_transfer, %% 是否允许传送到队长身边
	is_cross, %% 是否跨服场景
	viplv_limit, %% vip最低等级
	is_flying_shoes, %% 是否可以使用小飞鞋传送
	is_equip_send %% 是否可以使用传送戒指传送
}).