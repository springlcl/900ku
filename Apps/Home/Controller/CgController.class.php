<?php
/**
 * 900ku前台pc端采购商平台首页(平台前端展示控制器)
 */
namespace Home\Controller;
use Common\Controller\BaseController;

class CgController extends WapController
{
	//采购商首页显示
	public function index()
	{
		//取出uid，假设uid为1
		// $uid=session('cg_uid');
		$uid=1;
		//项目，默认进入第一个项目，判断是采购商还是采购员
		//采购商
		$cgsres=M('user')->field('uid')->where('uid='.$uid.' and pt_role=2 and status=0 and item=0')->find();
		//采购员
		$cgyres=M('user')->field('uid,item')->where('uid='.$uid.' and pt_role=2 and status=0 and item!=0')->find();
		//项目展示
		if($cgsres){
			$item=M('cg_project')->field('pid,uid,pro_name')->where('uid='.$uid)->order('add_time desc')->select();
		}else{
			$item=M('cg_project')->field('pid,uid,pro_name')->where('pid in ('.$cgyres['item'].')')->order('add_time desc')->select();
		}
		//采购项目下自定义分组//首页展示第一个项目名称
		if(I('get.itemid')){
			$itemid=I('get.itemid');
			$where="g.pid=".$itemid;
			$it=M('cg_project')->field('uid,pid,pro_name')->where('pid='.$itemid)->find();
			$itname=$it['pro_name'];
			$itid=$it['pid'];
		}else{
			$where="g.pid=".$item[0]['pid'];
			$itname=$item[0]['pro_name'];
			$itid=$item[0]['pid'];
		}
		$cg_cate=M('cg_group')->alias('g')->field('g.fid,g.pid,g.fname')->where($where)->select();
		//常购商品,按项目
		$goods=M('order_goods')->alias('og')->field('o.oid,o.pid,og.gid,og.sku_id,g.goods_id,g.goods_name,g.goods_img,g.goods_thumb,g.rec_remark,g.goods_price,o.created')->join('bd_order as o on o.oid=og.oid')->join('bd_goods as g on og.goods_id=g.goods_id ')->order('o.created desc')->where('o.pid='.$itid)->limit('0,5')->select();
		// dump($goods);

		//准入供应商下的准入商品
		$yesex=M('admit')->alias('a')->field('a.pid,a.exid,a.add_time,e.ex_name')->join('bd_exhibition_hall as e on a.exid=e.exid')->where('a.pid='.$itid)->order('a.add_time desc')->select();
		// dump($yesex[1]['exid']);
		$yesgoods_one=M('access_table')->alias('a')->field('a.exid,a.pid,a.sku_id,a.gid,a.status,g.goods_id,g.goods_name,g.goods_img,g.goods_thumb,g.goods_price,g.rec_remark')->join('bd_goods as g on a.gid=g.goods_id')->where('a.exid='.$yesex[0]['exid'].' and a.pid='.$itid)->limit('0,10')->select();
		$yesgoods_two=M('access_table')->alias('a')->field('a.exid,a.pid,a.sku_id,a.gid,a.status,g.goods_id,g.goods_name,g.goods_img,g.goods_thumb,g.goods_price,g.rec_remark')->join('bd_goods as g on a.gid=g.goods_id')->where('a.exid='.$yesex[1]['exid'].' and a.pid='.$itid)->limit('0,10')->select();
		// dump($yesgoods_one);
		// dump($yesgoods_two);
		
		//准入


		$this->assign(array('group'=>$cg_cate,'items'=>$item,'itname'=>$itname,'itid'=>$itid,'yesex'=>$yesex,'yesgoods_one'=>$yesgoods_one,'yesgoods_two'=>$yesgoods_two,'goods'=>$goods));
		$this->display('Cg/index');
	}


	//准入供应商页面显示
	public function admit()
	{
		$pid=I('get.pid');
		//对应项目名称
		$itname=M('cg_project')->field('pid,pro_name')->where('pid='.$pid)->find();
		//该项目下的自定义分组
		$cg_cate=M('cg_group')->alias('g')->field('g.fid,g.pid,g.fname')->where('g.pid='.$pid)->select();
		//该项目准入的供应商
		$yesex=M('admit')->alias('a')->field('a.pid,a.exid,e.ex_name')->join('bd_exhibition_hall as e on a.exid=e.exid')->where('a.pid='.$pid)->select();
		//选用两个准入供应商，展示该项目下该展厅下已准入商品
		$yesgoods_one=M('access_table')->alias('a')->field('a.exid,a.pid,a.sku_id,a.gid,a.status,g.goods_id,g.goods_name,g.goods_img,g.goods_thumb,a.goods_price,a.xiugai,g.rec_remark,g.goods_sn')->join('bd_goods as g on a.gid=g.goods_id')->where('a.exid='.$yesex[0]['exid'].' and a.pid='.$pid)->limit('0,10')->select();
		$yesgoods_two=M('access_table')->alias('a')->field('a.exid,a.pid,a.sku_id,a.gid,a.status,g.goods_id,g.goods_name,g.goods_img,g.goods_thumb,a.goods_price,a.xiugai,g.rec_remark,g.goods_sn')->join('bd_goods as g on a.gid=g.goods_id')->where('a.exid='.$yesex[1]['exid'].' and a.pid='.$pid)->limit('0,10')->select();
		// dump($pid);
		$this->assign(array('itname'=>$itname,'cate'=>$cg_cate,'exs'=>$yesex,'one'=>$yesgoods_one,'two'=>$yesgoods_two));
		$this->display('Cg/admit');
	}


