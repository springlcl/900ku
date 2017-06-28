    <div class="mask"></div>
	<header class="shopping_index_head mgb20">
        <div class="shopping_head_top">
            <div class="shopping_nav">
                <div class="shopping_left">
                    <a href="{:U('Home/index')}"><span>Hi，欢迎来900库</span></a>
          <!--           <a href="">请登录</a> -->
                </div>
                 <div class="shopping_right">
                <!--    <a href=""> <span>
                       常购清单  
                    </span></a> -->
                    <a href="{:U('Order/purchase_list')}"><span>
                        采购清单{$cnum}件
                    </span></a>
                    <a href="{:U('Cg/index')}"><span>
                       我的账户
                    </span></a>
                    <a href=""><span>
                       微信版
                    </span></a>
                    <a href=""><span>
                       900库APP
                    </span></a>
                    <!-- <span><a style="color:#A998BA" href="../backstage_page/admit_management.html">卖家中心</a>
                    </span></a> -->
                </div>
            </div>
        </div>
        <a id="db"></a>
        <div class="shopping_head_con clearfix">
            <div class="shopping_logo">
                <a href="{:U('Home/index')}"><div><img src="__HOME_PUBLIC__/images/logo-1.png" alt="" style="width:170px;height: 75px;"></div></a>
            </div>
            <form action="{:U('Search/find')}" method="post">
            <div class="l_zhanting">
            	<select name="type">
  						<option value ="ex">展厅</option>
  						<option value ="good">商品</option>
				</select>
				<input type="text" name="text">
				<button>搜 索</button>
            </div>
            </form>
            <div class="right fr clearfix">
<!--             	<a href="http://www.900ku.com/supplier.php/login/index.html"><div class="woyaokaidian fr qiqiu"></div></a> -->
                <a href="{:U('Login/index')}"><div class="woyaokaidian fr qiqiu"></div></a>
            	<a href="{:U('Asktobuy/find')}"><div class="banagwozhaohuo fr qiqiu"></div></a>
            </div>
        </div>
        <div class="l_head-nav1">
        	<ul class="clearfix">
        		<li class="fenlei_pre">全部商品分类
                        <ol id="fenlei_list" class=" fl">
                        <volist name="arr" id="a">
                        <a href="{:U('Goods/goods',array('cid'=>$a['gcid']))}"><li class="li_diyi col-slv">• {$a.gc_name}
                            <div class="zi_box">
                                <dl>
                                    <volist name="a['son']" id="r">
                                    <a href="{:U('Goods/goods',array('cid'=>$r['gcid']))}"><dd>{$r['gc_name']}</dd></a>
                                    </volist> 
                                </dl>
                            </div>
                        </li>
                        </a>
                    </volist>
                        
                    </ol>     

                </li>

        		<a href="{:U('Home/index')}"><li>首页</li></a>
        		<a href="{:U('search/index')}"><li>企业展厅</li></a>
        		<a href="{:U('Asktobuy/index')}"><li>求购中心</li></a>
        	</ul>
        </div>

    </header>