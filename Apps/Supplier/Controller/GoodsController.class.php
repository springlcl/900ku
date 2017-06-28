<?php
/**
 * Created by PhpStorm.
 * User: Gaby
 * Date: 2017-04-12
 * Time: 10:03
 * 供应商首页控制器
 */
namespace Supplier\Controller;
use Supplier\Controller\SupController;
use Supplier\Model\GoodsModel;
use Think\Upload;
use Vendor\Csv;
class GoodsController extends SupController
{



    public function __construct()
    {
        parent::__construct();
        session('exid',1);
        $this -> exid = session('exid');
        $exid = $this -> exid;
        $this -> url = __CONTROLLER__;
        if(!IS_AJAX && IS_GET){
            // 展厅ID
            // 查询该展厅设置的商品数量惊爆下限
            $warn = M('exhibition_hall')-> field('warn_num')-> where('exid = '.$exid)->find();
            $this -> warn = $warn['warn_num'];
//            dump($this -> warn);die;
            // 查询库存低的商品数量
            $warning = M('goods')
                -> alias('g')
                -> join('bd_goods_sku AS s ON g.goods_id = s.goods_id')
                -> where('g.exid = '.$exid.' AND  s.goods_num < '.$this -> warn)
                -> count();
            $this -> warning = $warning;
        }elseif(IS_AJAX){
            if(IS_POST){
                // 查询该展厅设置的商品数量惊爆下限
                $warn = M('exhibition_hall')-> field('warn_num')-> where('exid = '.$exid)->find();
                $this -> warn = $warn['warn_num'];
            }

        }


    }

    public function index()
    {
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP-供应商PC端后台管理平台-商品管理</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }

    /*
     * 发布商品
     *
     * **/
    public function publish(){
    	if (IS_GET){
			$exid = $this -> exid;
            //获取商品分类
            $cate = M('goods_cate')
                -> field('gcid,gc_name,parent_id,type_id')
                -> order('parent_id,sort_order')
                -> select();
            //获取展厅内分类
            $exc = M('ex_cate')
                -> field('excid,excname')
                -> where('exid = '.$exid)
                -> order('sort_order')
                -> select();
            $model = new \Supplier\Model\Goods_attr_nameModel();
            // 使用function。php内的getChild方法获取商品子类
            $cates = getChild($cate,'gcid','parent_id',0,0);
            /* 将cates数组的最后一个单元赋值给last */
            $last = $cates[(count($cates)-1)];
            // 三元判断last是否为数组
            $last = is_array($last[0])?$last[0]:$last;
            $type = $last['type_id'];
            // 使用Goods_attr——name模型的getAttrs方法获取筛选属性
            $attr = $model -> getAttrs($type);
            /* 运费模板 */
            $postage = M('ex_logtem')
                -> field('lid,tem_name')
                -> where('exid = '.$exid)
                -> select();
            $property = M('property') -> select();
			// 分配变量
            $this -> assign('type',$type);
            $this -> assign('postage',$postage);
			$this -> assign('property', $property);
			$this -> assign('attr', $attr);
			$this -> assign('cates', $cates);
			$this -> assign('exc', $exc);
			$this -> display();
		}
    }

    /**
     * ajax查找分类及筛选属性
     */
    public function getCate(){
        if(IS_AJAX){
            $post = I('post.');
            $model = new \Supplier\Model\Goods_cateModel();
            $res = $model -> getCate($post['cate'],$post['level']);
            $this -> ajaxReturn($res);
        }
    }

