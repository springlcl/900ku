<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>待确认发票</title>
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/reset.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/icons.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/style.css">
		<link rel="stylesheet" href="__HOME_PUBLIC__/finance/css/style.css">
    <link rel="stylesheet" href="__HOME_PUBLIC__/finance/css/layer.css">
</head>
<body>
	<div class="wh1200auto clearfix">
		<!-- 左边导航 -->
		<include file='Public/leftBar' />
		<!-- 右边内容 -->
		<div class="right_content fl">
			<div class="right_con_down bg-fff invoice_0505">
				<div class="title_ty">
					<span class="tit_name">待确认发票</span>
				</div>
				<div class="title_ty_smart clearfix ">
					<a href="{:U('admi')}"><span class="fs-14">订单开票记录</span></a>
					<i class="ico_all I_shuxian porb2"></i>
					<a href="{:U('wait_for')}"><span class="fs-14 mgl15 col-slv fw600">待确认发票</span></a>
					<i class="ico_all I_shuxian porb2"></i>
					<a href="{:U('confirm')}"><span class="fs-14">已确认发票</span></a>
					<i class="ico_all I_shuxian porb2"></i>
					<a href="{:U('rejected')}"><span class="fs-14">已拒绝发票</span></a>
				</div>
				 <form action="{:U('wait_for')}" method="post">
				<div class="title_ty_smart clearfix">
					<span class="mgl15 mgr5">项目名称</span>
					<select name="item" id=""  class="btn-120x30">
              <option value="0">全部项目</option>
              <volist name="item" id="i">
              <option <?php if($pitem && $pitem==$i['pid']){ echo "selected='selected'";}?> value="{$i.pid}">{$i.pro_name}</option>
            </volist>
            </select>
					<span class="mgl15 mgr5">供应商</span>
					<select name="exid" id=""  class="btn-120x30">
              <option value="0">全部供应商</option>
              <volist name="res" id="r">
              <option <?php if($pexid && $pexid==$r['exid']){ echo "selected='selected'";}?>  value="{$r.exid}">{$r.ex_name}</option>
            </volist>
            </select>
					<span class="mgl15 mgr5">订单号</span>
            <input <?php if($porder_code){ echo "value='$porder_code'";}?> name="order_code" type="text"  class="btn-120x30">
            <span class="mgw10">起止时间</span>
            <input <?php if($pstart){ echo "value='$pstart'";}?>  name="start" class="btn-80x30 pdl10 laydate-icon" type="text" id="wrong_start" >
            <span class="mgw10">-</span>
            <input <?php if($pend){ echo "value='$pend'";}?>  name="end" class="btn-80x30 pdl10 laydate-icon" type="text" id="wrong_end" >
            <button class="btn-60x30 bg-slv col-fff fs-14 mgl10 ">搜索</button>
          </div>
           </form>
				<div class="con">
				    <ul class="wr_nav bg-fb clearfix">
				         <li class="entry mgl35">发票条目</li>
				         <li class="number">发票编号</li>
				         <li class="money">金额</li>
				         <li class="state">发票状态</li>
				         <li class="operation">操作</li>
				    </ul>
              <ul class="wr_list clearfix">
                <volist name="invone" id="v">
                <li class="wr_lump">
                      <div class="wr_tit clearfix bg-f5 pd10">
                          <div class="fl">
                              <span class="font-weight600 mgl10">开票日期：<?=date('Y-m-d',$v['add_time']);?></span>
                              <span class="mgl35 pdl35 col-clv">供应商:{$v.ex_name}</span>
                          </div>
                      </div>
                      <ul class="wr_con clearfix">
                          <li class="entry mgl35">
                            <p>包含订单编号：</p>
                              <p class=" mgt10">{$v.order_code}</p>
                          </li>
                          <li class="number">
                              <p class="">{$v.invoice_num}</p>
                          </li>
                          <li class="money">
                              <p class="col-red">{$v.money}</p>
                          </li>
                          <li class="state">
                            <if condition="$v['invoice_status'] eq 1">
                            待确认
                            <elseif  condition="$v['invoice_status'] eq 2" />
                              已确认
                               <elseif  condition="$v['invoice_status'] eq 3" />
                                已拒绝
                          </if>
                          </li>
                          <li class="operation">
                            <!-- <button>确认</button> -->
                            <i class="ico_all I_shuxian porb2"></i>
                            <button onclick="opendiv({$v['rid']});"  class="hbo_invoice_ck">查看</button>


                                
                          </li>
                      </ul>
                  </li>
                </volist>

              </ul>
				</div>
				<div style="position:relative; left:0px;">
                      <ul class="pagination pages">
                        {$page}  
                      </ul>
                     </div>
				<div class="record_info">版权所有:900库 [京ICP备1000000001号-1]</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="__PUR_PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/layer/layer.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/laydate/laydate.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/js/js.js"></script>
<script>
function opendiv(rid){
$.ajax({
                  type: 'post',
                  url: "{:U('bill_details')}",
                  data: {'rid':rid},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data)
                    { 
                      // alert(1);
                      // console.log(data);
layer.open({

  area: ['950px', '450px'], //宽高
          title: [
            '信息详情',
            // 'background-color: green; color:#fff;'<div class='hbo_invoice_hover'></div><div class='top'>信息详情<img class='hbo_invoice_hoverxxx' src='__HOME_PUBLIC__/finance/images/hbo_invoice_hove_xxx.png' alt=''></div>
          ]
          ,content:
            data,
                 btn: ['确认发票', '返回'],
                 yes: function(index){
                  // alert(rid);
                  $.ajax({
                  type: 'post',
                  url: "{:U('sure_bill')}",
                  data: {'rid':rid},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data){
                      // alert(rid);
                     location.reload();
                    }else{

                    }
                  }
                });
                // layer.close(index);
              
    }
        });   
                           
                    }
                }
              });


}




    var start = {
      elem: '#wrong_start',
      format: 'YYYY/MM/DD',
      min: '1900-01-01 00:00:00', //最小日期
      max: laydate.now(), //最大日期
      istime: false,
      istoday: false,
      choose: function(datas){
         end.min = datas; //开始日选好后，重置结束日的最小日期
         end.start = datas //将结束日的初始值设定为开始日
      }
    };
    var end = {
      elem: '#wrong_end',
      format: 'YYYY/MM/DD',
      min: '1900-01-01 00:00:00', //最小日期
      max: laydate.now(),
      istime: false,
      istoday: false,
      choose: function(datas){
        start.max = datas; //结束日选好后，重置开始日的最大日期
      }
    };
    laydate(start);
    laydate(end);
</script>

</html>