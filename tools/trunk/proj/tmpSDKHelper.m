//
//  XYSDKHelper.m
//  chuangqi
//
//  Created by shine on 16/3/8.
//
//



#if <?php echo strtoupper($proj_name)."\r\n" ?>
#import "ApiConfig.h"
#import "<?php echo strtoupper($proj_name) ?>SDKHelper.h"
#import "ChannelApiHelper.h"

#define AppID @""
#define AppKey @""

@implementation <?php echo strtoupper($proj_name) ?>SDKHelper

+(<?php echo strtoupper($proj_name) ?>SDKHelper*)sharedInstance{
    static <?php echo strtoupper($proj_name) ?>SDKHelper *delegatehelper;
    static dispatch_once_t once_t;
    dispatch_once(&once_t, ^{
        delegatehelper = [[<?php echo strtoupper($proj_name) ?>SDKHelper alloc] initWithSetting];
    });
    return delegatehelper;
}

- (instancetype)initWithSetting{
    self = [self init];
    if(self){
        //init code.
    }
    return self;
}

-(void)initAPI{
    // SDK初始化,完成事件调用[ChannelApiHelper initCompleted];
}


//登陆函数
//-(void)login{
    //登陆成功后调用[ChannelApiHelper checkLogin:sid andPwd:pwd];
    //登陆失败后调用[ChannelApiHelper onLoginCallback:@"{\"code\":1985}"];
//}

//登出函数
//-(void)logout{
    //登出完成后调用[ChannelApiHelper onLogoutCallback];
//}


@end

#endif
