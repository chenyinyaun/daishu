<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;
session_start();

/**
 * 用户支付页面详情
 */
class PayController extends HomeController {

	/**
	*个人余额界面
	 */
	public function balance() {
		if (is_login()) {

			$uid = is_login();
			$ucenter_member = M("ucenter_member");
			$user = $ucenter_member -> where('id=' . $uid) -> find();
			$balance = $user['balance'];
			$mobile = $user['mobile'];
			$_SESSION['mobiles']=$mobile;
			$this->assign('balance',$balance);
      $this->display();
		}else {
		$this -> redirect('Home/Pay/got');
	}

	}
	/**
	*购买奶茶
	 */
	public function milktea() {
		if (is_login()) {
			$uid = is_login();
			$ucenter_member = M("ucenter_member");
			$condition['id'] = $uid;
			$condition['status'] = 1;
			$user = $ucenter_member -> where($condition) -> find();
			$address = $user['address'];
			$phone = $user['mobile'];
			$this->assign('address', $address);
			$this->assign('mobilephone', $phone);
			$school = $user['school'];

			if (IS_POST) {
					$store = I('post.store');
					$type = I('post.type');
					$more = I('post.more');
					$content = I('post.content');
					$timeout = I('post.timeout');
					$otherphone = I('post.mobilephone');
					$sum = I('post.sum');

					// $time为过期时间的计算
					if ($timeout == "过期时间") {
						$this -> error('没有选择送达时间！');
					// }elseif ($timeout == "30分钟") {
					// 	$time = time();
					// 	$time = intval($time);
					// 	$time+= 1800;
					// 	$time = strval($time);
					// }elseif ($timeout == "1小时") {
					// 	$time = time();
					// 	$time = intval($time);
					// 	$time+= 3600;
					// 	$time = strval($time);
					}elseif ($timeout == "3小时") {
						$time = time();
						$time = intval($time);
						$time+= 10800;
						$time = strval($time);
					}elseif ($timeout == "5小时") {
						$time = time();
						$time = intval($time);
						$time+= 18000;
						$time = strval($time);
					}elseif ($timeout == "1天") {
						$time = time();
						$time = intval($time);
						$time+= 86400;
						$time = strval($time);
					}elseif ($timeout == "2天") {
						$time = time();
						$time = intval($time);
						$time+= 172800;
						$time = strval($time);
					}elseif ($timeout == "3天") {
						$time = time();
						$time = intval($time);
						$time+= 259200;
						$time = strval($time);
					}elseif ($timeout == "5天") {
						$time = time();
						$time = intval($time);
						$time+= 432000;
						$time = strval($time);
					}elseif ($timeout == "永不") {
						$time = time();
					};
					if (empty($more)) {
						$this -> error('＊自定义项没有填写');
					}
					if ($store == "请选择奶茶店") {
						$this -> error('你没有选择奶茶店');
					}
					if ($type == "请选择奶茶类型") {
						$this -> error('你没有选择奶茶类型');
					}
					if ($address =="收货地址请前往个人中心收货地址处填写") {
						$this -> error('＊亲，你还没有去个人中心收货地址处修改地址！');
					}
					if (empty($otherphone)) {
						$this -> error('＊亲，电话你没有填写哟！');
					}
					if (empty($sum)) {
						$this -> error('＊没有填写金额哦！');
					}
					if ($sum < 2) {
						$this -> error('＊奖赏金额至少为2块哦！');
					}
					if(!preg_match("/^1[0-9]{1}[0-9]{1}[0-9]{8}$/", $otherphone)){
							$this->error('手机格式不正确！');
					}
					$content = $store."--".$type."--".$more;
					$data = array('school' => $school, 'mobile' => $phone, 'time' => time(),'timeout' => $time, 'content' => $content, 'otherphone' => $otherphone, 'address' => $address, 'status' => 1, 'sum' => $sum,'starttime'=>'0','receive'=>'0','pay'=>0,'new'=>0,'type'=>'0','browse'=>0 );
					$this -> success('成功', U('Home/Pay/index',$data));
			}
			$this->display();
		}else {
		$this -> redirect('Home/Pay/got');
	}
	}

	/**
	*从这里跳转
	 */

