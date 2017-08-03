-- 自动生成，请勿修改 
-- 时间：2016/10/12
-- 21102585@qq.com

local chargeConfig = class("chargeConfig")
function chargeConfig:ctor()
	self.fields = {"key", "jade", "first_giving", "common_giving", "giving_desc", "common_desc", "rmb", "icon", "markIcon", "number"}
	self.datas = {
		[1] = {1, 9000, 0, 0, "立刻获得9000元宝", "立刻获得9000元宝", 30, "charge_monthCard", "chargeLimit", 1},
		[2] = {2, 1800, 3600, 1800, "首次充值返利3600元宝", "续充返利1800元宝", 6, "coin2", "chargeDouble", 2},
		[3] = {3, 7500, 15000, 7500, "首次充值返利15000元宝", "续充返利7500元宝", 25, "coin3", "chargeDouble", 3},
		[4] = {4, 20400, 40800, 20400, "首次充值返利40800元宝", "续充返利20400元宝", 68, "coin4", "chargeDouble", 4},
		[5] = {5, 29400, 58800, 29400, "首次充值返利58800元宝", "续充返利29400元宝", 98, "coin5", "chargeDouble", 5},
		[6] = {6, 98400, 196800, 98400, "首次充值返利196800元宝", "续充返利98400元宝", 328, "coin6", "chargeDouble", 7},
		[7] = {7, 194400, 388800, 194400, "首次充值返利388800元宝", "续充返利194400元宝", 648, "coin6", "chargeDouble", 8},
		[8] = {8, 599400, 1198800, 599400, "首次充值返利1198800元宝", "续充返利599400元宝", 1998, "coin6", "chargeDouble", 9},
		[9] = {9, 59400, 118800, 59400, "首次充值返利118800元宝", "续充返利59400元宝", 198, "coin5", "chargeDouble", 6},

	}
end
return chargeConfig
