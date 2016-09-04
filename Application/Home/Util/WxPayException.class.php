<?php
require_once "WxPayException.class.php";
require_once "WxPayConfig.class.php";
require_once "WxPayDataBase.class.php";
require_once "WxPayNotify.class.php";
require_once "JsApiPay.class.php";
require_once "WxPayApi.class.php";

/**
 *
 * 微信支付API异常类
 * @author widyhu
 *
 */
class WxPayException extends Exception {
	public function errorMessage()
	{
		return $this->getMessage();
	}
}
