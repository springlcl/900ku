<?php
namespace Supplier\Controller;
use Supplier\Controller\SupController;
    class ExhibitionController extends SupController
    {
    /* 供应商--后台展厅 */

     /**
     * 展厅主页
     *
     */

        //业务概况
    	public function index()
    	{
            //获取展厅exid
            $exid=I('get.exid');
            //var_dump($exid);
    		$this->display('Exhibition/Ex_index');
    	}

        //浏览概况
        //选择模板
        public function choose_model()
        {
            
            $this->display('Exhibition/Ex_model');
        }
        //
        //
        //
    }