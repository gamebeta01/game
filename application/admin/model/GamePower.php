<?php  
namespace app\admin\model;

use app\admin\model\common;

class GamePower extends CommonModel
{
	private $rule = [
		'power_name|权限名称'=>'require|chs',
		'power_url|字段名'=>'require'
	];
	public function mysave($post){
		$error = $this->MyValidate($this->rule,$post);
		if(!empty($error)){
			return $error;
		}
		return $this->common_save($post);
	}
	public function myedit($post,$id){
		$error = $this->MyValidate($this->rule,$post);
		if(!empty($error)){
			return $error;
		}
		return $this->common_edit($post,['power_id'=>$id]);
	}
	
	
}