<?php
namespace app\index\controller;

use think\Db;
use think\Request;

class Activeinterface
{
    public function index(){
        // $canshu = $this->request->param();
        $request = Request::instance();
        // echo '请求方法：' . $request->method() . '<br/>';
        // echo '资源类型：' . $request->type() . '<br/>';
        // echo '访问ip地址：' . $request->ip() . '<br/>';
        // echo '是否AJax请求：' . var_export($request->isAjax(), true) . '<br/>';
        // echo '请求参数：';
        // dump($request->param());

        $canshu = $request->param();
        // dump($canshu);

        $array = [];

        $rotation_chart = Db::table('active')->field('id,banner')->where('status',1)->limit('0,3')->select();

        $country = ['北京'];

        $places = Db::table('places')->select();

        $status = ['预约未开始','预约开始','预约结束'];

        if(empty($canshu)){
            $list = Db::table('active')->field('id,title,banner,start_time,end_time,place,lesson_coach')->select();
        }else{
            $time = date('Y-m-d H:i:s',time());
            $data = [];
            if($canshu['status'] == 0){
                // $where = $time . '< start_time';
                $data['start_time'] = ['>=',$time];
            }elseif($canshu['status'] == 1){
                // $where = $time . ' >= start_time and '.$time .' <= end_time ';
                $data['start_time'] = ['<=',$time];
                $data['end_time'] = ['>=',$time];
            }elseif($canshu['status'] == 2){
                // $where = $time . ' > end_time';
                $data['end_time'] = ['<=',$time];
            }

            // dump(gettype($time));
            

            $list = Db::table('active')->field('id,title,banner,start_time,end_time,place,lesson_coach')->where('place_cate',$canshu['places'])->where($data)->select();

            // dump($list);
        }
        

        $array['rotation_chart'] = $rotation_chart;
        $array['country'] = $country;
        $array['places'] = $places;
        $array['status'] = $status;
        $array['list'] = $list;

        return $this->sends(1,'请求成功',$array);
        // dump($array);

        // dump('2020-06-20 11:11:11' < '2020-06-19 11:11:11');

    }

    public function detail(){
        $request = Request::instance();

        $canshu = $request->param();

        if(isset($canshu['id'])){
            $data = Db::table('active')->where('id',$canshu['id'])->find();

            return $this->sends(1,'请求成功',$data);
        }else{
            return $this->sends(0,'请求失败，参数错误',[]);
        }
    }

    public function order_detail(){
        $request = Request::instance();

        $canshu = $request->param();

        $data = ['active_id','contact','phone','user_id'];

        if(count($canshu) != 4){
            return $this->sends(0,'预约失败，参数错误',[]);
        }

        $chong = Db::table('order_detail')->where('user_id',$canshu['user_id'])->where('active_id',$canshu['active_id'])->find();

        if($chong){
            return $this->sends(0,'预约失败，当前用户已预约',[]);
        }

        $canshu['addtime'] = date('Y-m-d H:i:s',time());

        $res = Db::table('order_detail')->insert($canshu);

        if($res){
            return $this->sends(1,'预约成功',$res);
        }else{
            return $this->sends(0,'预约失败，参数错误',$res);
        }
    }

    private function sends($code,$msg,$data){
        $params['code'] = $code; 
        $params['msg'] = $msg; 
        $params['data'] = $data; 

        return json($params);
    }

    
}

