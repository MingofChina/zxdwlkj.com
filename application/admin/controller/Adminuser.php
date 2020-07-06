<?php

namespace app\admin\controller;



use think\Db;

use app\admin\validate\User;



use app\admin\controller\Baseini;



class Adminuser extends Baseini

{

	/**

		查看用户

	*/

    public function index()

    {

    	// var_dump($_SESSION['adminuser']);

    	$data = Db::table('adminuser')->select();



    	$this->assign('data',$data);

        return $this->fetch();

    }



    /**

		添加用户页面

	*/

    public function add(){

    	return $this->fetch();

    }



    /**

		添加用户操作

	*/

    public function zuoadd(){

    	// $this->request->method();

    	// $method = $this->request->method();//获取上传方式



        // $canshu = $this->request->param();//获取所有参数，最全



	    // $get =  $this->request->get();//获取get上传的内容



	    $post =  $this->request->post();//获取post上传的内容



	    // $this->request->file('file');//获取文件

	    // var_dump($method);

	    // var_dump($canshu);

	    // var_dump($post);

	    // var_dump($post['user_name']);



	    $data = ['username'=>$post['user_name'],'password'=>md5('admin'),'addtime'=>date('Y-m-d H:i:s',time())];



	    $validate = new User();

	    $result = $validate->scene('add')->check($data);

	    // var_dump($result);exit;

	    if(!$result){

	    	// $this->redirect('/admin/adminuser/add', array('cate_id' => 2), 5, '页面跳转中...');  

	    	$this->error('新增失败', '/admin/adminuser/add');

	    	// return $this->error($validate->getError());

	    }else{

	    	// var_dump($result);

		    $res = Db::name('adminuser')->insert($data);



		    if($res){

		    	$this->success('新增成功', '/admin/adminuser/index');

		    }else{

		    	$this->error('新增失败', '/admin/adminuser/add');

		    }

	    }

	    

    }



    /**

		删除用户操作

	*/

	public function deluser(){

		$Id = $this->request->param();



		$result = Db::table('adminuser')->delete($Id);



		if($result){

			$this->success('删除用户成功', '/admin/adminuser/index');

		}else{

			$this->error('删除用户失败', '/admin/adminuser/index');

		}

	}

}

