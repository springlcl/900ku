    <div class="mask"></div>
    <header class="shopping_index_head">
        <div class="shopping_head_top">
            <div class="shopping_nav">
                <div class="shopping_left">
                   <a href="{:U('Home/index')}"><span>Hi，欢迎来900库</span></a>
          <!--           <a href="">请登录</a> -->
                </div>
                <div class="shopping_right">
                    <a href="{:U('Order/purchase_list')}"><span >采购清单<a>{$cnum}</a>件</span></a>
                    <span id="in">
                       我的账户

                      <!--  <div id="out" style="display:none"> -->
                        <a href="{:U('Login/quit')}"><span id="out" style="display:none">退出登录</span></a>
                      <!--  </div> -->
                    </span>
                    <span>
                       微信版
                    </span>
                    <span>
                       900库APP
                    </span>
                    <!-- <span><a style="color:#A998BA" href="../backstage_page/admit_management.html">管理后台</a>
                       
                    </span> -->
                </div>
            </div>
        </div>
        <a id="db"></a>
        <div class="store_head_con wh1200auto pdb20">
            <div class="store_logo">
              <div><img style="width:60px;height:60px;" src="__UPLOADS__/purchaser/headimg/<?=session('cg_headimg');?>" alt=""></div>
                <div class="store_title"><a href="{:U('Cg/index',array('itemid'=>$itname['pid']))}">{$itname.pro_name}</a></div>
            </div>
            <a href="{:U('Home/index')}"><img class="store_logo_left" src="__HOME_PUBLIC__/images/logo.png" alt=""></a>
        </div>
    </header>
    <div class="shopping_list_nav">
        <div class="shopping_nav">
            <span href="" class="shopping_nav_quan">平台商品分类
                 <div class="shopping_fenlei yes_sel">
                    <ul style="position:relative">
                        <li style="height:20px;line-height:20px;color:#00A199;font-size: 16px;">准入商品分类
                        </li>
                        <volist name="group" id="g">
                        <li class="fname" fid="{$g.fid}" pid="{$g.pid}"><a href="{:U('Cg/admit',array('fid'=>$g['fid']))}">{$g.fname}</a></li>
                        </volist>
                 <!--        <li>其它分类
                            <div>站位2</div>
                        </li>
                        <li>其它分类
                            <div>站位3</div>
                        </li>
                        <li>其它分类
                            <div>站位4</div>
                        </li>
                        <li>其它分类
                            <div>站位5</div>
                        </li>
                        <li>其它分类
                            <div>站位6</div>
                        </li>
                        <li>其它分类
                            <div>站位7</div>
                        </li>
                        <li>本项目商品
                            <div>站位8</div>
                        </li> -->
                        <li class="go_index">
                            <a href="{:U('Home/index')}">去900库首页</a>
                        </li>
                    </ul>
                  </div>
            </span>
            <a class="<if condition="'__CONTROLLER__' eq '__MODULE__'.'/index'">style</if>" href="{:U('Cg/index')}">首页</a>
            <a class="<if condition="'__CONTROLLER__' eq '__MODULE__'.'/admit'">style</if>" href="{:U('Cg/admit')}">供应商列表</a>
            <a class="<if condition="'__CONTROLLER__' eq '__MODULE__'.'/cg_admit_order'">style</if>"  href="{:U('Cg/cg_admit_order')}">订单</a>
            <a class="<if condition="'__CONTROLLER__' eq '__MODULE__'.'/index'">style</if>"  href="{:U('Cg/finance')}">财务统计</a>
            <a class="<if condition="'__CONTROLLER__' eq '__MODULE__'.'/index'">style</if>"  href="{:U('Cg/news')}">消息</a>
            <!-- <div class="shopping_list_nav_right">
                <div><img src="__HOME_PUBLIC__/images/shopping_self.jpg" alt=""></div>
                <div>账号：1865265222</div>
                <div class="shopping_changeTu"></div>
                <div class="shopping_hidden_left">
                    <ul>
                        <li>切换项目</li>
                        <li>项目设置</li>
                        <li>公司设置</li>
                        <li>账号设置</li>
                        <li>退出登陆</li>
                    </ul>
                </div>
            </div> -->
        </div>
    </div>
    <script type="text/javascript" src="__HOME_PUBLIC__/cg/js/jquery.min.js"></script>
    <script>
        $("#in").bind('click',function(){
        $("#out").toggle();
    })
    </script>
