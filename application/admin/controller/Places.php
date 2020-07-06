<?php
namespace app\admin\controller;

use think\Db;

use app\admin\controller\Baseini;

class Places extends Baseini
{
    public function index(){
        $data = Db::table('places')->paginate(10);

        $this->assign('data',$data);
        return $this->fetch();
    }

    public function addplaces(){
        $shijian = date('Y-m-d H:i:s',time());

        $this->assign('shijian',$shijian);
        return $this->fetch();
    }

    public function zuoaddplaces(){
        $canshu = $this->request->param();

        // $_SESSION['eee'] = $canshu;

        // $this->success('成功','admin/news/eee');

        $res = Db::table('places')->where('name',$canshu['name'])->find();

        if($res){
            $this->error('该地点已存在');
        }

        $data = Db::table('places')->insert($canshu);

        if($data){
            $this->success('新增地点成功','/admin/places/index');
        }else{
            $this->error('新增地点失败');
        }
    }

    

    public function updateplaces(){
        $canshu = $this->request->param();

        $data = Db::table('places')->where('id',$canshu['id'])->find();

        $this->assign('data',$data);
        return $this->fetch();
    }

    public function zuoupdateplaces(){
        $canshu = $this->request->param();

        $data = Db::table('places')->where('id',$canshu['id'])->update($canshu);

        if($data){
            $this->success('修改地点成功','admin/places/index');
        }else{
            $this->error('修改地点失败');
        }
    }

    public function delplaces(){
        $canshu = $this->request->param();

        $data = Db::table('places')->where('id',$canshu['id'])->delete();

        if($data){
            $this->success('删除地点成功');
        }else{
            $this->error('删除地点失败');
        }
    }

    public function picUpload(){
        $file = request()->file('slt');
        // dump($file);

        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
                // echo $info->getExtension();
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg

                $getSaveName = str_replace("\\", "/", $info->getSaveName());
                
                
                echo '/public/uploads/'.$getSaveName;
                // 输出 42a79759f284b767dfcb2a0197904287.jpg
                // echo $info->getFilename(); 
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }

    public function search(){
        $canshu = $this->request->param();

        $data = Db::table('places')->where('name','like','%'.$canshu['keyword'].'%')->paginate(10);

        $this->assign('data',$data);
        return $this->fetch('index');
    }

   

    

    public function eee(){
        dump($_SESSION['eee']);
    }
}

