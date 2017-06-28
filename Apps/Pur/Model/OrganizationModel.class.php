<?php
namespace Wap\Model;
use Think\Model;
class OrganizationModel extends Model{
    //为主页查找试验机构
    public function get_ins(){
        $temp = $this -> field('oid,org_thumb,org_name,org_department,org_introduction')
        -> where('is_rec = 1')
        -> limit('4')-> select();
        return $temp;
    }
}