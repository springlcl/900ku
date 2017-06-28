<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"><meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
      <meta http-equiv="description" content="this is my page">
	<title>Document</title>
	<link rel="stylesheet" href="__SUB_PUBLIC__/css/style.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries--><!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script><script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  <style>
  </style>
</head>
<body>
<!-- 左导一 -->
  <include file='Public/firstSidebar' />
<!-- 左导二 -->
  <include file="left" />
 <!--      </dl>
      </nav>
    </div>
  </div> -->
<!-- 右侧 内容-->
  <div class="clearfix container" id="app-container">
    <div class="cont_lump cont_lump_sell l_business">
      <div class="cont_title">
        <span>银行卡</span> 
      </div>
      <div class="tongyiren">
        请保证姓名、证件持有人、银行卡开户人为同一人
      </div>
      <form method="post" action="{:U('myincome/bank_card')}" id="iform">
        <ul class="l_gerenxiangqing">
          <li>
            <p class="fl">真实姓名</p>
            <input type="text" placeholder="姓名" name="real_name" value="{$arr['real_name']}">
          </li>
          <li>
            <p class="fl" >
              证件类型
            </p>
            <select class="yinhang" name="card_type" id="">
              <option value="0" <?= ($arr['card_type']==0)?'selected':'';?> >身份证</option>
              <option value="1" <?= ($arr['card_type']==1)?'selected':'';?> >军官证</option>
              <option value="2" <?= ($arr['card_type']==2)?'selected':'';?> >护照</option>
              <option value="3" <?= ($arr['card_type']==3)?'selected':'';?> >驾照</option>
            </select>
          </li>
          <li>
            <p class="fl">
              证件号码
            </p>
            <input type="text" placeholder="请正确填写证件号码" name="idcard" value="{$arr['idcard']}">
          </li>
          <li>
            <p class="fl"> 开户银行</p>
            <select class="yinhang" name="bank_id">
              <option value='0' selected>选择银行</option>
              <volist name="bankList" id="vo">
                  <option value="{$vo.bid}" <?= ($vo['bid']==$arr['bank_id'])?'selected':'';?>>{$vo.name}</option>
              </volist>
            </select>
          </li>
          
          <li>
            <p class="fl">银行卡号</p>
            <input type="text"  placeholder="请输入银行卡卡号" name="bank_num" value="{$arr['bank_num']}">
          </li>
            <div class="bangdingyinhangka"><button>绑定银行卡</button></div>
          <div class="zhuyideshixiang1">
              <p>注意事项：</p>
              <p>· 填写真实信息资料，才能提现金额</p>
              <p>· 仅支持储蓄卡，暂不支持信用卡业务</p>
              <p>· 绑定62开头、有银联标识的储蓄卡，提现更及时</p>
          </div>
        </form>
      </ul>
     
    <!-- 底部 == 版权 -->
      <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</div>
    </div>
  </div>
  
</body>
<script type="text/javascript" src="__SUP_PUBLIC__/js/jquery2.1.4.min.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/jquery.validate.method.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/profile.js"></script>
</html>
<style>
.yinhang {
  margin-left : 90px;
  padding:5px 25px;
  font-size:15px;
  cursor:pointer;
  width: 150px;
}
</style>