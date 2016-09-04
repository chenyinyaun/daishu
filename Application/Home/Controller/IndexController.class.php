<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;
use OT\DataDictionary;

/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class IndexController extends HomeController {

	//系统首页
	// public function index() {
	// 	// 发单是否提交入口
	// 	if (IS_POST) {
	// 		if (is_login()) {
	// 			$uid = is_login();
	// 			$ucenter_member = M("ucenter_member");
	// 			$condition['id'] = $uid;
	// 			$condition['status'] = 1;
	// 			$mobile = $ucenter_member -> where($condition) -> find();
	// 			$phone = $mobile['mobile'];
	// 			$school = $mobile['school'];
	//
	// 			$content = I('post.content');
	// 			// $address = I('post.address');
	// 			// 不能使用传过来的，只能使用获取了的
	// 			$address = $mobile['address'];
	// 			$timeout = I('post.timeout');
	// 			// $time为过期时间的计算
	// 			if ($timeout == "过期时间") {
	// 				$this -> error('没有选择送达时间！');
	// 			// }elseif ($timeout == "30分钟") {
	// 			// 	$time = time();
	// 			// 	$time = intval($time);
	// 			// 	$time+= 1800;
	// 			// 	$time = strval($time);
	// 			// }elseif ($timeout == "1小时") {
	// 			// 	$time = time();
	// 			// 	$time = intval($time);
	// 			// 	$time+= 3600;
	// 			// 	$time = strval($time);
	// 			}elseif ($timeout == "3小时") {
	// 				$time = time();
	// 				$time = intval($time);
	// 				$time+= 10800;
	// 				$time = strval($time);
	// 			}elseif ($timeout == "5小时") {
	// 				$time = time();
	// 				$time = intval($time);
	// 				$time+= 18000;
	// 				$time = strval($time);
	// 			}elseif ($timeout == "1天") {
	// 				$time = time();
	// 				$time = intval($time);
	// 				$time+= 86400;
	// 				$time = strval($time);
	// 			}elseif ($timeout == "2天") {
	// 				$time = time();
	// 				$time = intval($time);
	// 				$time+= 172800;
	// 				$time = strval($time);
	// 			}elseif ($timeout == "3天") {
	// 				$time = time();
	// 				$time = intval($time);
	// 				$time+= 259200;
	// 				$time = strval($time);
	// 			}elseif ($timeout == "5天") {
	// 				$time = time();
	// 				$time = intval($time);
	// 				$time+= 432000;
	// 				$time = strval($time);
	// 			}elseif ($timeout == "永不") {
	// 				$time = time();
	// 			}
	// 			$otherphone = I('post.mobilephone');
	// 			$sum = I('post.sum');
	//
	// 			if (empty($content)) {
	// 				$this -> error('＊内容没有填写');
	// 			}
	// 			if ($address =="收货地址请前往个人中心收货地址处填写") {
	// 				$this -> error('＊亲，你还没有去个人中心收货地址处修改地址！');
	// 			}
	// 			if (empty($otherphone)) {
	// 				$this -> error('＊亲，电话你没有填写哟！');
	// 			}
	// 			if (empty($sum)) {
	// 				$this -> error('＊没有填写金额哦！');
	// 			}
	// 			if ($sum < 2) {
	// 				$this -> error('＊奖赏金额至少为2块哦！');
	// 			}
	// 			if(!preg_match("/^1[0-9]{1}[0-9]{1}[0-9]{8}$/", $otherphone)){
	// 					$this->error('手机格式不正确！');
	//       }
	// 			$data = array('school' => $school, 'mobile' => $phone, 'time' => time(),'timeout' => $time, 'content' => $content, 'otherphone' => $otherphone, 'address' => $address, 'status' => 1, 'sum' => $sum,'starttime'=>'0','receive'=>'0','pay'=>0,'new'=>0,'type'=>'0','browse'=>0 );
	// 			// $bill = M("bill");
	// 			// $bill -> data($data) -> add();
	// 			// $this -> success('成功', U('Home/Index/index'));
	// 			$this -> success('成功', U('Home/Pay/index',$data));
	// 		} else {
	// 			$this -> redirect(U('Home/Pay/got'));
	// 		}
	// 	}
	//
	// 	// 是否登录，检验 说说的列表和个人中心的页面
	// 	if (is_login()) {
	//
	// 		// 当前登录的用户的  id 一行数据 用户名，性别，电话 。最有用的是电话 $school
	// 		$uid = is_login();
	// 		$user = M("ucenter_member");
	// 		$username = $user -> where('id=' . $uid) -> find();
	// 		$name = $username['username'];
	// 		$address = $username['address'];
	// 		$sex = $username['sex'];
	// 		$balance = $username['balance'];
	// 		$mobilephone = $username['mobile'];
	// 		$school = $username['school'];
	// 		$condition['school'] = $school;
	// 		$condition['status'] = 1;
	//
	// 		// 显示发单
	// 		// 发单默认的 本人电话,真实姓名
	// 		$this -> assign('mobilephone', $mobilephone);
	// 		$bill = M("bill");
	// 		$conditions['school'] = $school;
	// 		$conditions['status'] = array('gt', 0);
	// 		$bills= $bill -> where($conditions)-> order('status asc')  ->order('time desc')-> limit(50) -> select();
	//
	// 		foreach ($bills as $k1 => $v1) {
	// 			$nickname = $user -> where('mobile=' . $v1['mobile']) -> find();
	// 			$bills[$k1]['username'] = $nickname['username'];
	// 			$bills[$k1]['picture'] = "." . $nickname['picture'];
	// 			$bills[$k1]['sex'] = $nickname['sex'];
	// 			$bills[$k1]['content']= preg_replace('/号.{4}/','号****',$bills[$k1]['content'],1);
	// 			$bills[$k1]['times'] = format_date($bills[$k1]['time']);
	// 			$bills[$k1]['timeouts'] =date('m月d日 H:i',$bills[$k1]['timeout']);
	// 			if (time() > intval($bills[$k1]['timeout']) ) {
	// 				if($bills[$k1]['status'] !== 5 && $bills[$k1]['status'] == 1){
	// 					// 过期之后把钱退给用户
	// 					$bill_sum = $bill-> where('mobile=' . $v1['mobile'])->where('id=' . $v1['id']) ->find();
	// 					$user_balace = $user-> where('mobile=' . $v1['mobile']) -> find();
	// 					$bill_sums['balance'] =$user_balace['balance']+$bill_sum['sum'];
	// 					$user-> where('mobile=' . $v1['mobile'])->save($bill_sums);
	// 					// 状态为5
	// 					$data['status']=5;
	// 					$bill-> where('mobile=' . $v1['mobile'])->where('id=' . $v1['id']) -> save($data);
	// 				}
	// 			}
	// 		}
	// 		$this -> assign('bills', $bills);
	//
	// 		// 显示说说
	// 		$condition['school'] = $school;
	// 		$condition['status'] = 1;
	// 		$message = M("message");
	// 		$list = $message -> where($condition) -> order('id desc') -> limit(50) -> select();
	// 		$user = M("ucenter_member");
	// 		$comment = M("messagecomment");
	// 		foreach ($list as $k => $v) {
	// 			$count = $comment -> where('mid=' . $v['id']) -> count();
	// 			$list[$k]['mid'] = $count;
	// 			$nickname = $user -> where('mobile=' . $list[$k]['mobile']) -> find();
	// 			$list[$k]['username'] = $nickname['username'];
	// 			$list[$k]['picture'] = "." . $nickname['picture'];
	// 			$list[$k]['school'] = $nickname['school'];
	// 			$list[$k]['sex'] = $nickname['sex'];
	// 			$list[$k]['time'] = format_date($list[$k]['time']);
	// 		}
	// 		$this -> assign('list', $list);
	//
	// 		// 显示个人信息
	// 		$this -> assign('sex', $sex);
	// 		$this -> assign('balance', $balance);
	// 		$picture = $username['picture'];
	// 		$picture = "." . $picture;
	// 		$this -> assign('picture', $picture);
	// 		$this -> assign('name', $name);
	// 		$this -> assign('school', $school);
	// 		$this -> assign('address', $address);
	// 		$this -> display();
	// 	} else {
	//
	// 		// 没登录显示的发单列表
	// 		$bill = M("bill");
	// 		$user = M("ucenter_member");
	// 		$conditions['status'] = array('gt', 0);
	// 		$bills= $bill -> where($conditions)-> order('status asc')->order('time desc') -> limit(50) -> select();
	// 		foreach ($bills as $k1 => $v1) {
	// 			$nickname = $user -> where('mobile=' . $v1['mobile']) -> find();
	// 			$bills[$k1]['username'] = $nickname['username'];
	// 			$bills[$k1]['picture'] = "." . $nickname['picture'];
	// 			$bills[$k1]['sex'] = $nickname['sex'];
	// 			$bills[$k1]['content']= preg_replace('/号.{4}/','号****',$bills[$k1]['content'],1);
	// 			$bills[$k1]['times'] = format_date($bills[$k1]['time']);
	// 			$bills[$k1]['timeouts'] =date('m月d日 H:i',$bills[$k1]['timeout']);
	// 			// if (time()>intval($bills[$k1]['timeout'])) {
	// 			// 	$bills[$k1]['status'] = 5;
	// 			// }
	// 		}
	// 		$this -> assign('bills', $bills);
	//
	// 		// 没登录显示的说说列表
	// 		$message = M("message");
	// 		$list = $message -> order('id desc') -> limit(50) -> select();
	// 		$comment = M("messagecomment");
	// 		foreach ($list as $k => $v) {
	// 			$count = $comment -> where('mid=' . $v['id']) -> count();
	// 			$list[$k]['mid'] = $count;
	// 			$nickname = $user -> where('mobile=' . $list[$k]['mobile']) -> find();
	// 			$list[$k]['username'] = $nickname['username'];
	// 			$list[$k]['picture'] = "." . $nickname['picture'];
	// 			$list[$k]['school'] = $nickname['school'];
	// 			$list[$k]['sex'] = $nickname['sex'];
	// 			$list[$k]['time'] = format_date($list[$k]['time']);
	// 		}
	// 		$this -> assign('list', $list);
	//
	// 		$this -> display();
	// 	}
	// }
	//首页
	public function index() {
		// 是否登录
	  if (is_login()) {
	    $uid = is_login();
	    $user = M("ucenter_member");
	    $username = $user -> where('id=' . $uid) -> find();
	    $school = $username['school'];
	    // 显示发单
	    // 发单默认的 本人电话,真实姓名
	    $bill = M("bill");
	    $conditions['school'] = $school;
	    $conditions['status'] = array('gt', 0);
	    $bills= $bill -> where($conditions)-> order('status asc')  ->order('time desc')-> limit(50) -> select();

	    foreach ($bills as $k1 => $v1) {
	      $nickname = $user -> where('mobile=' . $v1['mobile']) -> find();
	      $bills[$k1]['username'] = $nickname['username'];
	      $bills[$k1]['picture'] = "." . $nickname['picture'];
	      $bills[$k1]['sex'] = $nickname['sex'];
	      $bills[$k1]['content']= preg_replace('/号.{4}/','号****',$bills[$k1]['content'],1);
	      $bills[$k1]['times'] = format_date($bills[$k1]['time']);
	      $bills[$k1]['timeouts'] =date('m月d日 H:i',$bills[$k1]['timeout']);
	      if (time() > intval($bills[$k1]['timeout']) ) {
	        if($bills[$k1]['status'] !== 5 && $bills[$k1]['status'] == 1){
	          // 过期之后把钱退给用户
	          $bill_sum = $bill-> where('mobile=' . $v1['mobile'])->where('id=' . $v1['id']) ->find();
	          $user_balace = $user-> where('mobile=' . $v1['mobile']) -> find();
	          $bill_sums['balance'] =$user_balace['balance']+$bill_sum['sum'];
	          $user-> where('mobile=' . $v1['mobile'])->save($bill_sums);
	          // 状态为5
	          $data['status']=5;
	          $bill-> where('mobile=' . $v1['mobile'])->where('id=' . $v1['id']) -> save($data);
	        }
	      }
	    }
	    $this -> assign('bills', $bills);
			$this -> display();

	  } else {

	    // 没登录显示的发单列表
	    $bill = M("bill");
	    $user = M("ucenter_member");
	    $conditions['status'] = array('gt', 0);
	    $bills= $bill -> where($conditions)-> order('status asc')->order('time desc') -> limit(50) -> select();
	    foreach ($bills as $k1 => $v1) {
	      $nickname = $user -> where('mobile=' . $v1['mobile']) -> find();
	      $bills[$k1]['username'] = $nickname['username'];
	      $bills[$k1]['picture'] = "." . $nickname['picture'];
	      $bills[$k1]['sex'] = $nickname['sex'];
	      $bills[$k1]['content']= preg_replace('/号.{4}/','号****',$bills[$k1]['content'],1);
	      $bills[$k1]['times'] = format_date($bills[$k1]['time']);
	      $bills[$k1]['timeouts'] =date('m月d日 H:i',$bills[$k1]['timeout']);
	      // if (time()>intval($bills[$k1]['timeout'])) {
	      // 	$bills[$k1]['status'] = 5;
	      // }
	    }
	    $this -> assign('bills', $bills);
	    $this -> display();
	  }

	}
	//首页 发单
	public function publish() {
		// 发单是否提交入口
	  if (IS_POST) {
	    if (is_login()) {
	      $uid = is_login();
	      $ucenter_member = M("ucenter_member");
	      $condition['id'] = $uid;
	      $condition['status'] = 1;
	      $mobile = $ucenter_member -> where($condition) -> find();
	      $phone = $mobile['mobile'];
	      $school = $mobile['school'];

	      $content = I('post.content');
	      // $address = I('post.address');
	      // 不能使用传过来的，只能使用获取了的
	      $address = $mobile['address'];
	      $timeout = I('post.timeout');
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
	      }
	      $otherphone = I('post.mobilephone');
	      $sum = I('post.sum');

	      if (empty($content)) {
	        $this -> error('＊内容没有填写');
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
	      $data = array('school' => $school, 'mobile' => $phone, 'time' => time(),'timeout' => $time, 'content' => $content, 'otherphone' => $otherphone, 'address' => $address, 'status' => 1, 'sum' => $sum,'starttime'=>'0','receive'=>'0','pay'=>0,'new'=>0,'type'=>'0','browse'=>0 );
	      // $bill = M("bill");
	      // $bill -> data($data) -> add();
	      // $this -> success('成功', U('Home/Index/index'));
	      $this -> success('成功', U('Home/Pay/index',$data));
	    } else {
	      $this -> redirect('Home/Pay/got');
	    }
	  };
		$uid = is_login();
		$ucenter_member = M("ucenter_member");
		$mobile = $ucenter_member -> where($condition) -> find();
		$school = $mobile['school'];
		$address = $mobile['address'];
		$mobilephone = $mobile['school'];
		$this -> assign('mobilephone', $mobilephone);
		$this -> assign('address', $address);
		$this -> display();
	}
	//首页 说说
	public function say() {
		if (is_login()) {
			$uid = is_login();
	    $user = M("ucenter_member");
	    $username = $user -> where('id=' . $uid) -> find();
			$school = $username['school'];
			// 显示说说
	    $condition['school'] = $school;
	    $condition['status'] = 1;
	    $message = M("message");
	    $list = $message -> where($condition) -> order('id desc') -> limit(50) -> select();
	    $comment = M("messagecomment");
	    foreach ($list as $k => $v) {
	      $count = $comment -> where('mid=' . $v['id']) -> count();
	      $list[$k]['mid'] = $count;
	      $nickname = $user -> where('mobile=' . $list[$k]['mobile']) -> find();
	      $list[$k]['username'] = $nickname['username'];
	      $list[$k]['picture'] = "." . $nickname['picture'];
	      $list[$k]['school'] = $nickname['school'];
	      $list[$k]['sex'] = $nickname['sex'];
	      $list[$k]['time'] = format_date($list[$k]['time']);
	    }
	    $this -> assign('list', $list);
			$this -> display();
		}else {
			// 没登录显示的说说列表
	    $message = M("message");
	    $list = $message -> order('id desc') -> limit(50) -> select();
			$user = M("ucenter_member");
	    $comment = M("messagecomment");
	    foreach ($list as $k => $v) {
	      $count = $comment -> where('mid=' . $v['id']) -> count();
	      $list[$k]['mid'] = $count;
	      $nickname = $user -> where('mobile=' . $list[$k]['mobile']) -> find();
	      $list[$k]['username'] = $nickname['username'];
	      $list[$k]['picture'] = "." . $nickname['picture'];
	      $list[$k]['school'] = $nickname['school'];
	      $list[$k]['sex'] = $nickname['sex'];
	      $list[$k]['time'] = format_date($list[$k]['time']);
	    }
	    $this -> assign('list', $list);
			$this -> display();
		}

	}
	//首页 个人中心
	public function individual() {
		if (is_login()) {
			$uid = is_login();
	    $user = M("ucenter_member");
	    $username = $user -> where('id=' . $uid) -> find();
	    $name = $username['username'];
	    $address = $username['address'];
	    $sex = $username['sex'];
	    $balance = $username['balance'];
	    $mobilephone = $username['mobile'];
	    $school = $username['school'];

			// 显示个人信息
	    $this -> assign('sex', $sex);
	    $this -> assign('balance', $balance);
	    $picture = $username['picture'];
	    $picture = "." . $picture;
	    $this -> assign('picture', $picture);
	    $this -> assign('name', $name);
	    $this -> assign('school', $school);
		}
		$this -> display();
	}

	//首页发出单模块,金额确定
	public function money() {
		$this -> display();
	}

	//发单详情页
	public function bill() {
		// 检验登录，没有登陆直接跳转到登录页面
		if (is_login()) {
			$username = I('get.username');
			$time = I('get.time');
			$times = I('get.times');
			$id = I('get.id');
			$school = I('get.school');
			$content = I('get.content');
			$mobile = I('get.mobile');
			$address = I('get.address');
			$user = M("ucenter_member");
			$users = $user -> where("mobile='$mobile'") -> find();
			$picture = '.' . $users['picture'];
			$sex = I('get.sex');
			$sum = I('get.sum');
			$bill = M("bill");
			$bills = $bill -> where("id='$id'") -> find();
			$status = $bills['status'];

			$this -> assign('times', $times);
			$this -> assign('time', $time);
			$this -> assign('sum', $sum);
			$this -> assign('status', $status);
			$this -> assign('mobile', $mobile);
			$this -> assign('username', $username);
			$this -> assign('content', $content);
			$this -> assign('school', $school);
			$this -> assign('sex', $sex);
			$this -> assign('address', $address);
			$this -> assign('picture', $picture);

			// 评论加载
			$billcomment = M('billcomment');
			$billreply = M('billreply');
			$messages = $billcomment -> where("cid='$id'" ) -> order('id asc') -> select();
			// 初始化一个数组用于储存 遍历出来的所有评论的唯一编号
			$reply = array();
			foreach ($messages as $k => $v) {
				// 从会员表中读取数据存放入当前的表集当中
				$user = M("ucenter_member");
				$nickname = $user -> where('mobile='. $messages[$k]['cphone']) -> find();
				$messages[$k]['username'] = $nickname['username'];
				$messages[$k]['school'] = $nickname['school'];
				$messages[$k]['sex'] = $nickname['sex'];
				$messages[$k]['picture'] = "." . $nickname['picture'];
				//存入当前说说的所有评论的唯一编号入 reply 中
				$reply[] = $v['id'];
			}

			// 评论的回复加载
			// 开辟一个数组，这是一个三维数组，第一维根据几个评论 出来的 第二维中间含有一个二位数组是 取出的回复数据集
			$arr = array();
			foreach ($reply as $value) {
				$replys = $billreply -> where('cid=' . $value) -> order('time asc') -> select();
				foreach ($replys as $key1 => $value1) {
					$nickname1 = $user -> where('mobile=' . $value1['mobile']) -> find();
					$replys[$key1]['mobile'] = $nickname1['username'];
					$nickname2 = $user -> where('mobile=' . $value1['mphone']) -> find();
					$replys[$key1]['mphone'] = $nickname2['username'];

				}
				// 储存这个二维数组进入一个新的二维数组,name是任意的，必须和前台保持一致
				$arr[$value]['name'] = $replys;
			}
			$this -> assign('messages', $messages);
			$this -> assign('reply', $arr);

			// 提交评论
			if (IS_POST) {
				if (isset($_POST['content'])) {
					if (empty(I('post.content'))) {
						$list['warning'] = "你没有输入任何内容";
						$this -> ajaxReturn($list);
					} else {
						$uid = is_login();
						$ucenter_member = M("ucenter_member");
						$user = $ucenter_member -> where('id=' . $uid) -> find();
						$phone = $user['mobile'];
						$pictures = "." . $user['picture'];
						$usernames = $user['username'];

						$schools = $user['school'];
						$times = date("m月d日 H:m:s", time());
						$contents = I('post.content');

						// 储存评论
						$data = array('time' => time(), 'cid' => $id, 'mobile' => $mobile, 'cphone' => $phone, 'content' => $contents);
						$billcomment = M("billcomment");
						$billcomment -> create($data);
						$billcomment -> add();

						$list['mobile'] = $phone;
						$list['picture'] = $pictures;
						$list['user'] = $usernames;
						$list['school'] = $schools;
						$list['time'] = $times;
						$list['content'] = $contents;
						$this -> ajaxReturn($list);

					}
				}
				if (isset($_POST['reply'])) {

					if (empty(I('post.reply'))) {
						$lists['warning'] = "你没有输入任何内容";
						$this -> ajaxReturn($lists);
					} else {
						$uid = is_login();
						$ucenter_member = M("ucenter_member");
						$user = $ucenter_member -> where('id=' . $uid) -> find();
						$phone1 = $user['mobile'];
						$usernames = $user['username'];
						$mobiles = I('post.phone');
						$schools = $user['school'];
						$commentid = I('post.commentid');
						$reply = I('post.reply');

						// 储存回复
						$data = array('time' => time(), 'cid' => $commentid, 'mobile' => $mobiles, 'mphone' => $phone1, 'content' => $reply);
						$billreplys = M("billreply");
						$billreplys -> create($data);
						$billreplys -> add();

						$lists['users'] = I('post.users');
						$lists['user'] = $usernames;
						$lists['content'] = $reply;
						$this -> ajaxReturn($lists);

					}
				}
				if (isset($_POST['mobile'])) {
					// 是某一个发单人的身份表示 电话
					$number = I('post.mobile');
					$time = I('post.time');

					// 当前登陆的身份 电话
					$uid = is_login();
					$ucenter_member = M("ucenter_member");
					$user = $ucenter_member -> where('id=' . $uid) -> find();
					$phone2 = $user['mobile'];
					// 判断是否经过实名认证了
					if($user['certificate'] == 0){
						$lists['warning'] = "你还没有经过代鼠实名认证因此不具备安全的接单条件!请前往个人中心的实名认证完成认证再来接单";
						$this -> ajaxReturn($lists);
					}else if ($user['certificate'] == 1) {
						$lists['warning'] = "你的认证请求正在审核中，暂不能接单。请耐心等待，代鼠将在3天内完成对你的审核，是否通过审核请前往个人中心的实名认证查看具体信息";
						$this -> ajaxReturn($lists);
					}
					// 自己不能抢自己的单
					if ($number == $phone2) {
						$list['warning'] = "自己不能抢自己的单哦!";
						$this -> ajaxReturn($list);
					} else {
						$bill2 = M("bill");
						$conditions['time']=$time;
						$conditions['mobile']=$number;
						$data['receive'] = $phone2;
						$data['status'] = 2;
						$bill2 -> where($conditions) -> save($data);
						//  调用微信函数来发送消息

						$appid = "wx92ba7ebc07b9b5bf";
						$secret = "fd21910b685b93962908ca79033293cb";
						//第一步:取全局access_token
						$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$secret";
						$token = getJson($url);
						$access_token = $token["access_token"];
						$url1 = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=$access_token";
						$template_id = "vNK1EZVefQok4DdWaIwbNShCAKilnGCHXrXebYvvaqc";
						$openid = M('openid');
						$openids = $openid ->where("mobile = '$number'")->find();
						$openid = $openids['openids'];
						$url = "http://www.doododo.com/index.php?s=/Home/Index/mybill.html";
						$keyword1 = date('Y年m月d日 H点i分',time());
						$keyword2 = "你的发单被抢啦";
						$keyword3 = "被抢啦（第二步）";
						$keyword4 = "接单人的电话号码".$phone2;
						$keyword5 = $content;
						$remark = "你的订单刚刚被抢啦，等待对方送过来，请前往我的接单确认";
						$data = array('keyword1' => array('value' => urlencode($keyword1), 'color' => "#173177"), 'keyword2' => array('value' => urlencode($keyword2), 'color' => "#173177"), 'keyword3' => array('value' => urlencode($keyword3), 'color' => "#173177"), 'keyword4' => array('value' => urlencode($keyword4), 'color' => "#173177"), 'keyword5' => array('value' => urlencode($keyword5), 'color' => "#173177"), 'remark' => array('value' => urlencode($remark), 'color' => "#173177"));
						$templet = array('touser' => $openid, 'template_id' => $template_id, 'url' => $url, 'data' => $data);
						$templets = json_encode($templet);
						getJson($url1, urldecode($templets));

						// 必须加这个函数 不然前端不能跳转
						$this->success("成功",U('Home/Index/myreceive'));
					}
				}

			}
			$this -> display();
		} else {
			$this -> redirect('Pay/got');
		}
	}

	//个人中心的 我的发单
	public function mybill() {
		if (is_login()) {
			// 当前登录的用户的  id 一行数据 用户名，性别，电话 。最有用的是电话 $school
			$uid = is_login();
			$user = M("ucenter_member");
			$username = $user -> where('id=' . $uid) -> find();
			$mobilephone = $username['mobile'];
			$condition['mobile'] = $mobilephone;
			$condition['status'] = array('gt', 0);

			// 显示发单
			// 发单默认的 本人电话,真实姓名
			$bill = M("bill");
			$bills = $bill -> where($condition) -> order('time desc') -> limit(10) -> select();
			foreach ($bills as $k1 => $v1) {
				$nickname = $user -> where('mobile=' . $v1['mobile']) -> find();
				$bills[$k1]['username'] = $nickname['username'];
				$bills[$k1]['picture'] = "." . $nickname['picture'];
				$bills[$k1]['sex'] = $nickname['sex'];
				$bills[$k1]['times'] = format_date($bills[$k1]['time']);
			}
			$this -> assign('bills', $bills);

		} else {
			$this -> redirect('Home/Pay/got');
		}
		$this -> display();
	}

	//个人中心的 我的接单
	public function myreceive() {
		if (is_login()) {
			// 当前登录的用户的  id 一行数据 用户名，性别，电话 。最有用的是电话 $school
			$uid = is_login();
			$user = M("ucenter_member");
			$username = $user -> where('id=' . $uid) -> find();
			$mobilephone = $username['mobile'];
			$condition['receive'] = $mobilephone;

			// 显示接单
			// 发单默认的 本人电话,真实姓名
			$bill = M("bill");
			$bills = $bill -> where($condition) -> order('time desc') -> select();
			foreach ($bills as $k1 => $v1) {
				$nickname = $user -> where('mobile=' . $v1['mobile']) -> find();
				$bills[$k1]['username'] = $nickname['username'];
				$bills[$k1]['picture'] = "." . $nickname['picture'];
				$bills[$k1]['sex'] = $nickname['sex'];
				$bills[$k1]['times'] = format_date($bills[$k1]['time']);
			}
			$this -> assign('bills', $bills);

		} else {
			$this -> redirect('Home/Pay/got');
		}

		$this -> display();
	}
	public function receivebill() {
		// 检验登录，没有登陆直接跳转到登录页面
		if (is_login()) {
			$username = I('get.username');
			$time = I('get.time');
			$times = I('get.times');
			$id = I('get.id');
			$school = I('get.school');
			$content = I('get.content');
			$mobile = I('get.mobile');
			$address = I('get.address');

			$user = M("ucenter_member");
			$users = $user -> where('mobile=' . $mobile) -> find();
			$picture = '.' . $users['picture'];
			$sex = I('get.sex');
			$sum = I('get.sum');
			$bill = M("bill");
			$bills = $bill -> where('id=' . $id) -> find();
			$status = $bills['status'];
			// 把姓名加到地址上去
			$address = $users['realname']."--".$address;

			$this -> assign('times', $times);
			$this -> assign('time', $time);
			$this -> assign('sum', $sum);
			$this -> assign('status', $status);
			$this -> assign('mobile', $mobile);
			$this -> assign('username', $username);
			$this -> assign('content', $content);
			$this -> assign('school', $school);
			$this -> assign('sex', $sex);
			$this -> assign('address', $address);
			$this -> assign('picture', $picture);

			// 评论加载
			$billcomment = M('billcomment');
			$billreply = M('billreply');
			$messages = $billcomment -> where('cid=' . $id) -> order('id asc') -> select();
			// 初始化一个数组用于储存 遍历出来的所有评论的唯一编号
			$reply = array();
			foreach ($messages as $k => $v) {
				// 从会员表中读取数据存放入当前的表集当中
				$user = M("ucenter_member");
				$nickname = $user -> where('mobile=' . $messages[$k]['cphone']) -> find();
				$messages[$k]['username'] = $nickname['username'];
				$messages[$k]['school'] = $nickname['school'];
				$messages[$k]['sex'] = $nickname['sex'];
				$messages[$k]['picture'] = "." . $nickname['picture'];
				//存入当前说说的所有评论的唯一编号入 reply 中
				$reply[] = $v['id'];
			}

			// 评论的回复加载
			// 开辟一个数组，这是一个三维数组，第一维根据几个评论 出来的 第二维中间含有一个二位数组是 取出的回复数据集
			$arr = array();
			foreach ($reply as $value) {
				$replys = $billreply -> where('cid=' . $value) -> order('time asc') -> select();
				foreach ($replys as $key1 => $value1) {
					$nickname1 = $user -> where('mobile=' . $value1['mobile']) -> find();
					$replys[$key1]['mobile'] = $nickname1['username'];
					$nickname2 = $user -> where('mobile=' . $value1['mphone']) -> find();
					$replys[$key1]['mphone'] = $nickname2['username'];

				}
				// 储存这个二维数组进入一个新的二维数组,name是任意的，必须和前台保持一致
				$arr[$value]['name'] = $replys;
			}
			$this -> assign('messages', $messages);
			$this -> assign('reply', $arr);

			// 提交评论
			if (IS_POST) {
				if (isset($_POST['content'])) {
					if (empty(I('post.content'))) {
						$list['warning'] = "你没有输入任何内容";
						$this -> ajaxReturn($list);
					} else {
						$uid = is_login();
						$ucenter_member = M("ucenter_member");
						$user = $ucenter_member -> where('id=' . $uid) -> find();
						$phone = $user['mobile'];
						$pictures = "." . $user['picture'];
						$usernames = $user['username'];

						$schools = $user['school'];
						$times = date("m月d日 H:m:s", time());
						$contents = I('post.content');

						// 储存评论
						$data = array('time' => time(), 'cid' => $id, 'mobile' => $mobile, 'cphone' => $phone, 'content' => $contents);
						$billcomment = M("billcomment");
						$billcomment -> create($data);
						$billcomment -> add();

						$list['mobile'] = $phone;
						$list['picture'] = $pictures;
						$list['user'] = $usernames;
						$list['school'] = $schools;
						$list['time'] = $times;
						$list['content'] = $contents;
						$this -> ajaxReturn($list);

					}
				}
				if (isset($_POST['reply'])) {

					if (empty(I('post.reply'))) {
						$lists['warning'] = "你没有输入任何内容";
						$this -> ajaxReturn($lists);
					} else {
						$uid = is_login();
						$ucenter_member = M("ucenter_member");
						$user = $ucenter_member -> where('id=' . $uid) -> find();
						$phone1 = $user['mobile'];
						$usernames = $user['username'];
						$mobiles = I('post.phone');
						$schools = $user['school'];
						$commentid = I('post.commentid');
						$reply = I('post.reply');

						// 储存回复
						$data = array('time' => time(), 'cid' => $commentid, 'mobile' => $mobiles, 'mphone' => $phone1, 'content' => $reply);
						$billreplys = M("billreply");
						$billreplys -> create($data);
						$billreplys -> add();

						$lists['users'] = I('post.users');
						$lists['user'] = $usernames;
						$lists['content'] = $reply;
						$this -> ajaxReturn($lists);

					}
				}
				if (isset($_POST['mobile'])) {
					// 是某一个发单人的身份表示 电话
					$number = I('post.mobile');
					$time = I('post.time');

					// 当前登陆的身份 电话
					$uid = is_login();
					$ucenter_member = M("ucenter_member");
					$user = $ucenter_member -> where('id=' . $uid) -> find();
					$phone2 = $user['mobile'];

					$bill2 = M("bill");
					$conditions['time']=$time;
					$conditions['mobile']=$number;
					$data['status'] = 3;

					$bill2 -> where($conditions) -> save($data);

					// // 调用微信函数来发送消息

					$appid = "wx92ba7ebc07b9b5bf";
					$secret = "fd21910b685b93962908ca79033293cb";
					//第一步:取全局access_token
					$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$secret";
					$token = getJson($url);
					$access_token = $token["access_token"];
					$url1 = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=$access_token";
					$template_id = "vNK1EZVefQok4DdWaIwbNShCAKilnGCHXrXebYvvaqc";
					$openid = M('openid');
					$openids = $openid ->where("mobile = '$number'")->find();
					$openid = $openids['openids'];
					$url = "http://www.doododo.com/index.php?s=/Home/Index/mybill.html";
					$keyword1 = date('Y年m月d日 H点i分',time());
					$keyword2 = "你的发单已送达";
					$keyword3 = "已送达（第三步）";
					$keyword4 = "接单人的电话号码".$phone2;
					$keyword5 = $content;
					$remark = "你的发单已送达，确认无误后前往我的发单点击确认付款";
					$data = array('keyword1' => array('value' => urlencode($keyword1), 'color' => "#173177"), 'keyword2' => array('value' => urlencode($keyword2), 'color' => "#173177"), 'keyword3' => array('value' => urlencode($keyword3), 'color' => "#173177"), 'keyword4' => array('value' => urlencode($keyword4), 'color' => "#173177"), 'keyword5' => array('value' => urlencode($keyword5), 'color' => "#173177"), 'remark' => array('value' => urlencode($remark), 'color' => "#173177"));
					$templet = array('touser' => $openid, 'template_id' => $template_id, 'url' => $url, 'data' => $data);
					$templets = json_encode($templet);
					getJson($url1, urldecode($templets));
					// 必须加这个函数 不然前端不能跳转
					$this->success("成功");
					}
			}
			$this -> display();
		} else {
			$this -> redirect('Home/Pay/got');
		}
	}
	public function sendbill() {
		// 检验登录，没有登陆直接跳转到登录页面
		if (is_login()) {
			$username = I('get.username');
			$time = I('get.time');
			$times = I('get.times');
			$id = I('get.id');
			$school = I('get.school');
			$content = I('get.content');
			$mobile = I('get.mobile');
			$address = I('get.address');
			$user = M("ucenter_member");
			$users = $user -> where('mobile=' . $mobile) -> find();
			$picture = '.' . $users['picture'];
			$sex = I('get.sex');
			$sum = I('get.sum');
			$bill = M("bill");
			$bills = $bill -> where('id=' . $id) -> find();
			$status = $bills['status'];
			// 接单人电话
			$receive = $bills['receive'];

			$this -> assign('receive', $receive);
			$this -> assign('times', $times);
			$this -> assign('time', $time);
			$this -> assign('sum', $sum);
			$this -> assign('status', $status);
			$this -> assign('mobile', $mobile);
			$this -> assign('username', $username);
			$this -> assign('content', $content);
			$this -> assign('school', $school);
			$this -> assign('sex', $sex);
			$this -> assign('address', $address);
			$this -> assign('picture', $picture);

			// 评论加载
			$billcomment = M('billcomment');
			$billreply = M('billreply');
			$messages = $billcomment -> where('cid=' . $id) -> order('id asc') -> select();
			// 初始化一个数组用于储存 遍历出来的所有评论的唯一编号
			$reply = array();
			foreach ($messages as $k => $v) {
				// 从会员表中读取数据存放入当前的表集当中
				$user = M("ucenter_member");
				$nickname = $user -> where('mobile=' . $messages[$k]['cphone']) -> find();
				$messages[$k]['username'] = $nickname['username'];
				$messages[$k]['school'] = $nickname['school'];
				$messages[$k]['sex'] = $nickname['sex'];
				$messages[$k]['picture'] = "." . $nickname['picture'];
				//存入当前说说的所有评论的唯一编号入 reply 中
				$reply[] = $v['id'];
			}

			// 评论的回复加载
			// 开辟一个数组，这是一个三维数组，第一维根据几个评论 出来的 第二维中间含有一个二位数组是 取出的回复数据集
			$arr = array();
			foreach ($reply as $value) {
				$replys = $billreply -> where('cid=' . $value) -> order('time asc') -> select();
				foreach ($replys as $key1 => $value1) {
					$nickname1 = $user -> where('mobile=' . $value1['mobile']) -> find();
					$replys[$key1]['mobile'] = $nickname1['username'];
					$nickname2 = $user -> where('mobile=' . $value1['mphone']) -> find();
					$replys[$key1]['mphone'] = $nickname2['username'];

				}
				// 储存这个二维数组进入一个新的二维数组,name是任意的，必须和前台保持一致
				$arr[$value]['name'] = $replys;
			}
			$this -> assign('messages', $messages);
			$this -> assign('reply', $arr);

			// 提交评论和给对方支付金额
			if (IS_POST) {
				if (isset($_POST['content'])) {
					if (empty(I('post.content'))) {
						$list['warning'] = "你没有输入任何内容";
						$this -> ajaxReturn($list);
					} else {
						$uid = is_login();
						$ucenter_member = M("ucenter_member");
						$user = $ucenter_member -> where('id=' . $uid) -> find();
						$phone = $user['mobile'];
						$pictures = "." . $user['picture'];
						$usernames = $user['username'];

						$schools = $user['school'];
						$times = date("m月d日 H:m:s", time());
						$contents = I('post.content');

						// 储存评论
						$data = array('time' => time(), 'cid' => $id, 'mobile' => $mobile, 'cphone' => $phone, 'content' => $contents);
						$billcomment = M("billcomment");
						$billcomment -> create($data);
						$billcomment -> add();

						$list['mobile'] = $phone;
						$list['picture'] = $pictures;
						$list['user'] = $usernames;
						$list['school'] = $schools;
						$list['time'] = $times;
						$list['content'] = $contents;
						$this -> ajaxReturn($list);

					}
				}
				if (isset($_POST['reply'])) {

					if (empty(I('post.reply'))) {
						$lists['warning'] = "你没有输入任何内容";
						$this -> ajaxReturn($lists);
					} else {
						$uid = is_login();
						$ucenter_member = M("ucenter_member");
						$user = $ucenter_member -> where('id=' . $uid) -> find();
						$phone1 = $user['mobile'];
						$usernames = $user['username'];
						$mobiles = I('post.phone');
						$schools = $user['school'];
						$commentid = I('post.commentid');
						$reply = I('post.reply');

						// 储存回复
						$data = array('time' => time(), 'cid' => $commentid, 'mobile' => $mobiles, 'mphone' => $phone1, 'content' => $reply);
						$billreplys = M("billreply");
						$billreplys -> create($data);
						$billreplys -> add();

						$lists['users'] = I('post.users');
						$lists['user'] = $usernames;
						$lists['content'] = $reply;
						$this -> ajaxReturn($lists);

					}
				}
				if (isset($_POST['mobile'])) {
					// 是某一个发单人的身份表示 电话
					$number = I('post.mobile');
					$time = I('post.time');

					// 当前登陆的身份 电话
					$uid = is_login();
					$ucenter_member = M("ucenter_member");
					$user = $ucenter_member -> where('id=' . $uid) -> find();
					$phone2 = $user['mobile'];

					$bill2 = M("bill");
					$conditions['time']=$time;
					$conditions['mobile']=$number;
					$data['status'] = 4;
					$bill2 -> where($conditions) -> save($data);
					// 把金额支付给接单的人
					$uc_member = M('ucenter_member');
					$ucmenber = $uc_member->where('mobile=' . $receive) -> find();
					$datas['balance']=I('get.sum') + $ucmenber['balance'];
					$uc_member -> where('mobile='. $receive) -> save($datas);

					//  调用微信函数来发送消息

					$appid = "wx92ba7ebc07b9b5bf";
					$secret = "fd21910b685b93962908ca79033293cb";
					//第一步:取全局access_token
					$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$secret";
					$token = getJson($url);
					$access_token = $token["access_token"];
					$url1 = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=$access_token";
					$template_id = "vNK1EZVefQok4DdWaIwbNShCAKilnGCHXrXebYvvaqc";
					$openid = M('openid');
					$openids = $openid ->where("mobile = '$number'")->find();
					$openid = $openids['openids'];
					$url = "http://www.doododo.com/index.php?s=/Home/Index/mybill.html";
					$keyword1 = date('Y年m月d日 H点i分',time());
					$keyword2 = "此单已结束";
					$keyword3 = "已结单（第四步）";
					$keyword4 = "接单人的电话号码".$phone2;
					$keyword5 = $content;
					$remark = "你的发单刚刚结束。欢迎再次发单";
					$data = array('keyword1' => array('value' => urlencode($keyword1), 'color' => "#173177"), 'keyword2' => array('value' => urlencode($keyword2), 'color' => "#173177"), 'keyword3' => array('value' => urlencode($keyword3), 'color' => "#173177"), 'keyword4' => array('value' => urlencode($keyword4), 'color' => "#173177"), 'keyword5' => array('value' => urlencode($keyword5), 'color' => "#173177"), 'remark' => array('value' => urlencode($remark), 'color' => "#173177"));
					$templet = array('touser' => $openid, 'template_id' => $template_id, 'url' => $url, 'data' => $data);
					$templets = json_encode($templet);
					getJson($url1, urldecode($templets));
					// 必须加这个函数 不然前端不能跳转
					$this->success("成功");
					}
				// 取消订单的作用
				if (isset($_POST['times'])) {
						// 是某一个发单人的身份表示 电话
						$numbers = I('post.mobiles');
						$times = I('post.times');

						// 当前登陆的身份 电话
						$uid = is_login();
						$ucenter_member = M("ucenter_member");
						$user = $ucenter_member -> where('id=' . $uid) -> find();
						$phone2 = $user['mobile'];

						// 储存新的状态
						$bill = M("bill");
						$conditions['time']=$times;
						$conditions['mobile']=$numbers;
						$data['status'] = -1;
						$bill -> where($conditions) -> save($data);

						// 把金额退给发单的人
						$uc_member = M('ucenter_member');
						$ucmenber = $uc_member->where('mobile=' . $numbers) -> find();
						$datas['balance']=I('get.sum') + $ucmenber['balance'];
						$uc_member -> where('mobile='. $numbers) -> save($datas);

						//  调用微信函数来发送消息

						$appid = "wx92ba7ebc07b9b5bf";
						$secret = "fd21910b685b93962908ca79033293cb";
						//第一步:取全局access_token
						$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$secret";
						$token = getJson($url);
						$access_token = $token["access_token"];
						$url1 = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=$access_token";
						$template_id = "vNK1EZVefQok4DdWaIwbNShCAKilnGCHXrXebYvvaqc";
						$openid = M('openid');
						$openids = $openid ->where("mobile = '$numbers'")->find();
						$openid = $openids['openids'];
						$url = "http://www.doododo.com/index.php?s=/Home/Pay/balance.html";
						$keyword1 = date('Y年m月d日 H点i分',time());
						$keyword2 = "你的发单已经取消";
						$keyword3 = "该单已取消！";
						$keyword4 = "代鼠";
						$keyword5 = $content;
						$remark = "你的订单刚刚被取消，该单的金额已经退回到了你的个人余额，可供提现。";
						$data = array('keyword1' => array('value' => urlencode($keyword1), 'color' => "#173177"), 'keyword2' => array('value' => urlencode($keyword2), 'color' => "#173177"), 'keyword3' => array('value' => urlencode($keyword3), 'color' => "#173177"), 'keyword4' => array('value' => urlencode($keyword4), 'color' => "#173177"), 'keyword5' => array('value' => urlencode($keyword5), 'color' => "#173177"), 'remark' => array('value' => urlencode($remark), 'color' => "#173177"));
						$templet = array('touser' => $openid, 'template_id' => $template_id, 'url' => $url, 'data' => $data);
						$templets = json_encode($templet);
						getJson($url1, urldecode($templets));
						// 必须加这个函数 不然前端不能跳转
						$this->success("成功",U('Home/Index/mybill'));
						}
			}
			$this -> display();
		} else {
			$this -> redirect('Home/Pay/got');
		}
	}

	// 自动加载更多单
	public function autoloadbill() {

		if (is_login()) {

			// 读取当前用户的学校进行查询
			$uid = is_login();
			$ucenter_member = M("ucenter_member");
			$user = $ucenter_member -> where('id=' . $uid) -> find();
			$condition['school'] = $user['school'];
			$condition['status'] = array('gt', 0);
			$bill = M("bill");
			$page = intval($_GET['pages']);
			//获取请求的页数
			$start = $page * 5;
			$data = $bill -> where($condition) -> order('id desc') -> limit($start, 5) -> select();
			foreach ($data as $k1 => $v1) {
				$nickname = $ucenter_member -> where('mobile=' . $v1['mobile']) -> find();
				$data[$k1]['username'] = $nickname['username'];
				$data[$k1]['picture'] = "." . $nickname['picture'];
				$data[$k1]['sex'] = $nickname['sex'];
				$data[$k1]['time'] = format_date($data[$k1]['time']);
				$data[$k1]['content']= preg_replace('/号.{4}/','号****',$data[$k1]['content'],1);
				$data[$k1]['timeout'] = format_date($data[$k1]['timeout']);
				if (time() > intval($data[$k1]['timeout']) ) {
					if($data[$k1]['status'] !== 5 && $data[$k1]['status'] == 1){
						// 过期之后把钱退给用户
						$bill_sum = $bill-> where('mobile=' . $v1['mobile'])->where('id=' . $v1['id']) ->find();
						$user_balace = $user-> where('mobile=' . $v1['mobile']) -> find();
						$bill_sums['balance'] =$user_balace['balance']+$bill_sum['sum'];
						$user-> where('mobile=' . $v1['mobile'])->save($bill_sums);
						// 状态为5
						$datas['status']=5;
						$bill-> where('mobile=' . $v1['mobile'])->where('id=' . $v1['id']) -> save($datas);
					}
				}

			}
			echo json_encode($data);
			//转换为json数据输出
		}

	}
	// 自动加载更多说说
	public function autoloadmessage() {
		if (is_login()) {

			// 读取当前用户的学校进行查询说说
			$uid = is_login();
			$ucenter_member = M("ucenter_member");
			$user = $ucenter_member -> where('id=' . $uid) -> find();
			$condition['school'] = $user['school'];
			$condition['status'] = 1;
			$message = M("message");
			$page = intval($_GET['page']);
			//获取请求的页数
			$start = $page * 10;
			$data = $message -> where($condition) -> order('id desc') -> limit($start, 10) -> select();
			$comment = M("messagecomment");
			foreach ($data as $k1 => $v1) {
				$count = $comment -> where('mid=' . $v1['id']) -> count();
				$data[$k1]['mid'] = $count;
				$nickname = $ucenter_member -> where('mobile=' . $v1['mobile']) -> find();
				$data[$k1]['username'] = $nickname['username'];
				$data[$k1]['picture'] = "." . $nickname['picture'];
				$data[$k1]['sex'] = $nickname['sex'];
				$data[$k1]['time'] = format_date($data[$k1]['time']);
			}
			echo json_encode($data);
			//转换为json数据输出
		}

	}

	//发送说说页面
	public function sendmessage() {
		// 检验登录，没有登陆直接跳转到登录页面
		if (is_login()) {
			// 发送说说入口
			if (IS_POST) {
				// 发送说说
				if (isset($_POST['content'])) {
				$uid = is_login();
				$ucenter_member = M("ucenter_member");
				$mobile = $ucenter_member -> where('id=' . $uid) -> find();
				$phone = $mobile['mobile'];
				$school = $mobile['school'];
				$content = I('post.content');

				if (empty($content)) {
					$this -> error('没有输入任何内容');
				}
				if (strlen($content) > 100) {
					$this -> error('说说的文字长度不能超过100个');
				}

				$data = array('school' => $school, 'mobile' => $phone, 'time' => time(), 'content' => $content, 'status' => 1,'browse'=>0);
				$bill = M("message");
				$bill -> create();
			  $bill	-> add($data);
				$data['info'] = "发表说说成功，即将跳转到说说页面～";
				$data['url'] = "http://www.doododo.com/index.php?s=/Home/Index/index.html";
				$this->ajaxReturn($data);
				// $this -> success('', U('Home/Index/index'));
			  }
				// 删除说说
			  if (isset($_POST['id'])) {
        // $this -> success('', U('Home/Index/index'));
				// $lists['content'] = "hello";
				// $this -> ajaxReturn($lists);
			  }

			} else {
				// 展示自己所发送的说说
				$uid = is_login();
				$ucenter_member = M("ucenter_member");
				$mobile = $ucenter_member -> where('id=' . $uid) -> find();
				$phone = $mobile['mobile'];
				$username = $mobile['username'];
				$school = $mobile['school'];
				$sex = $mobile['sex'];
				// 加‘.’是因为文件的路径需要
				$picture = "." . $mobile['picture'];

				$message = M('message');
				$condition['school'] = $school;
				$condition['mobile'] = $phone;
				$sendmessage = $message -> where($condition) -> order('id desc') -> select();
				foreach ($sendmessage as $k => $v) {
					$sendmessage[$k]['time'] = format_date($sendmessage[$k]['time']);
					$sendmessage[$k]['sex'] = $sex;
					$sendmessage[$k]['username'] = $username;

				}
				$this -> assign('picture', $picture);
				$this -> assign('sex', $sex);
				$this -> assign('sendmessage', $sendmessage);
				$this -> assign('username', $username);

				$this -> display();
			}

		} else {
			$this -> redirect('Home/Pay/got');
		}

	}

	//说说详情页
	public function message() {
		if (is_login()) {
			// 说说页面初始化加载
			$id = I('get.id');
			// 更新浏览次数
			$message = M('message');
			$browse = $message -> where('id=' . $id) -> find();
			$browse['browse'] = $browse['browse'] + 1;
			$data['browse'] = $browse['browse'];
			$message -> where('id=' . $id) -> save($data);

			$username = I('get.username');
			$time = I('get.time');
			$school = I('get.school');
			$content = I('get.content');
			$mobile = I('get.mobile');
			$sex = I('get.sex');
			$ucenter = M("ucenter_member");
			$row = $ucenter -> where('mobile=' . $mobile) -> find();
			$picture = "." . $row['picture'];

			$this -> assign('time', $time);
			$this -> assign('sex', $sex);
			$this -> assign('username', $username);
			$this -> assign('content', $content);
			$this -> assign('school', $school);
			$this -> assign('picture', $picture);

			// 评论加载
			$messagecomment = M('messagecomment');
			$messagereply = M('messagereply');
			$messages = $messagecomment -> where('mid=' . $id) -> order('id asc') -> select();
			// 初始化一个数组用于储存 遍历出来的所有评论的唯一编号
			$reply = array();
			foreach ($messages as $k => $v) {
				// 从会员表中读取数据存放入当前的表集当中
				$user = M("ucenter_member");
				$nickname = $user -> where('mobile=' . $messages[$k]['mphone']) -> find();
				$messages[$k]['username'] = $nickname['username'];
				$messages[$k]['school'] = $nickname['school'];
				$messages[$k]['sex'] = $nickname['sex'];
				$messages[$k]['picture'] = "." . $nickname['picture'];
				//存入当前说说的所有评论的唯一编号入 reply 中
				$reply[] = $v['id'];
			}
			// 评论的回复加载
			// 开辟一个数组，这是一个三维数组，第一维根据几个评论 出来的 第二维中间含有一个二位数组是 取出的回复数据集
			$arr = array();
			foreach ($reply as $value) {
				$replys = $messagereply -> where('mid=' . $value) -> order('time asc') -> select();
				foreach ($replys as $key1 => $value1) {
					$nickname1 = $user -> where('mobile=' . $value1['mobile']) -> find();
					$replys[$key1]['mobile'] = $nickname1['username'];
					$nickname2 = $user -> where('mobile=' . $value1['rphone']) -> find();
					$replys[$key1]['rphone'] = $nickname2['username'];

				}
				// 储存这个二维数组进入一个新的二维数组,name是任意的，必须和前台保持一致
				$arr[$value]['name'] = $replys;
			}

			$this -> assign('messages', $messages);
			$this -> assign('reply', $arr);

			// 提交评论
			if (IS_POST) {
				if (isset($_POST['content'])) {
					if (empty(I('post.content'))) {
						$list['warning'] = "你没有输入任何内容";
						$this -> ajaxReturn($list);
					} else {
						$uid = is_login();
						$ucenter_member = M("ucenter_member");
						$user = $ucenter_member -> where('id=' . $uid) -> find();
						$phone = $user['mobile'];
						$pictures = "." . $user['picture'];
						$usernames = $user['username'];

						$schools = $user['school'];
						$times = date("m月d日 H:m:s", time());
						$contents = I('post.content');

						// 储存评论
						$data = array('time' => time(), 'mid' => $id, 'mobile' => $mobile, 'mphone' => $phone, 'content' => $contents);
						$messagecomment = M("messagecomment");
						$messagecomment -> create($data);
						$messagecomment -> add();

						$list['mobile'] = $phone;
						$list['picture'] = $pictures;
						$list['user'] = $usernames;
						$list['school'] = $schools;
						$list['time'] = $times;
						$list['content'] = $contents;
						$this -> ajaxReturn($list);

					}
				}
				if (isset($_POST['reply'])) {

					if (empty(I('post.reply'))) {
						$lists['warnings'] = "你没有输入任何内容";
						$this -> ajaxReturn($lists);
					} else {

						$uid = is_login();
						$ucenter_member = M("ucenter_member");
						$user = $ucenter_member -> where('id=' . $uid) -> find();
						$phone1 = $user['mobile'];
						$usernames = $user['username'];
						$mobiles = I('post.phone');
						$schools = $user['school'];
						$commentid = I('post.commentid');
						$reply = I('post.reply');

						// 储存回复
						$data = array('time' => time(), 'mid' => $commentid, 'mobile' => $mobiles, 'rphone' => $phone1, 'content' => $reply);
						$messagereply = M("messagereply");
						$messagereply -> create($data);
						$messagereply -> add();

						$lists['users'] = I('post.users');
						$lists['user'] = $usernames;
						$lists['content'] = $reply;
						$this -> ajaxReturn($lists);

					}
				}

			}

		} else {
			$this -> redirect('Pay/got');
		}

		$this -> display();
	}
	//修改地址页面
	public function address() {
		// 检验登录，没有登陆直接跳转到登录页面
		if (is_login()) {
			// 发送说说入口
			if (IS_POST) {
				// 发送说说
				if (isset($_POST['content'])) {
				$content = I('post.content');
				$name = I('post.name');
				$content = trim($content);
				$content = stripslashes($content);
				$content = htmlspecialchars($content);
				if (empty($content)) {
					$this -> error('没有输入任何内容');
				 }
				 if ($content == "收货地址请前往个人中心收货地址处填写") {
 					$this -> error('没有输入任何真实的地址，请修改收货地址');
 				 }
				if (strlen($content) > 100) {
					$this -> error('地址的长度不能超过50个');
				}
				$name = trim($name);
				$name = stripslashes($name);
				$name = htmlspecialchars($name);
				if (empty($name)) {
					$this -> error('没有输入真实姓名');
				 }
				if (strlen($name) > 20) {
					$this -> error('地址的长度不能超过20个');
				}
				$uid = is_login();
				$ucenter_member = M("ucenter_member");
				$address['address'] = $content;
				$address['realname'] = $name;

				$ucenter_member-> where('id=' . $uid) -> save($address);
				// $this -> success('', U('Home/Index/index'));
				$data['status'] =1 ;
				$data['info'] = "修改姓名和地址成功，即将跳转到发单页面～";
				$data['url'] = "http://www.doododo.com/index.php?s=/Home/Index/index.html";
				$this->ajaxReturn($data);
			  }
			} else {
				// 展示自己所发送的说说
				$uid = is_login();
				$ucenter_member = M("ucenter_member");
				$mobile = $ucenter_member -> where('id=' . $uid) -> find();
				$phone = $mobile['address'];
				$names = $mobile['realname'];
				$this -> assign('address', $phone);
				$this -> assign('name', $names);
				$this -> display();
			}

		} else {
			$this -> redirect('Home/Pay/got');
		}

	}

}
