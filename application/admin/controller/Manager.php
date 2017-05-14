<?php  
namespace app\admin\controller;

use app\common\AdminInit;
use app\admin\model\GamePower;
use app\admin\model\GameRole;
use app\admin\model\GameMenu;
use app\admin\model\GameManager;

class Manager extends AdminInit
{
	private $power;
	private $menu;
	private $role;
	private $manager;
	public function __construct(GamePower $power,GameMenu $menu,GameRole $role,GameManager $manager){
		parent::__construct();
		$this->power = $power;
		$this->menu = $menu;
		$this->role = $role;
		$this->manager = $manager;
	}
	/**
	 * 角色管理
	 * @return [type] [description]
	 */
	public function list_role(){
		$list = $this->role->mylist();
		$this->assign('all_count',$this->role->AllCount());
		$this->assign('list',$list);
		return $this->fetch();
	}
	//添加权限
	public function save_role(){
		$post = $this->myPost();
		if(!empty($post)){
			$post['role_power'] = serialize($post['role_power']);
			$return = $this->role->mysave($post);
			if(is_array($return)){
				return $return;
			}
			return $this->myreturn($return,'添加');
		}else{
			$powerlist = $this->power->getlistArr();
			$this->assign('powerlist',$powerlist);
			
			$menu = $this->menu->getlistArr();
			$this->assign('menulist',$menu);
			return $this->fetch();
		}
	}
	//修改角色
	public function edit_role(){

		$post = $this->myPost();
		if(!empty($post)){
			$post['role_power'] = serialize($post['role_power']);
			$return = $this->role->myedit($post,$this->myId('id'));
			if(is_array($return)){
				return $return;
			}
			return $this->myreturn($return,'修改');
		}else{
			$powerlist = $this->power->getlistArr();
			$this->assign('powerlist',$powerlist);
			
			$menu = $this->menu->getlistArr();
			$this->assign('menulist',$menu);

			$row = $this->role->myfind($this->myId('id'));
			$row['role_power'] = unserialize($row['role_power']);
			$this->assign('role',$row);
			$return = $this->power->myfind($this->myId('id'));
			
			$this->assign('row',$return);
			return $this->fetch();
		}
	}
	public function del_role(){
		$post = $this->myPost();
		if(!empty($post)){
			$return = $this->role->mydelete($post['id']);
		}
		return $this->myreturn($return,'删除');
	}
	public function del_mrole(){
		$post = $this->myPost();
		if(!empty($post)){
			$return = $this->role->moredel($post['id']);
		}

		return $this->myreturn($return,'删除');
	}
	/**
	 * 权限管理
	 * @return [type] [description]
	 */
	public function list_power(){
		$post = $this->myPost();
		$like = null;
		if(!empty($post)){
			$like['power_name'] = ['like','%'.$post['like'].'%'];
		}
		$list = $this->power->mylist($like);
		$this->assign('all_count',$this->role->AllCount());
		$this->assign('list',$list);
		return $this->fetch();
	}
	//保存权限
	public function save_power(){

		$post = $this->myPost();
		if(!empty($post)){
			$return = $this->power->mysave($post);
			if(is_array($return)){
				return $return;
			}
			return $this->myreturn($return,'添加');
		}else{
			$list = $this->menu->level_one();
			$this->assign('list',$list);
			return $this->fetch();
		}
	}
	//修改权限
	public function edit_power(){

		$post = $this->myPost();
		if(!empty($post)){
			$return = $this->power->myedit($post,$this->myId('id'));
			if(is_array($return)){
				return $return;
			}
			return $this->myreturn($return,'修改');
		}else{

			$list = $this->menu->level_one();
			$this->assign('list',$list);
			$return = $this->power->myfind($this->myId('id'));
			
			$this->assign('row',$return);
		}
		return $this->fetch();
	}
	public function del_power(){
		$post = $this->myPost();
		if(!empty($post)){
			$return = $this->power->mydelete($post['id']);
		}
		return $this->myreturn($return,'删除');
	}
	public function del_mpower(){
		$post = $this->myPost();
		if(!empty($post)){
			$return = $this->power->moredel($post['id']);
		}
		return $this->myreturn($return,'删除');
	}
	/**
	 * 管理员管理
	 */
	public function list_manager(){
		$list = $this->manager->mylist();
		$this->assign('all_count',$this->manager->AllCount());
		$role_list = $this->role->mylist();
		unset($list[0]);
		foreach ($list as $key => $val) {
			foreach ($role_list as $k => $v) {
				if($val['manager_role'] == $v['role_id']){
					$list[$key]['role'] = $v['role_name'];
				}
			}
		}
		$this->assign('list',$list);
		return $this->fetch();
	}
	public function save_manager(){
		$list = $this->role->mylist();
		$this->assign('list',$list);
		$post = $this->myPost();
		if(!empty($post)){
			$return = $this->manager->mysave($post);
			if(is_array($return)){
				return $return;
			}
			return $this->myreturn($return,'添加');
		}
		
		return $this->fetch();
	}
	public function edit_manager(){
		
		$post = $this->myPost();
		if(!empty($post)){
			$return = $this->manager->myedit($post,$this->myId('id'));
			if(is_array($return)){
				return $return;
			}
			return $this->myreturn($return,'修改');
		}else{
			$list = $this->role->mylist();
			$this->assign('list',$list);
			$return = $this->manager->myfind($this->myId('id'));
			$this->assign('row',$return);
			return $this->fetch();
		}
	}
	public function manager_start(){
		$post = $this->myPost();
		$return = $this->manager->save(['manager_status'=>1],['manager_id'=>$post['id']]);
		return ['status'=>$return];
	}
	public function manager_stop(){
		$post = $this->myPost();
		$return = $this->manager->save(['manager_status'=>-1],['manager_id'=>$post['id']]);
		return ['status'=>$return];
	}
	public function del_manager(){
		$post = $this->myPost();
		if(!empty($post)){
			$return = $this->manager->mydelete($post['id']);
		}
		return $this->myreturn($return,'删除');
	}

}

?>