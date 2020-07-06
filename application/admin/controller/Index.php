<?php
namespace app\admin\controller;

use think\Db;

use app\admin\controller\Baseini;

class Index extends Baseini
{
    public function index()
    {
    	$version = Db::query('SELECT VERSION() AS ver');
        $config  = [
            'url'             => $_SERVER['HTTP_HOST'],
            'document_root'   => $_SERVER['DOCUMENT_ROOT'],
            'server_os'       => PHP_OS,
            'server_port'     => $_SERVER['SERVER_PORT'],
            'server_soft'     => $_SERVER['SERVER_SOFTWARE'],
            'php_version'     => PHP_VERSION,
            'mysql_version'   => $version[0]['ver'],
            'max_upload_size' => ini_get('upload_max_filesize')
        ];

        return $this->fetch('index', ['config' => $config]);
        // return $this->fetch();
    }

    public function index2(){
    	return 'oowjeo';
    }
}
