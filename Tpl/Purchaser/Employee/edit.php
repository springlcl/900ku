<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>0607</title>
    <link rel="stylesheet" href="__PUR_PUBLIC__/css/reset.css">
    <link rel="stylesheet" href="__PUR_PUBLIC__/css/icons.css">
    <link rel="stylesheet" href="__PUR_PUBLIC__/css/style.css">
</head>
<body>
<div class="wh1200auto clearfix">
    <!-- 左边导航 -->
    <include file="Public/LeftBar" />
    <!-- 右边内容 -->
    <div class="right_content fl" url="{$url}" action="edit">
        <div class="right_con_down bg-fff invoice_0505">
            <div class="cont_lump cont_lump_Customer staffSetup bor_bm1">
                <div class="title_ty">
                    <span class="tit_name">编辑员工</span>
                </div>
                <form action="{:U('edit')}" method="post" id="addForm">
                    <ul class="lump">
                        <!--                            <li>-->
                        <!--                                <label class="text"><i>*</i>员工选择：</label>-->
                        <!--                                <select name="employee" class="l_xinzengxiala">-->
                        <!--                                    <option value ="volvo"></option>-->
                        <!--                                    <option value ="saab">Saab</option>-->
                        <!--                                    <option value="opel">Opel</option>-->
                        <!--                                    <option value="audi">Audi</option>-->
                        <!--                                </select>-->
                        <!--                                <button class=" xinzengyuangong">新建员工</button>-->
                        <!--                            </li>-->
                        <li>
                            <label class="text Validform_label"><i>*</i>账户昵称：</label>
                            <input name="name" type="text " class="input" datatype="s1-16" errormsg="昵称至少1个字符,最多16个字符！" sucmsg="" autocomplete="off" value="{$user.username}"/>
                            <input type="hidden" value="{$Think.get.uid}" name="uid"/>
                            <div class="Validform_checktip" style="display: inline-block;font-size: 10px;"></div>
                        </li>
                        <!-- 如果当前登录者没有所属项目 则可以编辑所属项目项，如果有所属项目，则不可以编辑 -->
                        <li>
                            <label class="text Validform_label"><i>*</i>所属项目：</label>
                            <select name="project" class="l_xinzengxiala" >
                                <option value ="0" <eq name="user['item']" value="0">selected="selected"</eq>>不分配项目</option>
                                <volist name="pro" id="p">
                                    <option value ="{$p.pid}" <eq name="user['item']" value="$p['pid']">selected="selected"</eq>>{$p.pro_name}</option>
                                </volist>
                            </select>
                            <div class="Validform_checktip" style="display: inline-block;font-size: 10px;"></div>
                        </li>
                        <li>
                            <label class="text"><i>*</i>真实姓名：</label>
                            <input name="real" type="text " class="input" placeholder="" datatype="zh2-4" errormsg="真实姓名应该为2-4位的中文字符串" autocomplete="off" value="{$user.real_name}"/>
                            <div class="Validform_checktip" style="display: inline-block;font-size: 10px;"></div>
                        </li>
                        <li>
                            <label class="text Validform_label"><i>*</i>手机号：</label>
                            <input name="phone" type="text " class="input" datatype="m" errormsg="请填写正确的手机号码格式" autocomplete="off" value="{$user.mobile}"/>
                            <div class="Validform_checktip" style="display: inline-block;font-size: 10px;"></div>
                        </li>
                        <li>
                            <label class="text Validform_label">邮箱：</label>
                            <input name="em" type="text " class="input" datatype="e" errormsg="邮箱格式不正确" autocomplete="off" value="{$user.email}"/>
                            <div class="Validform_checktip" style="display: inline-block;font-size: 10px;"></div>
                        </li>
                        <li>
                            <label class="text Validform_label"><i>*</i>员工编号：</label>
                            <input name="code" type="text " class="input" datatype="*" autocomplete="off" value="{$user.user_num}"/>
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
                                            <input id="role{$r.role_id}" <eq name="r['role_id']" value="$user['role']">checked="checked"</eq> name="role" value="{$r.role_id}" type="radio"><label for="role{$r.role_id}">{$r.role_name}</label>
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
                                <volist name="per" id="p">
                                <div class="fl container_d clearfix">
                                    <div class="fl">{$p.per_name}</div>
                                    <dl class="fl">
                                        <volist name="p['son']" id="d">
                                            <dd>{$d.per_name}</dd>
                                        </volist>
                                    </dl>
                                </div>
                                </volist>
                            </div>
                        </li>
                        <li class="btn">
                            <label class="text  ">&nbsp;</label>
                            <button type="submit" class="btn-lan-160 bg-slv">保存</button>
                        </li>
                    </ul>
                </form>
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

</html>