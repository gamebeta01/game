<?php
/**
 * Created by PhpStorm.
 * User: yulian
 * Date: 2017/5/13
 * Time: 23:50
 */

namespace app\admin\model;


class GameSystem extends CommonModel
{
    public function editsystem($post){

        foreach($post as $k=>$v){
            if($this->where(array('system_key'))->find())
        }
    }
}