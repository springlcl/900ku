
// 登录页面
// 主页登录效果

$('#dl').click(function(){
    $('#hover').slideDown(200);
});

$('button').click(function(){
    // 获取用户名和密码
    var userName = $('#username').val();
    var password = $('#password').val();

    $.ajax({
        type:'POST',
        url:'dlyz.php',
        data:{
            userName:userName,
            password:password,
        },
        success:function(response){
            // console.log(response)
            if(response=='ok'){
                $('.ok').slideDown();
                $('#dl').slideUp();
                $('#hover').slideUp();
                $('.ingdex_login_prompt').hide();
            }else{
                alert('你输入的用户名或密码不正确')
                $('#username').val('');
                $('#password').val('');                     
            }
        }
    });

});
// 首页登录弹框
$('.ingdex_login_prompt').click(function(){
    $('body').css({overflow:'hidden'})
    $('.index_login_window').css({top:$(document).scrollTop()})
    $('.index_login_window').show()
})
$('.index_qx').click(function(){
    $('body').css({overflow:'scroll'})
    $('.index_login_window').hide()
})
// 登录二维码切换
var login_bj = true;
$('.tbc').click(function(){
    if(login_bj){
       
        $('.top_text_gy').css({display:'none'});
        $('.top_text_cg').css({display:'block'});
        $('.login_wx_cg').css({display:'none'});
        $('.login_wx_gy').css({display:'block'});
        $('.login_border').css({display:'none'});
        $('.login_work_flow2').css({display:'block'});
        $('.login_work_flow1').css({display:'none'});
        $('.login_border2').css({display:'block'});
        $('.tbc_img_cg').animate({top:'-100%'},400);
        $('.tbc_img_gy').animate({top:'0'},400,function(){
             login_bj = false;
        });
    }else{
        $('.top_text_gy').css({display:'block'});
        $('.top_text_cg').css({display:'none'}); 
        $('.login_border').css({display:'none'});
        $('.login_border1').css({display:'block'});
        $('.login_work_flow2').css({display:'none'});
        $('.login_work_flow1').css({display:'block'});
        $('.login_wx_cg').css({display:'block'});
        $('.login_wx_gy').css({display:'none'});
        $('.tbc_img_cg').animate({top:'0'},400);
        $('.tbc_img_gy').animate({top:'100%'},400,function(){
            login_bj = true;
        });
    };
 });
    // 登录页面结束
    
    //index页面开始 
    var index_bj= true;
    $('#index_se_but').click(function(){
        if(index_bj){
            $('#index_se_hover').animate({height:'200%'},300,function(){
                index_bj= false;
            })
        }else{
             $('#index_se_hover').animate({height:'0'},300,function(){
                index_bj= true;
             })
        }
    })
    // index 轮播图开始
        var index = 0;
        var autochange = null;
        function run(){
            autochange = setInterval(function(){
                if(index <$('.carousel>ul>a').length-1){
                    index++;
                }else{
                    index = 0;
                }
                // 调用轮播函数
                changeTo(index);
            },3000);
        }

        run();

        $('#num>ul>li>span').each(function(k){
            $(this).hover(function(){
                $(this).css('cursor','pointer');
                clearInterval(autochange);
                changeTo(k);
                index = k;
            },function(){
                autochange = setInterval(function(){
                    if(index < $('.carousel>ul>a').length-1){
                        index++;
                    }else{
                        index = 0;
                    }
                    // 调用轮播函数
                    changeTo(index);
                },3000);
            });
        });

        function changeTo(num){
            $('.carousel>ul>a').hide().eq(num).fadeIn('slow');
            $('#num>ul>li>span').removeClass('act').eq(num).addClass('act');
        }

        $('.carousel>ul>a').each(function(){
            $(this).mouseover(function(){
                clearInterval(autochange);
                $(this).css('cursor','pointer');
                $('#prev').css('display','block');
                $('#next').css('display','block');
            });
            $(this).mouseout(function(){
                run();
                $('#prev').css('display','none');
                $('#next').css('display','none');
            });
        });

        $('#prev').mouseover(function(){
            $(this).css('cursor','pointer');
            $('#prev').css('display','block');
            $('#next').css('display','block');
            clearInterval(autochange);
        }).mouseout(function(){
            $('#prev').css('display','none');
            $('#next').css('display','none');
            run();
        }).click(function(){    
            if(index<0){
                index = $('.carousel>ul>a').length-2;
            }else{
                index--;
            }       
            changeTo(index);
        });

        $('#next').mouseover(function(){
            $(this).css('cursor','pointer');
            $('#next').css('display','block');
            $('#next').css('display','block');
            clearInterval(autochange);
        }).mouseout(function(){
            $('#next').css('display','none');
            $('#next').css('display','none');
            run();
        }).click(function(){
            if(index < $('.carousel>ul>a').length-1){
                index++;
            }else{
                index = 0;
            }
            changeTo(index);
        });
    // index 轮播图结束

        
         // 轮播图下面 今日推荐动画效果
         recommend_date()
        function recommend_date(){
            var shorts=document.getElementById('short')
            if(!shorts) return false;
            var numm=0
            var longs=document.getElementById('long')
            setInterval(function(){
                numm+=1;
                longs.style.transform="rotate("+numm+"deg)"
            },5000)
            // 转动的长针
            var numm1=0
            
            setInterval(function(){
                numm1+=10;
                shorts.style.transform="rotate("+numm1+"deg)"
            },1000)
            // 转动的圆球
            var numm2=0;
            var stateimg=document.getElementById('stateimg')
            setInterval(function(){
                numm2+=10;
                stateimg.style.transform="rotate("+numm2+"deg)"
            },100);
        }

        // 推荐店铺里面的商家logo轮播
 
        recommend_dp_nr('1')
        recommend_dp_nr('2')
        recommend_dp_nr('3')
        function recommend_dp_nr(a){
            var i =0;
            var imgW = $('.box_bottom'+a+' .box_bottom_over li').width();
            var liW = $('.box_left_li').width();

            // 下一张
            $('.box_bottom'+a+' .next').click(function(){
                moveImg(++i);
            });
            // 上一张
            $('.box_bottom'+a+' .prev').click(function(){
                moveImg(--i);
            });
            // 点击小图片，跳转到指定的图片
            $('.box_bottom'+a+' .box_bottom_over img').click(function(){

                // console.log($('.box_bottom'+a+' .box_bottom_over img').length) // 8
                // console.log(ii) // 最大为4 
                // 因为$('.box_bottom'+a+' .box_bottom_over img')获取到的length是8 正确，而$(this).index()获取到的最大是4 所有让$(this).index()+i*4; i为0或1
                ii = $(this).index()+i*4;
                movebImg();
            });
            // 移动到指定的图片
            function moveImg(){
                // 最后一张
                if(i>1){
                    i=1;
                }
                // 是第一张的时候          
                if(i<0){
                    i = 0;
                }
                // 移动图片动画
                $('.box_bottom'+a+' .box_bottom_over').stop().animate({left:i*-imgW-i},400);
            }
            // 点击品牌logo跳转相应推荐商品
            function movebImg(){
                 $('.box'+a+' ol').stop().animate({left:ii*(-liW+1)-ii},400);
            }
        }
        
    
    //index页面结束
    /*900库展厅列表页开始*/
    // 默认 人气选项卡
    $('#top_ul li').click(function(){
        $('#top_ul li').css({color:'#000',borderBottom:'none'})
        $(this).css({color:'#00A196',borderBottom:'4px solid #00A196'})
        var i =$(this).index();
        $('.the_default_con').css({display:'none'})
        $('.the_default_con').eq(i).css({display:'block'});
    })

    $('.con_bottom>span').click(function(){
        $('.con_bottom>span').css({borderColor:'#888',color:'#888'})
        $(this).css({borderColor:'#3BB4AF',color:'#3BB4AF'})
    })


    // 默认人气图片轮播图
    // 循环调用
    for(var i=1;i<$('.default_con').length;i++){
        exhibition_list_lb('default_con'+i)
    }
    for(var x=1;x<$('.default_con_rq').length;x++){
        exhibition_list_lb('default_con_rq'+x)
    }

    function exhibition_list_lb(iii){
        var i =0;
        var imgW = $('.'+iii+' .d3 li').width();
        // 下一张
        $('.'+iii+' .next').click(function(){
            moveImg(++i);
        });
        // 上一张
        $('.'+iii+' .prev').click(function(){
            moveImg(--i);
        });
        // 移动到指定的图片
        function moveImg(){
            // 最后一张
            if(i==$('.'+iii+' .d3 li').length){
                $('.'+iii+' .d3').css({left:0})
                i=1;
            }
            // 是第一张的时候          
            if(i==-1){
                i = $('.'+iii+' .d3 li').length-2;
                $('.'+iii+' .d3').css({left:($('.'+iii+' .d3 li').length-1)*-324});
            }
            // 移动图片动画
            $('.'+iii+' .d3').stop().animate({left:i*-imgW},400);
        }
    }

    // 弹框 
    $('.ck_qualification').click(function(){
        $('.mask').css({display:'block'})
        $('.qualification_hover').css({display:'block'})
    })
    $('.xxxxx').click(function(){
        $('.mask').css({display:'none'})
        $('.qualification_hover').css({display:'none'})
    })
    /*900库展厅列表页结束*/
    /*900库报价页面开始*/
    
    $('.price_details_bj').click(function(){
        $(this).css({display:'none'});
        $('.price_details_ybj').css({display:'block'})
    })
    /*900库报价页面结束*/