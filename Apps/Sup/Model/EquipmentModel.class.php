<?php
namespace Wap\Model;
use Think\Model;
class EquipmentModel extends Model{

    protected $_map = array(
            'ci' => 'cname',
            'en' => 'equ_name',
            'em' => 'equ_model',

        );

    /**
     * [get_result 按照条件及提交方法不同进行查询仪器列表]
     * @param  [array]      $data       [用户提交查询的数组：包含仪器名称型号、仪器所在单位位置、仪器所在机构名称]
     * @param  [string]     $method     [提交到本页面的查询方式,默认为post]
     * @param  [int]        $start      [分页起始页号]
     * @param  [int]        $size       [分页每页条目数]
     * @return [array]                  [返回查询条件的二维数组结果]
     */
    public function get_result($data,$method = 'post' , $start = 0 , $size = 10){

        //跳转查询时进入此处，包含：分类跳转、更多仪器页面跳转
        if ($method == 'get'){
            if (array_key_exists('key', $data)) {
                // 点击页首搜索框时进入此方法
                $sql = "SELECT id,equ_thumb,equ_name,equ_model,equ_manufactor,equ_price,equ_function,is_auth FROM bd_equipment WHERE equ_name LIKE '%$data[key]%' OR equ_model LIKE '%$data[key]%' OR equ_manufactor LIKE '%$data[key]%' ORDER BY is_auth DESC LIMIT $start,$size";

            }elseif(array_key_exists('cid', $data)){
                //由主页分类及分类列表进入此处
                $sql = "SELECT id,equ_thumb,equ_name,equ_model,equ_manufactor,equ_price,equ_function,is_auth FROM bd_equipment WHERE cid LIKE '%$data[cid],%' OR '%$data[cid]' ORDER BY is_auth DESC LIMIT $start,$size";
            }elseif(array_key_exists('ind', $data)){
                // 由行业分类进入此处
                $sql = "SELECT id,equ_thumb,equ_name,equ_model,equ_manufactor,equ_price,equ_function,is_auth FROM bd_equipment WHERE ind_id = $data[ind] ORDER BY is_auth DESC LIMIT $start,$size";

            }else{

                //点击更多设备时进入此处 没有cid参数
                $sql = "SELECT id,equ_thumb,equ_name,equ_model,equ_manufactor,equ_price,equ_function,is_auth FROM bd_equipment ORDER BY is_auth DESC LIMIT $start,$size";
            }

        // 本页查询时进入此处
        }elseif ($method == 'post') {
            // 构筑sql语句
            $sql = "SELECT e.id,e.equ_thumb,e.equ_field,e.equ_name,e.equ_model,e.equ_manufactor,e.equ_price,e.equ_function,e.is_auth,o.org_name,o.org_department FROM bd_equipment e LEFT JOIN bd_organization o ON e.org_id = o.oid WHERE ";
            // 判断用户是否有差寻仪器的要求
            if(!empty($data['keywords'])){
                $sql .= "(e.equ_name LIKE '%$data[keywords]%' OR e.equ_model LIKE '%$data[keywords]%') AND ";
            }

            // 判断用户是否有对机构的要求
            if(!empty($data['org'])){

                $sql .= "(o.org_name LIKE '%$data[org]%' OR o.org_department LIKE '%$data[org]%') AND ";
            }

            // 判断用户是否有对地区的要求
            if(!empty($data['region'])){
                $sql .= "(o.org_addres LIKE '%$data[region]%' OR o.addres LIKE '%$data[region]%') AND ";
            }

            // 判断用户是否查询认证仪器
            if($data['auth'] == 'on'){
                $sql .= 'e.is_auth = 1 LIMIT '.$start.','.$size;
            }else{
                $sql = rtrim($sql,'AND ');
                $sql .= ' ORDER BY e.is_auth DESC LIMIT '.$start.','.$size;
            }

        }
        $res = $this -> query($sql);
        foreach ($res as $key => $value){
            if (mb_strpos('米格', $value['org_name']) !== false){
                $res[$key]['add'] = 1;
            }else{
                $res[$key]['add'] = 0;
            }
        }
        return $res;

    }
    //search方法查询结果结束

    //仪器详情页查询相关仪器模块代码
    public function find_related($data){
        //格式化可能用到的数据
        // $condition = array(
        //     'e.equ_manufactor' => $data['euq_manufactor'],
        //     'o.org_name'       => $data['org_name'],
        //     'o.org_department' => $data['org_department']
        //     );
        //构建sql语句
        $sql = "SELECT e.id,e.equ_name,e.equ_model,e.equ_thumb FROM bd_equipment AS e INNER JOIN bd_organization AS o ON e.id = o.oid where e.is_del=0 ORDER BY rand() LIMIT 0,4";
        // foreach($condition  as $key => $value){
        //     if(!empty($value)){
        //         $sql .= "$key LIKE '%$value%' OR ";
        //     }
        // }
        // 去除多余的OR
        // $sql = rtrim($sql, 'OR ');
        //$sql .= "ORDER BY rand() LIMIT 0,4";
        $res = $this -> query($sql);
        return $res;
    }

    /**
     * 取得仪器详情页基本信息
     * @param  [int] $gid [仪器ID]
     * @return [array]      [返回该仪器的主要信息]
     */
    public function get_goods($gid){
        $result = $this -> alias('e') -> field('e.id,e.uid,e.equ_parameter,e.equ_function,e.equ_sample,e.equ_field,e.equ_price,e.equ_thumb,e.equ_name,e.equ_model,e.equ_manufactor,e.is_auth,o.oid,o.org_name,o.org_department,o.org_addres,o.username,o.tel') -> join('bd_organization o ON e.org_id = o.oid','left') -> where("e.id = $gid") -> find();
        return $result;
    }
}