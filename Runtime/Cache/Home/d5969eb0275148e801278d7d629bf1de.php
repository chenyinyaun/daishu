<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css" />
		<link rel="stylesheet" type="text/css" href="/Public/Home/css/index.css" />
		<link rel="stylesheet" type="text/css" href="/Public/static/font-awesome/css/font-awesome.min.css" />
		<meta charset="utf-8">
		<title>确认提现</title>
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
					确认提现
				</span>
			</div>
			<div class="place">
				<a href="">
				</a>
			</div>
		</div>
		<div class="balance-border">
			<div class="balance-money">
				<h4>确认提现金额:</h4>
				<h1 style="text-align:center;"><?php echo ($drawmoney); ?>元</h1>
			</div>
		</div>
		<div class="re-pay">
			<a class=" btn btn-warning btn-lg btn-block " onclick="window.location.href='http://www.doododo.com/back/example/back.php'" role="button">立即提现金额</a>
		</div>
		<!--<div class="head">
		</div>-->
		<script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
		<script src="/Public/static/bootstrap-3.3.5/js/bootstrap.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function() {});
		</script>
	</body>

</html>