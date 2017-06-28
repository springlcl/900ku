
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="wap-font-scale" content="no">
    <title>商品详情</title>
    <link rel="stylesheet" href="__HOME_PUBLIC__/css/exhibition_hall_style.css">
    <link rel="stylesheet" href="__HOME_PUBLIC__/css/icons.css">
    <link rel="stylesheet" href="__HOME_PUBLIC__/css/reset.css">
    <link rel="stylesheet" href="__HOME_PUBLIC__/css/style.css">
</head>
<body>
 <include file="Public/Cgheader" />
    <div class="store_center0 clearfix ">
        <div class="store_center">

                <div id="store_goods">
                    <div id="store_goods1">
                        <div>{$mc.mc_name}</div>
                        <div>></div>
                        <div>{$good.ex_name}</div>
                        <div>></div>
                        <div>{$good.goods_name}</div>
                    </div>
                </div>
            <div class="store_large">
                

                <div id="store_cmp">
                    <div id="store_cmp1">         <!--fangdajing-->
                         <div id="store_min">
                            <img id="store_jMinImg" src="__UPLOADS__/{$org[0]}" alt="">
                <!--             <img id="store_jMinImg" src="__HOME_PUBLIC__/images/store_fangdajing.png" alt=""> -->
                            <div class="store_z"></div>   
                         </div>
                         <div id="store_max">
                             <img src="__HOME_PUBLIC__/images/store_fangdajing.png" alt="">
                         </div>
                         <div id="store_jmin" >  
                            <div class="store_j_left"><</div>
                            <ul>
                          
                                 <li style="margin-left: 30px;" class="store_first" onchange="" ><img src="__UPLOADS__/{$org[0]}" alt=""></li>
                                 <li style="margin-left: 30px;" onchange="" ><img src="__UPLOADS__/{$org[1]}" alt=""></li>
                                 <li style="margin-left: 30px;" onchange="" ><img src="__UPLOADS__/{$org[2]}" alt=""></li>
                                 <li style="margin-left: 30px;" onchange="" ><img src="__UPLOADS__/{$org[2]}" alt=""></li>
   
                               <!--   <li style="margin-left: 30px;" class="store_first"><img src="__HOME_PUBLIC__/images/store_fangdajing.png" alt=""></li> -->
                        <!--          <li><img src="__HOME_PUBLIC__/images/store_fangdajing1.png" alt=""></li>
                                 <li><img src="__HOME_PUBLIC__/images/store_fangdajing2.png" alt=""></li>
                                 <li><img src="__HOME_PUBLIC__/images/store_fangdajing3.png" alt=""></li>
                                 <li><img src="__HOME_PUBLIC__/images/store_fangdajing4.png" alt=""></li> -->
                                    
                      <!--            <li><img src="__HOME_PUBLIC__/images/store_fangdajing1.png" alt=""></li>
                                 <li><img src="__HOME_PUBLIC__/images/store_fangdajing2.png" alt=""></li>
                                 <li><img src="__HOME_PUBLIC__/images/store_fangdajing3.png" alt=""></li>
                                 <li><img src="__HOME_PUBLIC__/images/store_fangdajing4.png" alt=""></li> -->
                             </ul>
                             <div class="store_j_right">></div>
                         </div>

                         <div class="store_like">
                            <span class="col-slv mgt5"><i class="ico_all I_lan_xin mgr5"></i>加入常购清单</span>
                            <span class="col-slv mgt5" style="float:right;"><i class="ico_all I_lan_xin mgr5"></i>举报</span>
                         </div>
                    </div>  
                    <br>
                </div>

                <div id="store_concent">
                    <div id="store_name">{$good.ex_name}&nbsp;{$good.goods_name}&nbsp;{$good.rec_remark}</div>
                    <div class="pd30 bg-eee mgt20">
                        <span class="col-red fs-20 fw600">￥{$good.goods_price}</span>
                    </div>
<!--                     <div id="store_pei">
                        <div id="store_pei1">配送至：</div>
                        <div id="store_pei2">北京朝阳区三环以内</div>
                        <div id="store_pei3">有货</div>
                    </div>
                    <br>
                    <div id="store_fuwu">
                        <div id="store_fuwu1">钻石净度</div>
                        <div id="store_fuwu2">SI/小瑕</div>
                    </div> -->
                    <br>
                    <volist name="arr" id="a">
                    <div id="store_banben">
                        <div id="store_banben1">{$a[0]}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</div>
                        <div id="store_banben2">{$a[1]}&nbsp;<div id="store_banben2-1"></div></div>
       <!--                  <div id="store_banben3">（现货）18k金30分&nbsp;FG<div id="store_banben3-1"></div></div>
                        <div id="store_banben4">（现货）18k金30分&nbsp;FG<div id="store_banben4-1"></div></div> -->
                    </div>
                </volist>
