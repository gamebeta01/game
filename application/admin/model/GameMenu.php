<?php  
namespace app\admin\model;

use app\admin\model\common;

class GameMenu extends CommonModel
{
	private $rule = [
		'menu_name|按钮名称'=>'require|chs'
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
		return $this->common_edit($post,['menu_id'=>$id]);
	}
	
}