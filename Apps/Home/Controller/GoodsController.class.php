<?php
/**
 * 900ku前台pc端商品首页(平台前端展示控制器)
 */
namespace Home\Controller;
use Common\Controller\BaseController;

class GoodsController extends WapController
{
	public function index()
	{
	$id=I('get.id');
	$db=M('goods');
	//商品信息
	$goods=$db->alias('g')->field('g.goods_id,g.goods_sn,g.uid,g.exid,g.goods_cate_id,g.goods_type,g.goods_name,g.goods_thumb,g.goods_img,g.goods_num,g.is_creat_ord,g.goods_price,g.goods_postage,g.remark,g.is_rec,g.goods_introduce,g.rec_remark,g.is_sell,g.sort,g.add_time,g.goods_weight,c.excname,e.ex_name,e.mcid,e.province,e.city,e.area,e.add_time')->join(' bd_exhibition_hall as e on g.exid=e.exid')->join(' bd_ex_cate as c on g.ex_goods_cid=c.excid')->where('g.goods_id='.$id)->find();
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
        //商品规格属性展示sku表
        $result=M('goods_sku')->field('goods_id,attributes')->where('goods_id='.$id)->select();
        //dump($result);
        //该商品的规格，颜色等
        $attributes=$result[0]['attributes'];
        $attr=explode(',',$attributes);
        for ($i=0; $i <count($attr) ; $i++) { 
        	$att[]=explode(':',$attr[$i]);
        }
        for ($i=0; $i <count($att) ; $i++) { 
        	$arr[]=$att[$i][0];
        }
        //相同规格下不同属性值
        // $n=0;
        // for ($p=0; $p <count($arr) ; $p++) {    
        // $temp1='one'.$n;
        // $temp2='two'.$n;
        // $temp3='three'.$n;
        //         for ($i=0; $i <count($result) ; $i++) { 
        //                 $$temp1=array();
        //              $$temp1=explode(',',$result[$i]['attributes']);
        //              dump($$temp1);
        //         }
                
        //         for ($i=0; $i <count($$temp1) ; $i++) {
        //                 $$temp2=array();
        //              $$temp2=explode(':',$$temp1[$i][$p]);        
        //         }

        //         for ($i=0; $i <count($$temp2) ; $i++) {
        //                  $$temp3=array();
        //              $$temp3=$$temp2[$i][1];       
        //         } 
        //         $four[$p]=$$temp3; 
        // $n++;
        // }
        
        // dump($four);

                //第一个规格下属性
                for ($i=0; $i <count($result) ; $i++) { 
                     $one[]=explode(',',$result[$i]['attributes']);
                }
                
                for ($i=0; $i <count($one) ; $i++) {
                     $two1[]=explode(':',$one[$i][0]);        
                }

                for ($i=0; $i <count($two1) ; $i++) {
                     $three1[]=$two1[$i][1];       
                } 
                $three1['type']=$arr[0];
                $four[$arr[0]]=array_unique($three1); 
                //第二个规格属性
                for ($i=0; $i <count($one) ; $i++) {
                     $two2[]=explode(':',$one[$i][1]);        
                }

                for ($i=0; $i <count($two2) ; $i++) {
                     $three2[]=$two2[$i][1];       
                } 
                $three2['type']=$arr[1];
                $four[$arr[1]]=array_unique($three2); 
                //第三个规格属性
                for ($i=0; $i <count($one) ; $i++) {
                     $two3[]=explode(':',$one[$i][2]);        
                }

                for ($i=0; $i <count($two3) ; $i++) {
                     $three3[]=$two3[$i][1];       
                } 
                $three3['type']=$arr[2];
                $four[$arr[2]]=array_unique($three3); 

                // $four= array_flip(array_flip($four));
                // $four= array_flip($four);
        // dump($four);
        // dump($two);
        // dump($three);

        //商品图片
        $pic=M('goods')->field('goods_id,goods_sn,goods_thumb,goods_img,original_img')->where('goods_id='.$id)->find();
        $img=$pic['goods_img'];
        $img=explode(',',$img);
        $org=$pic['original_img'];
        $org=explode(',',$org);
        // dump($org);
        //渲染变量
		$this->assign(array('good'=>$goods,'mc'=>$mc,'goodnum'=>$goodnum,'comments'=>$comments,'page'=>$show,'mintro'=>$mintro,'intro'=>$intro,'ds'=>$desc_score,'s'=>$cscore,'ss'=>$speed_score,'sc'=>$service_score,'exsnum'=>$exsnum,'exds'=>$exdesc_score,'exs'=>$excscore,'exss'=>$exspeed_score,'arr'=>$arr,'img'=>$img,'org'=>$org,'four'=>$four));
		$this->display('Goods/index');
	}

	//商品页面（由分类进入）
	public function goods()
	{
		$cid=I('get.cid');
		$cname=M('goods_cate')->field('gc_name,gcid')->where('gcid='.$cid)->find();
		//查找没有下级分类的最下级分类
		$sql="select * from bd_goods_cate where gcid not in(
        select t1.parent_id from bd_goods_cate t1 join bd_goods_cate t2 on t1.parent_id = t2.gcid) 
        and (
        parent_id!=0 or (parent_id=0 and gcid not in(
        select t1.parent_id from bd_goods_cate t1 join bd_goods_cate t2 on t1.parent_id = t2.gcid
        )))";
        $lastc=M()->query($sql);
        $exgoods=new \Home\Model\goodsModel();
        if($cid==0){
        	$where='g.is_sell=0 ';
        }else{
        	$where='g.goods_cate_id='.$cid.' and g.is_sell=0 ';
        }
		
		$order='g.add_time desc';
		$shownum=30;
		$g=$exgoods->goodsdata($where,$order,$shownum);

		$this->assign(array('lastc'=>$lastc,'goods'=>$g['data'],'page'=>$g['page'],'cname'=>$cname));
		$this->display('Goods/goods');
	}
}
?>