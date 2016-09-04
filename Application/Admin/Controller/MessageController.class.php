<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Admin\Controller;

/**
 * 后台用户控制器
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
class MessageController extends AdminController {

	/**
	 * 用户管理首页
	 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
	 */
	public function index() {
		// 调用 数据集生成函数,这个函数本身就包含了  _page
    $list   = $this->lists('message');
    int_to_string($list);
    $this->assign('_list', $list);

		$this -> display();
	}
  /**
   * 屏蔽说说
   * @author 陈胤元
   */
  public function screen() {
		$id = I('get.id');
		$message = M("message");
		$message->status = 0;
    $message->where('id='.$id)->save();
		$this -> redirect('Message/index');
	}

  /**
   * 显示说说
   * @author 陈胤元
   */
  public function show() {
		$id = I('get.id');
		$message = M("message");
		$message->status = 1;
		$message->where('id='.$id)->save();
		$this -> redirect('Message/index');

	}


}
