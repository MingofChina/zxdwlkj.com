<?php
namespace app\hexiao\controller;

use think\Db;
use think\Controller;

use app\hexiao\controller\Baseini;

class Lvxing extends Controller
{
    public function lvxing(){
        return $this->fetch();
    }
}