<!--                     <br>
                    <div id="store_color">
                       <div id="store_color1">颜&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;色</div>
                        <div id="store_color2">D-E/极白<div id="store_color2-1"></div></div>
                        <div id="store_color3">F-G优白<div id="store_color3-1"></div></div>
                    </div>
                    <br>
                    <div id="store_baitiao">
                        <div id="store_baitiao1">主钻分数</div>
                        <ul>
                            <li>28分</li>
                            <li>26分</li>
                            <li>30分</li>
                            <li>33分</li>
                            <li>42分</li>
                            <li>43分</li>
                            <li>48分</li>
                            <li>50分</li>
                            <li>53分</li>
                            <li>55分</li>
                        </ul>
                    </div> -->
                    <div id="store_num">
                        <div class="store_num0">
                            数&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;量
                        </div>
                        <div id="store_num1"><input id="num" type="text" value="1"></div>
                        <div id="store_num2">
                            <div id="store_num2-1">+</div>
                            <div id="store_num2-2">-</div>
                        </div>
                        <div style="float:left;margin-top: 10px;margin-left: 10px;">件</div>
                        <div id="store_num3"><div style="float:left;">库存</div><a style="float:left;display:inline-block;" href=""><input style="border:none;width:25px;height:20px;margin-top: -4px;" type="text" value="{$good.goods_num}"></a><div style="float:left;">件</div></div>
                    </div>
                    <div class="store_btn">
                       <!--  <div class="store_btn1"><a href="0304采购商购物车.html">加入采购清单</a></div> -->
                        <div class="store_btn1"><a href="../900Ku采购商PC端前台/0304采购商购物车.html">加入采购清单</a></div>
                    </div>
                </div>
            </div>
            <div id="store_goods_right">
                <div class="store_right_title">{$good.ex_name}<i class="ico_all I_lan_weixin mgl5"></i></div>
                <ul class="store_right_top">
                    <li><div>主营项目：</div><div>{$mc.mc_name}</div></li>
                    <li>
                        <div>所在地区：</div>
                        <div>{$good.province}{$good.city}{$good.area}</div>
                    </li>
                    <li>
                        <div>创建时间：</div>
                        <div>{$good.add_time}</div>
                    </li>
                    <li>
                        <div>累计销量：</div>
                        <div>{$exsnum}</div>
                    </li>
                </ul>
                <div class="store_pingfen">动态评分</div>
                <dl class=" pd15 mgt15">
                    <dd class="pdh10">
                        <span class="wh60">描述相符</span>
                        <ul class="xingxing">
                                <if condition="$exds eq 0"><li class="active"><else/><li></if></li>
                                <if condition="$exds eq 1"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$exds eq 2"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$exds eq 3"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$exds eq 4"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$exds eq 5"><li class="active"><else/><li></if></li>
                        </ul>
                    </dd>
                    <dd class="pdh10">
                        <span class="wh60">满意度</span>
                        <ul class="xingxing">
                                <if condition="$exs eq 0"><li class="active"><else/><li></if></li>
                                <if condition="$exs eq 1"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$exs eq 2"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$exs eq 3"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$exs eq 4"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$exs eq 5"><li class="active"><else/><li></if></li>
                        </ul>
                    </dd>
                    <dd class="pdh10">
                        <span class="wh60">发货及时</span>
                        <ul class="xingxing">
                                <if condition="$exss eq 0"><li class="active"><else/><li></if></li>
                                <if condition="$exss eq 1"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$exss eq 2"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$exss eq 3"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$exss eq 4"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$exss eq 5"><li class="active"><else/><li></if></li>
                        </ul>
                    </dd>
                </dl>
                <a href="">
                <div class="btn-210x48 bor_1ddd bor-r5 mgauto center mgt35 bg-f5">
                    <i class="ico_all I_dianpu"></i>
                    <a href="{:U('shop/index',array('exid'=>$good['exid']))}"><span class="fs-16 mgl5">进店看看</span></a>
                </div>
                </a>
            </div>
            <div class="store_tab0">
                <div id="store_tab">
                    <div class="store_title">
                        <h3 class="store_title_h3">商品介绍</h3>
                        <h3>商品评价（{$goodnum}+）</h3>
                    </div>  
                    <div class="store_content pdb30">
                        <ul class="xq_box xq_box1"  style="display:block;">
                            <li>
                                <div class="store_content0">
                                    <p>品牌：</p>
                                    <p>恒久之星（FOREVERTAR）</p>
                                </div>
                                <br>
                                <div class="store_tab_content_1">
                                    <div class="store_tab_content_1_row1">
                                        <div>商品名称：</div>
                                        <div>{$good.goods_name}</div>
                                    </div>
                                    <br>
                                    <div class="store_tab_content_1_row2">
                                        <div>{$mintro[0][0]}</div>
                                        <div>{$mintro[0][1]}</div>
                                    </div>
                                    <br>
                                    <div class="store_tab_content_1_row3">
                                        <div>{$mintro[4][0]}</div>
                                        <div>{$mintro[4][1]}</div>
                                    </div>
                                    <br>
                                    <div class="store_tab_content_1_row4">
                                        <div>{$mintro[8][0]}</div>
                                        <div>{$mintro[8][1]}</div>
                                    </div>
                                    <br>
                                </div>
                            </li>
                            <li>
                                <div class="store_tab_content_2">
                                    <div class="store_tab_content_2_row1">
                                        <div>商品编号：</div>
                                        <div>{$good.goods_sn}</div>
                                    </div>
                                    <br>
                                    <div class="store_tab_content_2_row2">
                                        <div>{$mintro[1][0]}</div>
                                        <div>{$mintro[1][1]}</div>
                                    </div>
                                    <br>
                                    <div class="store_tab_content_2_row3">
                                        <div>{$mintro[5][0]}</div>
                                        <div>{$mintro[5][1]}</div>
                                    </div>
                                    <br>
                                    <div class="store_tab_content_2_row4">
                                        <div>{$mintro[9][0]}</div>
                                        <div>{$mintro[9][1]}</div>
                                    </div>
                                    <br>
                                </div>
                            </li>
                            <li>
                                <div class="store_tab_content_3">
                                    <div class="store_tab_content_3_row1">
                                        <div>店铺：</div>
                                        <div>{$good.ex_name}</div>
                                    </div>
                                    <br>
                                    <div class="store_tab_content_3_row2">
                                        <div>{$mintro[2][0]}</div>
                                        <div>{$mintro[2][1]}</div>
                                    </div>
                                    <br>
                                    <div class="store_tab_content_3_row3">
                                        <div>{$mintro[6][0]}</div>
                                        <div>{$mintro[6][1]}</div>
                                    </div>
                                    <br>
                                    <div class="store_tab_content_3_row4">
                                        <div>{$mintro[10][0]}</div>
                                        <div>{$mintro[10][1]}</div>
                                    </div>
                                    <br>
                                </div>
                            </li>
                            <li>
                                <div class="store_tab_content_4">
                                    <div class="store_tab_content_4_row1">
                                        <div>商品毛重：</div>
                                        <div>{$good.goods_weight}g</div>
                                    </div>
                                    <br>
                                    <div class="store_tab_content_4_row2">
                                        <div>{$mintro[3][0]}</div>
                                        <div>{$mintro[3][1]}</div>
                                    </div>
                                    <br>
                                    <div class="store_tab_content_4_row3">
                                        <div>{$mintro[7][0]}</div>
                                        <div>{$mintro[7][1]}</div>
                                    </div>
                                    <br>
                                    <div class="store_tab_content_4_row4">
                                        <div>{$mintro[11][0]}</div>
                                        <div>{$mintro[11][1]}</div>
                                    </div>
                                    <br>
                                </div>
                            </li>

                            <div class="store_tu">
                                <!-- <img src="__HOME_PUBLIC__/images/store_tu.png" alt=""> -->
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$intro.goods_introduce}
                            </div>
                        </ul>
                        <ul class="xq_box clearfix">
                            <div class="store_review">
                                <h5 class="bor_bm1"><span>点评管理</span></h5>
                                <div class="bg-fb clearfix">
                                    <dl class="pd15 mgt15 fl mgl35">
                                        <dd class="pdh10">
                                            <span class="wh60">描述相符</span>
                                            <ul class="xingxing">
                                <if condition="$ds eq 0"><li class="active"><else/><li></if></li>
                                <if condition="$ds eq 1"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$ds eq 2"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$ds eq 3"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$ds eq 4"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$ds eq 5"><li class="active"><else/><li></if></li>
                                            </ul>
                                        </dd>
                                        <dd class="pdh10">
                                            <span class="wh60">满意度</span>
                                            <ul class="xingxing">
                                <if condition="$s eq 0"><li class="active"><else/><li></if></li>
                                <if condition="$s eq 1"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$s eq 2"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$s eq 3"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$s eq 4"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$s eq 5"><li class="active"><else/><li></if></li>
                                            </ul>
                                        </dd>
                                        <dd class="pdh10">
                                            <span class="wh60">发货及时</span>
                                            <ul class="xingxing">
                                <if condition="$ss eq 0"><li class="active"><else/><li></if></li>
                                <if condition="$ss eq 1"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$ss eq 2"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$ss eq 3"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$ss eq 4"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$ss eq 5"><li class="active"><else/><li></if></li>
                                            </ul>
                                        </dd>
                                    </dl>
                                    <dl class="pd15 mgt15 fl mgl35 center" style="margin-left: 350px;">
                                        <dd class="pdh10">
                                            <span class="col-slv fw600 fs-14">综合评价星级</span>
                                        </dd>
                                        <dd class="pdh10">
                                            <ul class="xingxing">
                                <if condition="$sc eq 0"><li class="active"><else/><li></if></li>
                                <if condition="$sc eq 1"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$sc eq 2"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$sc eq 3"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$sc eq 4"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$sc eq 5"><li class="active"><else/><li></if></li>
                                            </ul>
                                        </dd>
                                        <dd class="pdh10">
                                            <span class="col-999">价均来自客户对本商品的点评</span>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                            <volist name="comments" id="c">
                            <li class="pl_tiao  clearfix">
                                <ul class="xingxing">
                                <if condition="$c['score'] eq 0"><li class="active"><else/><li></if></li>
                                <if condition="$c['score'] eq 1"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$c['score'] eq 2"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$c['score'] eq 3"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$c['score'] eq 4"><li class="active"><else/><li></if></li>
                                                <li></li>
                                <if condition="$c['score'] eq 5"><li class="active"><else/><li></if></li>
                                </ul>
                                <div class="clearfix">
                                    <div class="fl w940">
                                        <p class="mgt10">{$c.content}</p>
                                        <h6 class="col-999 mgt10"><span>颜色分类:大红色长袖</span><span class="mgl35">尺码:XL[白色预售]</span></h6>
                                    </div>
                                    <div class="fr w200 text-right">
                                        <span class="col-lan mgt10">{$c.username}</span>
                                        <h6 class="col-999 mgt10"><span><?=date('Y-m-d',$c['add_time'])?>&nbsp;&nbsp;</span><span><?=date('H:i:s',$c['add_time'])?></span></h6>
                                    </div>
                                </div>
                            </li>
                            </volist>

      
 <!--                            <div class="clearfix">
                                <ul class="pagination clearfix">
                                    <li class="bor-0">
                                        <span class="pg_pre">共4页</span>
                                    </li>
                                    <li>
                                        <span class="pg_pre">上一页</span>
                                    </li>
                                    <li>
                                        <span class="pg_curr">1</span>
                                    </li>
                                    <li>
                                        <a class="pg_link" href="">2</a>
                                    </li>
                                    <li>
                                        <a class="pg_link" href="">3</a>
                                    </li>
                                    <li>
                                        <a class="pg_link" href="">4</a>
                                    </li>
                                    <li>
                                        <a class="pg_next" href="">下一页</a>
                                    </li>
                                </ul>
                            </div> -->
                        </ul>


                    </div>
                    <div style="position:relative; left:-100px;">
                <ul class="pagination pages">
                  {$page}  
                </ul>
               </div>
                         
                </div>
            </div>
            
        </div>

    </div> 

    <include file="Public/Foot" />
    <script src="__HOME_PUBLIC__/js/jquery.min.js"></script>
    <script src="__HOME_PUBLIC__/js/js.js"></script>
    <script>
    $("#store_num2-1").bind('click',function(){
        var num=$("#num").val();
        var add=1;
        var total = num*1+add*1;
        $("#num").val(total);
    })

    $("#store_num2-2").bind('click',function(){
        var num=$("#num").val();
        if(num!=1){
        var jian=1;
        var total = num*1-jian*1;
        $("#num").val(total);            
    }else{

    }

    })    
    </script>
</body>
</html>
 <style> 
  .pages {
    float:right;
  } 
  .pages a,  
  .pages span {  
      display: inline-block;  
      padding: 2px 5px;  
      margin: 0 1px;  
      border: 1px solid #f0f0f0;  
      -webkit-border-radius: 3px;  
      -moz-border-radius: 3px;  
      border-radius: 3px;  
  }  
    
  .pages a,  
  .pages li {  
      display: inline-block;  
      list-style: none;  
      text-decoration: none;  
      color: #58A0D3;  
  }  
    
  .pages a.first,  
  .pages a.prev,  
  .pages a.next,  
  .pages a.end {  
      margin: 0;  
  }  
    
  .pages a:hover {  
      border-color: #50A8E6;  
  }  
    
  .pages span.current {  
      background: #50A8E6;  
      color: #FFF;  
      font-weight: 700;  
      border-color: #50A8E6;  
  }  
  .pages {
    font-size:18px;
  }
</style> 