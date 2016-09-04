<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
				<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,minimal-ui">
		<link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css" />
		<link rel="stylesheet" type="text/css" href="/Public/Home/css/index.css" />
		<link rel="stylesheet" type="text/css" href="/Public/static/font-awesome/css/font-awesome.min.css" />
		<meta charset="utf-8">
		<title>登录页面</title>
	</head>

	<body>
		<div class="panel panel-danger alert" style="display: none; top: 0px;position:absolute;z-index:99;width: 100%;">
			<div class="panel-heading">
				<h3 class="panel-title alert-content"></h3>
			</div>
		</div>
		<div class="header">
			<div class="back">
				<a href="<?php echo U('Home/Index/index');?>">
					<i class="fa fa-angle-left fa-2x">
					</i>
				</a>
			</div>
			<div class="title">
				<span id="title">
					修改收货地址
				</span>
			</div>
			<div class="place">
				<a href="">
				</a>
			</div>
		</div>
		<div class="sendmessage">

			<form id="message-form" action="/index.php?s=/Home/Index/address.html" method="post">
				<br />
					<p><h5>真实姓名连同你的地址被告知给接单用户:</h5></p>
<div class="input-group">
	<span class="input-group-addon">真实姓名</span>
	<input type="text" class="form-control" name="name" placeholder="输入真实姓名" value="<?php echo ($name); ?>">
</div>
<br />

				<p><h5>此为默认的发单收货地址（可修改）:</h5></p>
				<div class="form-group">
					<textarea class="form-control" rows="5" name="content" placeholder="改地址为常用地址，完善地址方便发单时候使用这个默认地址，删除随时都可以修改"><?php echo ($address); ?></textarea>
				</div>
				<div class="controls Validform_checktip text-warning"></div>
				<div class="control-group">
					<button type="submit" class="btn btn-warning  btn-lg btn-block">提交并修改以上信息</button>
				</div>
			</form>

		</div>


	</body>
	<script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
	<script src="/Public/static/bootstrap-3.3.5/js/bootstrap.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			//发送地址－－套用说说模版
			$("#message-form").submit(function() {
				var self = $(this);
				self.find(".Validform_checktip").text("");
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
		})
	</script>

</html>