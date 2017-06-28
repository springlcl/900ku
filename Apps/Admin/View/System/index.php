<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>系统设置 - 900Ku后台</title>
    <link href="__ADMIN_PUBLIC__/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/animate.min.css" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/style.min862f.css?v=4.1.0" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>系统设置 <!--<small class="m-l-sm">这是一个自定义面板</small>--></h5>
                    </div>
                    <div class="ibox-content">
                        <form action="{:U('system/index')}" method="post" enctype="multipart/form-data" class="form-horizontal m-t">
                        <div class="tabs-container">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true"> 基础配置</a>
                                </li>
                                <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">支付配置</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-3" aria-expanded="false">短信接口配置</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-4" aria-expanded="false">平台公众号配置</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">网站名称：</label>
                                            <div class="col-sm-4">
                                                <input name="web_name" class="form-control" type="text" value="{$data['web_name']}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">网站地址：</label>
                                            <div class="col-sm-4">
                                                <input name="web_site" class="form-control" type="text" value="{$data['web_site']}" placeholder="必填">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">网站Logo：</label>
                                            <div class="col-sm-4">
                                                <input name="thumb" class="form-control" type="file">
                                                <input name="web_logo" type="hidden" value="{$data['web_logo']}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">联系QQ：</label>
                                            <div class="col-sm-4">
                                                <input name="web_qq" class="form-control" type="text" value="{$data['web_qq']}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">联系邮箱：</label>
                                            <div class="col-sm-4">
                                                <input name="web_email" class="form-control" type="text" value="{$data['web_email']}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">SEO标题：</label>
                                            <div class="col-sm-4">
                                                <input name="seo_title" class="form-control" type="text" value="{$data['seo_title']}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">SEO关键词：</label>
                                            <div class="col-sm-4">
                                                <input name="seo_keyword" class="form-control" type="text" value="{$data['seo_keyword']}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">SEO描述：</label>
                                            <div class="col-sm-4">
                                                <textarea name="seo_description" class="form-control" cols="60" rows="3" >{$data['seo_description']}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">网站底部信息：</label>
                                            <div class="col-sm-4">
                                                <textarea name="footer_info" class="form-control" cols="60" rows="3" >{$data['footer_info']}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">订单前缀：</label>
                                            <div class="col-sm-4">
                                                <input name="order_prefix" class="form-control" type="text" value="{$data['order_prefix']}" placeholder="必填">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">开店数限制：</label>
                                            <div class="col-sm-4">
                                                <input name="ex_num" class="form-control" type="text" value="{$data['ex_num']}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">开店协议标题：</label>
                                            <div class="col-sm-4">
                                                <input name="xieyi_title" class="form-control" type="text" value="{$data['xieyi_title']}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">开店协议内容：</label>
                                            <div class="col-sm-4">
                                                <textarea name="xieyi_content" class="form-control" cols="60" rows="10" >{$data['xieyi_content']}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">单次提现最低金额：</label>
                                            <div class="col-sm-4">
                                                <input name="one_request_less" class="form-control" type="text" value="{$data['one_request_less']}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">平台服务费比例：</label>
                                            <div class="col-sm-4">
                                                <input name="pingtai_server" class="form-control" type="text" value="{$data['pingtai_server']}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">付款逾期时间：</label>
                                            <div class="col-sm-4">
                                                <input name="pay_deal_time" class="form-control" type="text" value="{$data['pay_deal_time']}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">提现审批金额限制：</label>
                                            <div class="col-sm-4">
                                                <input name="requ_ex_less" class="form-control" type="text" value="{$data['requ_ex_less']}" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-2" class="tab-pane">
                                    <div class="panel-body">

                                        <div class="tabs-container">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a data-toggle="tab" href="#tabs-1" aria-expanded="true"> 支付宝</a>
                                                </li>
                                                <li class=""><a data-toggle="tab" href="#tabs-2" aria-expanded="false">微信支付</a>
                                                <li class=""><a data-toggle="tab" href="#tabs-3" aria-expanded="false">兴业银行支付</a>
                                                <li class=""><a data-toggle="tab" href="#tabs-4" aria-expanded="false">平台测试支付</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div id="tabs-1" class="tab-pane active">
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">帐号：</label>
                                                            <div class="col-sm-4">
                                                                <input  class="form-control" type="text" value="" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">PID：</label>
                                                            <div class="col-sm-4">
                                                                <input class="form-control" type="text" value="" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">KEY：</label>
                                                            <div class="col-sm-4">
                                                                <input class="form-control" type="text" value="" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="tabs-2" class="tab-pane">
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">APPID：</label>
                                                            <div class="col-sm-4">
                                                                <input class="form-control" type="text" value="" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">MCHID：</label>
                                                            <div class="col-sm-4">
                                                                <input class="form-control" type="text" value="" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">KEY：</label>
                                                            <div class="col-sm-4">
                                                                <input class="form-control" type="text" value="" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="tabs-3" class="tab-pane">
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">商户代码：</label>
                                                            <div class="col-sm-4">
                                                                <input class="form-control" type="text" value="" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">加密私钥：</label>
                                                            <div class="col-sm-4">
                                                                <input class="form-control" type="text" value="" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">KEY：</label>
                                                            <div class="col-sm-4">
                                                                <input class="form-control" type="text" value="" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="tabs-4" class="tab-pane">
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">测试支付：</label>

                                                            <div class="col-sm-10">
                                                                <label class="checkbox-inline">
                                                                    <input type="radio" name="option1">开启</label>
                                                                <label class="checkbox-inline">
                                                                    <input type="radio" name="option1" checked>关闭</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div id="tab-3" class="tab-pane">
                                    <div class="panel-body">

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">短信接口URL：</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" value="" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">短信帐号：</label>
                                            <div class="col-sm-4">
                                                <input name="" class="form-control" type="text" value="" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">短信KEY：</label>
                                            <div class="col-sm-4">
                                                <input name="" class="form-control" type="text" value="" placeholder="">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div id="tab-4" class="tab-pane">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">供应商公众号名称：</label>
                                            <div class="col-sm-4">
                                                <input name="" class="form-control" type="text" value="" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">供应商AppID：</label>
                                            <div class="col-sm-4">
                                                <input name="" class="form-control" type="text" value="" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">供应商AppSecret：</label>
                                            <div class="col-sm-4">
                                                <input name="" class="form-control" type="text" value="" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">供应商Token：</label>
                                            <div class="col-sm-4">
                                                <input name="" class="form-control" type="text" value="" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">采购商公众号名称：</label>
                                            <div class="col-sm-4">
                                                <input name="" class="form-control" type="text" value="" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">采购商AppID：</label>
                                            <div class="col-sm-4">
                                                <input name="" class="form-control" type="text" value="" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">采购商AppSecret：</label>
                                            <div class="col-sm-4">
                                                <input name="" class="form-control" type="text" value="" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">采购商Token：</label>
                                            <div class="col-sm-4">
                                                <input name="" class="form-control" type="text" value="" placeholder="">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-3">
                                    <div class="checkbox">
                                        <label>
                                            <!-- <input type="checkbox" class="checkbox" id="agree" name="agree"> 我已经认真阅读并同意《商品发布协议》 -->
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 text-center">
                                    <input class="btn btn-primary" type="submit" value="　提 　交　">
                                </div>
                            </div>
                        </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="__ADMIN_PUBLIC__/js/jquery.min.js?v=2.1.4"></script>
    <script src="__ADMIN_PUBLIC__/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="__ADMIN_PUBLIC__/js/content.min.js?v=1.0.0"></script>
</body>
</html>
