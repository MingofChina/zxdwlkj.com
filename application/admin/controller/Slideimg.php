<?php
namespace app\admin\controller;

use think\Db;

use app\admin\controller\Baseini;

class slideimg extends Baseini
{
    public function index()
    {
    	$data = Db::table('slideimg')->select();

        $this->assign('data',$data);
        return $this->fetch();
    }

    public function add(){
        // $param = $this->request->param();

        return $this->fetch();
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

    public function zuoadd(){
    	$canshu = $this->request->param();

    	$data = Db::table('slideimg')->insert($canshu);

    	if($data){
            $this->success('新增幻灯片成功','/admin/slideimg/index');
        }else{
            $this->error('新增幻灯片失败');
        }
    }

    public function del(){
    	$canshu = $this->request->param();

    	$data = Db::table('slideimg')->where('id',$canshu['id'])->delete();

    	if($data){
            $this->success('删除幻灯片成功');
        }else{
            $this->error('删除幻灯片失败');
        }
    }
}
