<?php
namespace app\hexiao\controller;

use think\Controller;
use think\Request;

class Baseini extends Controller

{

    public function _initialize()

    {

    	// var_dump($_SESSION['hexiao']);

        if(!isset($_SESSION['hexiao']) || $_SESSION['hexiao'] == ''){

        	$this->redirect('/public/index.php/hexiao/login/index');

        }

        if($_SESSION['hexiao']['panduan'] == 2){
        	$this->redirect('/public/index.php/hexiao/Lvxing/lvxing');
        }

        // echo '<hr >';

    }

}

?>