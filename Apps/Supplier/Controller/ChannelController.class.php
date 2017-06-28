<?php
namespace Supplier\Controller;
use Supplier\Controller\SupController;
use Think\Controller;
use Vendor\Csv;
class ChannelController extends SupController
{
    /* 供应商--后台展厅管理控制器 */

    /**
     * 渠道管理--XXXX
     */
   
    public function csvs()
    {
        //实例化csv类
        $csv=new Csv();
        //获取用户查询条件
        $uid = I('get.uid');
        $cond['uid']=array('in',$uid);
        //设置要查询的条件，字段
        $list=M("user")->field('real_name,username,user_num,mobile,status,remarks')
        ->where($cond)->limit(10000)->select();//查询数据，可以进行处理
        //设置要打印的表头
        $csv_title=array('业务员名称','微信昵称','业务员编码','手机号','账号状态','备注');
        $csv->put_csv($list,$csv_title);
    }
    //业务员管理
    public function selasman()
    {   
        //状态查询的默认显示全部
        $xs = 2;
        $id = session('exid');
        //设置序号分配到模板
        $this->assign('xh',1);
        $data = D('user')->where("item=%d and pt_role=%s and role=%s",$id,'1','1')->select();
        $this->assign('data',$data);
        $this->assign('xs',$xs);
        $this->display();        
    }


    //根据状态查询业务员列表
    public function state()
    {
        //获取查询状态中条件
        $zt = I('get.zt');
        //设置查询条件，不是一天数据，所以用IN
        $cond['status']=array('in',$zt);
        $cond['item'] = session('exid');
        $cond['pt_role'] = '1';
        $cond['role'] = '1';
        //分配序号到模板
        $this->assign('xh',1);
        //根据条件查询
        $data = D('user')->where($cond)->select();
        //如果状态是查询全部的话把变量设置为2，因为0，1在模板里无法判断
        if($zt == "0,1")
        {
            $zt = 2;
        }
        //把状态的值返回给模板，根据返回值判断option的显示
        $this->assign('xs',$zt);
        $this->assign('data',$data);
        $this->display('selasman');
        // $this->ajaxReturn($data);
    }


    //更改业务员姓名
    public function set_name()
    {
        $str = I('post.');
        //判断要是更改姓名就执行
        if($str['real_name'])
        {
            $result = D('user')->save($str);
            $this->ajaxReturn($result);die;
        }
        //判断是否更改手机号
        if($str['mobile'])
        {
            $result = D('user')->save($str);
            $this->ajaxReturn($result);die;
        }
        //判断更改状态
        if($str['status'])
        {   
            //判断状态要是2禁用的话，变量改为0 存入数据库
            if($str['status'] == 2)
            {
                $str['status'] = 0;
            }
            $result = D('user')->save($str);
            $this->ajaxReturn($result);die;
        }
        
    }


    //根据业务员姓名手机或编号查询
    public function sela()
    {
        //获取用户查询条件，查询数据
        $tj = I('post.tj');
        //总共三个查询条件：真是姓名、手机号和编码只要有一个符合的就把查询结果分配到模板
        $data = D('user')->where("real_name='%s' or mobile='%s' or user_num=%d",$tj,$tj,$tj)->select();
        $this->assign('data',$data);
        $this->display('selasman'); 
    }


