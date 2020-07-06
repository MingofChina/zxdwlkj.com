<?php
namespace app\hexiao\controller;

use think\Controller;
use think\Db;

class Login extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function zuologin(){
    	$canshu =  $this->request->param();

        $data = Db::table('wl_jq')->where(['jqzh'=>$canshu['user_name'],'jqmm'=>$canshu['password']])->find();

        if(!$data){
            $data = Db::table('hx_admin')->where(['hx_zhanghao'=>$canshu['user_name'],'hx_mima'=>$canshu['password']])->find();
            if($data){
                $data['panduan'] = 2;
            }
           
        }else{
            $data['panduan'] = 1;
        }

        if($data){
            $_SESSION['hexiao']=$data;
            $this->redirect('/public/index.php/hexiao/index/index');
        }else{
            $this->redirect('/public/index.php/hexiao/login/index');
        }

        dump($data);
    }

    public function logout(){
    	$_SESSION['hexiao'] = '';

    	$this->redirect('/public/index.php/hexiao/login/index');
    }

    
}