    public function publish2(){
	    session('uid',1);
	    $user = session('uid');
	    // 接收页面参数
	    $post = I('post.');
	    $post['uid']    = $user;
	    // 实例化商品模型 添加商品
	    $model = new \Supplier\Model\GoodsModel();
	    // 添加商品,返回商品主键
	    $res = $model -> addGoods($post);
	    // 如果返回成功则添加sku表
	    if(is_numeric($res)){
	    	$model = new \Supplier\Model\Goods_skuModel();
	    	$sku = $model -> addSku($post,$res);
	    	if(!$sku){
			    $this -> error($sku,'',4);
		    }
	    }else{
	        $this -> error($res,'',3);
        }
	    // 有图片时添加图片
	    if(!empty($_FILES['pic'])){
	    	$model = new \Supplier\Model\GoodsModel();
	    	$img = $model -> updateImg($_FILES,$this->exid,$res);
	    	if(!is_array($img)){
	    		$this -> error($img,'',2);
		    }else{
	    	    //
                $big = explode(',', $img['goods_img']);
                $thumb = $big[0];
                /*取得图片缩放的地址*/
                $path = './Uploads/'.$thumb;
                /*取得图片的拓展名*/
                $ext = pathinfo($path,PATHINFO_EXTENSION);
                /* 实例化图形编辑类 */
                $class = new \Think\Image(\Think\Image::IMAGE_GD,$path);
                /* 略缩图存储路径 */
                $thu = './Uploads/'.$this->exid.'/'.$post['gid'].'/'.'thumb.'.$ext;
                // 生成150X150缩略图
                $class->thumb(150, 150,\Think\Image::IMAGE_THUMB_FILLED)->save($thu);
                $result = M('goods') -> where('goods_id = '.$res) -> save($img);
                // 将数据存入data数组带遍历至页面
                if(!!$result){
                    $data = explode(',',$img['goods_img']);
                }
            }
	    }
	    //获取商品分类
	    $cate = M('goods_cate')
		    -> field('gcid,gc_name,parent_id')
		    -> order('parent_id,sort_order')
		    -> select();

	    $cates = getChild($cate,'gcid','parent_id',0,0);
	    $this -> assign('cates',$cates);
	    $this -> assign('small',$data);
		$this -> display();
    }

    /**
     * edit方法编辑商品
     */
    public function edit(){
        $exid = $this -> exid;
        $gid = I('get.gid');
        //获取商品分类
        $cate = M('goods_cate')
            -> field('gcid,gc_name,parent_id,type_id')
            -> order('parent_id,sort_order')
            -> select();
        //获取展厅内分类
        $exc = M('ex_cate')
            -> field('excid,excname')
            -> where('exid = '.$exid)
            -> order('sort_order')
            -> select();
        // 实例化商品固有属性模型
        $model = new \Supplier\Model\Goods_attr_nameModel();
        // 查询商品
        $goods = M('goods')
            -> where('goods_id = '.$gid)
            -> find();
        // 取得父级分类
        $cates = getParent($cate,$goods['goods_cate_id'],'gcid','parent_id',0);
        // 将数组按照高到低分类顺序反转
        $cates = array_reverse($cates);
        // 定义商品type类型
        $type = $goods['goods_type'];
        // 由type获得商品的属性
        $attr = $model -> getAttrs($type);
        $goods_id = $goods['goods_id'];
        // 取得商品sku数据
        $sku = M('goods_sku')
            -> field('sku_id,goods_num,attributes,goods_price,goods_code,goods_sale_num,goods_weight')
            -> where('goods_id = '.$goods_id)
            -> select();
        /* 取得属性名 */
        $temp = explode(',',$sku[0]['attributes']);
        $pro = array();
        foreach ($temp as $value){
            $pro[] = explode(':',$value)[0];
        }
        /* 取得属性值 */
        $val = array();
        foreach($sku as $key => $value){
            $temp = explode(',',$value['attributes']);
            foreach($temp as $k => $v){
                $col = explode(':',$v)[1];
                $val[$k][] = $col;
                $val[$k] = array_unique($val[$k]);
            }

        }
        /* 属性值取出结束 */
        /* 遍历sku数据 */
        foreach($sku as $key => $value){
            $standard[$key] = array(
                'skuid'     => $value['sku_id'],
                'stock'     => $value['goods_num'],
                'price'     => $value['goods_price'],
                'code'      => $value['goods_code'],
                'sold'      => $value['goods_sale_num'],
                'weight'    => $value['goods_weight']
            );
        }
        $data = json_encode($standard);
        $attrs = explode(',',$goods['goods_attribute']);
        $basic = array();
        foreach($attrs as $v){
            $basic[] = explode(':',$v)[1];
        }
        $pics = explode(',',$goods['goods_img']);
        /* 取出运费模板 */
        $postage = M('ex_logtem')
            -> field('lid,tem_name')
            -> where('exid = '.$exid)
            -> select();
        $property = M('property') -> select();
//                dump($goods);die;
        $this -> assign('postage',$postage);        // 分配运费模板
        $this -> assign('pics',$pics);              // 分配图片
        $this -> assign('goods',$goods);            // 分配商品数据
        $this -> assign('action',U('edit2',array('gid'=>$gid)));
        $this -> assign('attrs',$attrs);            // 分配商品筛选属性
        $this -> assign('basic',$basic);            // 分配基础属性隐藏域数据
        $this -> assign('data',$data);              // 分配sku表格数据
        $this -> assign('pro',$pro);                // 分配sku属性名
        $this -> assign('val',$val);                // 分配sku属性值
        $this -> assign('property', $property);     // 分配属性列表数据
        $this -> assign('attr', $attr);             // 分配筛选属性表格
        $this -> assign('cates', $cates);           // 分配商品分类
        $this -> assign('exc', $exc);               // 分配展厅内分组
        $this -> display();
    }

