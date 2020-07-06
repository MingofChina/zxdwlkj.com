<?php
namespace app\admin\controller;

use think\Db;

use app\admin\controller\Baseini;

class Active extends Baseini
{
    public function index(){
        $data = Db::table('active')->paginate(10);

        $this->assign('data',$data);
        return $this->fetch();
    }

    public function addactive(){
        $shijian = date('Y-m-d H:i:s',time());
        $places = Db::table('places')->select();

        $this->assign('places',$places);

        $this->assign('shijian',$shijian);
        return $this->fetch();
    }

    public function zuoaddactive(){
        $canshu = $this->request->param();

        // $_SESSION['eee'] = $canshu;

        // $this->success('成功','admin/news/eee');

        $res = Db::table('active')->where('title',$canshu['title'])->find();

        if($res){
            $this->error('该活动已存在');
        }

        $canshu['addtime'] = date('Y-m-d H:i:s',time());

        $data = Db::table('active')->insert($canshu);

        if($data){
            $this->success('新增活动成功','/admin/active/index');
        }else{
            $this->error('新增活动失败');
        }
    }

    

    public function updateactive(){
        $canshu = $this->request->param();

        $data = Db::table('active')->where('id',$canshu['id'])->find();

        $places = Db::table('places')->select();

        $this->assign('places',$places);

        $this->assign('data',$data);
        return $this->fetch();
    }

    public function zuoupdateactive(){
        $canshu = $this->request->param();

        $data = Db::table('active')->where('id',$canshu['id'])->update($canshu);

        if($data){
            $this->success('修改活动成功','admin/active/index');
        }else{
            $this->error('修改活动失败');
        }
    }

    public function delactive(){
        $canshu = $this->request->param();

        $data = Db::table('active')->where('id',$canshu['id'])->delete();

        if($data){
            $this->success('删除活动成功');
        }else{
            $this->error('删除活动失败');
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

    public function erpicUpload(){
        $file = request()->file('detail_img');

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

        $data = Db::table('active')->where('title','like','%'.$canshu['keyword'].'%')->paginate(10);

        $this->assign('data',$data);
        return $this->fetch('index');
    }

    public function status(){
        $canshu = $this->request->param();

        if($canshu['status'] == 0){
            $status = 1;
        }else{
            $status = 0;
        }

        $data = Db::table('active')->where('id',$canshu['id'])->update(['status'=>$status]);

        if($data){
            $this->success('改变活动状态成功');
        }else{
            $this->error('改变活动状态失败');
        }
    }

   

    

    public function eee(){
        dump($_SESSION['eee']);
    }
}

