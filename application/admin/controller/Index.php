<?php
namespace app\admin\controller;

use \app\common\AdminInit;

class Index extends AdminInit
{
    public function index()
    {
		return $this->fetch();
	}
}
