<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
		<meta charset="UTF-8" />
		<meta name="apple-mobile-web-app-title" content="">
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta name="format-detection" content="telephone=no">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,minimal-ui">
		<title>
			个人中心
		</title>
		<link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css" />
		<link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="/Public/static/font-awesome/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="/Public/Home/css/index.css" />
	</head>
	<body>
		<!--顶部的框(固定浮动的)-->
		<div class="header">
			<div class="back">
				<i class="fa ">
				</i>
			</div>
			<div class="title">
				<span id="title">
					个人中心
				</span>
			</div>
			<div class="place">
				<a href="<?php echo U('Home/Index/index');?>">
					<i class="fa fa-refresh fa-2x">
					</i>
				</a>
			</div>
		</div>
		<!--撑开顶部的高度-->
		<!--<div class="head">
		</div>-->
		<!--第四 个人中心-->
		<div id="personals" class="personals">
			<?php if(!empty($name)): ?><div class="personal">
					<div class="personal-image">
						<a href="<?php echo U('File/upload');?>">
							<img src="<?php echo ($picture); ?>" />
						</a>
					</div>
					<div class="personal-name">
						<div class="nickname">
							<span><?php echo ($name); ?>
							</span>
						</div>
						<div class="school">
							<span id="">
								<i class="fa fa-1x">
								</i>
							</span>
							<!--隐藏的性别为了js读取性别然后添加不同的性别-->
							<p style="display: none;" id="sex">
								<?php echo ($sex); ?>
							</p>
							<span id="schools"><?php echo ($school); ?>
							</span>
						</div>
					</div>
					<div class="personal-time">
						<div class="zhuxiao">
						</div>
						<div class="">
						</div>
					</div>
				</div>
				<?php else: ?>
				<!--默认的未登录的个人页面-->
				<div class="personal">
					<div class="personal-image">
						<img src="/Public/static/kangaroo.png" />
					</div>
					<div class="personal-name">
						<div class="nickname">
							<span>代鼠
							</span>
						</div>
						<div class="school">
							<span id="">
								<i class="fa fa-venus fa-1x">
								</i>
							</span>
							<span id="schools">我的大学
							</span>
						</div>
					</div>
					<div class="personal-time">
						<div class="zhuxiao">
							<a href="http://www.doododo.com/got.php">
								登录
							</a>
						</div>
						<div class="zhuxiao">
							<a href="<?php echo U('User/register');?>">
								注册
							</a>
						</div>
					</div>
				</div><?php endif; ?>
			<ul class="personal-nav">
				<li>
					<a href="<?php echo U('Pay/balance');?>">
						<i class="fa ">
							<?php echo ($balance); ?>元
						</i>
						<p>
							我的余额
						</p>
					</a>
				</li>
				<li>
					<a href="<?php echo U('Index/myreceive');?>">
						<i class="fa fa-shopping-cart">
						</i>
						<p>
							我的接单
						</p>
					</a>
				</li>
				<li>
					<a href="<?php echo U('Index/mybill');?>">
						<i class="fa fa-flag-o">
						</i>
						<p>
							我的发单
						</p>
					</a>
				</li>
			</ul>
			<ul class="personal-items">
				<li>
					<div class="items-icon">
						<i class="fa fa-cube">
						</i>
					</div>
					<div class="items-word">
						<span>
							<a href="<?php echo U('Index/sendmessage');?>">
								发表说说
							</a>
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
							<a href="<?php echo U('Index/address');?>">
								收货地址
							</a>
						</span>
				</li>
				<li>
					<div class="items-icon">
						<i class="fa fa-comments-o">
						</i>
					</div>
					<div class="items-word">
						<span>
							<a href="<?php echo U('File/upload');?>">
								上传头像
							</a>
						</span>
				</li>
			</ul>
			<ul class="personal-items">
				<li>
					<div class="items-icon">
						<i class="fa fa-cube">
						</i>
					</div>
					<div class="items-word">
						<span>
							<a href="<?php echo U('File/aboutfile');?>">
								关于代鼠
							</a>
						</span>
					</div>
				</li>
				<li>
					<div class="items-icon">
						<i class="fa fa-facebook ">
						</i>
					</div>
					<div class="items-word">
						<span>
							如何发单接单
						</span>
				</li>
				<li>
					<div class="items-icon">
						<i class="fa fa-comment-o">
						</i>
					</div>
					<div class="items-word">
						<span>
							<a href="<?php echo U('User/modify');?>">
								修改个人资料
							</a>
						</span>
				</li>
			</ul>
			<ul class="personal-items">
				<li>
					<div class="items-icon">
						<i class="fa fa-comments-o">
						</i>
					</div>
					<div class="items-word">
						<span>
							<a href="<?php echo U('File/certificate');?>">
								实名认证
							</a>
						</span>
				</li>
				<li>
					<div class="items-icon">
						<i class="fa fa-cube">
						</i>
					</div>
					<div class="items-word">
						<span>
							<a href="<?php echo U('User/logout');?>">
								退出登录
							</a>
						</span>
					</div>
				</li>
			</ul>
		</div>
		<div class="foot">
		</div>
		<div class="flex-foot">
			<ul class="ul-foot">
				<a href="<?php echo U('Home/Index/index');?>">
				<li class="ul-color">
					<i class="fa fa-home fa-2x">
					</i>
					<p>
						首页
					</p>
				</li>
				</a>
				<a href="<?php echo U('Home/Index/publish');?>">
				<li class="ul-color ">
					<i class="fa fa-truck fa-2x">
					</i>
					<p>
						发布
					</p>
				</li>
			</a>

				<a href="<?php echo U('Home/Index/say');?>">
				<li class="ul-color">
					<i class="fa fa-comments fa-2x">
					</i>
					<p>
						说说
					</p>
				</li>
				</a>

				<li class="ul-color hover">
					<i class="fa fa-user fa-2x">
					</i>
					<p>
						个人中心
					</p>
				</li>
			</ul>
		</div>
		<!--js内容页面最后加载-->
		<script src="/Public/static/bootstrap-3.3.5/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="/Public/static/jquery-2.0.3.min.js" type="text/javascript"></script>
		<script src="/Public/static/swiper.js" type="text/javascript"></script>

		<script type="text/javascript">$(document).ready(function() {
	//个人页面的性别判断类的添加
	if ($('#sex').text() == "女") {
		$('.school i').addClass('fa-venus');
	} else {
		$('.school i').addClass('fa-mars');
	};
});</script>
	</body>
</html>