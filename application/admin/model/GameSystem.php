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
            $field = $this->where(array('system_key'=>$k))->find();
            if(!empty($field['system_key'])){
                if($field['system_value'] == $v){
                    continue;
                }
                $return = $this->where(array('system_key'=>$k))->setField('system_value',$v);
            }else{
                $data['system_key'] = $k;
                $data['system_value'] = $v;
                $return = $this->insert($data);
            }
        }
        return $return;
    }
}