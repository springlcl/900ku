$(function () {
  // 给屏幕里面盒子的最小高度 等于屏幕的高度
  $(".right_con_down").css("min-height",$(window).height()-51);
  //左侧导航栏的收缩
    var version = $.fn.jquery;
    if('1.9' < version) {
      $('.left_con .nav li').click(function () {
        var stat = $(this).is('.'+'active');
        if (stat) {
            $(".left_con .nav li").removeClass("active").find('.one-level').find('span').removeClass("I_jiantou_top").addClass("I_jiantou_botton");
            $(this).parent("li").removeClass("active").find('.one-level').find('span').removeClass("I_jiantou_top").addClass("I_jiantou_botton");
        } else {
            $(".left_con .nav li").removeClass("active").find('.one-level').find('span').removeClass("I_jiantou_top").addClass("I_jiantou_botton");
            $(this).addClass('active').find('.one-level').find('span').removeClass("I_jiantou_botton").addClass("I_jiantou_top");
        }
        console.log(stat);

      });
    }else{
        $(".left_con .nav li .one-level").toggle(
            function(){
                $(".left_con .nav li").removeClass("active").find('.one-level').find('span').removeClass("I_jiantou_top").addClass("I_jiantou_botton");
                $(this).parent("li").addClass("active").find('.one-level').find('span').removeClass("I_jiantou_botton").addClass("I_jiantou_top");
            },
            function(){
                $(".left_con .nav li").removeClass("active");
                $(this).parent("li").removeClass("active").find('.one-level').find('span').removeClass("I_jiantou_top").addClass("I_jiantou_botton");
            }
        );
    }
    // console.log($.fn.jquery);

    //0405 新建商品分组
  $(".new_goods_group").on("click",function () {
    layer.prompt({title: ['新建商品分组', 'font-size:18px;font-weight:600;'], formType: 0}, function(text, index){
      layer.close(index);
        layer.msg('新建分组名称为'+ text);
    });
  }); 

  // 0501==统计条件选择
  $(".title_ty_smart .tianshu_xuanze button").click(function () {
    $(this).addClass("active").siblings().removeClass('active'); 
  });

  /**
   *
   * 删除确认
   */
  $(".del_queren").on("click",function () {
    layer.confirm('确定要删除', {
      btn: ['确定','取消'] //按钮
    }, function(){
      layer.msg('已删除');
    }, function(){
      layer.msg('已取消');
    });
  }); 
  /**
   *
   * 关闭方法
   */
    function gb_tanchu() {
    $(this).parents(".tanchu_box").hide(0);
    $(".protection").hide(0);
    };
    // 调用关闭方法
    $(".gb_tanchu").click(function () {
      gb_tanchu();
    });

    // 查看付款详情
    $(document).on("click",".query_0502 .chakan_fkxq",function () {
      $(".query_0502 .dingdantankuang").hide(0);
      $(this).parent().find(".dingdantankuang").show(0);
      $(document).on('click',".dingdantankuang",function(event){
        if(event.target == this)
        {
            $(this).hide(0);
        }
      });
    });

      // 查看物流详情
    $(document).on("click",".admittance_0601 .chakan_wlxq", function () {
      $(".admittance_0601 .wuliuxqtankuang").hide(0);
      $(this).parent().find(".wuliuxqtankuang").show(0);
      $(document).on('click',".wuliuxqtankuang",function(event){
          $(this).hide(0);
      });
    });




  // 发票 查看详情
   $('.hbo_invoice_ck').click(function(){
      $('.hbo_invoice_shade').hide();
      $('.hbo_invoice_shade').show();
      $(this).next().show();
  });
  $('.hbo_invoice_hoverxxx').click(function(){
      $('.hbo_invoice_shade').hide();
      $('.hbo_invoice_hover').hide();
  });
      // 查看历史发票
  $('.history_invoice').click(function(){
      $('.o_invoice_record_hover').hide();
      $('.shade').show();
      $(this).next().show();
  });
  $('.o_invoice_record_hoverxxx').click(function(){
      $('.shade').hide();
      $('.o_invoice_record_hover').hide();
  })

  
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


  /**
   *
   * 取消订单  确认弹框
   */
  $('.cancel_order_btn').on("click",function () {
    layer.confirm('您确定要取消订单吗?', {
      btn: ['确定','关闭'] //按钮
    }, function(){
      layer.msg('已取消订单');
    }, function(){
      layer.msg('已关闭');
    });
  }); 

});