    /**
     * edit2方法编辑
     */
    public function edit2(){
        $post = I('post.');
        $model = new \Supplier\Model\GoodsModel();
        $res = $model -> updateGoods($post);
        $model = new \Supplier\Model\Goods_skuModel();
        $sku = $model -> editSku($post,$post['gid']);
        if(isset($_FILES['pic']['name'][0]) && $_FILES['pic']['error'][0] == 0) {
            $model = new \Supplier\Model\GoodsModel();
            $img = $model->updateImg($_FILES, $this->exid, $post['gid']);
            if (!is_array($img)) {
                $this -> error($img,'',2);
            } else {
                $big = explode(',', $img['goods_img']);
            }
        }
        /*用户是否使用了新的略缩图作为展示图*/
        ($thumb = $post['pic'][0]) || ($thumb = $big[0]);
        foreach($post['pic'] as $value){
            $ori[] = substr($value,2);
        }
        /*取得图片缩放的地址*/
        $path = './Uploads/'.$thumb;
        /*取得图片的拓展名*/
        $ext = pathinfo($path,PATHINFO_EXTENSION);
        /* 实例化图形编辑类 */
        $class = new \Think\Image(\Think\Image::IMAGE_GD,$path);
        /* 略缩图存储路径 */
        $thu = './Uploads/'.$this->exid.'/'.$post['gid'].'/'.'thumb.'.$ext;
        // 生成150X150缩略图
        $class->thumb(150, 150,\Think\Image::IMAGE_THUMB_FILLED)->save($thu);
        /* 连接商品小图字符串 */
        $small = implode(',',$post['pic']);
        /* 连接商品原图字符串 */
        $original = implode(',',$ori);
        /* 构造数据数组 */
        $image = array(
                'goods_thumb'   => $this->exid.'/'.$post['gid'].'/thumb.'.$ext,
                'goods_small'   => $small.','.$img['goods_small'],
                'original_img'  => $original.','.$img['original_img'],
            );
        $result = M('goods') -> where('goods_id = '.$post['gid']) -> save($image);

        // 将数据存入data数组带遍历至页面

        if($result){
            $data = explode(',',$image['goods_small']);
        }


        $cate = M('goods_cate')
            -> field('gcid,gc_name,parent_id')
            -> order('parent_id,sort_order')
            -> select();
        $cates = getChild($cate,'gcid','parent_id',0,0);
        $this -> assign('cates',$cates);
        $this -> assign('small',$data);
        $this -> display();



    }

    /*
     * ajax获取分类商品
     *
     * **/
    public function catesGetGoods(){
    	$post = I('post.');
		$cate = $post['cate'];
	    $level = $post['level'];
	    $exid = $this -> exid;
	    $page = $post['page'] ? $post['page'] : 0;
	    if(is_numeric($cate)){
			$model = new \Supplier\Model\Goods_cateModel();
			$category = $model -> getCate($cate,$level,false);
			$arr['cate'] = $category;
		}
		$length = count($category);
		$last = $category[$length];
		$len = count($last);
		$cate = $last[$len-1];
	    $model = new \Supplier\Model\GoodsModel();
	    $goods = $model -> getGoods($cate['cid'],$exid,$page);
	    $arr['data'] = $goods;
		$this -> ajaxReturn($arr);
    }


