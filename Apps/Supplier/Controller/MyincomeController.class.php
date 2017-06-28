<?php
namespace Supplier\Controller;
use Supplier\Controller\SupController;
use Think\Controller;
class MyincomeController extends SupController{


	 /* --我的收入控制器 */



	//收入金额
    public function income_at()
    {
    	$tx = "可用金额为100元";
        $this->assign('mr',$tx);
        $this->display();
    }


    //银行卡
    public function bank_card()
    {
    	$this->display();
    }


}