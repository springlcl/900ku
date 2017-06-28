<?php
/**
 * Created by PhpStorm.
 * User: Gaby
 * Date: 2017-04-12
 * Time: 10:03
 * Wap模块下的首页控制器
 */
namespace Wap\Controller;
use Wap\Controller\WapController;

class IndexController extends WapController {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
    	echo "1111";
    }

}