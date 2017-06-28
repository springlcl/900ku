<?php
namespace Wap\Model;
use Think\Model;
class DemandModel extends Model{
    // 定义字段映射
    protected $_map = array(
        'userId'        => 'uid',
        'orderName'     => 'title',
        'orderIntro'    => 'introduction',
        'orderCash'     => 'money',
        'orderDate'     => 'deadline',
        'name'          => 'username',
        'tel'           => 'mobile',
        'address'       => 'addres',
        'fp-radio'      => 'invoice_type',
        'bill'          => 'invoice_title',
        );

    // 定义自动填充
    protected $_auto = array (
        //array(完成字段1,完成规则,[完成条件,附加规则]),
    array('status','0'),  // 新增的时候把status字段设置为0
    array('add_time','time',1,'function'),  // 新增的时候将add_time字段使用time()函数填充
    array('deadline','strtotime',1,'function'),
        );


    //主页取得需求
    public function get_desire($ids,$no){
        $user = new \Wap\Model\UserModel();
        //获取标题及副标题，按发布时间排序
        $title = $this -> field('title,introduction') -> limit("$no") -> order('add_time desc') -> select();
        //循环获取avatar
        // foreach($ids as $key => $value){
        //     $res = $user -> field('avatar') -> where("uid = $value[uid]") -> find($value);
        //     $avatar[$key] = $res;
        //     foreach ($title as $k => $v) {
        //         echo $v['$k'].'<br>';
        //     }
        // }

        // $data = array_merge($title , $avatar);
        dump($ids);die;
        return $data;
    }
}