	public function got() {
		$APPID='wx92ba7ebc07b9b5bf';
		$REDIRECT_URI='http://www.doododo.com/get.php';
		$scope='snsapi_base';
		//应用授权作用域，snsapi_base （不弹出授权页面，直接跳转，只能获取用户openid），snsapi_userinfo （弹出授权页面，可通过openid拿到昵称、性别、所在地。并且，即使在未关注的情况下，只要用户授权，也能获取其信息）
		// $scope='snsapi_userinfo';//需要授权
		$url='https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$APPID.'&redirect_uri='.urlencode($REDIRECT_URI).'&response_type=code&scope='.$scope.'&state=STATE#wechat_redirect';
		header("Location:".$url);
	}
	/**
	*登录页面的前端
	 */

	public function recharge() {
		$this->display();
	}
	/**
	*功能通知页面
	 */

	public function inform() {
		$this->display();
	}
	/**
	*提现界面
	 */

	public function draw() {
		if (is_login()) {

			$uid = is_login();
			$ucenter_member = M("ucenter_member");
			$user = $ucenter_member -> where('id=' . $uid) -> find();
			$phone = $user['mobile'];
			$balance = $user['balance'];
			$this->assign('balance',$balance);
			if (IS_POST) {
			$drawmoney = $_POST['drawmoney'];
			$drawmoney = trim($drawmoney);
			$drawmoney = stripslashes($drawmoney);
			$drawmoney = htmlspecialchars($drawmoney);
			if( !is_numeric($drawmoney)){
				$this -> error("你输入的不是数字或者你没有输入任何数字!");
			}elseif ($drawmoney< 1) {
				$this -> error("你输入的金额小于了1元!");
			}elseif ($drawmoney>$balance) {
				$this -> error("你输入的金额多余了你的余额!");
			}
			$data = array('mobile' => $phone, 'drawmoney'=>$drawmoney);
			$this -> success('成功！', U('Home/Pay/drawmoney',$data));
		}
      $this->display();
		}else {
		$this -> redirect('Home/Pay/got');
	}
	}
	/**
	*确认提现界面
	 */

	public function drawmoney() {
		if (is_login()) {
		$mobile=I('get.mobile');
		$drawmoney=I('get.drawmoney');
		$_SESSION['mobiles']=$mobile;
		$drawmoney =floatval($drawmoney);
		$_SESSION['drawmoney']=$drawmoney;
    $this-> assign('drawmoney',$drawmoney);
		$this->display();
		}else {
		$this -> redirect('Home/Pay/got');
	}
}


	/**
	*确认金额页面
	 */

	public function makesure() {
		// 传入钱数
		// $money=I('get.money');
		$money = $_POST['money'];

		// $str=str_replace('元','',$money);
		$str = intval($money);
		$str=$str*100;
		$_SESSION['money']=$str;
		$this->assign('money',$money);
		$this->display();
	}

	/**
	*异步储存充值的纪录
	 */

	public function money() {
		$data = array( 'mobile' => $_SESSION['mobiles'], 'money' => ($_SESSION['money'])/100,'times' => time() );
		$recharge = M("recharge");
		$recharge -> data($data) -> add();
		// 钱相加之后存入个人的数据库
		$uid = is_login();
		$ucenter_member = M("ucenter_member");
		$user = $ucenter_member -> where('id=' . $uid) -> find();
		$mobile = $_SESSION['mobiles'];
		$balance = $user['balance'];

		$condition['mobile']=$mobile;
		$condition['id']=$uid;

		$money['balance'] = $_SESSION['money']/100 + $balance;
		$ucenter_member -> where($condition) -> save($money);
		$this -> success('成功', U('Home/Pay/balance'));
	}

	/**
	*发单的支付信息传递页面
   */