    /*
     * 出售中的商品
     *
     * **/
    public function onsell(){
    	$exid = $this -> exid;
    	// 查询展厅内分组
		$exCate = M('ex_cate')
			-> field('excid,excname')
			-> where('exid = '.$exid)
			-> order('sort_order DESC')
			-> select();
		// 查询出售中的商品
		$goods = M('goods')
			-> field('goods_id,goods_thumb,goods_name,goods_price,goods_sale_num,goods_pv,add_time,sort,goods_num,goods_link,goods_qcore')
			-> where('exid = '.$exid.' AND goods_num > 0 AND is_sell = 1')
			-> order('add_time DESC')
			-> limit(0,15)
			-> select();
		$count = M('goods')
			->where('exid = '.$exid.' AND goods_num > 0 AND is_sell = 1')
			->count();
		// 分配数据
	    $this -> assign('count',$count);
		$this -> assign('goods',$goods);
		$this -> assign('exCate',$exCate);
	    $this -> assign('empty','<div style=\'text-align:center;font-size: 20px;font-weight: bold;\'>没有出售中的商品</div>');
		// 显示页面
    	$this -> display();
    }


	/**
	 * [getGoods 只允许ajax方式请求,通过取得来源页面的方法返回不同的商品数据]
	 * @return [array]        [商品数组]
	 */
    public function getGoods(){
    	if(IS_AJAX){
    		// 将请求参数存入变量
    		$post = I('post.');
    		// 取得展厅ID
    		$exid = $this -> exid;
    		// 通过splitURL方法取得来源页面的action
		    $action = splitURL($_SERVER['HTTP_REFERER'],'action');
		    // 创建商品模型实例
		    $model = new \Supplier\Model\GoodsModel();
		    switch ($action){               // 分支结构->不同页面来源取得不同的限制条件以进行查询
			    case 'onsell':
				    // 构建出售中的商品限制条件
				    $where = 'exid = '.$exid.' AND goods_num > 0 AND is_sell = 1';
				    break;
			    case 'soldOut':
				    // 构建售罄的商品限制条件
				    $where = 'exid = '.$exid.' AND goods_num = 0';
				    break;
			    case 'stock':
				    // 构建仓库中的商品限制条件
				    $where = 'exid = '.$exid.' AND is_sell = 0';
				    break;
		    }
		    $goods = $model -> selectGoods($post,$where);
		    $goods['action'] = $action;
		    // ajax返回数据
		    $this->ajaxReturn($goods);
	    }
    }

	/**
	 * [exportTab 只允许ajax方式请求,通过取得来源页面的方法返回不同的商品数据]
	 * @return [array]        [商品数组]
	 */
	public function exportTab(){
			// 将请求参数存入变量
			$post = I('post.');
			// 取得展厅ID
			$exid = $this -> exid;
			// 取得输出表格范围
			$wide = $post['wide'];
			$csv = new Csv();
			// 通过splitURL方法取得来源页面的action
			$action = splitURL($_SERVER['HTTP_REFERER'],'action');
			$model = new \Supplier\Model\GoodsModel();
			switch ($action){
				case 'onsell':
					// 构建出售中的商品限制条件
					$where = 'exid = '.$exid.' AND goods_num > 0 AND is_sell = 1';
					break;
				case 'soldOut':
					// 构建售罄的商品限制条件
					$where = 'exid = '.$exid.' AND goods_num <= goods_warn_num';
					break;
				case 'stock':
					// 构建仓库中的商品限制条件
					$where = 'exid = '.$exid.' AND is_sell = 0';
					break;
			}
			// 获取数据
			if($wide==0){
				$goods = $model -> selectGoods($post,$where,false);
			}else{
				$goods['result'] = M('Goods') -> field('goods_name AS gname,goods_num AS stock,goods_price AS price,goods_pv AS pv,goods_sale_num AS sold,goods_link AS link,goods_qcore AS qrcode,add_time AS crea') -> where('exid = '.$exid) -> select();
			}
			$goods = init_time($goods,'Y-m-d',true);
		if(IS_AJAX){
			$arr['count'] = count($goods['result']);
			$this->ajaxReturn($arr);
		}else{
			$title = array('商品名称','商品库存','商品价格','商品浏览量','商品销量','商品链接','二维码地址','创建时间');
			$csv -> put_csv($goods['result'],$title);
		}
	}

