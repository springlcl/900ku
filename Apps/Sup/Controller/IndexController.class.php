<?php
/**
 * Created by PhpStorm.
 * User: Gaby
 * Date: 2017-04-12
 * Time: 10:03
 * Sup模块下的首页控制器
 */
namespace Sup\Controller;
use Sup\Controller\SupController;

class IndexController extends SupController {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
    	echo "供应商首页";
    }

}