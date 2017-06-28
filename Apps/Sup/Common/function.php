<?php
/*
 +----------------------------------------------------------------------
 | [ WE CAN DO IT JUST THINK IT ]
 +----------------------------------------------------------------------
 | Copyright (c) 2013 http://www.caopeng.me All rights reserved.
 +----------------------------------------------------------------------
 | Author: nostalgia <wwkillleng@sina.com>
 +----------------------------------------------------------------------

*/
/**
 * 系统公共库文件
 * 主要定义系统公共函数库
 */


//uinon_table方法———将查询的表一的查询结果链表至表二得到查询结果字段
/**
 * [union_table 链表查询方法：将表一结果数组集合外键字段作为查询条件链表查询表二字段]
 * @param  [array]  $array  [表一查询结果集]
 * @param  [string] $field  [表二中where筛选条件]
 * @param  [string] $table  [表二的表名，作为链表依据]
 * @param  [string] $join   [表二链表的方式]
 * @param  [string] $fields [表二中要查询的字段]
 * @param  [int]    $limit  [表二中限制查询的条目]
 * @param  [string] $order  [表二中排序选项]
 * @return [array]         [返回结果为表一与表二链表查询结果集]
 */
function union_table($array,$field = '',$table = '',$join = '',$fields = '',$limit = '',$order = '') {
  //实例化表二的模型对象
  eval('$'.$table.' = new \Wap\Model\\'.$table.'Model()');
  foreach($array as $key => $value){
    // 按照查找条件循环查找一条
    $temp = $table -> field($fields) -> where("$field = $value[$field]") -> find();
    // 将结果集合并进数组
    $res[$key] = array_merge($temp[$key],$u);
  }
  return $res;
}


/**
 * 输出QQ类的时间格式。5分钟内的时间不显示时间戳
 * @param  [type]  $time      [description]
 * @param  string  $criterion [description]
 * @param  integer $key       [description]
 * @return [type]             [description]
 */
// function check_time($time,$criterion='',$key=0){
//   foreach ($time as $k => $v) {
//     // die;
//     echo "1<br />";
//     dump($time);

//     dump($criterion);
//     dump($k);
//     dump($v);
//     // $tempT = strtotime($value);
//     if(is_array($v)){
//         echo "2<br />";
//       $time[$k] = check_time($v,$time[$k-1],$k);
//       // return $time;
//     }else{
//       echo "3<br />";
//       $temp = strtotime($v);
//       $diff = strtotime($criterion[$k]);
//       dump($temp);
//       dump($diff);
//       if ($temp>0 && $temp<=(strtotime($criterion[$k])+300)) {
//       // dump($v);
//         $time[$k] = '';
//         return $time;
//       }
//     }
//   }
// }