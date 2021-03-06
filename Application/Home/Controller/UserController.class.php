<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;
use User\Api\UserApi;

/**
 * 用户控制器
 * 包括用户中心，用户登录及注册
 */
class UserController extends HomeController {

	/* 用户中心首页 */
	public function index() {

	}

	/* 注册页面 */
	public function register($username = '', $password = '', $repassword = '', $email = '', $mobile = '', $school = '', $sex = '') {
		if (!C('USER_ALLOW_REGISTER')) {
			$this -> error('注册已关闭');
		}
		if (IS_POST) {//注册用户

			/* 检测密码 */
			if ($password != $repassword) {
				$this -> error('密码和重复密码不一致！');
			}
			if (empty($school)) {
				$this -> error('学校没有选中哦！');
			}
			// if (empty($academy)) {
			// 	$this -> error('学院没有选中哦！');
			// }
			if (!preg_match("/^1[0-9]{1}[0-9]{1}[0-9]{8}$/", $mobile)) {
				$this -> error('手机格式不正确！');
			}
			/* 调用注册接口注册用户 */
			$User = new UserApi;
			$uid = $User -> register($username, $password, $email, $mobile, $school, $sex);
			if (0 < $uid) {//注册成功
				//TODO: 发送验证邮件
				$this -> success('注册成功！', U('Pay/got'));
			} else {//注册失败，显示错误信息
				$this -> error($this -> showRegError($uid));
			}

		} else {//显示注册表单
			$university = M("university");
			$province = $university -> distinct(true) -> field('school') -> select();
			$this -> assign('province', $province);
			$this -> display();
		}
	}

	/* 登录页面 */
	public function login($username = '', $password = '', $openid = '') {
		if (IS_POST) {//登录验证
			/* 调用UC登录接口登录 */
			$openid = I('post.openid');
			$user = new UserApi;
			$uid = $user -> login($username, $password, $openid);

			if (0 < $uid) {//UC登录成功
				/* 登录用户 */
				$Member = D('Member');
				if ($Member -> login($uid)) {//登录用户

					//TODO:跳转到登录前页面
					$this -> success('登录成功！', U('Home/Index/index'));
				} else {
					$this -> error($Member -> getError());
				}
			} else {//登录失败
				switch($uid) {
					case -1 :
						$error = '用户不存在或被禁用！';
						break;
					//系统级别禁用
					case -2 :
						$error = '密码错误！';
						break;
					default :
						$error = '未知错误！';
						break;
					// 0-接口参数错误（调试阶段使用）
				}
				$this -> error($error);
			}

		} else {//显示登录表单
			$openid = $_GET['openid'];

			$daishu_openids = M('openid');
			// 数据库名不能和字段名一样
			 $data = $daishu_openids ->order('time desc')-> where("openids = '$openid'")->find();
			//  var_dump($openid);
			if ($data['mobile']!= "") {
				$mobile = $data['mobile'];
				$password = $data['password'];
				$this -> assign('mobile', $mobile);
				$this -> assign('password', $password);
			}
			$this -> assign('openid', $openid);
			$this -> display();
		}
	}

	/* 退出登录 */
	public function logout() {
		if (is_login()) {
			D('Member') -> logout();
			$this -> success('退出成功！', U('Home/Pay/got'));
		} else {
			$this -> redirect('Home/Pay/got');
		}
	}

	/* 验证码，用于登录和注册 */
	public function verify() {
		$verify = new \Think\Verify();
		$verify -> entry(1);
	}

	/**
	 * 获取用户注册错误信息
	 * @param  integer $code 错误编码
	 * @return string        错误信息
	 */
	private function showRegError($code = 0) {
		switch ($code) {
			case -1 :
				$error = '用户名长度必须在16个字符以内！';
				break;
			case -2 :
				$error = '用户名被禁止注册！';
				break;
			case -3 :
				$error = '用户名被占用！';
				break;
			case -4 :
				$error = '密码长度必须在6-30个字符之间！';
				break;
			case -5 :
				$error = '邮箱格式不正确！';
				break;
			case -6 :
				$error = '邮箱长度必须在1-32个字符之间！';
				break;
			case -7 :
				$error = '邮箱被禁止注册！';
				break;
			case -8 :
				$error = '邮箱被占用！';
				break;
			case -9 :
				$error = '手机格式不正确！';
				break;
			case -10 :
				$error = '手机被禁止注册！';
				break;
			case -11 :
				$error = '手机号被占用！';
				break;
			default :
				$error = '未知错误';
		}
		return $error;
	}