    //筛选用户信息
    public function screen()
    {
        if(IS_POST)
        {
            $str = I('post.');
            //根据提交日期区间查询所需数据
            if(!empty($str['start']) and !empty($str['end']))
            {
                $str['start'] = strtotime($str['start']);
                $str['end'] = strtotime($str['end']);
                $map['add_time'] = array(array('egt',$str['start']),array('elt',$str['end']));
                $result = D('user')->where($map)->select();
                $this->assign('data',$result);
                $this->display('user_list');die;
            }
            
            //判断用户选择的如果是姓名查询，则给姓名外面加上单引号
            if($str['fs'])
            {
                $tj = $str['tj'];
                $str['tj'] = "'$tj'";
            }
            //如果用户提交的内容为空则终止查询
            if(empty($str['tj']))
            {
                $this->display('user_list');die;
            }
            //根据用户提交查询方式和查询内容查询
            $result = D('user')->where($str['fs']."=".$str['tj'])->find();
            //如果查询结果为空时终止下面运行
            if(!$result)
            {
                $this->display('user_list');die;
            }
            $this->assign('data',$result);
            $this->display();
        }
        else
        {
            //获取传递参数
            $sj = I('get.sj');
            //如果要是传递的7的话就查询近七天的数据
            if($sj == 7)
            {
                //获取从今天往前7天的时间
                $start = strtotime('-7 days');
                //设置查询条件
                $map['add_time'] = array('egt',$start);
                $map['pt_role'] = 1;
                $map['role'] = 0;
                $map['item'] = session('exid');
                $result = D('user')->where($map)->select();
                $this->assign('data',$result);
                $this->display('user_list');die;
            }
            if($sj == 30)
            {
                $start = strtotime('-30 days');
                $map['add_time'] = array('egt',$start);
                $map['pt_role'] = 1;
                $map['role'] = 0;
                $map['item'] = session('exid');
                $result = D('user')->where($map)->select();
                $this->assign('data',$result);
                $this->display('user_list');die;
            }

        }
    }


    //添加业务员
    public function add_sa()
    {
        if(IS_POST)
        {
            //首先判断是否上传
             if($_FILES['file']['error'] != 0)
            {
                exit('上传错误');
            }
            //设置上传图片类型
            $arr = array('jpg','png','jpeg','gif','bmp');
            //获取文件名称
            $filename = $_FILES['file']['name'];
            //通过用户名获取文件扩展名
            $ext = pathinfo($filename,PATHINFO_EXTENSION);
            //判断上传类型是否在要求范围内
            if(!in_array($ext,$arr))
            {
                $this->error("上传类型不正确");
            }
            //获取图片临时存放路径
            $source = $_FILES['file']['tmp_name'];
            //设置储存路径和文件名
            $dest = "./Uploads/image/".uniqid("S_",true).".".$ext;
            //从临时存放路径移动到预先设置的存储位置
            move_uploaded_file($source,$dest);
            //获取用户提交信息
            $data = I('post.');
            $data['add_time'] = time();
            //模拟用户id
            // $data['exid'] = 10;
            //将路径存储到数据库字段中
            $data['headimg'] = substr($dest,1);
            //设置平台角色，1为供应商
            $data['pt_role'] = 1;
            $data['role'] = 1;
            $data['item'] = session('exid');
            $data['leader'] = session('sup_uid');
            $result = D('user')->add($data);
            if($result)
            {
                $this->success('添加成功',U('selasman'));
            }
            else
            {
                $this->error('添加失败');
            }
        }
        else
        {

            $this->display();
        }
        
    	
    }


    //查看业务员
    public function see()
    {
        //获取用户传递ID
    	$uid = I('get.uid');
        $user = D('user');
        $data = $user->where('uid='.$uid)->find();
        $this->assign('data',$data);
        //根据uid查询其下级业务员
        $yi = $user->where('leader='.$uid)->select();
        //如果要是查询结果为空则终止程序
        if(!$yi)
        {
            //查询不出来数据说明是三级
            $this->assign('dj','3');
            $this->display();die;
        }
        //获取查询条数并且分配到模板
        $ch = count($yi);
        //分配下一级业务员信息
        $this->assign('yi',$yi);
        //分配查询条数
        $this->assign('ch',$ch);

        //根据下一级的条数循环出所有在下一级的id
        for($i = 0;$i<$ch;$i++)
        {
            //将所有二级业务员的id循环遍历到数组中
            $arr[] = $yi[$i]['uid'];
        }
        //把数组分割成字符串查询
        $arr = implode($arr,',');
        //设置查询条件IN
        $cond['leader']=array('in',$arr);
        //根据二级业务员ID查询三级业务员信息
        $str = $user->where($cond)->select();
        if(!$str)
        {
            //如果查询不出下一级结果说明是二级
            $this->assign('dj','2');
            $this->display();die;
        }
        //获取三级业务员人数
        $ge = count($str);
        //分配查询条数到模板
        $this->assign('ge',$ge);
        //把所以三级业务员信息分配到模板
        $this->assign('str',$str);
        //如果能查出三级说明他是一级
        $this->assign('dj','1');
        $this->display();
    }


