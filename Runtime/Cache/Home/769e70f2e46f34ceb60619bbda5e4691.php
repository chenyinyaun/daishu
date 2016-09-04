<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
		<meta charset="UTF-8" />
		<meta name="apple-mobile-web-app-title" content="">
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta name="format-detection" content="telephone=no">
		<meta name="baidu_union_verify" content="c080815270439e9644578345157488e9">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,minimal-ui">
		<title>
			代鼠首页
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
					代鼠
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
		<!--第一 首页内容-->
		<div id="index" class="index">
			<!--图片轮播-->
			<div class="swiper-container">
				<div class="swiper-wrapper" id="swiper-wrapper" style="height: 113px; width: 1685px; transform: translate3d(-337px, 0px, 0px); transition: 0.3s; -webkit-transition: 0.3s;">
					<div xmlns="http://www.w3.org/1999/xhtml" class="swiper-slide" style="height: 113px; width: 337px;">
						<a href="#">
							<img src="/Public/static/carousel/1.png" alt="">
						</a>
					</div>
					<!-- <div class="swiper-slide swiper-slide-visible swiper-slide-active" style="height: 113px; width: 337px;">
					<a href="#">
					<img src="/Public/static/carousel/2.jpg" alt="">
					</a>
					</div> -->
					<!--<div class="swiper-slide" style="height: 113px; width: 337px;">
					<a href="#">
					<img src="" alt="">
					</a>
					</div>-->
					<!--<div class="swiper-slide" style="height: 113px; width: 337px;">
					<a href="#">
					<img src="" alt="">
					</a>
					</div>-->
					<!--<div xmlns="http://www.w3.org/1999/xhtml" class="swiper-slide" style="height: 113px; width: 337px;">
					<a href="#">
					<img src="" alt="">
					</a>
					</div>-->
				</div>
				<div class="pagination">
					<span class="swiper-pagination-switch swiper-visible-switch swiper-active-switch">
					</span>
					<!-- <span class="swiper-pagination-switch">
					</span>
					<span class="swiper-pagination-switch">
					</span> -->
				</div>
			</div>
			<!--功能导航条-->
			<div class="index-nav">
				<ul>
					<li>
						<a>
							<!--<i class="fa fa-comments">
							</i>-->
							<img src="/Public/static/nav/01.png" width="26px" height="26px" />
							<p>
								<a href="<?php echo U('Home/Pay/inform');?>">二手市场</a>
							</p>
						</a>
					</li>
					<li>
						<a>
							<!--<i class="fa fa-building-o">
							</i>-->
							<img src="/Public/static/nav/02.png" width="26px" height="26px" />
							<p>
								<a href="<?php echo U('Home/Pay/inform');?>">闲置教材</a>

							</p>
						</a>
					</li>
					<li>
						<a>
							<!--<i class="fa fa-desktop">
							</i>-->
							<img src="/Public/static/nav/03.png" width="26px" height="26px" />
							<p>
								<a href="<?php echo U('Home/Pay/inform');?>">帮忙打水</a>

							</p>
						</a>
					</li>
					<li>
						<a>
							<!--<i class="fa fa-tablet">
							</i>-->
							<img src="/Public/static/nav/04.png" width="26px" height="26px" />
							<p>
								<a href="<?php echo U('Home/Pay/inform');?>">发单带饭</a>

							</p>
						</a>
					</li>
				</ul>
				<ul>
					<li>
						<a>
							<!--<i class="fa fa-university">
							</i>-->
							<img src="/Public/static/nav/05.png" width="26px" height="26px" />
							<p>
								<a href="<?php echo U('Home/Pay/inform');?>">帮取快递</a>
							</p>
						</a>
					</li>
					<li>
						<a>
							<!--<i class="fa fa-soccer-ball-o">
							</i>-->
							<img src="/Public/static/nav/06.png" width="26px" height="26px" />
							<p>
								<a href="<?php echo U('Home/Pay/inform');?>">帮代购物品</a>
							</p>
						</a>
					</li>
					<li>
						<a>
							<!--<i class="fa fa-taxi">
							</i>-->
							<img src="/Public/static/nav/07.png" width="26px" height="26px" />
							<p>
								<a href="<?php echo U('Home/Pay/inform');?>">做PPT</a>
							</p>
						</a>
					</li>
					<li>
						<a>
							<!--<i class="fa fa-comment">
							</i>-->
							<img src="/Public/static/nav/03.png" width="26px" height="26px" />
							<p>
								<a href="<?php echo U('Home/Index/publish');?>">新生咨询</a>
							</p>
						</a>
					</li>
				</ul>
			</div>
			<div class="index-content">
				<!--发单的部分-->
				<ul class="task-whole">
					<?php if(is_array($bills)): $i = 0; $__LIST__ = $bills;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bill): $mod = ($i % 2 );++$i;?><li>
							<a href="<?php echo U('Home/Index/bill',array('sex'=>$bill['sex'],'id'=>$bill['id'],'address'=>$bill['address'],'times'=>$bill['times'],'time'=>$bill['time'],'school'=>$bill['school'],'username'=>$bill['username'],'content'=>$bill['content'],'sum'=>$bill['sum'],'mobile'=>$bill['mobile']));?>">
								<div class="individual">
									<div class="individual-image">
										<img src="<?php echo ($bill["picture"]); ?>" />
									</div>
									<div class="individual-name">
										<div class="name-nickname">
											<span><?php echo ($bill["username"]); ?>
											</span>
										</div>
										<div class="name-school">
											<span id="">
												<i class="fa  fa-1x" style="color: #AC2925;">
												</i>
											</span>
											<span><?php echo ($bill["school"]); ?>
											</span>
											<p style="display: none;" id="bill-sex">
												<?php echo ($bill["sex"]); ?>
											</p>
										</div>
									</div>
									<div class="individual-time">
										<div class="start-time">
											<span><?php echo ($bill["times"]); ?>
											</span>
										</div>
										<div class="end-time">
											<span><?php echo ($bill["timeouts"]); ?>过期
											</span>
										</div>
									</div>
								</div>
								<div class="task-detail">
									<div class="content-explain">
										<span>
											<p>
												<?php echo ($bill["content"]); ?>
											</p>
										</span>
									</div>
									<!-- <div class="content-place">
									<p>
									送达地点:
									<span id="task-place">
									<?php echo ($bill["address"]); ?>
									</span>
									</p>
									</div> -->
								</div>
								<div class="task-status">
									<ul>
										<li>
											<?php if($bill['status'] == 1 ): ?><span id="status">刚发布
												</span>
												<?php elseif($bill['status'] == 2 ): ?>
												<span>被抢啦
												</span>
												<?php elseif($bill['status'] == 3 ): ?>
												<span>已送达
												</span>
												<?php elseif($bill['status'] == 4 ): ?>
												<span>已结单
												</span>
												<?php else: ?>
												<span>过期了(无人接单)
												</span><?php endif; ?>
										</li>
										<li>
											<span id="tasks">
												<span >赚取 <?php echo ($bill["sum"]); ?> 元</span>
											</span>
										</li>
									</ul>
								</div>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
					<a href="" id="top">
						返 回 顶 部
					</a>
					<!--查看更多-->
					<div class="re-bill">
						<a class="more-bill btn btn-default btn-lg btn-block " role="button">
							加载更多
						</a>
					</div>
				</ul>
			</div>
		</div>

		<div class="foot">
		</div>
		<div class="flex-foot">
			<ul class="ul-foot">


				<li class="ul-color hover">
					<i class="fa fa-home fa-2x">
					</i>
					<p>
						首页
					</p>
				</li>


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
		<script type="text/javascript">/**
 * 图片轮播
 */
