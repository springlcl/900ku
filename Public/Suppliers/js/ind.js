$(function () {
  // 关闭遮盖层
  $(".close_btn").click(function () {
    $(this).parents('.protection').hide(0);
    $(this).parent(".tanchu_box").hide(0);
  });
  //打开遮盖层
  $(".open_btn").click(function () {
    $(".protection").show(0);
  });
  $(".container .cont_lump_choice dl dd.dd").click(function () {
      $(this).addClass("active").siblings().removeClass('active');
  });
  $(".container .cont_lump_choice dl dd").click(function () {
      $(this).addClass("active").siblings().removeClass('active');
  });
    // 0405用户列表
    $(".cont_lump_quser .goodsShow .goods_item .goods_item_mian .stock").toggle(
        function(){
          $(this).find("span").text("收起");
          $(this).find("i").css({"background-position":"-94px 1px"});
          $(this).parents(".goods_item").find(".xiangqing").show(0);
        },
        function(){
          $(this).find("span").text("查看");
          $(this).find("i").css({"background-position":"-134px 1px"});
          $(this).parents(".goods_item").find(".xiangqing").hide(0);
        }
    );
    // 04-02-05 上下级切换
    $(".cont_lump_Customer2 .salesman_level span").click(function(){
      $(this).addClass("active").siblings().removeClass('active'); 
        $(".cont_lump_Customer2 .salesman_lsit .goodsShow").hide(0);
        $(".cont_lump_Customer2 .salesman_lsit .goodsShow").eq($(".cont_lump_Customer2 .salesman_level span").index(this)).show(0);
    });
    // 05-01 详情付款出库
    $(".cont_lump_order1 .orderSwitch span").click(function(){
        $(this).addClass("active").siblings().removeClass('active'); 
        $(".cont_lump_order1 .con .lump1").hide(0);
        $(".cont_lump_order1 .con .lump1").eq($(".cont_lump_order1 .orderSwitch span").index(this)).show(0);
    });
    // 05-01 详情弹出框
    $(".cont_lump_order1 .con .record .re_operate").click(function () {
      $(".protection").show(1).click(function () {
        $(".protection").hide(1);
      $(".protection .order_501").hide(1);
      });
      $(".protection .order_501").show(1);
    });
    // 0501 选择打印的弹框
    $(".cont_lump_sell_wrongOrder .order_print li.pri_1").click(function () {
        $(".protection").show(1);
        $(".protection .print_tab_box").show(1);
    });
    //0505商品统计 第一排的时间点击加选中效果
    $(".cont_lump_statistics .cont_title .date_choice li").click(function () {
        $(this).addClass("active").siblings().removeClass('active'); 
    });
    //0506 订单排序
    $(".upDownToggle").toggle(
        function(){
          $(this).find("i").css({"background-position":"-94px 1px"});
        },
        function(){
          $(this).find("i").css({"background-position":"-134px 1px"});
        }
    );
    // 0510--待订单发票记录
    $(".cont_lump_stayOrderRecord .con .wr_list .wr_operation button").click(function(){
        $(".protection").show(1);
        $(".protection .historyRecord").show(1);
    });
    // 0508--收款记录--查看详情
    $(".cont_lump_gathering .con .wr_list .wr_lump li.wr_operation button").toggle(
        function(){
          $(this).parents(".wr_list").find(".details_list").hide(0);
          $(this).parents(".wr_list").find(".wr_operation").find("button").text("查看详情");
          $(this).parents(".wr_lump").find(".details_list").show(0);
          $(this).text("收起详情");
        },
        function(){
          $(this).parents(".wr_lump").find(".details_list").hide(0);
          $(this).text("查看详情");
        }
    );
    if ($(window).height()>790) {
        $(".tanchu_box700").css({"height":"780px","margin-top":"-390px"});
    } else {
        $(".tanchu_box700").css({"height":"560px","margin-top":"-300px"});
    };
    $(".senior_dingzhi .con .custo_list li.row_cube .right_con .imgs .img span.jian").click(function(){
      $(this).parent().hide(0);
    });
    $(".senior_dingzhi .con .custo_list li.row .sanjiao_left_ddd h5 button").click(function(){
      $(".protection").show(1);
      $(".protection .select_goods_box").show(1);
    });
    // 0203--高级定制 的弹框里的点击全选
      $(".protection .select_goods_box .foot input").click(function(){
          if($(this).is(':checked')){
              $('.protection .select_goods_box .goods_list input').prop("checked",true);
          }else{
              $('.protection .select_goods_box .goods_list input').prop("checked",false);
          }
      });
     // 0203--高级定制 的弹框里的点击选择
      $(".protection .select_goods_box .goods_list .se_caozuo span").toggle( 
          function () { 
              $(this).parent().parent().find("input").prop("checked",true);
          }, 
          function () { 
              $(this).parent().parent().find("input").prop("checked",false);
          } 
      );
      // 0207-展厅-我的文件 点击全选
      $(".cont_myFile .con .file_list tr th input").click(function(){
          if($(this).is(':checked')){
              $('.cont_myFile .con .file_list tr td input').prop("checked",true);
          }else{
              $('.cont_myFile .con .file_list tr td input').prop("checked",false);
          }
      });
      //0207-展厅-我的文件  类型  点击加选中效果
      // $(".cont_myFile .con .type span").click(function () {
      //     $(this).addClass("active").siblings().removeClass('active'); 
      // });
    // 我的文件里面的链接改名弹框
      $(".cont_myFile .file_list .ope span").click(function(){
          $(this).parents(".file_list").find(".tanchun").hide(0);
         $(this).parent("td").find("div").eq($(this).index()).show(0);
      });
      // $(".cont_myFile .file_list .ope .lj").click(function(){
      //     $(this).parents(".file_list").find(".tanchun").hide(0);
      //     $(this).parent().find(".lj_box").show(0);
      // });
      // $(".cont_myFile .file_list .ope .gm").click(function(){
      //     $(this).parents(".file_list").find(".tanchun").hide(0);
      //     $(this).parent().find(".gm_box").show(0);
      // });
      $(".cont_myFile .file_list .ope div button").click(function(){
          $(this).parent("div").hide(0);
      });
    // 弹出删除确认弹框
      $(".del_bnt").click(function () {
          $(".protection").show(0);
          $(".protection .delTanBox").show(0);
      });
    // 0301--02 发布商品  添加图片
      $(".goods_describe .con .custo_list li.row_cube .imgs .add").click(function () {
          $(".protection").show(0);
          $(".protection .add_imgs").show(0);
      });
    // 0301--02 发布商品  添加图片
      $(".goods_describe .con .custo_list li.row_cube .more").click(function () {
          $(".protection").show(0);
          $(".protection .moreEdit").show(0);
      });
    // 出售中的商品  中的全选
      $(".kuangzi .kucun_caozuo input").click(function(){
          if($(this).is(':checked')){
              $('.kuangzi .goods_item input').prop("checked",true);
          }else{
              $('.kuangzi .goods_item input').prop("checked",false);
          }
      });
      // 物流0701
      $(".js-assign-cost").click(function () {
        $(".area-modal-wrap").show(0);
      });
      // 0204 移动广告设置
        $(".cont_lump_yidongguanggao .l-nav tr .xianshi button").click(function () {
            // $(this).css("background","red");
          if ($(this).text() =="显示") {
            $(this).text("隐藏");
          } else {
            $(this).text("显示");
          }
        });
});