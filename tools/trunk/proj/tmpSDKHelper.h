//
//  <?php echo strtoupper($proj_name) ?>SDKHelper.h
//  chuangqi
//
//  Created by shine on 16/3/8.
//
//



#if <?php echo strtoupper($proj_name)."\r\n"; ?>

#import <Foundation/Foundation.h>

@interface <?php echo strtoupper($proj_name) ?>SDKHelper : NSObject

+(<?php echo strtoupper($proj_name) ?>SDKHelper*)sharedInstance;

-(void)initAPI;

//登陆函数
//-(void)login;

//登出函数
//-(void)logout;

@end

#endif
