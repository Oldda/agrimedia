<?php

namespace App\Http\Controllers\Comm;

use App\Traits\BaseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Overtrue\EasySms\EasySms;
use Toplan\Sms\Facades\SmsManager;

class BaseFuncController extends Controller
{
    //引用基trait
    use BaseTrait;
    public function sendSms(Request $request)
    {
        $config = config('easy-sms');
        $easySms = new EasySms($config);
        $easySms->send(17710818223, [
            'content'  => '您的验证码为: 6379',
            'template' => '206235',
            'data' => [
                'code' => 6379
            ],
        ],['yunpian','yuntongxun']);
    }
}
