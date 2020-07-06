<?php
namespace app\admin\controller;

use think\Controller;

use think\Db;
use app\admin\validate\User;

class Login extends Controller
{
    public function zhuce()
    {
        return $this->fetch();
    }

    public function zuozhuce()
    {
        $canshu =  $this->request->param();

        // dump($canshu);

        $user['user_name'] = $canshu['zhanghao'];
        $user['password'] = $canshu['mima'];
        $user['series'] = 4;

        $woda = Db::table('adminuser')->where('user_name',$canshu['zhanghao'])->find();

        if($woda){
            echo "<script type='text/javascript'>alert('您申请的账户已存在');window.location='http://360zxd.com/admin/login/zhuce';</script>";
            exit;
        }

        $res = Db::table('adminuser')->insertGetId($user);

        // dump($res);

        $dealer['user_id'] = $res;
        $dealer['shangji'] = $canshu['shangji'];
        $dealer['city'] = $canshu['suozaiquyu'];
        $dealer['dealer'] = $canshu['gongsimingcheng'];
        $dealer['farenxingming'] = $canshu['farenxingming'];
        $dealer['gongsixinyong'] = $canshu['gongsixinyong'];
        $dealer['gongsizhanghu'] = $canshu['gongsizhanghao'];
        $dealer['kaihuhang'] = $canshu['kaihuhang'];
        $dealer['gongsidianhua'] = $canshu['gongsidianhua'];
        $dealer['bangongdizhi'] = $canshu['bangongdizhi'];
        $dealer['lianxiren'] = $canshu['lianxiren'];
        $dealer['lianxidianhua'] = $canshu['lianxidianhua'];
        $dealer['email'] = $canshu['email'];
        $dealer['beizhu'] = $canshu['beizhu'];

        // dump($dealer);

        $res2 = Db::table('dealer')->insert($dealer);
        // dump($res2);

        if($res && $res2){
            echo "<script type='text/javascript'>alert('注册成功，请等待管理员核实您的信息');window.location='http://xiaozhibaobeijing.com';</script>";
        }else{
            $this->error('您输入的信息有误，请核实后在注册');
        }

        
    }

    public function index()
    {
        // dump(789);exit;
        return $this->fetch();
    }

    public function zuologin(){
    	$post =  $this->request->post();
    	// var_dump($post);

    	$data = ['username'=>$post['user_name'],'password'=>$post['password'],'__token__'=>$post['__token__']];

	    $validate = new User();
	    $result = $validate->scene('login')->check($data);

	    // var_dump($validate->getError());
    	// var_dump($result);exit;
    	if($result){
    		$user=Db::name('adminuser')->where('username','=',$data['username'])->find();
            
    		
			if($user){
                
				if($user['password'] == md5($data['password']) ){
                    // $nodes_list = $this->getNodes($user['id']);
                    // $_SESSION['node_list'] = $nodes_list;
					$_SESSION['adminuser']=$user;
					// session('username',$user['username']);
					// session('uid',$user['id']);
                //     var_dump($user['password']);
                // var_dump(md5($data['password']) == $user['password']);exit;
					$this->redirect('/admin/index/index'); //信息正确
				}else{
					$this->redirect('/admin/login/index');//密码错误
				}
			}else{
				$this->redirect('/admin/login/index');//用户不存在
			}
    	}else{
    		$this->redirect('/admin/login/index');
    	}
    }

    // 获取用户权限
    public function getNodes($id){
        // $id = 1;

        // $mod = M('user_role as ur');

        $data = Db::query("select n.action,n.controller from user_role as ur,role_node as rn,node as n where ur.uid={$id} and ur.rid=rn.rid and rn.nid=n.id");

        // dump($data);

        $nodes = ['adminuser' => [],'role' => [],'baoxian' => []];

        foreach($data as $node){
            // dump($nodes[$node['controller']]);exit;
            if(!in_array($node['action'],$nodes[$node['controller']])){
                $nodes[$node['controller']][] = $node['action'];
                if($node['action'] == 'add'){
                    $nodes[$node['controller']][] = 'insert';
                }

                if($node['action'] == 'edit'){
                    $nodes[$node['controller']][] = 'update';
                }
            }
        }

        $nodes['index'][] = 'index';

        // dump($nodes);

        return $nodes;
    }

    public function logout(){
    	$_SESSION['adminuser'] = '';

    	$this->redirect('/admin/login/index');
    }

    public function update(){

     //    if($_SESSION['adminuser']['series'] != 0){

     //        $this->redirect('http://360zxd.com/admin/order/add');

     //    }
    	return $this->fetch();
    }

    public function zuoupdate(){
    	$data = input('post.');

    	// $validate = new User();
	    // $result = $validate->scene('update')->check($data);
	    // var_dump($validate->getError());
    	// var_dump($result);exit;
    	if ((md5($data['password'])) == $_SESSION['adminuser']['password']) {
            if ($data['newpassword'] == $data['password_confirm']) {
                $md5_password = md5($data['newpassword']);
                $result = Db::table('adminuser')->where('id',$_SESSION['adminuser']['id'])->update(['password' => $md5_password]);
                if ($result) {
                    $_SESSION['adminuser'] = '';
                    return $this->success('修改成功啦!','/admin/login/index');
                } else {
                    return $this->error('修改失败','/admin/login/update');
                }
            } else {
                return $this->error('修改失败','/admin/login/update');
            }
        } else {
            return $this->error('修改失败','/admin/login/update');
        }

    }
}
?>