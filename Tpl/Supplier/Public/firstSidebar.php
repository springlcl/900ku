
<div id="app-first-sidebar">
    <div>
        <ul>
            <li class="fl head-img">
                <a class="team-logo-wrap" href="#" title="三只松鼠">
                    <div class="team-logo" style="background-image:url(__UPLOADS__/supplier/headimg/{$Think.session.sup_headimg});display:inline-block"></div>
                </a>
            </li>
            <li class="fl"><a class="switch-store" href="{:U('Login/quit')}">退出</a></li>
        </ul>
        <div style="clear:both"></div>
        <nav>
            <ul class="one-level">
                <li class="js-guide-shop <if condition="'__CONTROLLER__' eq '__MODULE__'.'/Store'">active</if>"><a href="{:U('Store/mess_services')}"><i class="sidebar-icon sidebar-icon-shop"></i> 展厅</a></li>
	            <li class="js-guide-goods  <if condition="'__CONTROLLER__' eq '__MODULE__'.'/Goods'">active</if>"><a href="{:U('Goods/stock')}"><i class="sidebar-icon sidebar-icon-goods"></i> 商品</a></li>
                <li class="js-guide-fans <if condition="'__CONTROLLER__' eq '__MODULE__'.'/Channel'">active</if>"><a href="{:U('Channel/selasman')}"><i class="sidebar-icon sidebar-icon-fans"></i> 渠道管理</a></li>
                <li class="js-guide-trade <if condition="'__CONTROLLER__' eq '__MODULE__'.'/Order'">active</if>"><a href="{:U('Order/access_order')}"><i class="sidebar-icon sidebar-icon-order"></i> 订单/财务</a></li>
                <li class="js-guide-fans <if condition="'__CONTROLLER__' eq '__MODULE__'.'/Myincome'">active</if>"><a href="{:U('Myincome/income_at')}"><i class="sidebar-icon sidebar-icon-fans"></i> 我的收入</a></li>
                <li class="js-guide-setting <if condition="'__CONTROLLER__' eq '__MODULE__'.'/Setting'">active</if>"><a href="{:U('Setting/Ex_mess')}"><i class="sidebar-icon sidebar-icon-setting"></i> 设置</a></li>
            </ul>
            <ul class="suspension">
                <li class="system"><i></i>系统消息
                    <div class="sanjiao_left_hei t_box" >
                        <!-- <h4>消息通知<i>3</i></h4> -->
                        <dl class="news_list" >
                            <dd class="">消息1</dd>
                            <dd class="">消息2</dd>
                            <dd class="">消息3</dd>
                            <dd class="">消息4</dd>
                            <dd class="">消息5</dd>
                            <dd class="">消息6</dd>
                            <dd class="">消息7</dd>
                            <dd class="">消息8</dd>
                        </dl>
                    </div>
                </li>
                <li class="tel"><i></i>客服电话
                    <div class="sanjiao_left_hei t_box">
                        <h4>客服电话</h4>
                        <h4>183182929292</h4>
                    </div>
                </li>
                <li class="ewm"><i></i>平台二维码
                    <div class="sanjiao_left_hei t_box">
                        <h4>平台二维码</h4>
                        <div class="img">
                            <img src="__SUP_PUBLIC__/images/index_end_tbc.png" alt="">
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>