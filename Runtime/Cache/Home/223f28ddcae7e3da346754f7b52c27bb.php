<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
		<meta charset="UTF-8" />
		<meta name="apple-mobile-web-app-title" content="">
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta name="format-detection" content="telephone=no">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,minimal-ui">
		<title>
			说说
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
					说说
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

		<!--第三 说说页面-->
		<ul id="message" class="message">
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$li): $mod = ($i % 2 );++$i;?><li>
					<a href="<?php echo U('Home/Index/message',array('id'=>$li['id'],'sex'=>$li['sex'],'time'=>$li['time'],'school'=>$li['school'],'username'=>$li['username'],'content'=>$li['content'],'mobile'=>$li['mobile']));?>">
						<div class="individual">
							<div class="individual-image">
								<img src="<?php echo ($li["picture"]); ?>" />
							</div>
							<div class="individual-name">
								<div class="name-nickname">
									<span><?php echo ($li["username"]); ?>
									</span>
								</div>
								<div class="name-school">
									<span id="">
										<i class="fa fa-1x" style="color: #AC2925;">
										</i>
										<!--隐藏的性别为了js读取性别然后添加不同的性别-->
										<p style="display: none;" id="sex-message">
											<?php echo ($li["sex"]); ?>
										</p>
									</span>
									<span><?php echo ($li["school"]); ?>
									</span>
								</div>
							</div>
							<div class="individual-time">
								<div class="start-time">
									<span><?php echo ($li["time"]); ?>
									</span>
								</div>
								<div class="">
								</div>
							</div>
						</div>
						<div class="page-message">
							<div class="message-explain">
								<span>
									<p>
										<?php echo ($li["content"]); ?>
									</p>
								</span>
							</div>
						</div>
						<div class="message-status">
							<ul>
								<li>
									<i class="fa fa-comments fa-lg">
									</i>
									<span>评论<span class="message-number"><?php echo ($li["mid"]); ?></span>次
									</span>
								</li>
								<li>
									<i class="fa fa-eye fa-lg">
									</i>
									<span>浏览<span class="message-number"><?php echo ($li["browse"]); ?></span>次
									</span>
								</li>
							</ul>
						</div>
					</a>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
			<a href="" id="tops">
				返 回 顶 部
			</a>
			<!--查看更多--说说-->
			<div class="re-pay">
				<a class="find-more btn btn-default btn-lg btn-block " role="button">
					加载更多
				</a>
			</div>
		</ul>

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

				<li class="ul-color hover">
					<i class="fa fa-comments fa-2x">
					</i>
					<p>
						说说
					</p>
				</li>
				<a href="<?php echo U('Home/Index/individual');?>">
				<li class="ul-color ">
					<i class="fa fa-user fa-2x">
					</i>
					<p>
						个人中心
					</p>
				</li>
			</a>
			</ul>
		</div>
		<!--js内容页面最后加载-->
		<script src="/Public/static/bootstrap-3.3.5/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="/Public/static/jquery-2.0.3.min.js" type="text/javascript"></script>
		<script src="/Public/static/swiper.js" type="text/javascript"></script>
		<script type="text/javascript">$(document).ready(function() {

	//查看更多说说
	var i = 1;
	$(".find-more").click(function() {
		//thinkphp 下使用jQuery.ajax路径url怎么写!!!
		$.getJSON("<?php echo U('Index/autoloadmessage');?>", {
			page: i
		}, function(result) {
			$.each(result, function(index, field) {
				$("#tops").before('<li><a href="<?php echo U('
					Home / Index / message ',array('
					id '=>$li['
					id '],'
					sex '=>$li['
					sex '],'
					time '=>$li['
					time '],'
					school '=>$li['
					school '],'
					username '=>$li['
					username '],'
					content '=>$li['
					content '],'
					mobile '=>$li['
					mobile ']));?>"><div class="individual"><div class="individual-image"><img src=' + field['picture'] + ' /></div><div class="individual-name"><div class="name-nickname"><span>' + field['username'] + '</span></div><div class="name-school"><span id=""><i class="fa fa-1x" style="color: #AC2925;"></i><p style="display: none;" id="sex-message">' + field['sex'] + '</p></span><span>' + field['school'] + '</span></div></div><div class="individual-time"><div class="start-time"><span>' + field['time'] + '</span></div><div></div></div></div><div class="page-message"><div class="message-explain"><span><p>' + field['content'] + '</p></span></div></div><div class="message-status"><ul><li><i class="fa fa-comments fa-lg"></i><span>评论<span class="message-number">' + field['mid'] + '</span>次</span></li><li><i class="fa fa-eye fa-lg"></i><span>浏览<span class="message-number">' + field['browse'] + '</span>次</span></li></ul></div></a></li>');
			});
		});
		i++;
	});

	//3. 说说页面每条说说的性别判断(根据隐藏的性别)添加类
	$('#message li').each(function() {
		if ($(this).find('#sex-message').text() == "女") {
			$(this).find('div.name-school i').addClass('fa-venus');
		} else {
			$(this).find('div.name-school i').addClass('fa-mars');
		};
	});

	//返回顶部
	$('#top').click(function(event) {
		event.preventDefault();
		$('html,body').animate({
			scrollTop: '0px'
		}, 500);
		return false;
	});
	$('#tops').click(function(event) {
		event.preventDefault();
		$('html,body').animate({
			scrollTop: '0px'
		}, 500);
		return false;
	});


});</script>
	</body>
</html>