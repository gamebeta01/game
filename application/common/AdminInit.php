<?php  
namespace app\common;

use \think\Controller;
use \think\Request;
use think\Session;

class AdminInit extends Controller{
	const SUCCESS_RETURN = 1;
	const FAIL_RETURN = -1;
	protected function _initialize()
	{
		if(null == Session::get('manager_account'))
		{
			$this->redirect('Init/index');
		}else{
			$controller = $this->request->controller();
	        $action = $this->request->action();
	        $ca = $controller."/".$action;

	        $role = Db('GameRole')->find(Session::get('manager_role'));
	        $role_power = unserialize($role['role_power']);
	        $map['power_id'] = array('in',$role_power);
	        $power = Db('GamePower')->where($map)->select();
	        $power_list = array();
	        foreach($power as $k=>$v){
	        	$power_list[] = $v['power_url'];
	        }
	        
	        if($ca != 'Index/index'){
	            if(Session::get('manager_id') == 1){
	            
	            }elseif(!in_array($ca,$power_list)){
	                $this->error('您没有权限！',Url('Index/index'));
	            }          
	        }
		
		}
	}
	protected function myPost(){
		if($this->request->isPost()){
			return $this->request->post();
		}
	}
	protected function myId($id){
		return $this->request->param($id);
	}
	protected function myreturn($return,$msg_title){
		if($return == 1){
			return ['status'=>1,'msg'=>$msg_title.'成功'];
		}else{
			return ['status'=>-1,'msg'=>$msg_title.'失败'];
		}
	}
}


?>