    //商品定价
    public function price()
    {
    	$this->display();
    }


    //修改业务员
    public function edit()
    {
    	if(IS_POST)
        {
            $data = I('post.');
            // dump($data);die;

            if($_FILES['file']['type'])
            {
                if($_FILES['file']['error'] != 0)
                {
                    exit('上传错误');
                }
                $arr = array('jpg','png','jpeg','gif','bmp');
                $filename = $_FILES['file']['name'];
                $ext = pathinfo($filename,PATHINFO_EXTENSION);
                if(!in_array($ext,$arr))
                {
                    $this->error("上传类型不正确");
                }
                $source = $_FILES['file']['tmp_name'];
                $dest = "./Uploads/image/".uniqid("S_",true).".".$ext;
                move_uploaded_file($source,$dest);
                $data = I('post.');
                //模拟用户id
                
                $data['qcode'] = substr($dest,1);
                
            }
            $result = D('user')->save($data);
            // dump($result);die;
            if($result)
            {
                $this->success('修改成功',U('selasman'),1);
            }
            else
            {
                $this->error('修改失败');
            }
        }
        else
        {
            $uid = I('get.uid');
            $data = D('user')->where('uid='.$uid)->find();
            $this->assign('data',$data);
            $this->display();
        }
        
    }




    //删除业务员
    public function del()
    {
        $uid = I('post.uid');
        // echo $yid;die;
        $result = D('user')->where('uid='.$uid)->delete();
        $this->ajaxReturn($result);
    }


    //采购商管理
    public function buyer()
    {
        $data = D('cg_project')
        ->field('bd_admit.channel,bd_admit.pid,bd_cg_auth.status,bd_cg_project.pro_name,bd_cg_auth.license,bd_user.real_name,bd_admit.quantity,bd_admit.add_time,bd_admit.remarks,bd_admit.gaijia')
        ->join('bd_cg_auth on bd_cg_project.uid=bd_cg_auth.uid')
        ->join('bd_user on bd_cg_project.manager=bd_user.uid')
        ->join('bd_admit on bd_admit.pid=bd_cg_project.pid')
        ->where('bd_admit.exid=2')
        ->select();
        $this->assign('xuhao','1');
        $this->assign('data',$data);
    	$this->display();
    }


    //准入管理
    public function admit()
    {
        //获取采购商项目id
        $id = I('get.pid');
        //查询采购商项目信息
        $data = D('cg_project')
        ->field('bd_cg_project.*,bd_cg_project.add_time as time,bd_cg_auth.*,bd_user.*,bd_cg_auth.status as renzheng,bd_cg_project.uid as cgid')
        ->join('bd_cg_auth on bd_cg_project.uid=bd_cg_auth.uid')
        ->join('bd_user on bd_cg_project.manager=bd_user.uid')
        ->where('bd_cg_project.pid='.$id)
        ->find();
        // $exid = session('exid');
        $exid = 2;
         //通过展厅id获取商品分类
        $fen = D('access_table')
        ->distinct(true)
        ->field('bd_goods_cate.gc_name,bd_goods_cate.gcid')
        ->join('bd_goods on bd_access_table.gid=bd_goods.goods_id')
        ->join('bd_goods_cate on bd_goods.goods_cate_id=bd_goods_cate.gcid')
        ->where('bd_access_table.exid='.$exid)
        ->select();
        $this->assign('fenlei',$fen);
        //从准入展厅中查询准入和为准入商品的数量
        $str = D('admit')->where("uid=%d and exid=%d",$data['cgid'],$exid)->find();
        $zhunru = count(D('access_table')->where("admit_id=%d and status!=%d and status!=%d",$str['id'],0,2)->select());
        $dai = count(D('access_table')->where("admit_id=%d and status=%d",$str['id'],2)->select());
        $this->assign('zhunru',$zhunru);
        $this->assign('dai',$dai);
        //通过准入展厅的id查看商品数量及详情
        $cond['bd_access_table.admit_id'] = $str['id'];
        //接收用户所填写的信息进行搜素
        $n = I('post.sou');
        //根据用户所选择的分类进行查询分类下的商品
        $fen = I('post.fen');
        $cond['bd_goods.goods_name'] = array('like',"%$n%");
        $cond['bd_access_table.status'] = array('in',"1,2,3,5");
        $cond['bd_goods.goods_cate_id'] = array('like',"%$fen%");
        $arr = D('access_table')
            ->field('bd_access_table.xiugai,bd_goods_sku.goods_sale_num,bd_goods_sku.goods_num,bd_access_table.price,bd_access_table.aid,bd_goods_sku.attributes,bd_access_table.goods_price,bd_goods.goods_name,bd_goods.goods_thumb,bd_access_table.status')
            ->join('bd_goods on bd_access_table.gid=bd_goods.goods_id')
            ->join('bd_goods_sku on bd_goods_sku.goods_id=bd_goods.goods_id')
            ->where($cond)->select();
        $this->assign('xuhao','1');
        $this->assign('arr',$arr);
        $this->assign('str',$str);
        $this->assign('data',$data);
    	$this->display();
    }

