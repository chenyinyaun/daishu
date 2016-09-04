<?php if (!defined('THINK_PATH')) exit();?><html>

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8" />
		<title>用户发单支付详情页</title>
		<link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css" />
		<link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="/Public/static/font-awesome/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="/Public/Home/css/index.css" />
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
					确认发单信息
				</span>
			</div>
			<div class="place">
				<a href="">
				</a>
			</div>
		</div>
    <div class="">
			<div class="panel panel-success">
						<div class="panel-heading">
							<h6 class="panel-title" >使用说明：该单发布
								出去以后将会显示在首页里面。查看该单是否被别人接了请前往［个人中心］的［我的接单］查看具体信息</h6>
						</div>
						<ul class="list-group">
							<li class="list-group-item">发单人昵称:<?php echo ($name); ?></li>
							<li class="list-group-item">发单内容:<?php echo ($content); ?></li>
							<li class="list-group-item">收货地址:<?php echo ($address); ?></li>
							<li class="list-group-item">联系电话:<?php echo ($otherphone); ?></li>
							<li class="list-group-item">联系人学校:<?php echo ($school); ?></li>
							<li class="list-group-item">悬赏金额:<?php echo ($sum); ?>元</li>
						</ul>
					</div>
		</div>
    <div class="">
			<form class="" action="http://www.doododo.com/Public/static/pay/example/jsapi.php" method="post">
				<button type="submit" class="btn btn-success btn-lg btn-block">
							前去支付
						</button>
			</form>
      <!-- <a href="http://localhost/onethink/Public/static/pay/example/jsapi.php">前去支付</a> -->
    </div>
		<script src="/Public/static/bootstrap-3.3.5/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="/Public/static/jquery-2.0.3.min.js" type="text/javascript"></script>
	</body>
</html>