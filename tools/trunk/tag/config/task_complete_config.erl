%%%-------------------------------------------------------------------
%%% @author zhengsiying
%%% @doc
%%%		自动生成文件，不要手动修改
%%% @end
%%% Created : 2016/10/12
%%%-------------------------------------------------------------------

-module(task_complete_config).

-include("common.hrl").
-include("config.hrl").

-compile([export_all]).

get_list() ->
	[  
 	#task_complete_conf{
		id = 1,
		type = 3,
		num = 1,
		need_jade = 400
	},  
 	#task_complete_conf{
		id = 2,
		type = 3,
		num = 2,
		need_jade = 800
	},  
 	#task_complete_conf{
		id = 3,
		type = 3,
		num = 3,
		need_jade = 1200
	},  
 	#task_complete_conf{
		id = 4,
		type = 3,
		num = 4,
		need_jade = 1600
	},  
 	#task_complete_conf{
		id = 5,
		type = 3,
		num = 5,
		need_jade = 2000
	},  
 	#task_complete_conf{
		id = 6,
		type = 3,
		num = 6,
		need_jade = 2400
	},  
 	#task_complete_conf{
		id = 7,
		type = 3,
		num = 7,
		need_jade = 2800
	},  
 	#task_complete_conf{
		id = 8,
		type = 3,
		num = 8,
		need_jade = 3200
	},  
 	#task_complete_conf{
		id = 9,
		type = 3,
		num = 9,
		need_jade = 3600
	},  
 	#task_complete_conf{
		id = 10,
		type = 3,
		num = 10,
		need_jade = 4000
	},  
 	#task_complete_conf{
		id = 11,
		type = 4,
		num = 1,
		need_jade = 200
	},  
 	#task_complete_conf{
		id = 12,
		type = 4,
		num = 2,
		need_jade = 200
	},  
 	#task_complete_conf{
		id = 13,
		type = 4,
		num = 3,
		need_jade = 400
	},  
 	#task_complete_conf{
		id = 14,
		type = 4,
		num = 4,
		need_jade = 600
	},  
 	#task_complete_conf{
		id = 15,
		type = 4,
		num = 5,
		need_jade = 600
	},  
 	#task_complete_conf{
		id = 16,
		type = 4,
		num = 6,
		need_jade = 800
	},  
 	#task_complete_conf{
		id = 17,
		type = 4,
		num = 7,
		need_jade = 1600
	},  
 	#task_complete_conf{
		id = 18,
		type = 4,
		num = 8,
		need_jade = 2000
	},  
 	#task_complete_conf{
		id = 19,
		type = 4,
		num = 9,
		need_jade = 3000
	},  
 	#task_complete_conf{
		id = 20,
		type = 4,
		num = 10,
		need_jade = 4000
	},  
 	#task_complete_conf{
		id = 21,
		type = 8,
		num = 1,
		need_jade = 600
	},  
 	#task_complete_conf{
		id = 22,
		type = 8,
		num = 2,
		need_jade = 600
	},  
 	#task_complete_conf{
		id = 23,
		type = 8,
		num = 3,
		need_jade = 600
	},  
 	#task_complete_conf{
		id = 24,
		type = 8,
		num = 4,
		need_jade = 600
	},  
 	#task_complete_conf{
		id = 25,
		type = 8,
		num = 5,
		need_jade = 600
	},  
 	#task_complete_conf{
		id = 26,
		type = 8,
		num = 6,
		need_jade = 600
	},  
 	#task_complete_conf{
		id = 27,
		type = 8,
		num = 7,
		need_jade = 600
	},  
 	#task_complete_conf{
		id = 28,
		type = 8,
		num = 8,
		need_jade = 600
	},  
 	#task_complete_conf{
		id = 29,
		type = 8,
		num = 9,
		need_jade = 600
	},  
 	#task_complete_conf{
		id = 30,
		type = 8,
		num = 10,
		need_jade = 600
	}].

get(3,1) ->
	#task_complete_conf{
		id = 1,
		type = 3,
		num = 1,
		need_jade = 400
	};

