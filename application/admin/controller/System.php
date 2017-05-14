<?php
namespace app\admin\controller;

use app\admin\model\GameSystem;
use app\common\AdminInit;

class System extends AdminInit
{
    public function index(){
        $system = new GameSystem();
        $post = $this->myPost();
        if(!empty($post)){
            $return = $system->editsystem($post);

        }
        return  $this->fetch();
    }
}