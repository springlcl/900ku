<?php
/**
 * Created by PhpStorm.
 * User: Gaby
 * Date: 2017-04-12
 * Time: 10:03
 * Home模块下的首页控制器
 */
namespace Home\Controller;
use Home\Controller\WapController;

class IndexController extends WapController {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
    	$this->display("Home/index");
    }

}