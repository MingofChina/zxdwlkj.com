<?php

namespace app\admin\controller;



use think\Controller;

use think\Request;



class Baseini extends Controller

{

    public function _initialize()

    {

    	// var_dump($_SESSION['adminuser']);
        error_reporting(0);
        if(!isset($_SESSION['adminuser']) || $_SESSION['adminuser'] == ''){

        	$this->redirect('/admin/login/index');

        }

        $request = Request::instance();

        // && !IS_AJAX
        // dump($request->controller());
        // if($request->isGet()){
        //     // dump($_SESSION['node_list']);
        //     //权限控制
        //     $node_list = $_SESSION['node_list'];
        //     // dump($node_list);
        //     // exit;
        //     $controller = strtolower($request->controller());

        //     $action = strtolower($request->action());
        //     // dump($controller);
        //     // dump($action);
        //     // dump($node_list);
        //     // exit;

        //     if(!$node_list[$controller] || !in_array($action,$node_list[$controller])){
        //         $this->error('你的权限不足，无法访问');
        //     }
        // }



        // dump($_SESSION['adminuser']['series']);

        // dump($this->request);

        // $request = Request::instance();

        // echo 'url: ' . $request->url();



        // if($_SESSION['adminuser']['series'] != 0){

        // 	$this->redirect('http://360zxd.com/admin/order/add');

        // }



        // if($_SESSION['adminuser']['series'] != 0 && $request->url() == '/admin/order/index.html'){

        // 	$this->redirect('/admin/order/add');

        // }





    }

    public function _error($url,$mes){
        $_SESSION['error'] = $mes;
        $this->redirect($url);
    }

}

?>