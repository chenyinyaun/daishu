<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css" />
		<link rel="stylesheet" type="text/css" href="/Public/Home/css/index.css" />
		<link rel="stylesheet" type="text/css" href="/Public/static/font-awesome/css/font-awesome.min.css" />
		<meta charset="utf-8">
		<title>修改资料和密码</title>
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
					修改资料和密码
				</span>
			</div>
			<div class="place">
				<a href="">
				</a>
			</div>
		</div>

		<ul class="personal-items">
				<li>
					<div class="items-icon">
						<i class="fa fa-cube">
						</i>
					</div>
					<div class="items-word">
						<span><a href="">修改个人资料</a>

							</span>
					</div>
				</li>
				<li>
					<div class="items-icon">
						<i class="fa fa-male ">
				</i>
					</div>
					<div class="items-word">
						<span>
				<a href="<?php echo U('User/profile');?>">修改密码</a>
				</span>
				</li>

			</ul>
	</body>

</html>