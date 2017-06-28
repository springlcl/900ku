<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
use Think\Db;
use Vendor\Database;
use Vendor\DbManage;

class IndexController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 后台框架左侧目录
     */
    public function index()
    {
        $this->display('Public/index');
    }

    /**
     * 后台首页展示
     */
    public function main()
    {

        $this->display('Public/main');
    }

    /**
     * 修改个人信息
     */
    public function person()
    {
        $db = M('admin');
        if(IS_POST)
        {
            $memberArr = $db->create();
            if($memberArr) {
                $n = $db->where('aid='.$memberArr['aid'])->save($memberArr);
                if($n) {
                    $this->success('修改成功',U('index/person'));
                }else {
                    $this->error('修改失败',U('index/person'));
                }
            }else {
                $this->error('数据创建失败',U('index/person'));
            }
            exit();
        }
        //$id = session('uid');
        $id = 1;
        $data = $db->where('aid = '.$id)->find();

        $this->assign('data',$data);
        $this->display('Public/person');
    }

    /**
     * 数据库备份--列表
     */
    public function sqlbackup()
    {
        $list  = M('')->query('SHOW TABLE STATUS');
        $list  = array_map('array_change_key_case', $list);

       foreach ($list as $k=>$v)
       {
           $list[$k]['bianhao'] = $k+1;
       }

        $this->assign('list', $list);
        $this->display('Public/sqlbackup');
    }

    /**
     * 数据库备份--备份全部数据
     */
    public function export(){
        $db = new DBManage ( C('DB_HOST'),C('DB_USER'),C('DB_PWD'),C('DB_NAME'),C('DB_CHARSET'));
        // 参数：备份哪个表(可选),备份目录(可选，默认为backup),分卷大小(可选,默认2048，即2M)
        //$db->backup ('','','');
        $int = $db->backup ('','./Data/','');
        if($int)
        {
            $this->success("备份成功", U('index/sqlbackup'),3);
        }
    }

    /**
     * 数据库备份--备份单个表数据
     */
    public function export_once()
    {
        $db = new DBManage ( C('DB_HOST'),C('DB_USER'),C('DB_PWD'),C('DB_NAME'),C('DB_CHARSET'));
        // 参数：备份哪个表(可选),备份目录(可选，默认为backup),分卷大小(可选,默认2048，即2M)
        //$db->backup ('','','');
        $int = $db->backup (I('get.table'),'./Data/','');
        if($int)
        {
            $this->success("备份成功", U('index/sqlbackup'),3);
        }

        //$db->restore ( './backup/20121027194215_all_v1.sql');
    }

}