	/*
	 * 删除商品只允许ajax请求请求参数包含商品主键ID\展厅ID
	 * (待完善,采购商部分没有准入商品字段)
	 */
	public function delGoods(){
		if(IS_AJAX){
			$post = I('post.');
			$exid = $this -> exid;
			$gid = $post['gid'];
			$action = splitURL($_SERVER['HTTP_REFERER'],'action');
			if(is_array($gid)){
				$gids = implode(',',$gid);
				$map['goods_id'] = array('in',$gids);
				// 首先将该商品下的所有库存规格删除
				$res1 = M('goods_sku') -> where($map) -> delete();
				// 再删除该商品的
				$res2 = M('goods') -> delete($gids);
			}else{
				// 首先将该商品下的所有库存规格删除
				$res1 = M('goods_sku') -> where('goods_id = '.$gid) -> delete();
				// 再删除该商品的
				$res2 = M('goods') -> where('goods_id = '.$gid.' AND exid = '.$exid) -> delete();
			}

			if($res2){
				$arr = array('message'=>'删除成功!','action'=>$action);
			}else{
				$arr = array('message'=>'删除商品失败!','action'=>$action);
			}
			exit($this->ajaxReturn($arr));
		}
	}

	/*
	 * 下载二维码
	 */
	public function downloadQRcode(){
		if (IS_POST) {
			$path = '.' . I('path');
			header("Content-type: octet/stream");
			header("Content-disposition:attachment;filename=" . $path . ";");
			header("Content-Length:" . filesize($path));
			readfile($path);
			exit;
		}
	}

	/*
	 * 获取商品库存规格
	 */
	public function getStock(){
		if(IS_AJAX){
			// 接收参数
			$post = I('post.');
			// 查询条件
			$where = 'goods_id = '.$post['gid'];
			// 查询域
			$field = 'sku_id AS sku,goods_num AS stock,attributes AS attr,goods_price AS price,goods_sale_num AS sold';
			$stock = M('goods_sku')
				-> field($field)
				-> where($where)
				-> select();
			$first = explode(',',$stock[0]['attr']);
			$content = '<table class="guige_box"><tr>';
			foreach ($first as $value){
				$content .= '<th>'.explode(':',$value)[0].'</th>';
			}
			$content .= '<th>售价</th><th>库存</th><th>销量</th></tr>';
			foreach ($stock as $key => $value){
				$content .= '<tr>';
				$a_v = explode(',',$value['attr']);
				foreach ($a_v as $index => $val){
					$content .= '<td>'.explode(':',$val)[1].'</td>';
				}
				$content .= '<td>￥'.$value['price'].'</td><td>'.$value['stock'].'</td><td>'.$value['sold'].'</td></tr>';
			}
			$content .= '</table>';
			$arr = array(
				'data'      => $content,
			);
			$this -> ajaxReturn($arr);
		}
	}

	/*
	 * 更该分组
	 */
	public function changeGroup(){
		$post = I('post.');
		$id = implode(',',$post['ids']);
		$model = M('goods');
		$sql = 'UPDATE bd_goods SET `ex_goods_cid` = '.$post['group'].' WHERE `goods_id` in ('.$id.')';
		$result = $model -> execute($sql);
        $action = splitURL($_SERVER['HTTP_REFERER'],'action');
        if (!$result){
			$arr = array(
				'message'   => '未能成功更改分组',
				'action'    => $action,
			);
		}else{
			$arr = array(
				'message'   => '更新分组成功!',
				'action'    => $action,
			);
		}
		exit($this->ajaxReturn($arr));
	}


