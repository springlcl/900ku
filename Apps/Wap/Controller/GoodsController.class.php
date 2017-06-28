<?php
/**
 * 900ku前台pc端商品首页(平台前端展示控制器)
 */
namespace Wap\Controller;
use Common\Controller\BaseController;

class GoodsController extends WapController
{
	public function index()
	{
		$this->display('Goods/index');
	}
}
?>