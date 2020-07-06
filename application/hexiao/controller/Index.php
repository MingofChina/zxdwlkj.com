<?php
namespace app\hexiao\controller;

use think\Db;

use app\hexiao\controller\Baseini;

class Index extends Baseini
{
    public function index()
    {
        return $this->fetch();
    }

    public function index2(){
    	return 'oowjeo';
    }
}