	/*
	 * 下架商品
	 */
	public function soldOutGoods(){
		$post = I('post.');
		// 创建模型实例
		$model = M('goods');
		// 获取来源动作
		$action = splitURL($_SERVER['HTTP_REFERER'],'action');
		// 更新的SQL语句
//        dump($action);die;
		if ($action == 'stock'){
			$sql = 'UPDATE bd_goods SET `is_sell` = '.$post['status'].' WHERE `goods_id` = '.$post['gid'];
			$result = $model -> execute($sql);
			if (!$result){
				$arr = array(
					'message'   => '上架商品失败',
					'action'    => $action,
				);
			}else{
				$arr = array(
					'message'   => '上架成功',
					'action'    => $action,
				);
			}
		}else{
			$gid = implode(',',$post['gid']);
			$sql = 'UPDATE bd_goods SET `is_sell` = '.$post['status'].' WHERE `goods_id` in ('.$gid.')';
			$result = $model -> execute($sql);
			if (!$result){
				$arr = array(
					'message'   => '下架商品失败',
					'action'    => $action,
				);
			}else{
				$arr = array(
					'message'   => '下架成功',
					'action'    => $action,
				);
			}
		}
		exit($this->ajaxReturn($arr));
	}

    /*
     * 售罄商品
     *
     * **/
    public function soldOut(){
    	$exid = $this -> exid;
	    // 查询展厅内分组
	    $exCate = M('ex_cate')
		    -> field('excid,excname')
		    -> where('exid = '.$exid)
		    -> order('sort_order DESC')
		    -> select();
	    // 查询出售中的商品
	    $goods = M('goods')
		    -> field('goods_id,goods_thumb,goods_name,goods_price,goods_sale_num,goods_pv,add_time,sort,goods_num,goods_link,goods_qcore')
		    -> where('exid = '.$exid.' AND goods_num = 0')
		    -> order('add_time DESC')
		    -> limit(0,15)
		    -> select();
	    $count = M('goods')
		    ->where('exid = '.$exid.' AND goods_num = 0')
		    ->count();
	    // 分配数据
	    $this -> assign('count',$count);
	    $this -> assign('goods',$goods);
	    $this -> assign('exCate',$exCate);
	    $this -> assign('empty','<div style=\'text-align: center;font-size: 20px;font-weight: bold;height: 50px;line-height: 50px\'>没有即将售罄的商品</div>');
	    // 显示页面
    	$this -> display();
    }

    /*
     * 仓库中的商品
     *
     * **/
    public function stock(){
	    $exid = $this -> exid;
	    // 查询展厅内分组
	    $exCate = M('ex_cate')
		    -> field('excid,excname')
		    -> where('exid = '.$exid)
		    -> order('sort_order DESC')
		    -> select();
	    // 查询出售中的商品
	    $goods = M('goods')
		    -> field('goods_id,goods_thumb,goods_name,goods_price,goods_sale_num,goods_pv,add_time,sort,goods_num,goods_link,goods_qcore')
		    -> where('exid = '.$exid.' AND is_sell = 0')
		    -> order('add_time DESC')
		    -> limit(0,15)
		    -> select();
	    $count = M('goods')
		    ->where('exid = '.$exid.' AND is_sell = 0')
		    ->count();
	    // 分配数据
	    $this -> assign('count',$count);
	    $this -> assign('goods',$goods);
	    $this -> assign('exCate',$exCate);
	    $this -> assign('empty','<div style=\'text-align:center;font-size: 20px;font-weight: bold;\'>库存商品为空</div>');
	    // 显示页面
	    $this -> display();
    }

    /*
     * 商品分组
     *
     * **/
    public function group(){
    	$exid = $this -> exid;
    	$model = new \Supplier\Model\Ex_cateModel();
    	$cate = $model -> getCateDetail($exid);
    	//分配数据
	    $this -> assign('cate',$cate['cate']);
	    $this -> assign('count',$cate['count']);
    	$this -> display();
    }

