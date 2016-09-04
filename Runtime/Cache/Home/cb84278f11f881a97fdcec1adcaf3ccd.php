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
		<title>修改密码</title>
	</head>

	<body>
		<div class="panel panel-danger alert" style="display: none; top: 0px;position:absolute;z-index:99;width: 100%;">
			<div class="panel-heading">
				<h3 class="panel-title alert-content"></h3>
			</div>
		</div>
		<div class="header">
			<div class="back">
				<a href="javascript:history.go(-1);">
					<i class="fa fa-angle-left fa-2x">
					</i>
				</a>
			</div>
			<div class="title">
				<span id="title">
					修改密码
				</span>
			</div>
			<div class="place">
				<a href="">
				</a>
			</div>
		</div>
		<!--<div class="head">
		</div>-->
		<div class="container">
			<form class="login-form " role="form" action="/index.php?s=/Home/User/profile.html" method="post">

				<br />
				<div class="row">
					<div class="col-xs-5 ">
						<label class="control-label" for="old">原密码</label>
					</div>
					<div class="col-xs-7">
						<input type="password" id="old" class="form-control" placeholder="请输入原密码" name="old">
					</div>
				</div>
				<br />
				<div class="row">
					<div class="col-xs-5 ">
						<label class="control-label" for="password">请输入新密码</label>
					</div>
					<div class="col-xs-7">
						<input type="password" id="password" class="form-control" placeholder="请输入新密码" name="password">
					</div>
				</div>
				<br />
				<div class="row">
					<div class="col-xs-5 ">
						<label class="control-label" for="repassword">请确认新密码</label>
					</div>
					<div class="col-xs-7">
						<input type="password" id="repassword" class="form-control" placeholder="请确认新密码" name="repassword">
					</div>
				</div>
				<br />
				<div class="controls Validform_checktip text-warning"></div>
				<br />
				<div class="row">
					<div class="col-xs-12 ">
						<!-- <button type="submit" class="btn btn-success btn-primary btn-block">登陆</button> -->
						<button type="submit" class="btn btn-success btn-lg btn-block">确认修改</button>
					</div>
				</div>
			</form>
		</div>
	</body>
	<script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
	<script src="/Public/static/bootstrap-3.3.5/js/bootstrap.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js">
	</script>
	<script type="text/javascript">
		$(document)
			.ajaxStart(function() {
				$("button:submit").addClass("log-in").attr("disabled", true);
			})
			.ajaxStop(function() {
				$("button:submit").removeClass("log-in").attr("disabled", false);
			});
		//表单提交
		$("form").submit(function() {
			var self = $(this);
			$.post(self.attr("action"), self.serialize(), success, "json");
			return false;

			function success(data) {
				if (data.status == 1) {
					$('.alert').slideDown();
					$('.alert-content').text(data.info);
					setInterval(showTime, 3000);

					function showTime() {
						window.location.href = data.url;
					};
				} else {
					self.find(".Validform_checktip").text(data.info);
				}
			}
		});
	</script>

</html>