<?php
namespace app\admin\controller;

use think\Db;

use app\admin\controller\Baseini;

class Orderdetail extends Baseini
{
    public function index(){
        $data = Db::table('order_detail')->join('active','order_detail.active_id=active.id')->field('order_detail.*,active.title,active.place,active.start_time,active.end_time')->paginate(10);

        $placess = Db::table('places')->select();

        $this->assign('placess',$placess);

        $this->assign('data',$data);
        return $this->fetch();
    }

    


    public function delnews(){
        $canshu = $this->request->param();

        $data = Db::table('news')->where('id',$canshu['id'])->delete();

        if($data){
            $this->success('删除资讯成功');
        }else{
            $this->error('删除资讯失败');
        }
    }

    public function status(){
        $canshu = $this->request->param();

        $data = Db::table('order_detail')->where('id',$canshu['id'])->update(['order_status'=>1]);

        if($data){
            $this->success('更改状态成功');
        }else{
            $this->error('更改状态失败');
        }
    }

    public function search(){
        $canshu = $this->request->param();

        if($canshu['name'] == 0){
            $data = Db::table('order_detail')->join('active','order_detail.active_id=active.id')->field('order_detail.*,active.title,active.place,active.start_time,active.end_time')->where('order_detail.contact','like','%'.$canshu['keyword'].'%')->paginate(10);
        }else{
            $data = Db::table('order_detail')->join('active','order_detail.active_id=active.id')->field('order_detail.*,active.title,active.place,active.start_time,active.end_time')->where('order_detail.contact','like','%'.$canshu['keyword'].'%')->where('active.place_cate',$canshu['name'])->paginate(10);
        }

        $placess = Db::table('places')->select();

        $this->assign('placess',$placess);

        

        $this->assign('data',$data);
        return $this->fetch('index');
    }

    
}