	//采购商品详情页
	public function cg_goods()
	{
		$sku_id=I('get.sku_id');
		$ids=M('access_table')->field('gid,sku_id')->where('sku_id='.$sku_id)->find();
		$id=$ids['gid'];
		$db=M('goods');
		//商品信息
		$goods=$db->alias('g')->field('g.goods_id,g.goods_sn,g.uid,g.exid,g.goods_cate_id,g.goods_type,g.goods_name,g.goods_thumb,g.goods_img,g.goods_num,g.is_creat_ord,gs.goods_price,g.goods_postage,g.remark,g.is_rec,g.goods_introduce,g.rec_remark,g.is_sell,g.sort,g.add_time,g.goods_weight,c.excname,e.ex_name,e.mcid,e.province,e.city,e.area,e.add_time,gs.sku_id,gs.goods_num')->join(' bd_exhibition_hall as e on g.exid=e.exid')->join(' bd_ex_cate as c on g.ex_goods_cid=c.excid')->join('bd_goods_sku as gs on g.goods_id=gs.goods_id')->where('gs.sku_id='.$sku_id)->find();
		//展厅主营类目
		$mc=M('main_category')->field('mc_name')->where('mcid='.$goods['mcid'])->find();
		//展厅累计销量
		$exsold=M('order')->field('exid')->where('exid='.$goods['exid'])->select();
		$exsnum=count($exsold);
		// dump($exsnum);
		//展厅评价
		$exscore=M('comment')->field('coid,uid,exid,oid,gid,score,speed_score,desc_score,service_score,rid,is_del,add_time')->where('exid='.$goods['exid'].' and is_del=0')->select();
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
		//商品评价显示
		$comment=M('comment')->alias('c')->field('c.coid,c.uid,c.exid,c.oid,c.gid,c.score,c.speed_score,c.desc_score,c.service_score,c.tag,c.content,c.rid,c.is_del,c.add_time')->where('c.gid='.$id.' and c.is_del=0')->select();
		$goodnum=count($comment);
		$Page= new \Think\Page($goodnum,7);
		$comments=M('comment')->alias('c')->field('c.coid,c.uid,c.exid,c.oid,c.gid,c.score,c.speed_score,c.desc_score,c.service_score,c.tag,c.content,c.rid,c.is_del,c.add_time,u.username')->join('bd_user as u on c.uid=u.uid')->where('c.gid='.$id.' and c.is_del=0')->order('c.add_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		//分页样式
        $Page -> setConfig('header','共%TOTAL_ROW%个');
        $Page -> setConfig('first','首页');
        $Page -> setConfig('last','共%TOTAL_PAGE%页');
        $Page -> setConfig('prev','上一页');
        $Page -> setConfig('next','下一页');
        $Page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
        $Page -> setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $show=$Page->show();
        //商品评价
        $score=M('comment')->field('coid,uid,exid,oid,gid,score,speed_score,desc_score,service_score,rid,is_del,add_time')->where('gid='.$id.' and is_del=0')->select();
        //商品评价描述相符desc_score
        for ($i=0; $i <count($score) ; $i++) { 
        	$sumds+=$score[$i]['desc_score'];
        }
        $desc_score=ceil($sumds/(count($score)));
        //商品评价满意度score
        for ($i=0; $i <count($score) ; $i++) { 
        	$sums+=$score[$i]['score'];
        }
        $cscore=ceil($sums/(count($score)));
        //商品评价发货及时speed_score
        for ($i=0; $i <count($score) ; $i++) { 
        	$sumss+=$score[$i]['speed_score'];
        }
        $speed_score=ceil($sumss/(count($score)));
        //商品服务评价满意度
        for ($i=0; $i <count($score) ; $i++) { 
        	$sumsc+=$score[$i]['service_score'];
        }
        $service_score=ceil($sumsc/(count($score)));

        //商品介绍
        $intro=M('goods')->field('goods_id,goods_attribute,goods_introduce')->where('goods_id='.$id)->find();
        $intros=$intro['goods_attribute'];
        $dintro=explode(',',$intros);
        for ($i=0; $i <count($dintro) ; $i++) { 
        	$mintro[]=explode(':',$dintro[$i]);
        }
        for ($i=0; $i <count($mintro) ; $i++) { 
        	$mintro[$i][0]=$mintro[$i][0].'&nbsp;&nbsp;:&nbsp;&nbsp;';
        }
        //商品规格属性展示sku表,该商品的规格，颜色等
        $attributes=M('goods_sku')->field('sku_id,attributes')->where('sku_id='.$sku_id)->find();
        $attrs=$attributes['attributes'];
        // dump($attrs);
        $gui=explode(',',$attrs);
        // dump($gui);
        for ($i=0; $i < count($gui); $i++) { 
        	$arr[]=explode(':',$gui[$i]);
        }
        // dump($arr);



        //商品图片
        $pic=M('goods')->field('goods_id,goods_sn,goods_thumb,goods_img,original_img')->where('goods_id='.$id)->find();
        $img=$pic['goods_img'];
        $img=explode(',',$img);
        $org=$pic['original_img'];
        $org=explode(',',$org);
        // dump($org);
        //渲染变量
		$this->assign(array('good'=>$goods,'mc'=>$mc,'goodnum'=>$goodnum,'comments'=>$comments,'page'=>$show,'mintro'=>$mintro,'intro'=>$intro,'ds'=>$desc_score,'s'=>$cscore,'ss'=>$speed_score,'sc'=>$service_score,'exsnum'=>$exsnum,'exds'=>$exdesc_score,'exs'=>$excscore,'exss'=>$exspeed_score,'arr'=>$arr,'img'=>$img,'org'=>$org));		
		$this->display('Cg/cg_goods');
	}

	//分类跳转供应商
	public function admit_f()
	{
		
	}
}
?>