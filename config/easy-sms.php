<?php

return [
    // HTTP 请求的超时时间（秒）
    'timeout' => 5.0,

    // 默认发送配置
    'default' => [
        // 网关调用策略，默认：顺序调用
        'strategy' => \Overtrue\EasySms\Strategies\OrderStrategy::class,

        // 默认可用的发送网关
        'gateways' => [
            'yuntongxun','yunpian','aliyun', 'alidayu',
        ],
    ],
    // 可用的网关配置
    'gateways' => [
        'errorlog' => [
            'file' => '/tmp/easy-sms.log',
        ],
        'yuntongxun' => [
            'app_id' => '8a216da85e0e48b2015e1720b94f030b',
            'account_sid' => '8a48b551495b42ea01495ef2f33501ce',
            'account_token' => '4550a18c0ef048c68ceab9e174f86910',
            'is_sub_account' => false,
        ],
        'yunpian' => [
            'api_key' => '9f09728fecb921d7d3fa3ec49fb90f0d',
        ],
        'aliyun' => [
            'access_key_id' => '',
            'access_key_secret' => '',
            'sign_name' => '',
        ],
        'alidayu' => [
            //...
        ],
    ],
];