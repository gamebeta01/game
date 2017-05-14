<?php  
namespace app\admin\controller;

use \think\Controller;
use \think\Request;
use \think\Session;
use \app\admin\model\GameManager;

class Init extends Controller
{
	public function index()
	{
            
		$game_mamager = new GameManager();
		if($this->request->isPost()){
			$post = $this->request->post();
			$return = $game_mamager->LoginValidate($post);
                        return $return;
		}else{
			
		}
		return $this->fetch();
	}
	public function loginout(){
		session::clear();
		$this->success('退出成功！','Init/index');
	}
}