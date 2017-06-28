//tab
    $('#store_tab .store_title h3').click(function(){
        $('#store_tab .store_title h3').removeClass('store_title_h3')
        $(this).addClass('store_title_h3');
        $('#store_tab .store_content ul.xq_box').css('display','none').eq($(this).index()).css('display','block');
    })