    /*
     * 库存报警
     *
     * **/
    public function alert(){
        $exid = $this -> exid;
        $exid = $this -> warn;
        $num = M('exhibition_hall') -> field('warn_num') -> where('exid = '.$exid) -> find();
        $model = M('goods');
        $warn = $model
            -> alias('g')
            -> field('s.sku_id,g.goods_thumb,g.goods_name,s.goods_price,s.goods_sale_num,g.goods_pv,g.add_time,s.goods_num,s.attributes')
            -> join('bd_goods_sku AS s ON g.goods_id = s.goods_id')
            -> where('g.exid = '.$exid.' AND s.goods_num < '.$this -> warn)
            -> order('s.goods_id')
            -> limit('0,15')
            -> select();
        $this -> assign('num',$num['warn_num']);
        $this -> assign('goods',$warn);
    	$this -> display();
    }



    /*
     * 获取低库存警报商品
     */
    public function getAlertGoods(){
        if(IS_AJAX){
            $post = I('post.');
//            dump($this->warn);die;
            $size = 15;
            $page = empty($post['page']) ? 1 : $post['page'];
            $start = ($page-1)*$size;
            $where = 'g.exid = '.$this->exid.' AND s.goods_num < '.$this -> warn;
            $where .= !$post['key'] ? '' : ' AND ( g.goods_name LIKE "%'.$post['key'].'%" OR g.goods_name LIKE "%'.$post['key'].'" OR g.goods_name LIKE "'.$post['key'].'%")';
            $goods = M('goods')
                -> alias('g')
                -> field('s.sku_id AS sid,g.goods_thumb AS gthumb,g.goods_name AS gname,s.goods_price AS gprice,s.goods_sale_num AS sales,g.goods_pv AS pv,g.add_time AS crea,g.goods_num AS stock,s.attributes AS attrs')
                -> join('bd_goods_sku AS s ON g.goods_id = s.goods_id')
                -> where($where)
                -> order('g.goods_id')
                -> limit($start.','.$size)
                -> select();
            $goods = init_time($goods,'',true);
            $count = M('goods')
                -> alias('g')
                -> join('bd_goods_sku AS s ON g.goods_id = s.goods_id')
                -> where($where)
                -> count();
            $arr = array(
                'result'    => $goods,
                'count'     => $count,
            );
            $this -> ajaxReturn($arr);

        }
    }

    /*
     * 更改sku商品库存
     */
    public function alterSKU(){
        if(IS_AJAX){
            $post = I('post.');
            $data = array(
                'sku_id'    => $post['sku'],
                'goods_num' => $post['num'],
            );
            $result = M('goods_sku') -> save($data);
            if(!$result){
                $arr = array(
                    'status'    => false,
                    'message'   => '增加库存失败!',
                );
            }else{
                $num = M('goods_sku')
                    -> field('goods_num')
                    -> where('sku_id = '.$data['sku_id'])
                    -> find();
                $arr = array(
                    'status'    => true,
                    'message'   => '增加库存成功,现有'.$num['goods_num'].'件商品',
                );
            }
            exit($this->ajaxReturn($arr));
        }
    }


    /*
     * 删除该类型sku
     */
    public function delSKU(){
        if(IS_AJAX){
            $post = I('post.');
            $ids = implode(',',$post['sku']);
            $result = M('goods_sku') -> delete($ids);
            if(!$result){
                $arr = array(
                    'message'   => '删除失败'
                );
            }else{
                $arr = array(
                    'message'   => '删除成功!'
                );
            }
            exit($this->ajaxReturn($arr));
        }
    }

