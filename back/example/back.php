<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  		<link rel="stylesheet" type="text/css" href="http://www.doododo.com/Public/static/bootstrap-3.3.5/css/bootstrap.min.css" />
  		<link rel="stylesheet" type="text/css" href="http://www.doododo.com/Public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css" />
  		<link rel="stylesheet" type="text/css" href="http://www.doododo.com/Public/Home/css/index.css" />
      <link rel="stylesheet" type="text/css" href="http://www.doododo.com/Public/static/font-awesome/css/font-awesome.min.css" />
    <title>提现</title>
</head>
<body>
  <div class="header">
   <div class="back">
    <a href="http://www.doododo.com/index.php?s=/Home/Pay/balance.html">
      <i class="fa fa-angle-left fa-2x">
      </i>
    </a>
  </div>
  <div class="title">
    <span id="title">
      提现页面
    </span>
  </div>
  <div class="place">
    <a href="">
    </a>
  </div>
</div>
  <?php
  header("content-type:text/html;charset=utf8");
  session_start();
  require_once "../lib/WxPay.Config.php";
  require_once "../lib/WxPay.Api.php";
  require_once "WxPay.JsApiPay.php";

  //①、获取用户openid
  $tools = new JsApiPay();
  $openId = $tools->GetOpenid();

  // 传入数据

  // $out_trade_no = $_REQUEST["out_trade_no"];
  // $total_fee = $_REQUEST["total_fee"];
  // $refund_fee = $_REQUEST["refund_fee"];
  // 实例化付款类
  if ($_SESSION['mobiles'] == null || $_SESSION['drawmoney'] == null) {
    echo "<br><br>因操作原因导致提现不成功！请重新正常操作";
    unset($_SESSION['mobiles']);
    unset($_SESSION['drawmoney']);
  } else {
    $drawmoney = ($_SESSION['drawmoney'])*100;
    $mobile = $_SESSION['mobiles'];
    $partner_trade_no = getradeno();
    $inputObj = new WxPayRefund();
    $inputObj->SetOpenid($openId);
    $inputObj->SetAppid(WxPayConfig::APPID);//公众账号ID
    $inputObj->SetMch_id(WxPayConfig::MCHID);//商户号
    $inputObj->SetTransaction_id($partner_trade_no);
    $inputObj->SetName("NO_CHECK");
    $inputObj->SetRefund_fee($drawmoney);
    $inputObj->SetDesc("从代鼠软件个人余额的提现");
    $inputObj->SetNonce_str(getNonceStr());//随机字符串
    $inputObj->SetSpbill_create_ip($_SERVER['REMOTE_ADDR']);//终端ip
    $inputObj->SetDevice_info($mobile);

    //把提现的纪录存入数据库,并重新算出余额
      $crash = $_SESSION['drawmoney'];
      $time = time();
      $mysqli = new mysqli("localhost", "root", "9fbbadff8c", "thinkphp_daishu");
      $sql = "INSERT INTO onethink_draw (mobile,money,time) VALUES ('$mobile','$crash','$time')";
      $mysqli -> query("SET NAMES 'utf8'");
      $mysqli -> query($sql);

      $select_sql = "SELECT * FROM onethink_ucenter_member WHERE mobile='$mobile';";
      $mysqli -> query("SET NAMES 'utf8'");

      $result = $mysqli -> query($select_sql);
		   while ($row = $result -> fetch_assoc()) {
			$balance = $row['balance'];
		}
      $money = $balance - $crash;
      $updata_sql = "UPDATE onethink_ucenter_member SET balance='$money' WHERE mobile='$mobile'; ";
      $mysqli -> query("SET NAMES 'utf8'");
      $mysqli -> query($updata_sql);
      // 清楚seesion包证不能通过单独的链接取款
      unset($_SESSION['mobiles']);
      unset($_SESSION['drawmoney']);
      echo "<br><br>提现到个人钱包的金额为:".$crash."元,提现成功！<br><br>";
      // 打印结果
      var_dump(WxPayApi::refund($inputObj));
      // var_dump($inputObj);

  };
  function getNonceStr($length = 32)
  {
    $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
    $str ="";
    for ( $i = 0; $i < $length; $i++ )  {
      $str .= substr($chars, mt_rand(0, strlen($chars)-1), 1);
    }
    return $str;
  };
  function getradeno($lengths = 24)
  {
    $char = "432105678901234598764321";
    $strs ="";
    for ( $i = 0; $i < $lengths; $i++ )  {
      $strs .= substr($char, mt_rand(0, strlen($char)-1), 1);
    }
    return $strs;
  }
  ?>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>


<a class=" btn btn-warning btn-lg btn-block " onclick="window.location.href='http://www.doododo.com/index.php?s=/Home/User/login.html'" role="button">返回个人余额</a>
</body>
</html>
