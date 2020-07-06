<?php
namespace app\admin\controller;

use think\Db;

use app\admin\controller\Baseini;

class Fengcai extends Baseini
{
    public function index(){
        $data = Db::table('fengcai')->field('fengcai.*,places.name')->join('places','fengcai.place_cate=places.id')->paginate(10);

        $this->assign('data',$data);
        return $this->fetch();
    }

    public function fengcaitu(){
        $canshu = $this->request->param();

        $data = Db::table('places')->where('id',$canshu['id'])->find()['pics'];

        echo $data;
    }

    public function addfengcai(){
        $shijian = date('Y-m-d H:i:s',time());
        $places = Db::table('places')->select();

        $this->assign('places',$places);

        $this->assign('shijian',$shijian);
        return $this->fetch();
    }

    public function zuoaddfengcai(){
        $canshu = $this->request->param();

        // $file = request()->file('pics');

        // $_SESSION['aaa'] = $canshu;
        // $_SESSION['eee'] = $file;
        // $_SESSION['fff'] = $_FILES;

        // $this->success('添加','/admin/fengcai/eee');
        // // dump($file);

        // // $tu = '';

        // if($file){
        //     $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        //     if($info){
        //         // 成功上传后 获取上传信息
        //         // 输出 jpg
        //         // echo $info->getExtension();
        //         // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg

        //         $getSaveName = str_replace("\\", "/", $info->getSaveName());
                
                
        //         $canshu['pics'] = '/public/uploads/'.$getSaveName;
        //         // 输出 42a79759f284b767dfcb2a0197904287.jpg
        //         // echo $info->getFilename(); 
        //     }else{
        //         $canshu['pics'] = '失败';
        //         // 上传失败获取错误信息
        //         // $this->error('图片上传失败');
        //     }
        // }else{
        //     $canshu['pics'] = '失败1';
        // }

        $data = Db::table('fengcai')->insert($canshu);  

        if($data){
            $this->success('添加风采图片成功','/admin/fengcai/addfengcai');
        }else{
            $this->error('添加风采图片失败');
        }
    }

    public function del(){
        $canshu = $this->request->param();

        $res = Db::table('fengcai')->where('id',$canshu['id'])->delete();

        if($res){
            $this->success('删除风采图片成功');
        }else{
            $this->error('删除风采图片失败');
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


   

    

    public function eee(){
        dump($_SESSION['aaa']);
        dump($_SESSION['eee']);
        dump($_SESSION['fff']);
    }
}

