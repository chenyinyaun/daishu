<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

/**
 * 前台公共库文件
 * 主要定义前台公共函数库
 */
 function getJson($url, $data = null) {
 	$curl = curl_init();
 	curl_setopt($curl, CURLOPT_URL, $url);
 	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
 	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
 	if (!empty($data)) {
 		curl_setopt($curl, CURLOPT_POST, 1);
 		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
 	}
 	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
 	$output = curl_exec($curl);
 	curl_close($curl);
 	return json_decode($output, true);
 };
 /**
  * 检测用户是否登录
  * @return the_time 返回时间的距离
  * @author 陈胤元
  */
	// function format_date($time){
	// $t=time()-$time;
	// $f=array(
	// '31536000'=>'年',
	// '2592000'=>'个月',
	// '604800'=>'星期',
	// '86400'=>'天',
	// '3600'=>'小时',
	// '60'=>'分钟',
	// '1'=>'秒'
	// );
	// foreach ($f as $k=>$v) {
	// if (0 !=$c=floor($t/(int)$k)) {
	// return $c.$v.'前';
	// }
	// }
	// }

	function format_date($time)
{
   //获取今天凌晨的时间戳
   $day = strtotime(date('Y-m-d',time()));
   //获取昨天凌晨的时间戳
   $pday = strtotime(date('Y-m-d',strtotime('-1 day')));
	 //获取前天凌晨的时间戳
   $sday = strtotime(date('Y-m-d',strtotime('-2 day')));
   //获取现在的时间戳
   $nowtime = time();

   $tc = $nowtime-$time;
   if($time<$sday){
      $str = date('m月d日 H:i',$time);
	 }elseif($time<$pday && $time>$sday){
			 $str = "前天".date(' H:i',$time);
   }elseif($time<$day && $time>$pda){
      $str = "昨天".date(' H:i',$time);
   }elseif($tc>60*60){
      $str = floor($tc/(60*60))."小时前";
   }elseif($tc>60){
      $str = floor($tc/60)."分钟前";
   }else{
      $str = "刚刚";
   }
   return $str;
}


/**
 * 检测验证码
 * @param  integer $id 验证码ID
 * @return boolean     检测结果
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function check_verify($code, $id = 1){
	$verify = new \Think\Verify();
	return $verify->check($code, $id);
}

/**
 * 获取列表总行数
 * @param  string  $category 分类ID
 * @param  integer $status   数据状态
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function get_list_count($category, $status = 1){
    static $count;
    if(!isset($count[$category])){
        $count[$category] = D('Document')->listCount($category, $status);
    }
    return $count[$category];
}

/**
 * 获取段落总数
 * @param  string $id 文档ID
 * @return integer    段落总数
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function get_part_count($id){
    static $count;
    if(!isset($count[$id])){
        $count[$id] = D('Document')->partCount($id);
    }
    return $count[$id];
}

/**
 * 获取导航URL
 * @param  string $url 导航URL
 * @return string      解析或的url
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function get_nav_url($url){
    switch ($url) {
        case 'http://' === substr($url, 0, 7):
        case '#' === substr($url, 0, 1):
            break;
        default:
            $url = U($url);
            break;
    }
    return $url;
}
