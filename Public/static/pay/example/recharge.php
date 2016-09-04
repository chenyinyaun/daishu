<?php
header("content-type:text/html;charset=utf8");
session_start();
ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);
require_once "../lib/WxPay.Api.php";
require_once "WxPay.JsApiPay.php";
require_once 'log.php';

//初始化日志
$logHandler= new CLogFileHandler("../logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);
//打印输出数组信息
function printf_info($data)
{
    foreach($data as $key=>$value){
        echo "<font color='#00ff55;'>$key</font> : $value <br/>";
    }
}

//①、获取用户openid
$tools = new JsApiPay();
$openId = $tools->GetOpenid();

//②、统一下单
$input = new WxPayUnifiedOrder();
$input->SetBody("代鼠充值付款");
$input->SetAttach("代鼠充值付款");
$input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));

$input->SetTotal_fee($_SESSION['money']);
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
$input->SetGoods_tag("代鼠充值付款");
$input->SetNotify_url("http://www.doododo.com?s=/Home/Pay/money");
$input->SetTrade_type("JSAPI");
$input->SetOpenid($openId);
$order = WxPayApi::unifiedOrder($input);
// echo '<font color="#f00"><b>统一下单支付单信息</b></font><br/>';
// printf_info($order);
$jsApiParameters = $tools->GetJsApiParameters($order);
//③、在支持成功回调通知中处理成功之后的事宜，见 notify.php
/**
 * 注意：
 * 1、当你的回调地址不可访问的时候，回调通知会失败，可以通过查询订单来确认支付是否成功
 * 2、jsapi支付时需要填入用户openid，WxPay.JsApiPay.php中有获取openid流程 （文档可以参考微信公众平台“网页授权接口”，
 * 参考http://mp.weixin.qq.com/wiki/17/c0f37d5704f0b64713d5d2c37b468d75.html）
 */
?>

<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="http://www.doododo.com/Public/static/bootstrap-3.3.5/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="http://www.doododo.com/Public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css" />
		<link rel="stylesheet" type="text/css" href="http://www.doododo.com/Public/Home/css/index.css" />
    <link rel="stylesheet" type="text/css" href="http://www.doododo.com/Public/static/font-awesome/css/font-awesome.min.css" />
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <title>微信支付</title>
    <script type="text/javascript">
	//调用微信JS api 支付
	function jsApiCall()
	{
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',
			<?php echo $jsApiParameters; ?>,
			function(res){
        if (res.err_msg == "get_brand_wcpay_request:ok") {
				// WeixinJSBridge.log(res.err_msg);
				// alert(res.err_code+res.err_desc+res.err_msg);
        	window.location.href="http://www.doododo.com?s=/Home/Pay/money";

        }else if (res.err_msg == "get_brand_wcpay_request:cancel") {
      // message: "已取消微信支付!"
      alert("已取消微信支付");
    }
  }
		);
	}

	function callpay()
	{
		if (typeof WeixinJSBridge == "undefined"){
		    if( document.addEventListener ){
		        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
		    }else if (document.attachEvent){
		        document.attachEvent('WeixinJSBridgeReady', jsApiCall);
		        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
		    }
		}else{
		    jsApiCall();
		}
	}
	</script>

</head>
<body>
  		<div class="header">
       <div class="back">
				<a href="javascript:history.go(-1);">
          <i class="fa fa-angle-left fa-2x">
					</i>
				</a>
			</div>
			<div class="title">
				<span id="title">
					充值页面
				</span>
			</div>
			<div class="place">
				<a href="">
				</a>
			</div>
		</div>


  <div class="balance-border">
			<div class="balance-money">
				<h4>调用微信钱包接口支付:</h4>
				<h1 style="text-align:center;"><?php echo ($_SESSION['money']/100);?>元</h1>
			</div>
		</div>
    <a class=" btn btn-warning btn-lg btn-block " onclick="callpay()" role="button">立即支付</a>
		<!-- <button  type="button" onclick="callpay()" >立即支付</button> -->
</body>
</html>