	public function index() {
			if (is_login()) {

		$content=I('get.content');
		$address=I('get.address');
		$mobile = I('get.mobile');
    $timeout =  I('get.timeout');
		$user = M("ucenter_member");
		$username = $user -> where('mobile=' . $mobile) -> find();
		// 读取发单人昵称

		$name = $username['username'];
		$otherphone = I('get.otherphone');
		$sum= I('get.sum');
		$school = I('get.school');
		// $status =I('get.status');
		// $receive =I('get.receive');
		// $pay =I('get.pay');
		// $new = I('get.new');
		// $type = I('get.type');
		// $browse = I('get.browse');
		$_SESSION['username']=$name;
		$_SESSION['timeout']=$timeout;
		$_SESSION['otherphone']=$otherphone;
		$_SESSION['school']=$school;
		$_SESSION['mobile']=$mobile;
		$_SESSION['address']=$address;
		$_SESSION['content']=$content;
		$_SESSION['sum']=$sum;

		$this->assign('content',$content);
		$this->assign('address',$address);
		$this->assign('otherphone',$otherphone);
		$this->assign('sum',$sum);
		$this->assign('name',$name);
		$this->assign('school',$school);
		// $this->assign('status',$status);
		// $this->assign('receive',$receive);
		// $this->assign('pay',$pay);
		// $this->assign('new',$new);
		// $this->assign('type',$type);
		// $this->assign('browse',$browse);

    $this->display();
	}else {
	$this -> redirect('Home/Pay/got');
    }
	}
	/**
	*发单付款成功后之后异步储存单，根据session值
   */
	public function save() {
		$data = array('school' => $_SESSION['school'], 'mobile' => $_SESSION['mobile'], 'time' => time(), 'timeout' => $_SESSION['timeout'],'content' => $_SESSION['content'], 'otherphone' => $_SESSION['otherphone'], 'address' => $_SESSION['address'], 'status' => 1, 'sum' => $_SESSION['sum'],'starttime'=>'0','receive'=>'0','pay'=>1,'new'=>0,'type'=>'0','browse'=>0 );
		$bill = M("bill");
		$bill -> data($data) -> add();
		//  调用微信函数来发送消息

		$appid = "wx92ba7ebc07b9b5bf";
		$secret = "fd21910b685b93962908ca79033293cb";
		//第一步:取全局access_token
		$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$secret";
		$token = getJson($url);
		$access_token = $token["access_token"];
		$url1 = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=$access_token";
		$template_id = "g2eu_rA-7bP5d4BDWrfDgpKM5PM9SzXDAWmYDQ4es60";
		$openid = M('openid');
		$openids = $openid ->where('mobile = '.$_SESSION['mobile'])->find();
		$openid = $openids['openids'];
		$url = "http://www.doododo.com/index.php?s=/Home/Index/mybill.html";
		$keyword1 = "发单内容";
		$keyword4 = $_SESSION['content'];
		$keyword2 = "1份";
		$keyword3 = date('Y年m月d日 H点i分',$_SESSION['timeout']);
		$remark = "你的发单刚刚生效，等待着别人接单，请关注代鼠公众号的提醒，或着进入程序查询。您可以在该单没有被抢时候取消订单。";
		$data = array('productType' => array('value' => urlencode($keyword1), 'color' => "#173177"), 'name' => array('value' => urlencode($keyword4), 'color' => "#173177"),'number' => array('value' => urlencode($keyword2), 'color' => "#173177"), 'expDate' => array('value' => urlencode($keyword3), 'color' => "#173177"), 'remark' => array('value' => urlencode($remark), 'color' => "#173177"));
		$templet = array('touser' => $openid, 'template_id' => $template_id, 'url' => $url, 'data' => $data);
		$templets = json_encode($templet);
		getJson($url1, urldecode($templets));

		$this -> success('成功', U('Home/Index/index'));
	}
	/**
	*充值的纪录
   */
	public function record() {
		if (is_login()) {

			$uid = is_login();
			$ucenter_member = M("ucenter_member");
			$user = $ucenter_member -> where('id=' . $uid) -> find();
			$phone = $user['mobile'];
			$recharge = M("recharge");
			$recharge= $recharge -> where('mobile =' . $phone )->order('times desc')-> select();
			foreach ($recharge as $k1 => $v1) {
				$recharge[$k1]['times'] = format_date($recharge[$k1]['times']);
			}
			$this -> assign('recharge', $recharge);
	    $this->display();

		}else {
		$this -> redirect('Home/Pay/got');
	}

	}
	/**
	*提现的纪录
   */
	public function records() {
		if (is_login()) {

			$uid = is_login();
			$ucenter_member = M("ucenter_member");
			$user = $ucenter_member -> where('id=' . $uid) -> find();
			$phone = $user['mobile'];
			$draw = M("draw");
			$draw= $draw ->where('mobile=' . $phone)->order('time desc')-> select();
			foreach ($draw as $k => $v) {
				$draw[$k]['time'] = format_date($draw[$k]['time']);
			}
			$this -> assign('draw', $draw);
	    $this->display();

		}else {
		$this -> redirect('Home/Pay/got');
	}

	}

}