    //同意准入商品
    public function set_price()
    {
        $data = I('post.');
        $data['bg_time'] = time();
        $result = D('access_table')->save($data);
        $adid = I('post.adid');
        $where['status'] = array('in','1,3,5');
        $where['exid'] = $adid;
        $fan = count(D('access_table')->where($where)->select());
        $cond['id'] = $adid;
        $cond['quantity'] = $fan;
        D('admit')->save($cond);
        $w['status'] = array('in','2,5');
        $w['exid'] = $adid;
        $f = count(D('access_table')->where($w)->select());
        $c['id'] = $adid;
        $c['gaijia'] = $f;
        D('admit')->save($c);
        $this->ajaxReturn($data);
    }



    //修改价格
    public function set_prices()
    {
        $data = I('post.');
        $data['bg_time'] = time();
        $result = D('access_table')->save($data);
        $adid = I('post.adid');
        $where['status'] = array('in','3,4');
        $where['exid'] = $adid;
        $fan = count(D('access_table')->where($where)->select());
        $cond['id'] = $adid;
        $cond['gengxin'] = $fan;
        D('admit')->save($cond);
        $this->ajaxReturn($data);
    }


    //批量同意准入商品
    public function set_status()
    {
        $ids = I('post.aid');
        $cond['aid'] = array('in',$ids);
        $cond['status'] = 1;
        $result = D('access_table')->save($cond);
        $adid = I('post.adid');
        $where['status'] = array('in','1,3,5');
        $where['exid'] = $adid;
        $fan = count(D('access_table')->where($where)->select());
        $conds['id'] = $adid;
        $conds['quantity'] = $fan;
        D('admit')->save($conds);
        $this->ajaxReturn($result);
    }



    //批量拒绝准入商品
    public function set_refuse()
    {
        $ids = I('post.aid');
        $cond['aid'] = array('in',$ids);
        $cond['status'] = 0;
        $result = D('access_table')->save($cond);
        $adid = I('post.adid');
        $where['status'] = array('in','1,3,5');
        $where['exid'] = $adid;
        $fan = count(D('access_table')->where($where)->select());
        $conds['id'] = $adid;
        $conds['quantity'] = $fan;
        D('admit')->save($conds);
        $this->ajaxReturn($result);
    }

    //修改协议款比例状态
    public function edits(){
        $data = I('post.');
        $result = D('admit')->save($data);
        $this->ajaxReturn($result);
    }


    //同意修改价格并修改状态
    public function set_zt()
    {
        $data = I('post.');
        $result = D('access_table')->save($data);
        $adid = I('post.adid');
        $where['status'] = array('in','3,4');
        $where['exid'] = $adid;
        $fan = count(D('access_table')->where($where)->select());
        $cond['id'] = $adid;
        $cond['gengxin'] = $fan;
        D('admit')->save($cond);
        $this->ajaxReturn($result);
    }

    //用户概况
    public function user_profile()
    {
    	
        $this->display();
    }


    //用户列表
    public function user_list()
    {
        $id = session('exid');
        $data = D('user')->where("item=%d and pt_role=%s and role=%s",$id,'1','0')->select();
        $this->assign('data',$data);
        $this->assign('xuhao',1);
    	$this->display();
    }














}