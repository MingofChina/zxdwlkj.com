<?php

namespace app\admin\validate;

 

use think\Validate;

 

class User extends Validate

{

    protected $rule = [

        'username'  =>  'require|max:30|min:2|unique:adminuser',

        'password' =>  'require|max:30|min:2',

        // 'newpassword' =>  'require|max:30|min:2',

        // 'password_confirm' =>  'require|max:30|min:2',

        // 'picture' =>  'require',

        '__token__'=>'require|token', //这里__token__不能去改.

    ];

    

    protected $message = [

        // 'name.require'  =>  '用户名必须',

        // 'email' =>  '邮箱格式错误',

    ];

    

    protected $scene = [

        'add'   =>  ['username'],

        // 'edit'  =>  ['password'],

        'login' =>  ['username'=>'require|max:30|min:2','password','__token__'],

        // 'update'=>  ['password','newpassword','password_confirm'],

        // 'edit'  =>  ['name','age'=>'require|number|between:1,120'],

    ];

}