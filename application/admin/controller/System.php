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
            if($return){
                $this->success('操作成功！');
            }else{
                $this->error('操作失败！');
            }
        }else{
            $list = $system->getlistArr();
            $row = array();

            foreach($list as $k=>$v){
                $row[$v['system_key']] = $v['system_value'];
            }
            $this->assign('row',$row);
            return  $this->fetch();
        }
    }
}