<?php
/**
 * Created by PhpStorm.
 * User: wwkil
 * Date: 2017/5/8
 * Time: 14:14
 */

namespace Supplier\Model;
use Think\Model;
use Think\Upload;
use Think\Image;

class GoodsModel extends Model
{
	/*
	 * @function addGoods 由post数组提交商品信息,并将其商品必要数据入库
	 * @para    [array] $data  post数组的数据
	 * @return  [mixed] 成功添加则返回新添加商品主键ID,否则返回错误原因
	 * **/
	public function addGoods($data){
		// 商品自身属性
		$attr = implode(',',$data['group']);
		// 分支判断运费计算方式
		if($data['isFix']){
			$postage = $data['postage'];
			$freight = 0;
		}else{
			$postage = 0;
			$freight = $data['freight'];
		}
		$showStock = $data['showStock'] === null ? 1 : $data['showStock'];
		$allowBook = $data['allowBook'] === null ? 0 : $data['showStock'];
		$rec = $data['is_rec'] === null ? 0 : $data['showStock'];
		// 初始化数组
		$init = array(
			'exid'              => session('exid'),
			'ex_goods_cid'      => $data['excid'],
			'goods_type'        => $data['goods_type'],
			'uid'               => $data['uid'],
			'goods_sn'          => $data['goodsCode'],
			'goods_cate_id'     => $data['cate'],
			'goods_attribute'   => rtrim($attr,','),
			'goods_name'        => $data['goodsName'],
			'goods_num'         => $data['stockTotal'],
			'is_show_gnum'      => $showStock,
			'is_creat_ord'      => $allowBook,
			'goods_price'       => $data['goodsPrice'],
			'goods_postage'     => $postage,
			'freight_id'        => $freight,
			'goods_weight'      => $data['kg'],
			'goods_forge_sold'  => $data['fake'],
			'is_rec'            => $rec,
			'rec_remark'        => $data['rec'],
			'add_time'          => time()
		);
		$result = $this -> add($init);
		if($result){
			return $result;
		}else{
			$msg = $this -> getError();
			return $msg;
		}
	}

	public function updateImg($file,$exid,$gid){
		$config = array(
			'mimes'         =>  array(), //允许上传的文件MiMe类型
			'maxSize'       =>  0, //上传的文件大小限制 (0-不做限制)
			'autoSub'       =>  true, //自动子目录保存文件
			'subName'       =>  array('getSubPath', $gid), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
			'rootPath'      =>  './Uploads/', //保存根路径
			'savePath'      =>  session('exid'), //保存路径
			'saveName'      =>  array('getFileName', ''), //上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
		);
		$length = count($file['pic']['name']);
		if($_FILES['pic']['error'][$length-1] == 4){
			array_pop($file['pic']['name']);
			array_pop($file['pic']['type']);
			array_pop($file['pic']['tmp_name']);
			array_pop($file['pic']['error']);
			array_pop($file['pic']['size']);
		}
		// 实例化上传类
		$upload = new Upload($config);
		$image = new \Think\Image();
		// 取得上传结果待判断
		$stat = $upload -> upload($file);
		$original = '';
		$small = '';
		$thumb = '';
		if(is_array($stat)){
			foreach($stat as $key => $value){
				$path = $value['savepath'].$value['savename'];
				// 打开上传的图片
				$image->open('./Uploads/'.$path);
				// 生成填充的640X640的缩略图
				$img = './Uploads/'.$value['savepath'].'s_'.$value['savename'];
				$image -> thumb(640,640,\Think\Image::IMAGE_THUMB_FILLED) ->save($img);
				// 将上传的第一张图片存为缩略图
				if($key == 0){
					// 缩略图保存的路径
					$thumb = './Uploads/'.$value['savepath'].'thumb.'.$value['ext'];
				}
				$img = ltrim($img,'./Uploads/');
				$small .= $img.',';
				$original .= $path.',';
			}
			$small = rtrim($small,',');
			$original = rtrim($original,',');
			$thumb = ltrim($thumb,'./Uploads/');
			$data = array(
				'goods_thumb'   => $thumb,
				'goods_img'     => $small,
				'original_img'  => $original
			);

            return $data;
		}else{
			return $this -> getError();
		}
	}

	public function getGoods($cate,$exid,$page=0){
		// 每页显示数量
		$size = 8;
		// 起始页在mysql中的行数
		$start = $page == 0 ? 0 : ($page-1)*$size;
		// 点击分类下拉菜单触发查询
		if(is_numeric($cate)){
			$map = array(
				'exid'              => $exid,
				'goods_cate_id'     => $cate,
			);
			$goods = $this
				-> field('goods_id AS gid,goods_name AS gname,goods_thumb AS gthumb')
				-> where($map)
				-> limit($start.','.$size)
				-> select();
			$res['goods'] = $goods;
			if($page == 0){
				$count = $this
					-> where($map)
					-> count();
				$res['count']   = $count;
			}
		// 分类文字搜索触发查询
		}elseif(is_string($cate)){
			$map = 'exid = '.$exid.' AND (c.gc_name LIKE "%'.$cate.'%" OR c.gc_name LIKE "%'.$cate.'" OR c.gc_name LIKE "'.$cate.'%") ';
			$goods = $this
				-> alias('g')
				-> field('g.goods_id AS gid,g.goods_name AS gname,g.goods_thumb AS gthumb')
				-> join('bd_goods_cate AS c ON c.gcid = g.goods_cate_id')
				-> where($map)
				-> limit($start.','.$size)
				-> select();
			$res['goods'] = $goods;
			if($page === 0){
				$count = $this
					-> alias('g')
					-> join('bd_goods_cate AS c ON c.gcid = g.goods_cate_id')
					-> where($map)
					-> count();
				$res['count']   = $count;
			}
		}
		return $res;
	}

