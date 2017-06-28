<?php
/*
 +----------------------------------------------------------------------
 | [ WE CAN DO IT JUST THINK IT ]
 +----------------------------------------------------------------------
 | Copyright (c) 2013 http://www.caopeng.me All rights reserved.
 +----------------------------------------------------------------------
 | Author: 北冥の鱼 <653427831@qq.com> <http://www.caopeng.me>
 +----------------------------------------------------------------------

*/
/**
 * 系统公共库文件
 * 主要定义系统公共函数库
 */


    /**
     * 格式化数据结果
     * @author 曹鹏 <653427831@qq.com>
     * @param  数组或对象 $data
     * @return 格式化后的数组或对象
     *         p($array);
     */
    function p_die($data)
    {
       echo '<pre>'.print_r($data,true).'<pre>';
       die;
    }

    function p($data)
    {
       echo '<pre>'.print_r($data,true).'<pre>';
    }

    /**
     * 快递接口--获取快递信息
     * @param  com 快递公司标识码格式str，nu为订单号格式str
     * @return 返回结果数组或对象
     *
     */
    function showapi_expInfo($ex_code='',$ex_num='')
    {
        $host = "https://ali-deliver.showapi.com";
        $path = "/showapi_expInfo";
        $method = "GET";
        $appcode = "e9ad4510bb174d1d8e234a4f4e8ba7cb";
        $headers = array();
        array_push($headers, "Authorization:APPCODE " . $appcode);
        $querys = "com=".$ex_code."&nu=".$ex_num;
        $bodys = "";
        $url = $host . $path . "?" . $querys;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);//设置为true则返回的带有头部信息
        if (1 == strpos("$" . $host, "https://")) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
        return curl_exec($curl);
    }


/**
 * php获取客户端真实ip
 * @author 曹鹏 <653427831@qq.com>
 * @return  ip地址
 *
 */
