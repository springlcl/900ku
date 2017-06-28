<?php
/*
*
*
*   财务管理控制器
*
*/


namespace Purchaser\Controller;
use Purchaser\Controller\PurController;
class FinancialController extends PurController
{
	//统计
	public function statistics()
	{
		$this->display();
	}


	//应付款查询
	public function paid()
	{
		$this->display();
	}


	//付款记录
	public function record()
	{
		$this->display();
	}

	//发票管理
	public function admi()
	{
		$this->display();
	}

	//待确认发票
	public function wait_for()
	{
		$this->display();
	}



	//已确认发票
	public function confirm()
	{
		$this->display();
	}


	//已拒绝发票、
	public function rejected()
	{
		$this->display();
	}

	//发票资质
	public function qualifi()
	{
		$this->display();
	}
}