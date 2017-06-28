// $(function () {
//   // 给屏幕里面盒子的最小高度 等于屏幕的高度
//   $(".right_con_down").css("min-height",$(window).height()-51);
//   //左侧导航栏的收缩
//   $(".left_con .nav li .one-level").toggle(
//     function(){
//       $(".left_con .nav li").removeClass("active").find('.one-level').find('span').removeClass("I_jiantou_top").addClass("I_jiantou_botton");
//       $(this).parent("li").addClass("active").find('.one-level').find('span').removeClass("I_jiantou_botton").addClass("I_jiantou_top");
//     },
//     function(){
//       $(".left_con .nav li").removeClass("active");
//       $(this).parent("li").removeClass("active").find('.one-level').find('span').removeClass("I_jiantou_top").addClass("I_jiantou_botton");
//     }
//   );


//   /**首页--分类和简介 的选项卡*/
//     $(".class-and-syno span").click(function(){
//         $(this).addClass("col-lan").siblings().removeClass('col-lan'); 
//         $(".con_box .lump").hide(1);
//         $(".con_box .lump").eq($(".class-and-syno span").index(this)).show(1);
//     });
// });

// //fangdajing    cmp
//     $('#store_min').mouseover(function(){
//         var p=$(this).offset();
//         var w=$(this).width();
//         $('#store_max').show();
//         $('.store_z').show();
//         $('#store_max').css({left:$(this).offset().left+w+5,top:$(this).offset().top})
//     }).mouseout(function(){
//         $('#store_max').hide();
//         $('.store_z').hide();
//     }).mousemove(function(e){
//         var minTop=$(this).offset().top;
//         var minLeft=$(this).offset().left;
//         var sMinTop=e.pageY-minTop;
//         var sMinLeft=e.pageX-minLeft;
//         $('#store_max').scrollTop(sMinTop*2-150).scrollLeft(sMinLeft*2-150);
//         var x=0;
//         var y=0;
//         if(sMinLeft<30){
//             x=0;
//         }else if(sMinLeft>320){
//             x=290;
//         }else{
//             x=sMinLeft-30;
//         }
//         if(sMinTop<30){
//             y=0;
//         }else if(sMinTop>300){
//             y=290;
//         }else{
//             y=sMinTop-30;
//         }
//         $('.store_z').css({left:x+minLeft,top:y+minTop});
//     })

//     $('#store_jmin ul li img').click(function(){
//             $(this).clone().replaceAll('#store_max img')
//             $(this).clone().replaceAll('#store_min img')
//             $(this).parent().addClass('store_first').siblings().removeClass('store_first')
//         })
    
// // + - 
//     $('#store_num2-1').click(function(){
//         var num1=$('#store_num1 input').val();
//         num1++;
//         $('#store_num1 input').val(num1);

//     })

//     $('#store_num2-2').click(function(){
//         var num2=$('#store_num1 input').val();
//         num2--;
//         $('#store_num1 input').val(num2);
//         if(num2<=1){
//             $('#store_num1 input').val(1);
//             $('#store_num2-2').css('color','#ccc');
//         }

//     })

// //tab
    $('#store_tab .store_title h3').click(function(){
        $('#store_tab .store_title h3').removeClass('store_title_h3')
        $(this).addClass('store_title_h3');
        $('#store_tab .store_content ul.xq_box').css('display','none').eq($(this).index()).css('display','block');
    })


// // cart + -
// // 
// $('#cart_num2-1').click(function(){
//         var num1=$('#cart_num1 input').val();
//         num1++;
//         $('#cart_num1 input').val(num1);
//         $('#cart_num2-2').css('color','#000');

//     })

//     $('#cart_num2-2').click(function(){
//         var num2=$('#cart_num1 input').val();
//         num2--;
//         $('#cart_num1 input').val(num2);
//         if(num2<=1){
//             $('#cart_num1 input').val(1);
//             $('#cart_num2-2').css('color','#ccc');
//         }

//     })

// $('.confirm_receipt_goods_quan1').click(function(){
//     $('.confirm_receipt_goods_xin1').toggleClass('a');
// })

// $('.confirm_receipt_goods_quan2').click(function(){
//     $('.confirm_receipt_goods_xin2').toggleClass('a');
// })

// $('.confirm_hidden_block').click(function(){
//     $('.confirm_receipt_hidden').css('display','block');
//     $('.confirm_receipt_mask').css('display','block');
// })

// $('.confirm_receipt_none1').click(function(){
//     $('.confirm_receipt_hidden').css('display','none');
//     $('.confirm_receipt_mask').css('display','none');
// })

// $('.confirm_receipt_none2').click(function(){
//     $('.confirm_receipt_hidden').css('display','none');
//     $('.confirm_receipt_mask').css('display','none');
// })


// $('#store_num2-1').click(function(){
//       var num1=$('#store_num3 a input').val();
//       if (num1>0) {
//          num1--;
//       }
//       $('#store_num3 a input').val(num1);
//     })


//     $('#store_num2-2').click(function(){
//       var num2=$('#store_num3 a input').val();
//       if ($("#store_num1").val()>1) {
//         num2++;
//       };
//       $('#store_num3 a input').val(num2);
//     })


//     $('#cart_num2-1').click(function(){
//       var num1=$('#cart_num1 input').val();
//       $('.cart_jian').html(num1);   
//       var num1_1=num1*10000;
//       $('.cart_all_1').html(num1_1);
//     })


//     $('#cart_num2-2').click(function(){
//       var num2=$('#cart_num1 input').val();
//       $('.cart_jian').html(num2);
//       var num2_2=num2*10000;
//       $('.cart_all_1').html(num2_2);
//     })

//     $('#cart_num2-1b').click(function(){
//       var num1b=$('#cart_num1b input').val();
//       $('.cart_jianb').html(num1b);   
//       var num1_1b=num1b*10000;
//       $('.cart_all_1b').html(num1_1b);
//     })


//     $('#cart_num2-2b').click(function(){
//       var num2b=$('#cart_num1b input').val();
//       $('.cart_jianb').html(num2b);
//       var num2_2b=num2b*10000;
//       $('.cart_all_1b').html(num2_2b);
//     })



// $('.payment_hidden_block').click(function(){
//     $('.payment_hidden').css('display','block');
//     $('.payment_mask').css('display','block');
// })

// $('.payment_hidden_btn1').click(function(){
//     $('.payment_hidden').css('display','none');
//     $('.payment_mask').css('display','none');
// })

// $('.payment_hidden_btn2').click(function(){
//     $('.payment_hidden').css('display','none');
//     $('.payment_mask').css('display','none');
// })

    // 弹出删除确认弹框
      $(".del_bnt").click(function () {
          $(".protection").show(0);
          $(".protection .delTanBox").show(0);
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
    $(".query_0502 .chakan_fkxq").click(function () {
      $(".query_0502 .dingdantankuang").hide(0);
      $(this).parent().find(".dingdantankuang").show(0);
      $(".dingdantankuang").click(function(event){
        if(event.target == this)
        {
            $(this).hide(0);
        }
      });
    });

      // 查看物流详情
    $(".admittance_0601 .chakan_wlxq").click(function () {
      $(".admittance_0601 .wuliuxqtankuang").hide(0);
      $(this).parent().find(".wuliuxqtankuang").show(0);
      $(".wuliuxqtankuang").click(function(event){
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
  });

   // 0501==统计条件选择
  $(".title_ty_smart .tianshu_xuanze button").click(function () {
    $(this).addClass("active").siblings().removeClass('active'); 
  });