window.onload = function() {
	var newSlideSize = function slideSize() {
		var w = Math.ceil($(".swiper-container").width() / 3 /*--调整高度---*/ );
		$(".swiper-container,.swiper-wrapper,.swiper-slide").height(w);
	};
	newSlideSize();
	$(window).resize(function() {
		newSlideSize();
	});
	var mySwiper = new Swiper('.swiper-container', {
		pagination: '.pagination',
		loop: true,
		autoplay: 4000,
		paginationClickable: true,
		onSlideChangeStart: function() {
			//回调函数
		}
	});
	cTab("#tab1", "#con1");
	cTab("#tab2", "#con2");
};</script>
		<script type="text/javascript">$(document).ready(function() {
	//查看更多发单
	var k = 1;
	$(".more-bill").click(function() {
		//thinkphp 下使用jQuery.ajax路径url怎么写!!!
		$.getJSON("<?php echo U('Index/autoloadbill');?>", {
			pages: k
		}, function(result) {
			$.each(result, function(index, field) {
				$("#top").before('<li><a href="<?php echo U('Home/Index/bill',array('sex'=>$bill['sex'],'id'=>$bill['id'],'address'=>$bill['address'],'times'=>$bill['times'],'time'=>$bill['time'],'school'=>$bill['school'],'username'=>$bill['username'],'content'=>$bill['content'],'sum'=>$bill['sum'],'mobile'=>$bill['mobile']));?>"><div class="individual"><div class="individual-image"><img src=' + field['picture'] + ' /></div><div class="individual-name"><div class="name-nickname"><span>' + field['username'] + '</span></div><div class="name-school"><span id=""><i class="fa  fa-1x" style="color: #AC2925;"></i></span><span>' + field['school'] + '</span><p style="display: none;" id="bill-sex">' + field['sex'] + '</p></div></div><div class="individual-time"><div class="start-time"><span>' + field['time'] + '</span></div><div class="end-time"><span>' + field['timeout'] + '过期</span></div></div></div><div class="task-detail"><div class="content-explain"><span><p>' + field['content'] + '</p></span></div><div class="content-place"><p>地点:<span id="task-place">' + field['address'] + '</span></p></div></div><div class="task-status"><ul><li><?php if($bill['status '] == 1 ): ?><span id="status">刚发布</span><?php elseif($bill['status '] == 2 ): ?><span>被抢啦</span><?php elseif($bill['status '] == 3 ): ?><span>已送达</span><?php elseif($bill['status '] == 4 ): ?><span>已结单</span><?php else: ?><span>过期了(无人接单)</span><?php endif; ?></li><li><span id="task"><span >赚取 <?php echo ($bill["sum"]); ?> 元</span></span></li></ul></div></a></li>');
			});
		});
		k++;
	});

	//2 .单的性别
	$('.task-whole li').each(function() {
		if ($(this).find('#bill-sex').text() == "女") {
			$(this).find('.name-school i').addClass('fa-venus');
		} else {
			$(this).find('.name-school i').addClass('fa-mars');
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