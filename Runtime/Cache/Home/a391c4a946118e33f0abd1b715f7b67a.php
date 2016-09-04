<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css" />
		<link rel="stylesheet" type="text/css" href="/Public/Home/css/index.css" />
		<link rel="stylesheet" type="text/css" href="/Public/static/font-awesome/css/font-awesome.min.css" />
		<meta charset="utf-8">
		<title>充值</title>
	</head>

	<body>
		<div class="header">
			<div class="back">
				<a href="<?php echo U('Home/Index/index');?>">
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
				<h4>账户余额:</h4>
				<h1 style="text-align:center;"><?php echo ($balance); ?>元</h1>
			</div>
		</div>
		<ul class="personal-items">
			<li>
				<a href="<?php echo U('Pay/record');?>">
					<div class="items-icon">
						<i class="fa fa-cube">
						</i>
					</div>
					<div class="items-word">
						<span>
								我的充值记录
							</span>
					</div>
				</a>
			</li>
			<li>
				<a href="<?php echo U('Pay/records');?>">
					<div class="items-icon">
						<i class="fa fa-facebook ">
				</i>
					</div>
					<div class="items-word">
						<span>
								我的提现记录</span>
					</div>
				</a>

			</li>
		</ul>
		<ul class="balance-charge">
			<li class="recharge">

				<a class=" btn btn-warning btn-lg btn-block " onclick="window.location.href='<?php echo U('Pay/recharge');?>'" role="button">充值</a>
				</li>
				<li class="draw">
					<a onclick="window.location.href='<?php echo U('Pay/draw');?>'" class=" btn btn-success btn-lg btn-block" role="button">提现</a>
				</li>
		</ul>

		<!--<div class="head">
		</div>-->
		<script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
		<script src="/Public/static/bootstrap-3.3.5/js/bootstrap.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function() {});
		</script>
	</body>

</html>