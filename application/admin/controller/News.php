<?php
namespace app\admin\controller;

use think\Db;

use app\admin\controller\Baseini;

class News extends Baseini
{
    public function index(){
        $data = Db::table('news')->paginate(10);

        $this->assign('data',$data);
        return $this->fetch();
    }

    public function addnews(){
        return $this->fetch();
    }

    public function zuoaddnews(){
        $canshu = $this->request->param();

        // $_SESSION['eee'] = $canshu;

        // $this->success('成功','admin/news/eee');

        $res = Db::table('news')->where('news_title',$canshu['news_title'])->find();

        if($res){
            $this->error('该资讯已存在');
        }

        $canshu['addtime'] = date('Y-m-d H:i:s',time());

        $data = Db::table('news')->insert($canshu);

        if($data){
            $this->success('新增资讯成功','/admin/news/index');
        }else{
            $this->error('新增资讯失败');
        }
    }

    

    public function updatenews(){
        $canshu = $this->request->param();

        $data = Db::table('news')->where('id',$canshu['id'])->find();

        $this->assign('data',$data);
        return $this->fetch();
    }

    public function zuoupdatenews(){
        $canshu = $this->request->param();

        $data = Db::table('news')->where('id',$canshu['id'])->update($canshu);

        if($data){
            $this->success('修改资讯成功','admin/news/index');
        }else{
            $this->error('修改资讯失败');
        }
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

    

   

    

    public function eee(){
        dump($_SESSION['eee']);
    }
}

