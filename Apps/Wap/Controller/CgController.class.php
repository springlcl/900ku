<?php
/**
 * 900ku前台pc端采购商平台首页(平台前端展示控制器)
 */
namespace Wap\Controller;
use Common\Controller\BaseController;

class CgController extends WapController
{
	public function index()
	{
		$this->display('Cg/index');
	}
}
?>