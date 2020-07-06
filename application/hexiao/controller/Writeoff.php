<?php
namespace app\hexiao\controller;

use think\Db;

use app\hexiao\controller\Baseini;

class Writeoff extends Baseini
{
    public function index()
    {
        // dump($_SESSION);
        $data = Db::table('hx_admin')->where('wljq_id',$_SESSION['hexiao']['id'])->select();

        $this->assign('data',$data);
        return $this->fetch();
    }

    public function add(){
    	return $this->fetch();
    }

    public function zuoadd(){
    	$canshu = $this->request->param();
    	// dump($canshu);
        $canshu['wljq_id'] = $_SESSION['hexiao']['id'];

    	$data = Db::table('hx_admin')->insert($canshu);

    	if($data){
    		$this->success('添加核销人员成功','/public/index.php/hexiao/Writeoff/index');
    	}else{
    		$this->error('添加核销人员失败');
    	}
    }

    public function edit(){
        $canshu = $this->request->param();

        $data = Db::table('hx_admin')->where('id',$canshu['id'])->find();

        $this->assign('data',$data);
        // $this->assign('id',$canshu['id']);
        return $this->fetch();
    }

    public function zuoedit(){
        $canshu = $this->request->param();

        $data = Db::table('hx_admin')->where('id',$canshu['id'])->update($canshu);

        if($data){
            $this->success('修改核销人员成功','/public/index.php/hexiao/Writeoff/index');
        }else{
            $this->success('修改核销人员成功','/public/index.php/hexiao/Writeoff/index');
        }
    }

    public function del(){
        $canshu = $this->request->param();

        $res = Db::table('hx_admin')->where('id',$canshu['id'])->delete();

        if($res){
            $this->success('删除核销人员成功');
        }else{
            $this->success('删除核销人员成功');
        }
    }

    public function lvxing(){
        return $this->fetch();
    }
}
