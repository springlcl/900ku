<?php
namespace Supplier\Controller;
use Supplier\Controller\SupController;
use Think\Controller;
class SettingController extends SupController
{
    /* 供应商--后台展厅管理控制器 5/4/11/20 */

    /**
     * 展厅设置--
     *
     */

    //展厅信息
    public function Ex_mess()
    {
        //实例化展厅表
        $exid=session('exid');
        $db=M('exhibition_hall');
        $ex_mess=$db->alias('e')
                    ->join('bd_main_category as c on c.mcid=e.mcid')
                    ->join('bd_model as m on m.mid=e.mid')
                    ->field('c.mcid,c.mc_name,m.model_name,e.exid,e.uid,e.ex_name,e.mcid,
                        e.mid,e.company,e.username,e.tel,e.license,e.province,e.city,e.area,e.street
                        ,e.is_auth,e.add_time,e.ex_intro,e.ex_logo')
                    ->where('exid='.$exid)
                    ->find();
        //获取所有经营类目
        $cate=M('main_category')->field('mcid,mc_name,sort_order')->order('sort_order desc')->select();
        $this->assign('cate',$cate);
        $this->assign('em',$ex_mess);
        $this->display();
    }

    //展厅信息修改
    public function mess_edit()
    {
        if($_POST){
            //对图片的处理,TP自带的upload，注意，提交表单的图片name为thumb
            $thumb = ($_FILES['thumb']['error']!=4) ? $_FILES['thumb'] : NULL;
            if(!empty($thumb))
            {
                $_POST['ex_logo'] = uploadimg($thumb);
            }
            }
            $intro=$_POST['intro'];
            $logo=$_POST['ex_logo'];
            $exid=session('exid');
            $res=M('exhibition_hall')->where('exid='.$exid)->save(array('ex_intro'=>$intro,'ex_logo'=>$logo));
            if($res){
                $this->success("修改成功",U('Setting/Ex_mess',array('exid'=>$exid)));
            }else{
                $this->success("修改失败",U('Setting/Ex_mess',array('exid'=>$exid)));
            }
    }

    //经营类目修改
    public function c_edit()
    {
        $mcid=I('post.mcid');
        $exid=session('exid');
        $res=M('exhibition_hall')->where('exid='.$exid)->save(array('mcid'=>$mcid));
        if($res){
            $data=TRUE;
        }else{
            $data=NULL;
        }
        echo json_encode($data);
    }


    //展厅短信通知
    public function Ex_note()
    {
        $this->display();
    }

    //展厅微信通知
    public function Ex_wechat()
    {
        $this->display();
    }

    //账号设置页面
    public function Ex_id()
    {
        $uid=session('sup_uid');
        $idmess=M('user')->field('uid,user_num,headimg,username,real_name,sign')
                         ->where('uid='.$uid)->find();
        $this->assign('id',$idmess);   
        $this->display();   
    }

    //账号修改
    public function id_edit()
    {
        if($_POST){
            //对图片的处理,TP自带的upload，注意，提交表单的图片name为thumb
            $thumb = ($_FILES['thumb']['error']!=4) ? $_FILES['thumb'] : NULL;
            if(!empty($thumb))
            {
                $_POST['headimg'] = uploadimg($thumb);
            }
            }
            $uid=session('sup_uid');
            $exid=session('exid');
            $img= $_POST['headimg'];
            $username=I('post.username');
            $sign=I('post.sign');
            $res=M('user')->where('uid='.$uid)->save(array('headimg'=>$img,
                'username'=>$username,'sign'=>$sign));
            if($res){
                 $this->success("修改成功",U('Setting/Ex_id',array('exid'=>$exid)));
            }else{
                $this->success("修改失败",U('Setting/Ex_id',array('exid'=>$exid)));
            }      
    }

    //员工账号设置
    public function staff()
    {
        $this->assign('xuhao',1);
        //查询所有的用户信息
        $data = D('user')->where('role=0')->select();
        $this->assign('data',$data);
        $this->display();
    }


    //新增员工
    public function add_staff()
    {
        if(IS_POST)
        {
            if($_FILES['file']['error'] != 0)
            {
                $this->error('上传错误');die;
            }
            $arr = array('jpg','png','jpeg','gif','bmp');
            $filename = $_FILES['file']['name'];
            $ext = pathinfo($filename,PATHINFO_EXTENSION);
            if(!in_array($ext,$arr))
            {
                $this->error("上传类型不正确");die;
            }
            $source = $_FILES['file']['tmp_name'];
            $dest = "./Uploads/image/".uniqid("S_",true).".".$ext;
            move_uploaded_file($source,$dest);
            $str = I('post.');
            //存放图片地址到数据表
            $str['headimg'] = substr($dest,1);
            //新增员工添加时间
            $str['add_time'] = time();
            //平台角色为供应商1
            $str['pt_role'] = 1;
            //存储展厅id
            $str['item'] = session('exid');
            //角色为0业务员
            $str['role'] = 0;
            //上级id
            $str['leader'] = session('sup_uid');
            $result = D('user')->add($str);
            if($result)
            {
                $this->success('添加成功',U('staff'),1);
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

    //删除员工
    public function del()
    {
        if(IS_POST)
        {
            //ajax批量删除员工
            $uid = I('post.uid');
            $resuit = D('user')->delete($uid);
            $this->ajaxReturn($result);
        }
        else
        {
            //删除单个的员工信息
            $uid = I('get.uid');
            $result = D('user')->where('uid='.$uid)->delete();
            if($result)
            {
                $this->success('删除成功');
            }
            else
            {
                $this->error('删除失败');
            }
        }
        
    }

    //修改员工状态
    public function modify()
    {
        if(IS_POST)
        {
            //ajax批量将员工状态设置为禁用
            $uid = I('post.uid');
            $cond['uid'] = array('in',$uid);
            $cond['status'] = 0;
            $str = D('user')->save($cond);
            $this->ajaxReturn($str);
        }
        else
        {
            //设置单个员工状态信息
            $zt = I('get.');
            D('user')->save($zt);
            $data = D('user')->where('role=0')->select();
            $this->assign('xuhao',1);
            $this->assign('data',$data);
            $this->display('staff');
        }
        
    }

    //根据姓名搜索员工
    public function search()
    {   
        //获取员工姓名
        $rname = I('post.rname');
        //把姓名加上单引号
        $rname = "$rname";
        $str = D('user')->where("real_name='%s' and role=%d",$rname,0)->find();
        $this->assign('data',$str);
        $this->display();
    }

    //修改员工信息
    public function staff_md()
    {
        if(IS_POST)
        {
            $data = I('post.');
            $result = D('user')->save($data);
            if($result)
            {
                $this->success('修改成功',U('staff'),1);
            }
            else
            {
                $this->error('修改失败');
            }
        }
        else
        {
            $uid = I('get.uid');
            $str = D('user')->where('uid='.$uid)->find();
            $this->assign('data',$str);
            $this->display();
        }
        
    }

    //角色权限设置
    public function role()
    {
        $this->display();
    }


    //新增角色权限
    public function add_role()
    {
        $this->display();
    }
}