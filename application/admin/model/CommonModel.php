<?php  
namespace app\admin\model;

use think\Model;
use \think\Loader;
use \think\Validate;
use think\Session;

class CommonModel extends Model{
	const SUCCESS_RETURN = 1;
	const FAIL_RETURN = -1;
	const VALIDATE_RETURN = -5;
	protected function initialize()
    {
        parent::initialize();
    }
   
	protected function MyValidate($rule,$data){

		$validate = new Validate($rule);

		if(!$validate->check($data)){
			return ['status'=>self::VALIDATE_RETURN,'msg'=>$validate->getError()];
		}
	}
	protected function getLine($where){
		$return = $this->where($where)->find();
		if($return == null){
			return array();
		}elseif(is_object($return)){
			return $return->toArray();
		}
		return $return;
	}
	protected function mySession_set($data){
		unset($data['manager_salt']);
		unset($data['manager_pwd']);
		foreach($data as $k=>$v){
			Session::set($k,$v);
		}
	}
	public function myfind($id){
		return $this->get($id);
	}
	public function myreturn($return){
		if($return){
			return self::SUCCESS_RETURN;
		}else{
			return self::FAIL_RETURN;
		}
	}
	public function common_save($post){
		$return = $this->save($post);
		return $this->myreturn($return);
	}
	public function common_edit($post,$id){
		$return = $this->save($post,$id);
		return $this->myreturn($return);
	}
	//删除节点
	public function mydelete($id){
		$return = $this->destroy($id);
		return $this->myreturn($return);
	}
	//批量删除节点
	public function moredel($data){
		$return = $this->destroy($data);
		return $this->myreturn($return);
	}
	//带分页的列表
	public function mylist($like=null){
		return $this->where($like)->paginate(20);
	}
	//不带分页的列表
	public function getlistArr(){
		return $this->select();
	}
	public function level_one(){
		$data = collection($this->select())->toArray();
		$return = $this->level_two($data,0);
		return $return;
	}
	protected static $arr = array();
	public function level_two($data,$id=0,$level=0){
		foreach($data as $k=>$v){
			if($v['menu_pid'] == $id){
				$v['menu_name'] = str_repeat('--', $level).$v['menu_name'];
				self::$arr[] = $v;
				unset($data[$k]);
				$this->level_two($data,$v['menu_id'],$level+1);
			}
		}
		return self::$arr;
	}
	public function AllCount(){
		return $this->count();
	}
}