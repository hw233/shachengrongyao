%%%-------------------------------------------------------------------
%%% @author zhengsiying
%%% @doc
%%%		自动生成文件，不要手动修改
%%% @end
%%% Created : 2016/10/12
%%%-------------------------------------------------------------------

-module(activity_limit_config).

-include("common.hrl").
-include("config.hrl").

-compile([export_all]).

get_list_conf() ->
	[ activity_limit_config:get(X) || X <- get_list() ].

get_list() ->
	[<<"">>, <<"">>, <<"">>, <<"">>, <<"">>, <<"">>, <<"">>, <<"">>, <<"">>, <<"">>, <<"">>, <<"">>, <<"">>, <<"">>, <<"">>, <<"">>, <<"">>, <<"">>, <<"">>, <<"">>, <<"">>, <<"">>, <<"">>, <<"">>, <<"">>].

get(<<"">>) ->
	#activity_limit_conf{
	};

get(<<"">>) ->
	#activity_limit_conf{
	};

get(<<"">>) ->
	#activity_limit_conf{
	};

get(<<"">>) ->
	#activity_limit_conf{
	};

get(<<"">>) ->
	#activity_limit_conf{
	};

get(<<"">>) ->
	#activity_limit_conf{
	};

get(<<"">>) ->
	#activity_limit_conf{
	};

get(<<"">>) ->
	#activity_limit_conf{
	};

get(<<"">>) ->
	#activity_limit_conf{
	};

get(<<"">>) ->
	#activity_limit_conf{
	};

get(<<"">>) ->
	#activity_limit_conf{
	};

get(<<"">>) ->
	#activity_limit_conf{
	};

get(<<"">>) ->
	#activity_limit_conf{
	};

get(<<"">>) ->
	#activity_limit_conf{
	};

get(<<"">>) ->
	#activity_limit_conf{
	};

get(<<"">>) ->
	#activity_limit_conf{
	};

get(<<"">>) ->
	#activity_limit_conf{
	};

get(<<"">>) ->
	#activity_limit_conf{
	};

get(<<"">>) ->
	#activity_limit_conf{
	};

get(<<"">>) ->
	#activity_limit_conf{
	};

get(<<"">>) ->
	#activity_limit_conf{
	};

get(<<"">>) ->
	#activity_limit_conf{
	};

get(<<"">>) ->
	#activity_limit_conf{
	};

get(<<"">>) ->
	#activity_limit_conf{
	};

get(<<"">>) ->
	#activity_limit_conf{
	};

get(_Key) ->
	?ERR("undefined key from activity_limit_config ~p", [_Key]).