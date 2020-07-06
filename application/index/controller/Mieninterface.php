<?php
namespace app\index\controller;

use think\Db;
use think\Request;

class Mieninterface
{
    public function mien_pic(){
        $request = Request::instance();

        $canshu = $request->param();

        if(!isset($canshu['id'])){
            return $this->sends(0,'参数错误',0);
        }

        $data = Db::table('fengcai')->where('place_cate',$canshu['id'])->select();

        return $this->sends(1,'风采图片请求成功',$data);
    }

    public function mien_pic_upload(){
        $request = Request::instance();

        $canshu = $request->param();


        // || !isset($canshu['pics'])

        var_dump($canshu);
        if(!isset($canshu['user_id'])  || !isset($canshu['place_cate']) || count($canshu) != 2){
            return $this->sends(0,'参数错误',0);
        }

        $file = request()->file('file');
        // dump($_FILES['upload']);
        // dump(request());

        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
                // echo $info->getExtension();
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg

                $getSaveName = str_replace("\\", "/", $info->getSaveName());
                
                
                $canshu['pics'] = '/public/uploads/'.$getSaveName;
                // 输出 42a79759f284b767dfcb2a0197904287.jpg
                // echo $info->getFilename(); 
            }else{
                // 上传失败获取错误信息
                // echo $file->getError();
                return $this->sends(0,'上传图片失败',[]);
            }
        }else{
            return $this->sends(0,'图片不存在',[]);
        }


        $data = Db::table('fengcai')->insert($canshu);

        $data2 = Db::table('fengcai')->where('place_cate',$canshu['place_cate'])->select();

        return $this->sends(1,'风采图片添加成功',$data2);

        
    }

    private function sends($code,$msg,$data){
        $params['code'] = $code; 
        $params['msg'] = $msg; 
        $params['data'] = $data; 

        return json($params);
    }

    public function mien_upl(){
        $file = request()->file('file');
        dump($_FILES['file']);
        dump(request());

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
        }else{
            echo 'shbi';
        }
    }

    
}

