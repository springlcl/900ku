<?php
/**
 * 900ku前台供应商pc端前台展厅首页(平台前端展示控制器)
 */
namespace Home\Controller;
use Common\Controller\BaseController;

class ShopController extends WapController
{
	public function index()
	{
		if(I('get.exid')){
			$exid=I('get.exid');
			session('gexid',$exid);
		}else{
			$exid=session('gexid');
		}
		$exgoods=new \Home\Model\goodsModel();
		$where='g.exid='.$exid.' and g.is_sell=0';
		$order='g.add_time desc';
		$shownum=9;
		$g=$exgoods->goodsdata($where,$order,$shownum);
		//商品数
		//该展厅的联系我们
		$link=M('user')->alias('u')->field('u.uid,u.username,u.real_name,u.mobile')->join('bd_exhibition_hall as e on u.uid=e.uid')->where(' e.exid='.$exid)->find();

		//展厅评价
		$exscore=M('comment')->field('coid,uid,exid,oid,gid,score,speed_score,desc_score,service_score,rid,is_del,add_time')->where('exid='.$exid.' and is_del=0')->select();
        //展厅评价描述相符exdesc_score
        for ($i=0; $i <count($exscore) ; $i++) { 
        	$exsumds+=$exscore[$i]['desc_score'];
        }
        $exdesc_score=ceil($exsumds/(count($exscore)));
        //展厅评价满意度exscore
        for ($i=0; $i <count($exscore) ; $i++) { 
        	$exsums+=$exscore[$i]['score'];
        }
        $excscore=ceil($exsums/(count($exscore)));
        //展厅评价发货及时exspeed_score
        for ($i=0; $i <count($exscore) ; $i++) { 
        	$exsumss+=$exscore[$i]['speed_score'];
        }
        $exspeed_score=ceil($exsumss/(count($exscore)));

		$this->assign( array('ex'=>$g['exmess'],'cate'=>$g['allcate'],'data'=>$g['data'],'page'=>$g['page'],'egn'=>$g['egn'],'link'=>$link,'exds'=>$exdesc_score,'exs'=>$excscore,'exss'=>$exspeed_score) );
		$this->display('Shop/index');
	}

	//按分类查找商品
	public function search_cate()
	{
		$excid=I('get.excid');
		$exid=session('gexid');
		$exgoods=new \Home\Model\goodsModel();
		$where='g.exid='.$exid.' and g.is_sell=0 and g.ex_goods_cid='.$excid;
		$order='g.add_time desc';
		$shownum=9;
		$g=$exgoods->goodsdata($where,$order,$shownum);
		//商品数
		//该展厅的联系我们
		$link=M('user')->alias('u')->field('u.uid,u.username,u.real_name,u.mobile')->join('bd_exhibition_hall as e on u.uid=e.uid')->where(' e.exid='.$exid)->find();

		//展厅评价
		$exscore=M('comment')->field('coid,uid,exid,oid,gid,score,speed_score,desc_score,service_score,rid,is_del,add_time')->where('exid='.$exid.' and is_del=0')->select();
        //展厅评价描述相符exdesc_score
        for ($i=0; $i <count($exscore) ; $i++) { 
        	$exsumds+=$exscore[$i]['desc_score'];
        }
        $exdesc_score=ceil($exsumds/(count($exscore)));
        //展厅评价满意度exscore
        for ($i=0; $i <count($exscore) ; $i++) { 
        	$exsums+=$exscore[$i]['score'];
        }
        $excscore=ceil($exsums/(count($exscore)));
        //展厅评价发货及时exspeed_score
        for ($i=0; $i <count($exscore) ; $i++) { 
        	$exsumss+=$exscore[$i]['speed_score'];
        }
        $exspeed_score=ceil($exsumss/(count($exscore)));

		$this->assign( array('ex'=>$g['exmess'],'cate'=>$g['allcate'],'data'=>$g['data'],'page'=>$g['page'],'egn'=>$g['egn'],'link'=>$link,'exds'=>$exdesc_score,'exs'=>$excscore,'exss'=>$exspeed_score) );
		$this->display('Shop/index');
	}

}
?>