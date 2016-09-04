<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;

/**
 * 文件控制器
 * 主要用于下载模型的文件上传和下载
 */

class FileController extends HomeController {
	/* 文件上传 */
	public function upload() {
		if (is_login()) {
			$return = array('status' => 1, 'info' => '上传成功', 'data' => '');
			/* 调用文件上传组件上传文件 */
			$File = D('File');
			$file_driver = C('DOWNLOAD_UPLOAD_DRIVER');
			$info = $File -> upload($_FILES, C('DOWNLOAD_UPLOAD'), C('DOWNLOAD_UPLOAD_DRIVER'), C("UPLOAD_{$file_driver}_CONFIG"));
			if (IS_POST) {

				if (empty($info)) {
					$this -> error('你没有选择任何图片');
				} else {
					$image = $info;
					$uid = is_login();
					$img = M("ucenter_member");
					$img -> where('id=' . $uid) -> setField('picture', $image);

					$this -> redirect('Home/Index/index');
					// $data['status'] =1 ;
					// $data['info'] = "修改姓名和地址成功，即将跳转到发单页面～";
					// $data['url'] = "http://www.doododo.com/index.php?s=/Home/Index/index.html";
					// $this->ajaxReturn($data);
					// $this->display();
				}
			}

			/* 记录附件信息 */
			// if($info){
			// 	$return['data'] = think_encrypt(json_encode($info['download']));
			// } else {
			// 	$return['status'] = 0;
			// 	$return['info']   = $File->getError();
			// }
			//
			// /* 返回JSON数据 */
			// $this->ajaxReturn($return);
		} else {
			$this -> redirect('Home/Pay/got');
		}
		$this -> display();

	}
	/* 实名认证 */
	public function certificate() {
		if (is_login()) {

			$return = array('status' => 1, 'info' => '上传成功', 'data' => '');
			/* 调用文件上传组件上传文件 */
			$File = D('File');
			$file_driver = C('DOWNLOAD_UPLOAD_DRIVER');
			$info = $File -> upload($_FILES, C('DOWNLOAD_UPLOAD'), C('DOWNLOAD_UPLOAD_DRIVER'), C("UPLOAD_{$file_driver}_CONFIG"));
			if (IS_POST) {
				$realname = I('post.realname');
				$idcard = I('post.idcard');
				$dormitory = I('post.dormitory');
				$sid = I('post.xuehao');
				if (empty($realname)) {
					$this -> error('*没有输入真实姓名');
				}
				if (empty($idcard)) {
					$this -> error('*没有输入身份证号');
				}
				if (empty($dormitory)) {
					$this -> error('*没有输入宿舍号');
				}
				if (empty($sid)) {
					$this -> error('*没有输入学号');
				}
				if (strlen($idcard) != 18) {
					$this -> error('*身份证号位数不对');
				}
				if (empty($info)) {
					$this -> error('*你没有上传任何图片！');
				} else {
					$image = $info;
					$uid = is_login();
					$data['realname']=$realname;
					$data['idcard']=$idcard;
					$data['dormitory']=$dormitory;
					$data['xuehao']=$sid;
					$data['certificate']=1;
					$data['idcardpicture']=$image;
					$img = M("ucenter_member");
					$img -> where('id=' . $uid) -> save($data);
					$this -> redirect('Home/Index/index');
					// $this->display();
				}
			}
		} else {
			$this -> redirect('Home/Pay/got');
		}
		$uid = is_login();
		$uc_member = M("ucenter_member");
		$user = $uc_member -> where('id=' . $uid) -> find();
		$this-> assign('certificate',$user['certificate']);
		$this -> display();
	}

	/* 下载文件 */
	public function aboutfile() {
		$this->display();

	}

}
