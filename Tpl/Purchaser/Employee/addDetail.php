<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>0607</title>
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/reset.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/icons.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/style.css">
    <script src="http://res.wx.qq.com/connect/zh_CN/htmledition/js/wxLogin.js"></script>
</head>
<body>
	<div class="wh1200auto clearfix">
        <!-- 左边导航 -->
        <include file="Public/leftBar" />
		<!-- 右边内容 -->
        <div class="right_content fl" url="{$url}" action="addDetail">
            <div class="right_con_down bg-fff invoice_0505">
                <div class="cont_lump cont_lump_Customer staffSetup bor_bm1">
                    <div class="title_ty">
                        <span class="tit_name">新建员工</span>
                    </div>

<if condition="($userinfo)">
                    <form action="{:U('addnew')}" method="post" id="addForm">
                        <!-- <input name="manager" value="{$Think.session.pur_uid}" type="hidden" /> -->
                        <input type="hidden" name="openid" value="{$userinfo['openid']}">
                        <input type="hidden" name="unionid" value="{$userinfo['unionid']}">
                        <input type="hidden" name="headimg" value="{$userinfo['headimgurl']}">
                        <input type="hidden" name="belong" value="{$userinfo['belong']}">
                        <input type="hidden" name="pt_role" value="2">
                        <input type="hidden" name="leader" value="{$Think.session.pur_uid}">
                        <if condition="($userinfo['item'])">
                        <input type="hidden" name="item" value="{$userinfo['item']}">
                        </if>
                        <ul class="lump">
                            <if condition="(!$userinfo['item'])">
                            <li>
                                <label class="text Validform_label"><i>*</i>所属项目：</label>
                                <select name="item" class="l_xinzengxiala" >
                                    <option value ="0" selected="selected">不分配项目</option>
                                    <volist name="project" id="pro">
                                    <option value ="{$pro.pid}">{$pro.pro_name}</option>
                                    </volist>
                                </select>
                                <div class="Validform_checktip" style="display: inline-block;font-size: 10px;"></div>
                            </li>
                            </if>
                            <li>
                                <label class="text Validform_label"><i>*</i>账户昵称：</label>
                                <input name="username" type="text" value="{$userinfo['nickname']}" class="input" datatype="s1-16" errormsg="昵称至少1个字符,最多16个字符！" sucmsg="" autocomplete="off"/>
                                <div class="Validform_checktip" style="display: inline-block;font-size: 10px;"></div>
                            </li>
                        <li>
                            <label class="text"><i>*</i>真实姓名：</label>
                            <input name="real_name" type="text " class="input" placeholder="" datatype="zh2-4" errormsg="真实姓名应该为2-4位的中文字符串" autocomplete="off"/>
                            <div class="Validform_checktip" style="display: inline-block;font-size: 10px;"></div>
                        </li>
                            <li>
                                <label class="text Validform_label"><i>*</i>手机号：</label>
                                <input name="mobile" type="text " class="input" datatype="m" errormsg="请填写正确的手机号码格式" autocomplete="off"/>
                                <div class="Validform_checktip" style="display: inline-block;font-size: 10px;"></div>
                            </li>
                            <li>
                                <label class="text Validform_label">邮箱：</label>
                                <input name="email" type="text " class="input" datatype="e" errormsg="邮箱格式不正确" autocomplete="off"/>
                                <div class="Validform_checktip" style="display: inline-block;font-size: 10px;"></div>

                            </li>
                            <li>
                                <label class="text Validform_label"><i>*</i>员工编号：</label>
                                <input name="user_num" type="text " class="input" datatype="*" autocomplete="off"/>
                                <div class="Validform_checktip" style="display: inline-block;font-size: 10px;"></div>

                            </li>
                        </ul>
                        <div class="title_ty">
                            <span class="tit_name">权限设置设置</span>
                        </div>
                        <ul class="lump">
                            <li class="role">
                                <label class="text Validform_label"><i>*</i>角色权限：</label>
                                <if condition="!empty($role[0])">
                                    <div class="fl li_right_box">
                                        <div>
                                            <volist name="role" id="r">
                                                <input id="role{$r.role_id}" type="radio" name="role" value="{$r.role_id}"><label for="role{$r.role_id}">{$r.role_name}</label>
                                            </volist>
                                        </div>
                                        <p class="mgt10 col-999">
                                            注意请勾选此帐号属于的【角色权限】，对应的【权限明显】即可选中；
                                        </p>
                                        <p class="mgt10 col-999">
                                            如果您还未设置过【角色权限】，请先设置角色，比如仓库管理员、财务管理员、业务管理员
                                        </p>
                                    </div>
                                        <else />
                                    <div>
                                        <p class="mgt10 col-999">
                                            请创建用户组
                                        </p>
                                    </div>
                                </if>
                            </li>
                            <li class="detail">
                                <label class="text"><i>*</i>权限明细：</label>
                                <div class="fl li_right_box">
                                </div>
                            </li>
                            <li class="btn">
                                <label class="text">&nbsp;</label>
                                <button type="submit" class="btn-lan-160 bg-slv">保存</button>
                            </li>
                        </ul>
                    </form>

<else />

                    <form action="{:U('addDetail')}" method="post" id="addForm">
                        <input name="manager" value="{$belong}" type="hidden" />
                        <ul class="lump">
                            <li>
                                <label class="text"><i>*</i>绑定微信：</label>
                                <div class="wx_img" id="gy_container"></div>
                            </li>
                        </ul>
                    </form>
</if>


                </div>
            </div>
            <div class="record_info" style="position: static;">版权所有:900库 [京ICP备1000000001号-1]</div>
        </div>
	</div>
</body>
<script type="text/javascript" src="__PUBLIC__/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/plugins/layui/layui.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/Validform_v5.3.2_min.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/js/add.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/js/js.js"></script>
<script>
  var obj = new WxLogin({
      id:"gy_container",
      appid: "wx1eef79d75139a9b0",
      scope: "snsapi_login",
      redirect_uri: "http://www.900ku.com/purchaser.php/Employee/addDetail/user_type/4",
      state: "",
      style: "",
      href: ""
    });
</script>
</html>