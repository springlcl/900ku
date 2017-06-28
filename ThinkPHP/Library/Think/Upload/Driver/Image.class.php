<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------
namespace Think\Driver;
class Image {
    /**
     * 图片mime码
     * @var array
     */
    private static $mimeType = array(
            'cgm' => 'image/cgm',
            'bmp' => 'image/bmp',
            'djv' => 'image/vnd.djvu','djvu' => 'image/vnd.djvu',
            'gif' => 'image/gif',
            'ico' => 'image/x-icon','ico' => 'image/x-icon',
            'jp2' => 'image/jp2',
            'jpe' => 'image/jpeg','jpeg' => 'image/jpeg','jpg' => 'image/jpeg',
            'mac' => 'image/x-macpaint',
            'pbm' => 'image/x-portable-bitmap',
            'pct' => 'image/pict',
            'pgm' => 'image/x-portable-graymap',
            'pic' => 'image/pict','pict' => 'image/pict',
            'png' => 'image/png',
            'pnm' => 'image/x-portable-anymap',
            'pnt' => 'image/x-macpaint','pntg' => 'image/x-macpaint',
            'ppm' => 'image/x-portable-pixmap',
            'qti' => 'image/x-quicktime','qtif' => 'image/x-quicktime',
            'ras' => 'image/x-cmu-raster',
            'rgb' => 'image/x-rgb',
            'svg' => 'image/svg+xml',
            'tif' => 'image/tiff','tiff' => 'image/tiff',
            'wbmp' => 'image/vnd.wap.wbmp',
            'xbm' => 'image/x-xbitmap','xbm' => 'image/x-xpixmap',
            'xwd' => 'image/x-xwindowdump',
            );

    /**
     * 根据mime码取得拓展名
     * @param  [string] $mime           [该文件的mime码]
     * @return [string] $extension      [取得的拓展名]
     */
    public function getExt($mime){
        $mimeArray = self::$mimeType;
        foreach($mimeArray as $ext => $mimes){
            if($mime == $mimes){
                $extension = $ext;
                return $extension;
            }else{
                continue;
            }
        }
    }
}