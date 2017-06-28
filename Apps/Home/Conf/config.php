<?php
return array(
	//'配置项'=>'配置值'
    //'VIEW_PATH'=>'./Themes/'

);

/*$config['wechat'] = array(
 'token'=>'CodeIgniter', //填写你设定的key
 'appid'=>'wx1357312bf6f6f5df', //填写高级调用功能的app id
 'appsecret'=>'0bf5ef023cd0318808b52232e3fc2315', //
 'partnerid'=>'88888888', //财付通商户身份标识
 'partnerkey'=>'', //财付通商户权限密钥Key
 'paysignkey'=>'', //商户签名密钥Key
 'debug'=>true
);*/
/*$config['wechat_menu'] = array(
    "button"=>array(
        array(
            "type"=>"pic_photo_or_album",
            "name"=>"传图",
            "key"=>"upload_pics"
        ),
        array(
            "type"=>"view",
            "name"=>"实验",
            //"url"=> site_url('product/discovery')
            "url"=> 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxa86efacaf2f65f91&redirect_uri=http://wx.weisoul.org/wap.php/weixin/getCode&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect'
        ),
        array(
            "name"=>"我",
            "sub_button"=>array(
                array(
                    "type"=>"view",
                    "name"=>"个人中心",
                    "url"=>site_url('user/product/index')
                ),
                array(
                    "type"=>"view",
                    "name"=>"个人设置",
                    "url"=>site_url('user/home/index')
                ),
                array(
                    "type"=>"view",
                    "name"=>"帮助",
                    "url"=>site_url('home/weixin_help')
                )
            )
        )
    )
);*/