	/**
	 * 修改密码提交
	 * @author huajie <banhuajie@163.com>
	 */
	public function profile() {
		if (!is_login()) {
			$this -> redirect('Home/Pay/got');
		}
		if (IS_POST) {
			//获取参数
			$uid = is_login();
			$password = I('post.old');
			$repassword = I('post.repassword');
			$data['password'] = I('post.password');
			// empty($password) && $this -> error('请输入原密码');
			empty($data['password']) && $this -> error('请输入新密码');
			empty($repassword) && $this -> error('请输入确认密码');

			if ($data['password'] !== $repassword) {
				$this -> error('您输入的新密码与确认密码不一致');
			}

			$Api = new UserApi();
			$res = $Api -> updateInfo($uid, $password, $data);
			if ($res['status']) {
				$list['info'] = "修改密码成功！";
				$list['status'] = $res['status'];
				$list['url'] = "http://www.doododo.com/index.php?s=/Home/User/modify.html";
				$this -> ajaxReturn($list);
				// $this -> success('修改密码成功！', U('User/modify'), 2);
			} else {
				$this -> error($res['info']);
			}
		} else {
			$this -> display();
		}
	}

	/**
	 * 修改个人资料
	 * @author huajie <banhuajie@163.com>
	 */
	public function modify() {
		if (!is_login()) {
			$this -> redirect('Home/Pay/got');
		} else {
			$this -> display();

		}
	}

	/**
	 * 修改个人资料
	 * @author huajie <banhuajie@163.com>
	 */
	public function datum() {
		if (!is_login()) {
			$this -> redirect('Home/Pay/got');
		} else {
			if (IS_POST) {
				//获取参数
				$uid = is_login();
				$password = I('post.old');
				$repassword = I('post.repassword');
				$data['password'] = I('post.password');
				// empty($password) && $this -> error('请输入原密码');
				empty($data['password']) && $this -> error('请输入新密码');
				empty($repassword) && $this -> error('请输入确认密码');

				if ($data['password'] !== $repassword) {
					$this -> error('您输入的新密码与确认密码不一致');
				}

				$Api = new UserApi();
				$res = $Api -> updateInfo($uid, $password, $data);
				if ($res['status']) {
					$this -> success('修改密码成功！', U('User/modify'), 2);
				} else {
					$this -> error($res['info']);
				}
			} else {
				$this -> display();
			}
		}
	}

	/**
	 * 获取验证码
	 * @author 陈胤元
	 */
	public function checkcode() {

				$mobile = $_GET['mobile'];
				// 验证码
				$number = (string)rand(100000,999999);
				$content='【联帮校园】欢迎注册联帮校园，您的验证码为：'.$number.'，10分钟后验证码自动过期。';
        $content = urlencode($content);
        $account='18693096095';
        $pwd = "cyy211306";
				$url="http://api.dingdongcloud.com/v1/sms/sendyzm?account=$account&pwd=$pwd&mobile=$mobile&content=$content";
				$output = getJson($url);
        $jsoninfo = json_decode($output, true);
				if ($jsoninfo["msg"] == "成功") {
					// 如果发送验证码成功
					$checkcode = M('checkcode');
					$result = $checkcode->where("mobile= '$mobile' ") -> find();
					if ($result['mobile']== "") {
						// 如果没有写入就重新写入 也就是 添加手机和验证码
						$datas = array('mobile' => $mobile, 'lasttime' => $jsoninfo["result"],'code' => $number,'time' => time() );
						$checkcode -> create();
					  $checkcode -> add($datas);
					}else {
						// 如果写入了手机号就更新验证码 和 时间
						$conditions['mobile']=$mobile;
						$data['code'] = $number;
						$data['lasttime'] = $jsoninfo["result"];
						$bill2 -> where($conditions) -> save($data);
					}
				} else {
					// 如果验证码没有发送成功
				}
			}
}
