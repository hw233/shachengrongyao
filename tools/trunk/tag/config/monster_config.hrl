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

-record(monster_conf, {
	monster_id, %% 怪物id
	name, %% 怪物名称
	career, %% 职业
	type, %% 怪物类型
	notice, %% 公告类型
	count_down, %% 刷新倒计时
	resId, %% 形象id
	lv, %% 等级
	attr_base, %% 基础属性
	skill_rule, %% 技能列表
	hook_skill_list, %% 挂机技能列表
	drop_list, %% 掉落列表
	guard_range, %% 警觉范围
	attack_type, %% 攻击类型
	patrol_range, %% 巡逻范围
	chase_range, %% 追击范围
	walk_range, %% 回家范围
	speed, %% 速度
	patrol_interval, %% 巡逻间隔
	patrol_rate, %% 巡逻概率
	chase_interval, %% 追击间隔
	exp, %% 经验
	ownership, %% 归属权
	need_exp, %% 升下一级所需经验
	tempt, %% 是否可以被诱惑
	pet_id, %% 诱惑后对应的宠物id
	tempt_lv_limit, %% 诱惑等级限制
	tempt_skill_lv_limit, %% 诱惑技能等级限制
	is_growth, %% 是否成长
	special_drop, %% 特殊掉落
	kill_value, %% 击杀获得的幸运值
	is_drop, %% 是否启用特殊掉落
	is_red, %% 是否掉落红包 
	is_resist_stun, %% 是否免疫晕眩
	is_resist_poison, %% 是否免疫中毒
	is_resist_mb, %% 是否免疫麻痹
	is_resist_invisibility, %% 是否免疫隐身
	is_resist_knockback, %% 是否免疫冲撞
	is_resist_back, %% 是否免疫抗拒火环
	is_resist_silent, %% 是否免疫沉默
	is_resist_thorns, %% 是否免疫反伤
	drop_type, %% 怪物掉落分类
	random_refuse, %% 死亡随机刷新规则
	box_count, %% 宝箱拾取次数
	box_reset_time, %% 宝箱重置拾取时间
	is_resist_vampire %% 吸血抗性
}).