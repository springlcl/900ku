<?php
/**
 * Created by PhpStorm.
 * User: XZQ
 * Date: 2017/6/10
 * Time: 12:18
 */

namespace Admin\Model;
use Think\Model;


class KeywordModel extends Model
{
    //绑定数据表
    protected $tableName = 'search_word';

//    public $_validate = array(
//         array('name','','名称已经存在！',1,'unique',3),
//         array('sort_order','','排序已经存在！',1,'unique',3),
//    );
//    public $_auto = array (
//        array('add_time','time',3,'function'),
//    );
}