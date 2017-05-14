<?php
namespace app\admin\controller;

use \app\common\AdminInit;
use app\admin\model\GameMenu;

class Menu extends AdminInit
{
	private $menu;
	public function __construct(GameMenu $menu){
		parent::__construct();
		$this->menu = $menu;
	}

	public function list_menu(){

		$list = $this->menu->mylist();
		$this->assign('page',$list->render());
		$this->assign('list',$list);
		return $this->fetch();
	}
	public function save_menu(){
		
		$list = $this->menu->level_one();
		$this->assign('list',$list);
		$post = $this->myPost();
		if(!empty($post)){
			$return = $this->menu->mysave($post);
			if(is_array($return)){
				return $return;
			}
			if($return == 1){
				return ['status'=>1,'msg'=>'添加成功'];
			}else{
				return ['status'=>-1,'msg'=>'添加失败'];
			}
		}
		return $this->fetch();
	}
	public function edit_menu(){
		$post = $this->myPost();
		if(!empty($post)){
			$return = $this->menu->myedit($post,$this->myId('id'));
			if(is_array($return)){
				return $return;
			}
			if($return == 1){
				return ['status'=>1,'msg'=>'修改成功'];
			}else{
				return ['status'=>-1,'msg'=>'修改失败'];
			}
		}else{
			
			$return = $this->menu->myfind($this->myId('id'));
			$list = $this->menu->level_one();
			$this->assign('list',$list);
			$this->assign('row',$return);
		}
		return $this->fetch();
	}
}