	/**
	 * [selectGoods 获取出售中\仓库中\已售罄的的商品数据]
	 * @param   [array] $cond       [出售中\仓库中\已售罄页面传递过来的细化筛选条件]
	 * @param   [string] $where     [出售中\仓库中\已售罄的限制条件]
	 * @param   [string] $limit   [是否使用分页条件/适用于导出表格时使用]
	 * @return  [array]        [商品数组]
	 */
	public function selectGoods($cond,$where,$limit=true){
		// 展厅内分组id
		$excate = $cond['cate'];
		// 搜索框中的查询关键字
		$search = $cond['search'];
		// 查询排序规则
		$order = $cond['order'];
		// 查询页码判断首次查询时没有页码,将其固定查询第一页
		$page = $cond['page'] ? $cond['page'] : 1;
		// 每页条数
		$size = 15;
		// 起始页条目序号
		$start = ($page-1)*$size;
		// 查询字段
		if($limit){
			$field = 'goods_id AS gid,goods_name AS gname,goods_thumb AS gthumb,goods_num AS stock,goods_price AS price,goods_pv AS pv,goods_sale_num AS sold,goods_link AS link,goods_qcore AS qrcode,add_time AS crea,sort';
		}else{
			$field = 'goods_name AS gname,goods_num AS stock,goods_price AS price,goods_pv AS pv,goods_sale_num AS sold,goods_link AS link,goods_qcore AS qrcode,add_time AS crea';
		}
		// $where 为不同页面的查询条件
		$sql = 'SELECT '.$field.' FROM bd_goods WHERE ';
		/*where子句开始*/
		if($excate != 0){                               // 查询该状态下的所有商品 或展厅分组商品
			$sql .= $where .= ' AND ex_goods_cid = '.$excate;
		}else{
			$sql .= $where;
		}
		if(!empty($search) && $excate != 0){            // 查询该状态下的展厅分组内有$search关键字的商品
			$sql .= ' AND (goods_name LIKE "%'.$search.'%" OR goods_name LIKE "%'.$search.'" OR goods_name LIKE "'.$search.'%")';
			$where .= ' AND (goods_name LIKE "%'.$search.'%" OR goods_name LIKE "%'.$search.'" OR goods_name LIKE "'.$search.'%")';
		}elseif(!empty($search) && $excate == 0){       // 查询该状态下的所有$search关键字的商品
			$sql .= ' AND (goods_name LIKE "%'.$search.'%" OR goods_name LIKE "%'.$search.'" OR goods_name LIKE "'.$search.'%")';
			$where .= ' AND (goods_name LIKE "%'.$search.'%" OR goods_name LIKE "%'.$search.'" OR goods_name LIKE "'.$search.'%")';
		}
		/*where子句结束*/
		/*ORDER子句开始*/
		if(!empty($order)){
			$sql .= ' ORDER BY';
			// 遍历排序条件
			foreach($order as $col => $sort){
				$sql .= ' ';
				switch ($col){
					case 'price':
						$sql .= 'goods_price '.$sort.',';
						break;
					case 'stock':
						$sql .= 'goods_num '.$sort.',';
						break;
					case 'sale':
						$sql .= 'goods_sale_num '.$sort.',';
						break;
					case 'create':
						$sql .= ' add_time '.$sort.',';
						break;
					case 'sort':
						$sql .= $col.' '.$sort.',';
						break;
				}
			}
			// 去除子句尾部的→,←
			$sql = rtrim($sql,',');
		}
		// 计算条目总数
		$count = $this -> where($where) -> count();
		/*ORDER子句结束*/
		/*limit子句开始*/
		if($limit) $sql .= ' LIMIT '.$start.','.$size;
		/*limit子句结束*/
		$result = $this->query($sql);
		// 初始化时间戳
		$result = init_time($result,'Y-m-d',true);
		// 返回数据
		$arr = array(
			'count' => $count,
			'result'    => $result
		);
		return $arr;
	}

    /**
     * @param $data [商品编辑页面的post数组]
     */
	public function updateGoods($data){
        $attr = implode(',',$data['group']);
        // 分支判断运费计算方式
        if(!empty($data['isFix'])){
            $postage = $data['postage'];
            $freight = 0;
        }else{
            $postage = 0;
            $freight = $data['freight'];
        }
        $showStock = $data['showStock'] === null ? 1 : $data['showStock'];
        $allowBook = $data['allowBook'] === null ? 0 : $data['showStock'];
        // 初始化数组
        $init = array(
            'exid'              => session('exid'),
            'goods_id'          => $data['gid'],
            'ex_goods_cid'      => $data['excid'],
            'goods_type'        => $data['goods_type'],
            'uid'               => $data['uid'],
            'goods_sn'          => $data['goodsCode'],
            'goods_attribute'   => $attr,
            'goods_name'        => $data['goodsName'],
            'goods_num'         => $data['stockTotal'],
            'is_show_gnum'      => $showStock,
            'is_creat_ord'      => $allowBook,
            'goods_price'       => $data['goodsPrice'],
            'goods_postage'     => $postage,
            'freight_id'        => $freight,
            'goods_weight'      => $data['kg'],
            'goods_forge_sold'  => $data['fake'],
            'is_rec'            => $data['is_rec'],
            'rec_remark'        => $data['rec'],
        );
        $result = $this -> save($init);
//        dump(!!$result);die;
        if(!!$result){
            return $data['gid'];
        }else{

            $msg = $this -> getError();
            if(!$msg){
                $msg = '该商品未做更改！';
            }
            return $msg;
        }
    }

}