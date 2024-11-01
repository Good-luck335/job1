<?php
namespace app\common\validate;
use think\Validate;

class Users extends Validate
{
    protected $rule =   [
        'username'  => 'require|number|min:11|max:11',
        'password'   => 'require|min:6|max:12',
    ];

    protected $message  =   [
        'username.require' => '手机号必须填写',
		'username.number' => '手机号必须为数字',
		'username.min' => '手机号长度错误 #1',
		'username.max' => '手机号长度错误 #2',
        'password.require'   => '用户密码必须填写',
		'password.min' => '密码长度必须6-12位',
		'password.max' => '密码长度必须6-12位',
    ];

    //protected $scene = [
     //   'add'  =>  ['user_id','order_status','order_code','order_price','order_points'],
      //  'edit'  =>  ['user_id','order_status','order_code','order_price','order_points'],
    //];

}