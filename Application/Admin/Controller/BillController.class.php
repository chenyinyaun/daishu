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
class BillController extends AdminController {

	/**
	 * 用户管理首页
	 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
	 */
	public function index() {
		// 调用 数据集生成函数,这个函数本身就包含了  _page
    $list   = $this->lists('bill');
    int_to_string($list);
    $this->assign('_list', $list);
		$this -> display();
	}
  /**
   * 更改发单状态
   * @author 陈胤元
   */
  public function status() {
		$id = I('get.id');
		$status = I('get.status');
		$bill = M("bill");
		$bill->status = $status;
    $bill->where('id='.$id)->save();
		$this -> redirect('Bill/index');
	}
	/**
	 * 审核资料
	 */
	public function certificate() {
		// 调用 数据集生成函数,这个函数本身就包含了  _page
		$list   = $this->lists('ucenter_member');
		int_to_string($list);
		foreach ($list as $key => $value) {
			if($list[$key]['dormitory']== '0' || $list[$key]['certificate']==0 ||$list[$key]['certificate']==2){
				unset($list[$key]);
			}
		}
		$this->assign('_list', $list);
		$this -> display();
	}
	/**
	 * 更改审核状态
	 * @author 陈胤元
	 */
	public function pass() {
		$id = I('get.id');
		$certificate =I('get.certificate');
		$user = M('ucenter_member');
		$data['certificate']= $certificate;
		$user->where('id='.$id)->save($data);
		$this -> redirect('Bill/certificate');
	}

}
