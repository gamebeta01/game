<?php  
namespace app\admin\model;

use app\admin\model\common;

class GameManager extends CommonModel
{
	//登录验证规则
	private $rule = [
		'id|账号'=>'require',
		'password|密码'=>'require'
	];
	private $rule2 = [
		'manager_account|账号名'=>'require',
		'manager_pwd|管理员密码' =>'require',
		'manager_name|真实姓名' =>'require',
		'manager_sex|管理员性别'=>'require',
		'manager_mobile|管理员手机'=>'require|length:11',
		'manager_email|管理员邮箱'=>'require|email',
		'manager_role|管理员角色'=>'require'
	];
	private $rule3 = [
		'manager_account|账号名'=>'require',
		'manager_pwd|管理员密码' =>'require',
		'manager_name|真实姓名' =>'require',
		'manager_sex|管理员性别'=>'require',
		'manager_mobile|管理员手机'=>'require|length:11',
		'manager_email|管理员邮箱'=>'require|email',
		'manager_role|管理员角色'=>'require'
	];
	public function LoginValidate($data){

		$error = $this->MyValidate($this->rule,$data);
                if(!empty($error)){
                    return $error;
                }
                
		$map = array('manager_account'=>$data['id']);
		$return = $this->getLine($map);
		if($data['id'] != $return['manager_account']){
			//账号不存在或账号名错误
			return ['status'=>-1,'msg'=>'账号不存在或账号名错误'];
		}else{
			if(setPwd($return['manager_salt'],$data['password']) != $return['manager_pwd']){
                                
				return ['status'=>-2,'msg'=>'密码错误！'];
			}else{
				unset($return['manager_pwd']);
				unset($return['manager_salt']);
				$this->mySession_set($return);
				return ['status'=>1,'msg'=>'登录成功！'];
			}
		}
	}
	public function mysave($post){
		$error = $this->MyValidate($this->rule2,$post);
		if(!empty($error)){
			return $error;
		}
		$post['manager_salt'] = uniqid();
		$post['manager_pwd'] = setPwd($post['manager_salt'],$post['manager_pwd']);
		$post['manager_jointime'] = time();
		unset($post['manager_pwd2']);
		return $this->common_save($post);
	}
	public function myedit($post,$id){
		$row = $this->get($id);
		
		if($post['manager_pwd'] != $row['manager_pwd']){
			$post['manager_salt'] = uniqid();
			$post['manager_pwd'] = setPwd($post['manager_salt'],$post['manager_pwd']);
		}
		unset($post['manager_pwd2']);
		$error = $this->MyValidate($this->rule2,$post);
		if(!empty($error)){
			return $error;
		}
		return $this->common_edit($post,['manager_id'=>$id]);
	}
	public function mystatus(){
		
	}
}