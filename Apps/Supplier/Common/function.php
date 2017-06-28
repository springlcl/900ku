<?php
/**
 * Created by PhpStorm.
 * User: wwkil
 * Date: 2017/5/8
 * Time: 18:37
 */
function getSku($array){
	$len = count($array['property']);
	$a = 0;
	switch ($len){
		case 1:
            for ($j = 0;$j < count($array['values'][0]);$j++){
                $arr[$j] = $array['property'][0].':'.$array['values'][0][$j];
            }
			return $arr;
			break;
		case 2:
			for ($i = 0;$i < count($array['values'][0]);$i++){
				for ($j = 0;$j < count($array['values'][1]);$j++){
					$arr[$a] = $array['property'][0].':'.$array['values'][0][$i].','.$array['property'][1].':'.$array['values'][1][$j];
					$a++;
				}
			}
			return $arr;
			break;
		case 3:
			for ($i = 0;$i < count($array['values'][0]);$i++){
				for ($j = 0;$j < count($array['values'][1]);$j++){
					for ($k = 0;$k < count($array['values'][2]);$k++){
						$arr[$a] = $array['property'][0].':'.$array['values'][0][$i].','.$array['property'][1].':'.$array['values'][1][$j].','.$array['property'][2].':'.$array['values'][2][$j];
						$a++;
					}
				}
			}
			return $arr;
			break;
	}
}


function getFileName(){
	$u = uniqid('Ku384');
	$t = date('Ymd');
	return $u.$t;
}

function getSubPath($gid){
	return '/'.$gid;
}