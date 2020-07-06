<?php

// header('Content-type: text/json; charset=UTF-8');

namespace app\index\controller;

use think\Db;
use think\Controller;
use think\Request;
// use think\cache\driver\Redis;

class Logininterface extends Controller
{
    public function _initialize(){
        header('Content-Type:application/json; charset=utf-8');
    }

    private function sends($code,$msg,$data){
        $params['code'] = $code; 
        $params['msg'] = $msg; 
        $params['data'] = $data; 

        return json($params);
    }

    public function shouquan($data){
        $params = [
            'appid' => "wx57204f6199739352",
            'secret' => "9db2aa9efa32bb22f716efd79ccbcdc3",
            'js_code' => $data['code'],
            'grant_type' => 'authorization_code'
        ];



        // $url = 'https://api.weixin.qq.com/sns/oauth2/access_token';
        $url = 'https://api.weixin.qq.com/sns/jscode2session';

        $content = $this->curl_file_get_contents($url,$params);

        $information = json_decode($content,true);

        chmod('./lianxi.txt',0777);

        file_put_contents("./lianxi.txt", $information);

        if($information['errcode'] != 0){
            return $this->sends(0,'授权失败',$content);exit;
        }else{
            return $information;
        }
    }

    public function authorizes(){
    	$data = $this->request->param();

        if(!isset($data['code'])){
            return $this->sends(0,'授权失败，参数错误',[]);exit;
        }

        // $information = $this->shouquan($data);

        $params = [
            'appid' => "wx57204f6199739352",
            'secret' => "9db2aa9efa32bb22f716efd79ccbcdc3",
            'js_code' => $data['code'],
            'grant_type' => 'authorization_code'
        ];



        // $url = 'https://api.weixin.qq.com/sns/oauth2/access_token';
        $url = 'https://api.weixin.qq.com/sns/jscode2session';

        $content = $this->curl_file_get_contents($url,$params);

        

        chmod('./lianxi.txt',0777);

        file_put_contents("./lianxi.txt", $content);

        $information = json_decode($content,true);

        if(isset($information['errcode'])){
            return $this->sends(0,'授权失败',$information);exit;
        }else{
            // return $information;
            $res = Db::table('user')->field('account,user_id,nicknames,headimgs,phones')->where('openid',$information['openid'])->find();

            if($res){
                return $this->sends(1,'微信用户已存在',$res);exit;
            }

            // unset($information['session_key']);

            $data2['user_id'] = md5(time().rand(1,1000));
            $data2['openid'] = $information['openid'];
            $data2['session_key'] = $information['session_key'];

            $res2 = Db::table('user')->insert($data2);

            $res3 = Db::table('user')->field('account,user_id,nicknames,headimgs,phones')->where('user_id',$data2['user_id'])->find();



            return $this->sends(1,'小程序授权成功',$res3);exit;
        }
    }



    public function bind_wx(){
        $data = $this->request->param();

        // $information = $this->shouquan($data);

        if(!isset($data['code']) || !isset($data['user_id'])){
            return $this->sends(0,'绑定失败，参数错误',[]);exit;
        }

        $params = [
            'appid' => "wx57204f6199739352",
            'secret' => "9db2aa9efa32bb22f716efd79ccbcdc3",
            'js_code' => $data['code'],
            'grant_type' => 'authorization_code'
        ];



        // $url = 'https://api.weixin.qq.com/sns/oauth2/access_token';
        $url = 'https://api.weixin.qq.com/sns/jscode2session';

        $content = $this->curl_file_get_contents($url,$params);

        

        chmod('./lianxi.txt',0777);

        file_put_contents("./lianxi.txt", $content);

        $information = json_decode($content,true);

        if(isset($information['errcode'])){
            return $this->sends(0,'绑定失败',$information);exit;
        }else{
            $res = Db::table('user')->where('openid',$information['openid'])->find();

            if($res){
                return $this->sends(0,'微信用户已存在，不能绑定',0);exit;
            }

            $res2 = Db::table('user')->where('user_id',$data['user_id'])->update($information);



            if($res2){
                $res3 = Db::table('user')->field('account,user_id,nicknames,headimgs,phones')->where('user_id',$data['user_id'])->find();

                return $this->sends(1,'微信用户绑定成功',$res3);exit;
            }else{
                return $this->sends(0,'微信用户绑定失败，内部错误',0);exit;
            }
        }
    }

    public function finish(){
        $data = $this->request->param();

        if(!isset($data['user_id']) || !isset($data['phones']) || !isset($data['nicknames']) || !isset($data['headimgs'])){
            return $this->sends(0,'参数错误',0);exit;
        }

        $id = Db::table('user')->where('user_id',$data['user_id'])->find();

        if(!$id){
            return $this->sends(0,'当前用户不存在',0);exit;
        }

        $data['is_finish'] = 1;

        $res = Db::table('user')->where('user_id',$data['user_id'])->update($data);

        

        if($res){
            $res2 = Db::table('user')->field('account,user_id,nicknames,headimgs,phones')->where('user_id',$data['user_id'])->find();

            return $this->sends(1,'信息注册成功',$res2);exit;
        }else{
            return $this->sends(0,'信息注册失败，内部错误',0);exit;
        }
    }