function getClientIP()
{
    global $ip;
    if (getenv("HTTP_CLIENT_IP"))
        $ip = getenv("HTTP_CLIENT_IP");
    else if(getenv("HTTP_X_FORWARDED_FOR"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if(getenv("REMOTE_ADDR"))
        $ip = getenv("REMOTE_ADDR");
    else $ip = "Unknow";
    return $ip;
}

/**
 * 异步将远程链接上的内容(图片或内容)写到本地-获取微信头像使用
 *
 * @param unknown $url
 *            远程地址
 * @param unknown $saveName
 *            保存在服务器上的文件名
 * @param unknown $path
 *            保存路径
 * @return boolean
 */
function put_file_from_url_content($url, $saveName = 'tmp.png', $path = './Uploads/image/admin/')
{
    //$filePath = $path.date('Ymd').'/';
    $filePath = $path;
    MkFolder($filePath);

    // 设置运行时间为无限制
    set_time_limit ( 0 );
    $url = trim ( $url );
    $curl = curl_init ();
    // 设置你需要抓取的URL
    curl_setopt ( $curl, CURLOPT_URL, $url );
    // 设置header
    curl_setopt ( $curl, CURLOPT_HEADER, 0 );
    // 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
    curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
    // 运行cURL，请求网页
    $file = curl_exec ( $curl );
    // 关闭URL请求
    curl_close ( $curl );

    // 将文件写入获得的数据
    //$filename = $path.date('Ymd').'/'.$saveName;
    $filename = $filePath.$saveName;
    $write = @fopen ( $filename, "w" );
    if ($write == false) {
        return false;
    }
    if (fwrite ( $write, $file ) == false) {
        return false;
    }
    if (fclose ( $write ) == false) {
        return false;
    }
    //$arr = '/'.date('Ymd').'/'.$saveName;
    return $saveName;
}

/**
 * php单图片上传
 * @author 曹鹏 <653427831@qq.com>
 * @param  array
 * @return str
 */
function uploadimg($thumb,$path='./Uploads/image/',$name_path='')
{
  //$upload_dir = './uploads/'.date('Y').'/'.date('m').'/';   //保存上传文件的目录
  $upload_dir = $path;   //保存上传文件的目录
  MkFolder($upload_dir);
  //处理上传的文件
  if ($thumb['error'] == UPLOAD_ERR_OK){
     //上传文件在服务器上的临时存放路径
     $img_temp_name = $_FILES['thumb']['tmp_name'];
     //上传文件在客户端计算机上的真实名称 封面和音乐名称保持一致为了方便管理
     $randStr = str_shuffle('abcdefghijklmnopqrstuvwxyz1234567890');
     $rand = substr($randStr,0,4);
     $gen = time().$rand;
     $img_name = $gen.'.'.substr($_FILES["thumb"]["name"],strrpos($_FILES["thumb"]["name"],'.')+1);
     //移动临时文件夹中的文件到存放上传文件的目录，并重命名为在客户端的真实名称
     move_uploaded_file($img_temp_name, $upload_dir.$img_name);
     //$thumb_name   = '/'.date('Ymd').'/'.$img_name;
     $thumb_name   = $name_path.$img_name;
  }else
  {
      $thumb_name   = '';
  }
  return $thumb_name;
}

/**
 * php无限分类数据树形格式化
 * @author 曹鹏 <653427831@qq.com>
 * @param  对象
 * @return
 */
function gettree($rows, $id='id', $pid='parent_id')
{
	$items = array();
	foreach ($rows as $row)
	{
		$items[$row[$id]] = $row;
	}
	foreach ($items as $item)
	$items[$item[$pid]]['son'][$item[$id]] = &$items[$item[$id]];
	return isset($items[0]['son']) ? $items[0]['son'] : array();
}

/**
 * php递归生成文件夹并给777权限
 * @author 曹鹏 <653427831@qq.com>
 * @param
 * @return
 */
function MkFolder($path)
{
	if(!is_readable($path)){
		MkFolder( dirname($path) );
		if(!is_file($path)) mkdir($path,0777);
        chmod($path, 0777);
	}
}

/**
 * php读文件夹下的文件
 * @author 曹鹏 <653427831@qq.com>
 * @param str 路径
 * @return array 返回指定路径下的文件数组
 */
function loadDir($dirpath = './themes/default'){
  if($handle=openDir($dirpath))
  {
    while(false!==($files=readDir($handle)))
    {
      $files=iconv("gb2312","utf-8",$files);
      if($files!="."&&$files!="..")
        {
          $urlStrs=$dirpath."/".$files;
          if(!is_dir($dirpath."/".$files))
            {
              $arrayfile[]=$files;
            }

        }
    }
    //$arrayfileLen=count($arrayfile);
    //for($i=0;$i<$arrayfileLen;$i++) echo $arrayfile[$i];
    //echo $arraydir;
    closeDir($handle);
    return $arrayfile;
  }
}

/**
 * 随机验证码的生成 $_SESSION['send_code'] = $this->random(6,1);
 * @author 曹鹏 <653427831@qq.com>
 * @param  array
 * @return str
 */
function random($length = 6 , $numeric = 0)
{
   PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
   if($numeric) {
      $hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
   } else {
      $hash = '';
      $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
      $max = strlen($chars) - 1;
      for($i = 0; $i < $length; $i++) {
         $hash .= $chars[mt_rand(0, $max)];
      }
   }
   return $hash;
}

function base64EncodeImage ($image_file) {
    $base64_image = '';
    $image_info = getimagesize($image_file);
    $image_data = fread(fopen($image_file, 'r'), filesize($image_file));
    $base64_image = 'data:' . $image_info['mime'] . ';base64,' . chunk_split(base64_encode($image_data));
    return $base64_image;
}


/**
 * php单图片上传
 * @author 曹鹏 <653427831@qq.com>
 * @param  array
 * @return str
 */
function mobileUploadImg($thumb)
{
    $data = file_get_contents('php://input');
    //先分割数据流
    $vars = explode('#',$data,3);//这样防止对图片流造成破坏只分割成三份即可
    $img = $vars[2];
    $path = './Uploads/image/'.date('Ymd').'/';   //保存上传文件的目录

    $newfilename = time().'.jpg';
    $file = $path.$newfilename;
    $handle = fopen($file, 'w');
    if ($handle) {fwrite($handle,$img);
        fclose($handle);
    }





    //$upload_dir = './uploads/'.date('Y').'/'.date('m').'/';   //保存上传文件的目录
    $upload_dir = './Uploads/image/'.date('Ymd').'/';   //保存上传文件的目录
    MkFolder($upload_dir);
    //处理上传的文件
    if ($thumb['error'] == UPLOAD_ERR_OK){
        //上传文件在服务器上的临时存放路径
        $img_temp_name = $_FILES['thumb']['tmp_name'];
        //上传文件在客户端计算机上的真实名称 封面和音乐名称保持一致为了方便管理
        $randStr = str_shuffle('abcdefghijklmnopqrstuvwxyz1234567890');
        $rand = substr($randStr,0,4);
        $gen = time().$rand;
        $img_name = $gen.'.'.substr($_FILES["thumb"]["name"],strrpos($_FILES["thumb"]["name"],'.')+1);
        //移动临时文件夹中的文件到存放上传文件的目录，并重命名为在客户端的真实名称
        move_uploaded_file($img_temp_name, $upload_dir.$img_name);
        $thumb_name   = '/'.date('Ymd').'/'.$img_name;
    }else
    {
        $thumb_name   = '/default.jpg';
    }
    return $thumb_name;
}




/**
 * [getPic description]
 * 获取文本中首张图片地址
 * @param  [type] $content [description]
 * @return [type]          [description]
 */
  function getPic($content)
  {
    //if(preg_match_all("/(src)=([\"|']?)([^ \"'>]+\.(gif|jpg|jpeg|bmp|png))\\2/i", $content, $matches))
    if(preg_match_all("/<img.*?src=[\"|\']?(.*?)[\"|\']?\s.*?>/i", $content, $matches))
    {
      $img=$matches[1][0];
      //return $str1=substr($str,14);
      return $img;
    }
  }

/**
 * 二维数组根据某个字段排序
 * 功能：按照用户的年龄倒序排序 排序顺序标志 SORT_DESC 降序；SORT_ASC 升序
 * @author ruxing.li
 * @param  排序数组 array 排序字段 str
 * @return array
 */

function get_field_sort($array,$field,$direction='SORT_DESC')
{
  /*$sort = array(
    'direction' => 'SORT_DESC', //排序顺序标志 SORT_DESC 降序；SORT_ASC 升序
    'field'     => 'id',       //排序字段
  );
  $arrSort = array();
  foreach($array AS $uniqid => $row)
  {
    foreach($row AS $key=>$value)
    {
      $arrSort[$key][$uniqid] = $value;
    }
  }
  if($sort['direction'])
  {
    array_multisort($arrSort[$sort['field']], constant($sort['direction']), $array);
  }*/

  $arrSort = array();
  foreach($array AS $uniqid => $row)
  {
    foreach($row AS $key=>$value)
    {
      $arrSort[$key][$uniqid] = $value;
    }
  }
  if($direction)
  {
    array_multisort($arrSort[$field], constant($direction), $array);
  }

  return $array;
}



//================================================
/**
 * 检查是否登录
 */
function check_login()
{
  if (!isset($_SESSION['userid']) || $_SESSION['is_login']!=md5('dbcms'.$_SESSION['userid']))
  {
    show_msg('login/index','您还未登录！');
  }
}

/**
 * 导出CSV文件
 * @author 曹鹏 <653427831@qq.com>
 * @param  str $filename 生成的文件名
 * @param  str $data 拼接成的要导出的数据
 * @return file 直接导出并下载CSV文件
 */
function export_csv($filename,$data) {
  header("Content-type:text/csv");
  header("Content-Disposition:attachment;filename=".$filename);
  header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
  header('Expires:0');
  header('Pragma:public');
  echo $data;
}



//=====================================================
/**
 * 字符串转换为数组，主要用于把分隔符调整到第二个参数
 * @param  string $str  要分割的字符串
 * @param  string $glue 分割符
 * @return array
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function str2arr($str, $glue = ','){
	return explode($glue, $str);
}

/**
 * 数组转换为字符串，主要用于把分隔符调整到第二个参数
 * @param  array  $arr  要连接的数组
 * @param  string $glue 分割符
 * @return string
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function arr2str($arr, $glue = ','){
	return implode($glue, $arr);
}
//生成唯一标识符   //sha1()函数， "安全散列算法（SHA1）" 输出结果051ff02ef7730ff
function create_unique() {
	$data = $_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']   .time() . rand();
	return sha1($data);
	//return md5(time().$data);
	//return $data;
}


//echo build_order_no();//输出结果?2014062356100485
function build_order_no(){
	return date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
}

/*发送邮件*/
function SendMail($address,$title,$message)
{
	//import('@.ORG.Util.PHPMailer.PHPMailer');
	$mail=new PHPMailer();
	// 设置邮件的字符编码，若不指定，则为'UTF-8'
	$mail->CharSet='UTF-8';
	// 设置PHPMailer使用SMTP服务器发送Email
	$mail->IsSMTP();
	$mail->IsHTML(true);
	// 设置为“需要验证”
	$mail->SMTPAuth=true;
	// 设置SMTP服务器。
	$mail->Host=C('MAIL_SMTP');
	// 设置用户名和密码。
	$mail->Username=C('MAIL_LOGINNAME');
	$mail->Password=C('MAIL_PASSWORD');
	//$mail->Port=C('MAIL_PORT');
	// 设置邮件头的From字段。
	$mail->From=C('MAIL_FROM');
	// 设置发件人名字
	$mail->FromName=C('MAIL_FROMNAME');
	$mail->AddReplyTo=C('MAIL_FROM');//回复地址
	// 设置邮件标题
	$mail->Subject=@$title;
	// 设置邮件正文
	$mail->Body=@$message;
	// 添加收件人地址，可以多次使用来添加多个收件人
	$mail->AddAddress($address);

	// 发送邮件。
	return($mail->Send());
}

/*XSS安全过滤 -- $val=remove_xss($val);*/
function remove_xss($val) {
   // remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed
   // this prevents some character re-spacing such as <java\0script>
   // note that you have to handle splits with \n, \r, and \t later since they *are* allowed in some inputs
   $val = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val);
   // straight replacements, the user should never need these since they're normal characters
   // this prevents like <IMG SRC=@avascript:alert('XSS')>
   $search = 'abcdefghijklmnopqrstuvwxyz';
   $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $search .= '1234567890!@#$%^&*()';
   $search .= '~`";:?+/={}[]-_|\'\\';
   for ($i = 0; $i < strlen($search); $i++) {
      // ;? matches the ;, which is optional
      // 0{0,7} matches any padded zeros, which are optional and go up to 8 chars
      // @ @ search for the hex values
      $val = preg_replace('/(&#[xX]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val); // with a ;
      // @ @ 0{0,7} matches '0' zero to seven times
      $val = preg_replace('/(�{0,8}'.ord($search[$i]).';?)/', $search[$i], $val); // with a ;
   }
   // now the only remaining whitespace attacks are \t, \n, and \r
   $ra1 = array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');
   $ra2 = array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
   $ra = array_merge($ra1, $ra2);
   $found = true; // keep replacing as long as the previous round replaced something
   while ($found == true) {
      $val_before = $val;
      for ($i = 0; $i < sizeof($ra); $i++) {
         $pattern = '/';
         for ($j = 0; $j < strlen($ra[$i]); $j++) {
            if ($j > 0) {
               $pattern .= '(';
               $pattern .= '(&#[xX]0{0,8}([9ab]);)';
               $pattern .= '|';
               $pattern .= '|(�{0,8}([9|10|13]);)';
               $pattern .= ')*';
            }
            $pattern .= $ra[$i][$j];
         }
         $pattern .= '/i';
         $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2); // add in <> to nerf the tag
         $val = preg_replace($pattern, $replacement, $val); // filter out the hex tags
         if ($val_before == $val) {
            // no replacements were made, so exit the loop
            $found = false;
         }
      }
   }
   return $val;
 }

 /**
  * [deep_in_array 深度检索数组]
  * @param  [mixed] $value [要在数组中检索的值]
  * @param  [array] $array [本数组]
  * @return [bool]        [布尔值，是否有这个值]
  */
  function deep_in_array($value, $array) {
    foreach($array as $item) {
        // 进入方法后的一维数组比对
        if(!is_array($item)) {
            if ($item == $value) {
                return true;
            } else {
                continue;
            }
        }
        // 进入方法后的二维数组比对
        if(in_array($value, $item)) {
            return true;
            // 递归比对
        } else if(deep_in_array($value, $item)) {
            return true;
        }
    }
    return false;
  }

    /**
     * 初始化时间函数，将时间戳格式化输出
     * @param  [integer/array] $time   要进行格式化输出的时间/或是带有时间的二维数组
     * @param  [string] $format     超出本日\昨日的时间格式
     * @param  [string] $strict     是否是严格模式即严格使用$format格式输出
     * @return [string]         返回格式化的时间
     */
  function init_time($time,$format='Y-m-d',$strict=false){
  	$format = $format ? $format : 'Y-m-d';
    //今天的时间戳
    $today = strtotime(date('Y-m-d',time()));
    // 判断输入是否是数组
    if(is_array($time)){
      //对数组遍历
        foreach($time as $key => $value){
          // 遍历后结果在判断，确定是否是多维数组
          if(is_array($value)){
              // 递归获得格式化的数据
              $time[$key] = init_time($value,$format,$strict);
          }else{
            // 对该数据判断是否为时间戳
            if($value > 100000000 && strtotime(date('Y-m-d H:i:s',$value))){
              // 今天的日期格式化
              if($value >= $today){
                $time[$key] = $strict ? date($format,$value) : '今天 '.date('H:i',$value);
                // 昨天的日期格式化
              }elseif ($value >= ($today-(24*3600))) {
                $time[$key] = $strict ? date($format,$value) : '昨天 '.date('H:i',$value);
                // 昨天之前的数据处理
              }elseif($value < ($today-(24*3600))){
                $time[$key] = date($format,$value);
              }
            }else{
              continue;
            }
          }
        }
        return $time;
    }else{
      // 传入整形字符串时进入此处
      if(strtotime(date('Y-m-d H:i:s',$time)) > 0){
        if($time >= $today){
          $time = $strict?date($format,$time):'今天 '.date('H:i',$time);
        }elseif ($time >= ($today-(24*3600))) {
          $time = $strict?date($format,$time):'昨天 '.date('H:i',$time);
        }else{
          $time = date($format,$time);
        }
        return $time;
      }
    }
  }

  /*
   * 取的商品分类子分类的函数
   *
   * **/
function getChild($rows,$col='',$pcol='',$pid=0,$time=0)
{
	static $temp = array();
	foreach($rows as $key => $value){
		if($value[$pcol]==$pid){
			switch ($time){
				case 0:
					$temp[$time][] = $value;
					$times = $time+1;
					getChild($rows,$col,$pcol,$value[$col],$times);
					break;
				default:
					if(is_array($temp[$time-1])){
						if($value[$pcol]== $temp[$time-1][0][$col]){
							$temp[$time][] = $value;
							$times = $time+1;
							getChild($rows,$col,$pcol,$value[$col],$times);
						}
					}else{
						$temp[$time][] = $value;
						$times = $time+1;
						getChild($rows,$col,$pcol,$value[$col],$times);
					}
					break;
			}

		}
	}
	return $temp;
}

/**
 * splitURL 裁剪URL通过$delimiter获取不同的部分
 * @param  [string] $url        要进行剪切的url字符串
 * @param  [string] $part       最后要获取的部分
 * @param  [string] $delimiter  每个参数的分隔符
 * @return [string]         返回格式化的时间
 */
/*function splitURL($url,$part,$delimiter='/'){
	$arr = parse_url($url);
	$host = explode('.',$arr['host']);
	$request = ltrim($arr['path'],$delimiter);
	$parts = explode($delimiter,$request);
	$module = array_shift($parts);
	$class = array_shift($parts);
	$file = array_shift($parts);
	$action = explode('.',$file)[0];
	$extension = explode('.',$file)[1];
	$result = array(
		'SCHEME'        => $arr['scheme'],
		'HOST'          => $arr['host'],
		'PROTOCOL'      => $host[0],
		'DOMAIN'        => $host[1].'.'.$host[2],
		'MODULE'        => $module,
		'CLASS'         => $class,
		'ACTION'        => $action,
		'EXTENSION'     => $extension,
		'PARAMETER'     => implode($delimiter,$part),
	);
	$para = strtoupper($part);
	return $result[$para];
}*/

/**
 * 取得商品父级分类
 */
function getParent($array,$id,$col,$pcol,$time){
    static $item = array();
    foreach ($array as $key => $value){
        if($value[$col] == $id){
            $item[$time][] = $value;
            getParent($array,$value[$pcol],$col,$pcol,$time+1);
            if($time>0) return $value;
        }
    }
    if($time == 0) return $item;
}
