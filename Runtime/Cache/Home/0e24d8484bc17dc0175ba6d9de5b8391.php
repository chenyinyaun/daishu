<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>

	<head>
		<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
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
				<a href="javascript:history.go(-1);">
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
		<div class="balance-border">
			<div class="balance-money">
				<h5>账户可供提现余额:(注意：微信提现的最小金额是1元，若余额不足1元将不能进行提现！)</h5>
				<h1 style="text-align:center;"><?php echo ($balance); ?>元</h1>
			</div>
		</div>
		<br />
		<br />
		<br />
		<div class="container">
			<form action="/index.php?s=/Home/Pay/draw.html" method="post" role="form" class="form">
				<div class="row">
					<div class="col-xs-4">
						<label class="control-label" for="inputEmail">输入金额</label>
					</div>
					<div class="col-xs-6">
						<input type="text" id="drawmoney" class="form-control" placeholder="请输入大于1元的金额" name="drawmoney">
					</div>
					<div class="col-xs-2 ">
						<label class="control-label" for="inputEmail">元</label>
					</div>
				</div>
				<br />
				<div class="controls Validform_checktip text-warning"></div>
				<br />
				<button type="submit" class="btn btn-success btn-lg btn-block">前往提现</button>
			</form>
		</div>

		<!--<div class="head">
		</div>-->
		<script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
		<script src="/Public/static/bootstrap-3.3.5/js/bootstrap.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$(".form").submit(function() {
					var drawmoney = $('#drawmoney').val();
					if (!isNaN(drawmoney)) {
						var self = $(this);
						$.post(self.attr("action"), self.serialize(), success, "json");
						return false;

						function success(data) {
							if (data.status) {
								window.location.href = data.url;
							} else {
								self.find(".Validform_checktip").text(data.info);
							}
						}
					} else {
						alert("你输入的不是数字！");
						return false;
					}
				});
			});
		</script>
	</body>

</html>