     /*
     *  php访问url路径，get请求
     */
    public function curl_file_get_contents($durl,$request_paras){
        // header传送格式
        // $headers = array(
        //     "token:1111111111111",
        //     "over_time:22222222222",
        // );

        $url_str = '';
         $para_array = array();
         foreach($request_paras as $k => $v) {
             array_push($para_array, $k .'='. $v);
         }
         if(!empty($para_array)) {
             $url_str .= '?' . join('&', $para_array);
            }
            // 初始化
            $curl = curl_init();
            // 设置url路径
            curl_setopt($curl, CURLOPT_URL, $durl . $url_str);
            // 将 curl_exec()获取的信息以文件流的形式返回，而不是直接输出。
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true) ;
            // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回
            curl_setopt($curl, CURLOPT_BINARYTRANSFER, true) ;
            // 添加头信息
            // curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            // CURLINFO_HEADER_OUT选项可以拿到请求头信息
            curl_setopt($curl, CURLINFO_HEADER_OUT, true);
            // 不验证SSL
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
            // 执行
            $data = curl_exec($curl);
            // 打印请求头信息
    //        echo curl_getinfo($curl, CURLINFO_HEADER_OUT);
            // 关闭连接
            curl_close($curl);
            // 返回数据
            return $data;
    }

    public function register(){
        $data = $this->request->param();

        if(isset($data['account']) && isset($data['password'])){

            $chong = Db::table('user')->where('account',$data['account'])->find();

            if($chong){
                return $this->sends(2,'注册失败，账号已存在','');exit;
            }

            $rand_userid = md5(time().rand(1,1000));

            $data['password'] = md5($data['password']);

            $data['user_id'] = $rand_userid;

            $res = Db::table('user')->insert($data);

            $res2 = Db::table('user')->field('account,user_id,nicknames,headimgs,phones')->where('user_id',$rand_userid)->find();

            return $this->sends(1,'注册成功',$res2);exit;
        }else{
            return $this->sends(0,'注册失败，参数错误','');exit;
        }
    }


    public function login(){
        $data = $this->request->param();

        if(isset($data['account']) && isset($data['password'])){
            $res = Db::table('user')->field('account,user_id,nicknames,headimgs,phones')->where('account',$data['account'])->where('password',md5($data['password']))->find();

            if($res){
                return $this->sends(1,'登录成功',$res);exit;
            }else{
                return $this->sends(0,'登录失败，账号或密码错误','');exit;
            }

            
        }else{
            return $this->sends(0,'登录失败，参数错误','');exit;
        }
        
    }

    public function update_nickname(){
        $data = $this->request->param();

        if(!isset($data['user_id']) || !isset($data['nicknames'])){
            return $this->sends(0,'修改昵称失败，参数错误','');exit;
        }

        $res = Db::table('user')->where('user_id',$data['user_id'])->find();

        if($res){
            $res2 = Db::table('user')->where('user_id',$data['user_id'])->update(['nicknames'=>$data['nicknames']]);

            if($res2){
                $res3 = Db::table('user')->field('account,user_id,nicknames,headimgs,phones')->where('user_id',$data['user_id'])->find();
                return $this->sends(1,'修改昵称成功',$res3);exit;
            }else{
                return $this->sends(0,'修改昵称失败','');exit;
            }
        }else{
            return $this->sends(0,'修改昵称失败，用户不存在','');exit;
        }
    }

    public function update_headimg(){
        $data = $this->request->param();

        if(!isset($data['user_id']) || !isset($data['headimgs'])){
            return $this->sends(0,'修改头像失败，参数错误','');exit;
        }

        $res = Db::table('user')->where('user_id',$data['user_id'])->find();

        if($res){
            $res2 = Db::table('user')->where('user_id',$data['user_id'])->update(['headimgs'=>$data['headimgs']]);

            if($res2){
                $res3 = Db::table('user')->field('account,user_id,nicknames,headimgs,phones')->where('user_id',$data['user_id'])->find();
                return $this->sends(1,'修改头像成功',$res3);exit;
            }else{
                return $this->sends(0,'修改头像失败','');exit;
            }
        }else{
            return $this->sends(0,'修改头像失败，用户不存在','');exit;
        }
    }

    public function obtain_order(){
        $data = $this->request->param();

        if(!isset($data['user_id']) || count($data) != 1){
            return $this->sends(0,'获取用户预约活动失败，参数错误',[]);exit;
        }

        $res = Db::table('order_detail')->where('user_id',$data['user_id'])->select();

        return $this->sends(1,'获取用户预约活动成功',$res);exit;
    }

}