    /*
     * 更改展厅最低商品报警下限
     */
    public function alterWarn(){
        if(IS_AJAX){
            $post = I('post.');
            $data = array(
                'warn_num'  => $post['num'],
            );
            // 更新最低报警下限数值
            $result = M('exhibition_hall')
                -> where('exid = '.$this -> exid)
                -> save($data);
            if(!$result){
                $arr = array('message'=>'更新失败','status'=>false);
            }else{
                $arr = array('message'=> '更新成功','status'=>true);
            }
            exit($this->ajaxReturn($arr));
        }

    }
    /*
     * 商品评价
     *
     * **/
    public function evaluate(){
        if(IS_AJAX){
            $exid = $this -> exid;
            $page = I('post.page');
            $size = 15;
            $start = ($page-1)*$size;
            $result = M('comment')
                -> alias('c')
                -> field('c.coid,c.score,c.tag,c.content,c.add_time,u.headimg,u.username,g.goods_sn,g.goods_name,goods_thumb')
                -> join('bd_goods AS g ON c.gid = g.goods_id')
                -> join('bd_user AS u ON c.uid = u.uid')
                -> where('c.exid = '.$exid.' AND c.is_del = 0')
                -> order('add_time DESC')
                -> limit($start.','.$size)
                -> select();
            $result = init_time($result,'',true);
            exit($this->ajaxReturn($result));
        }else{
            $exid = $this -> exid;
            // 查找展厅下未删除的评论
            $eva = M('comment')
                -> alias('c')
                -> field('c.coid,c.score,c.tag,c.content,c.add_time,u.headimg,u.username,g.goods_sn,g.goods_name,goods_thumb')
                -> join('bd_goods AS g ON c.gid = g.goods_id')
                -> join('bd_user AS u ON c.uid = u.uid')
                -> where('c.exid = '.$exid.' AND c.is_del = 0')
                -> order('add_time DESC')
                -> limit('0,15')
                -> select();
            // 查找评论数量作为分页凭证
            $count = M('comment')
                -> alias('c')
                -> join('bd_goods AS g ON c.gid = g.goods_id')
                -> join('bd_user AS u ON c.uid = u.uid')
                -> where('c.exid = '.$exid.' AND c.is_del = 0')
                -> count();
            // 分配数据到模板
            $this -> assign('count',$count);
            $this -> assign('evaluate',$eva);
            $this -> assign('empty','<div style=\'text-align:center;font-size: 20px;font-weight: bold;\'>暂无商品评论</div>');
            $this -> display();
        }

    }

    /*
     * 新建展厅内分组
     */
    public function newClassify(){
    	$post = I('post.');
    	// 布置写入数据
    	$data = array(
    	    'exid'      => $this -> exid,
		    'excname'   => $post['cate'],
		    'add_time'  => time(),
	    );
    	// 写入新分组到数据库
    	$result = M('ex_cate')
		    -> data($data)
		    -> add();
    	// 判断添加结果
    	if(is_numeric($result)){
			$arr = array(
				'status'        => true,
				'message'       => '添加新分组成功!',
			);
	    }else{
    		$arr = array(
    			'status'        => false,
    			'message'       => '添加失败'
		    );
	    }
	    // 返回json数据
	    exit($this->ajaxReturn($arr));
    }

    /*
     * 展厅内分组页面获取筛选的分组
     */
    public function getClassify(){
    	$post = I('post.');
    	// 展厅ID
    	$exid = $this -> exid;
    	// 分组名称
    	$cate = $post['cate'];
    	// 分页页码
    	$page = $post['page'];
    	$model = new \Supplier\Model\Ex_cateModel();
    	$cate = $model -> getCateDetail($exid,$cate,$page);
    	$this -> ajaxReturn($cate);
    }

    /*
     * 更改分组名称
     */
    public function alterClassify(){
    	$post = I('post.');
    	$cate = $post['cate'];
    	$exid = $this -> exid;
    	$cid = $post['cid'];
    	$result = M('ex_cate') -> where('exid = '.$exid.' AND excid = '.$cid) ->setField('excname',$cate);
    	if(!$result){
    		$arr = array(
    			'status'    => false,
			    'message'   => '更改失败',
		    );
	    }else{
    		$arr = array(
    		    'status'    => true,
			    'message'   => '更改成功!',
		    );
	    }
	    $this ->ajaxReturn($arr);
    }

    /*
     * 删除分类
     */
    public function delClassify(){
    	$post = I('post.');
    	$cid = is_array($post['cid']) ? implode(',',$post['cid']) : $post['cid'];
    	$exid = $this -> exid;
    	$result = M('ex_cate') -> delete($cid);
	    if(!$result){
		    $arr = array(
			    'status'    => false,
			    'message'   => '删除分类失败',
		    );
	    }else{
		    $arr = array(
			    'status'    => true,
			    'message'   => '删除分类成功!',
		    );
	    }
	    $this ->ajaxReturn($arr);
    }
}