get(3,2) ->
	#task_complete_conf{
		id = 2,
		type = 3,
		num = 2,
		need_jade = 800
	};

get(3,3) ->
	#task_complete_conf{
		id = 3,
		type = 3,
		num = 3,
		need_jade = 1200
	};

get(3,4) ->
	#task_complete_conf{
		id = 4,
		type = 3,
		num = 4,
		need_jade = 1600
	};

get(3,5) ->
	#task_complete_conf{
		id = 5,
		type = 3,
		num = 5,
		need_jade = 2000
	};

get(3,6) ->
	#task_complete_conf{
		id = 6,
		type = 3,
		num = 6,
		need_jade = 2400
	};

get(3,7) ->
	#task_complete_conf{
		id = 7,
		type = 3,
		num = 7,
		need_jade = 2800
	};

get(3,8) ->
	#task_complete_conf{
		id = 8,
		type = 3,
		num = 8,
		need_jade = 3200
	};

get(3,9) ->
	#task_complete_conf{
		id = 9,
		type = 3,
		num = 9,
		need_jade = 3600
	};

get(3,10) ->
	#task_complete_conf{
		id = 10,
		type = 3,
		num = 10,
		need_jade = 4000
	};

get(4,1) ->
	#task_complete_conf{
		id = 11,
		type = 4,
		num = 1,
		need_jade = 200
	};

get(4,2) ->
	#task_complete_conf{
		id = 12,
		type = 4,
		num = 2,
		need_jade = 200
	};

get(4,3) ->
	#task_complete_conf{
		id = 13,
		type = 4,
		num = 3,
		need_jade = 400
	};

get(4,4) ->
	#task_complete_conf{
		id = 14,
		type = 4,
		num = 4,
		need_jade = 600
	};

get(4,5) ->
	#task_complete_conf{
		id = 15,
		type = 4,
		num = 5,
		need_jade = 600
	};

get(4,6) ->
	#task_complete_conf{
		id = 16,
		type = 4,
		num = 6,
		need_jade = 800
	};

get(4,7) ->
	#task_complete_conf{
		id = 17,
		type = 4,
		num = 7,
		need_jade = 1600
	};

get(4,8) ->
	#task_complete_conf{
		id = 18,
		type = 4,
		num = 8,
		need_jade = 2000
	};

get(4,9) ->
	#task_complete_conf{
		id = 19,
		type = 4,
		num = 9,
		need_jade = 3000
	};

get(4,10) ->
	#task_complete_conf{
		id = 20,
		type = 4,
		num = 10,
		need_jade = 4000
	};

get(8,1) ->
	#task_complete_conf{
		id = 21,
		type = 8,
		num = 1,
		need_jade = 600
	};

get(8,2) ->
	#task_complete_conf{
		id = 22,
		type = 8,
		num = 2,
		need_jade = 600
	};

get(8,3) ->
	#task_complete_conf{
		id = 23,
		type = 8,
		num = 3,
		need_jade = 600
	};

get(8,4) ->
	#task_complete_conf{
		id = 24,
		type = 8,
		num = 4,
		need_jade = 600
	};

get(8,5) ->
	#task_complete_conf{
		id = 25,
		type = 8,
		num = 5,
		need_jade = 600
	};

get(8,6) ->
	#task_complete_conf{
		id = 26,
		type = 8,
		num = 6,
		need_jade = 600
	};

get(8,7) ->
	#task_complete_conf{
		id = 27,
		type = 8,
		num = 7,
		need_jade = 600
	};

get(8,8) ->
	#task_complete_conf{
		id = 28,
		type = 8,
		num = 8,
		need_jade = 600
	};

get(8,9) ->
	#task_complete_conf{
		id = 29,
		type = 8,
		num = 9,
		need_jade = 600
	};

get(8,10) ->
	#task_complete_conf{
		id = 30,
		type = 8,
		num = 10,
		need_jade = 600
	};

get(_Key,_Key1) ->
	?ERR("undefined key from task_complete_config ~p ~p", [_Key,_Key1]).