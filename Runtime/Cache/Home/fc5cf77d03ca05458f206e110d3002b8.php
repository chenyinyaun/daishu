<?php if (!defined('THINK_PATH')) exit();?><html>

	<head>
		<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,minimal-ui">
		
		<meta charset="UTF-8" />
		<title>接单详情页</title>
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
					该单详情
				</span>
			</div>
			<div class="place">
				<a href="">
					<i class="fa fa-refresh fa-2x">
					</i>
				</a>
			</div>
		</div>
		<!--<div class="head">
		</div>-->
		<div class="page-task">
			<div class="individual">
				<div class="individual-image">
					<img src="<?php echo ($picture); ?>" />
				</div>
				<div class="individual-name">
					<div class="name-nickname">
						<span id="realname"><?php echo ($username); ?>
						</span>
					</div>
					<div class="name-school">
						<span id="">
							<i class="fa fa-1x" style="color: #AC2925;">
							</i>
						</span>
						<span><?php echo ($school); ?>
						</span>
						<p id="sex-bill" style="display: none;"><?php echo ($sex); ?></p>
					</div>
				</div>
				<div class="individual-time">
					<div class="start-time">
						<span><?php echo ($times); ?>
						</span>
					</div>
					<div class="end-time">
						<span id="money">评论</span>
					</div>
				</div>
			</div>
			<div class="task-detail">
				<div class="contents-explain">
					<span>
						<p><?php echo ($content); ?>
						</p>
					</span>
				</div>
				<div class="contents-place">
					<p>
						送达地点:
						<span id="task-place"><?php echo ($address); ?>
						</span>
					</p>
				</div>
			</div>
			<div class="panel panel-success">
				<!--<div class="panel-heading">-->
				<!--<h3 class="panel-title"></h3>-->
				<!--</div>-->
				<ul class="list-group">
					<li class="list-group-item"><span class="bill-process">
						是否过期：<span id="five-step">是，该单已过期，没人接单！</span>
						<span id="six-step">否！</span>
					</span></li>
					<li class="list-group-item"><span class="bill-process">
						该单金额：已经在线支付
					</span> <span id="page-money"><?php echo ($sum); ?></span> 元</li>
					<li class="list-group-item">
						<p class="bill-process">
							<span id="">
					该单状态:
				</span>
							<span id="first-step">新发布<i class="fa fa-long-arrow-right fa-1x">
					</i>
				</span>
							<span id="second-step">被抢啦<i class="fa fa-long-arrow-right fa-1x">
					</i>
				</span>
							<span id="third-step">已送达<i class="fa fa-long-arrow-right fa-1x">
					</i>
				</span>
							<span id="four-step">已结单
				</span>
						</p>
					</li>
					<li class="list-group-item"><span class="bill-process">
						抢单备注：抢单必须实名认证，严禁泄露对方信息，代鼠对每一单都有详细记录！
					</span></li>
				</ul>
			</div>
			<p class="task-money">

			</p>

			<form action="/index.php?s=/Home/Index/bill/sex/%E7%94%B7/id/127/address/6%E5%8C%BA6%E6%A0%8B305/times/03%E6%9C%8829%E6%97%A5+12%3A59/time/1459227589/school/%E6%B9%96%E5%8D%97%E7%A7%91%E6%8A%80%E5%A4%A7%E5%AD%A6/username/%E5%9B%9E%E5%BF%86/content/%E3%80%90%E5%BF%AB%E9%80%92%E4%BF%A1%E3%80%91%E3%80%96%E5%8F%96%E8%B4%A7%E5%8F%B7%2A%2A%2A%2A%E3%80%97%E4%B8%AD%E9%80%9A%E4%BD%A029%E6%97%A5%E7%9A%84%E5%8C%85%E8%A3%B9%EF%BC%8C%E8%AF%B720%E7%82%B9%E5%89%8D%E5%88%B0%E7%A7%91%E5%A4%A7%E5%8C%97%E9%97%A8%E6%AD%A5%E6%AD%A5%E9%AB%98%E5%B7%A6%E4%BE%A7%E7%AC%AC%E4%B8%80%E9%97%A8%E9%9D%A2%E6%8F%90%E5%8F%96%E3%80%82%EF%BC%8C%E5%92%A8%E8%AF%A252628092/sum/2/mobile/13875296136.html" method="post" id="sure-submit">
				<input type="text" name="mobile" value="<?php echo ($mobile); ?>" style="display: none;" />
				<input type="text" name="time" value="<?php echo ($time); ?>" style="display: none;" />
				<p class="bill-status">
					<button type="submit" class="qiangdan btn btn-success btn-lg btn-block">
						立即抢单
					</button>
				</p>
			</form>
			<p id="status-num" style="display: none;"><?php echo ($status); ?></p>
			<ul class="bill-comment">
				<?php if(is_array($messages)): $i = 0; $__LIST__ = $messages;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$me): $mod = ($i % 2 );++$i;?><li class="comments-message">
						<div class="individual">
							<div class="individual-image">
								<img src="<?php echo ($me["picture"]); ?>" />
							</div>
							<div class="individual-name">
								<div class="name-nickname">
									<span id="username"><?php echo ($me["username"]); ?>
						</span>
								</div>
								<div class="name-school" id="comments-sex">
									<p style="display: none;" id="message-sex"><?php echo ($me["sex"]); ?></p>
									<i class="fa fa-1x"></i><span><?php echo ($me["school"]); ?></span>
								</div>
							</div>
							<div class="individual-time">
								<div class="start-time">
									<i class="fa fa-comment fa-lg"></i><span>回复</span>
									<div style="display: none;"><?php echo ($me["cphone"]); ?></div>
									<a style="display: none;"><?php echo ($me["id"]); ?></a>
									<p class="comments-mphone" style="display: none;"><?php echo ($me["username"]); ?></p>
								</div>
							</div>
						</div>
						<div class="comments-detail">
							<p><?php echo ($me["content"]); ?>
							</p>
						</div>
						<?php if(is_array($reply[$me['id']]['name'])): $i = 0; $__LIST__ = $reply[$me['id']]['name'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$re): $mod = ($i % 2 );++$i;?><p> <span class="reply-name"><?php echo ($re["mphone"]); ?></span>回复<span class="reply-name"><?php echo ($re["mobile"]); ?></span>:<?php echo ($re["content"]); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
		<div class="foot">
		</div>
		<div class="flex-comments">
			<form action="/index.php?s=/Home/Index/bill/sex/%E7%94%B7/id/127/address/6%E5%8C%BA6%E6%A0%8B305/times/03%E6%9C%8829%E6%97%A5+12%3A59/time/1459227589/school/%E6%B9%96%E5%8D%97%E7%A7%91%E6%8A%80%E5%A4%A7%E5%AD%A6/username/%E5%9B%9E%E5%BF%86/content/%E3%80%90%E5%BF%AB%E9%80%92%E4%BF%A1%E3%80%91%E3%80%96%E5%8F%96%E8%B4%A7%E5%8F%B7%2A%2A%2A%2A%E3%80%97%E4%B8%AD%E9%80%9A%E4%BD%A029%E6%97%A5%E7%9A%84%E5%8C%85%E8%A3%B9%EF%BC%8C%E8%AF%B720%E7%82%B9%E5%89%8D%E5%88%B0%E7%A7%91%E5%A4%A7%E5%8C%97%E9%97%A8%E6%AD%A5%E6%AD%A5%E9%AB%98%E5%B7%A6%E4%BE%A7%E7%AC%AC%E4%B8%80%E9%97%A8%E9%9D%A2%E6%8F%90%E5%8F%96%E3%80%82%EF%BC%8C%E5%92%A8%E8%AF%A252628092/sum/2/mobile/13875296136.html" method="post" id="comment-form">
				<div class="comments-icon">
					<a class="">
						<i class="fa fa-comments fa-2x">
					</i>
					</a>
				</div>
				<div class="comments-words">
					<input type="text" name="content" id="content" placeholder="发表评论" />
				</div>
				<div class="comments-button">
					<button type="submit">
						评论
					</button>
				</div>
			</form>
			<form action="/index.php?s=/Home/Index/bill/sex/%E7%94%B7/id/127/address/6%E5%8C%BA6%E6%A0%8B305/times/03%E6%9C%8829%E6%97%A5+12%3A59/time/1459227589/school/%E6%B9%96%E5%8D%97%E7%A7%91%E6%8A%80%E5%A4%A7%E5%AD%A6/username/%E5%9B%9E%E5%BF%86/content/%E3%80%90%E5%BF%AB%E9%80%92%E4%BF%A1%E3%80%91%E3%80%96%E5%8F%96%E8%B4%A7%E5%8F%B7%2A%2A%2A%2A%E3%80%97%E4%B8%AD%E9%80%9A%E4%BD%A029%E6%97%A5%E7%9A%84%E5%8C%85%E8%A3%B9%EF%BC%8C%E8%AF%B720%E7%82%B9%E5%89%8D%E5%88%B0%E7%A7%91%E5%A4%A7%E5%8C%97%E9%97%A8%E6%AD%A5%E6%AD%A5%E9%AB%98%E5%B7%A6%E4%BE%A7%E7%AC%AC%E4%B8%80%E9%97%A8%E9%9D%A2%E6%8F%90%E5%8F%96%E3%80%82%EF%BC%8C%E5%92%A8%E8%AF%A252628092/sum/2/mobile/13875296136.html" method="post" id="reply-form">
				<div class="comments-icon">
					<a class="">
						<i class="fa fa-comments fa-2x">
					</i>
					</a>
				</div>
				<input type="text" name="phone" id="phone" value="" style="display: none;" />
				<input type="text" name="users" id="users" value="" style="display: none;" />
				<input type="text" name="commentid" id="commentid" value="" style="display: none;" />
				<div class="comments-words">
					<input type="text" name="reply" id="reply" placeholder="" />
				</div>
				<div class="comments-button">
					<button type="submit">
						评论
					</button>
				</div>
			</form>
		</div>
		<script src="/Public/static/bootstrap-3.3.5/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="/Public/static/jquery-2.0.3.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			if ($('#status-num').text() == 1) {
				$('#first-step').addClass("bill-now");
				$('.bill-status').show();
				$('#five-step').hide();

				$('#six-step').addClass("bill-now");

			} else if ($('#status-num').text() == 2) {
				$('#second-step').addClass("bill-now");
				$('.bill-status').hide();
				$('#five-step').hide();

				$('#six-step').addClass("bill-now");

			} else if ($('#status-num').text() == 3) {
				$('#third-step').addClass("bill-now");
				$('.bill-status').hide();
				$('#five-step').hide();

				$('#six-step').addClass("bill-now");

			} else if ($('#status-num').text() == 4) {
				$('#four-step').addClass("bill-now");
				$('#six-step').addClass("bill-now");
				$('#five-step').hide();

				$('.bill-status').hide();
			} else {
				$('#five-step').addClass("bill-now");
				$('#six-step').hide();
				$('.bill-status').hide();
			}
		</script>
		<script type="text/javascript">
			$(document).ready(function() {
				//评论的性别(根据隐藏的性别)
				if ($('#sex-bill').text() == "女") {
					$('.name-school i').addClass('fa-venus');
				} else {
					$('.name-school i').addClass('fa-mars');
				};
				//最先隐藏回复的表单
				$('#reply-form').hide();
				//两个表单一个是提供评论一个是回复，这个是 ［回复］,先点击选中
				$('.start-time ').click(function() {
					//设置当前的元素标为全局变量
					item = $(this).parent().parent().parent();
					$('#comment-form').hide();
					$('#reply-form').show();
					$('#users').val($(this).children('p').text());
					$('#phone').val($(this).children('div').text());
					$('#commentid').val($(this).children('a').text());
					$('#reply').attr("placeholder", "[回复]～" + $(this).children('p').text() + ":");
				});
				//回复 任何点击的人，后续实现
				//				$('.reply-name').click(function() {
				//					//设置当前的元素标为全局变量
				//					item = $(this).parent().parent();
				//					$('#comment-form').hide();
				//					$('#reply-form').show();
				//					$('#users').val($(this)..text());
				//					$('#phone').val($(this)..text());
				//					$('#commentid').val($(this)..text());
				//					$('#reply').attr("placeholder", "[回复]～" + $(this).text() + ":");
				//				});
				//这个是点击选中之后具体内容回复
				$("#reply-form").submit(function() {
					var selfs = $('#reply-form');
					$.post(selfs.attr("action"), selfs.serialize(), success, "json");
					return false;

					function success(data) {
						if (data.warning) {
							alert(data.warning);
						} else {
							item.append("<p><span class='reply-name'>" + data.user + "</span>回复<span class='reply-name'>" + data.users + "</span>:<span class='reply-content'>" + data.content + "</p>");
							$('#reply').val("");
							$('#reply').attr("placeholder", "");
						}
					}
				});
				//这个是评论的点击选中
				$('.end-time').click(function() {
					$('#reply-form').hide();
					$('#comment-form').show();
					$('#content').attr("placeholder", "[评论]～" + $("#realname").text() + ":");
				});
				//这个是评论的具体内容
				$("#comment-form").submit(function() {
					var self = $(this);
					$.post(self.attr("action"), self.serialize(), success, "json");
					return false;

					function success(data) {
						if (data.warning) {
							alert(data.warning);
						} else {
							$(".bill-comment").append("<li class='comments-message'><div class='individual'><div class='individual-image'><img src='" + data.picture + "' /></div><div class='individual-name'><div class='name-nickname'><span>" + data.user + "</span></div><div class='name-school''><i class='fa fa-1x'></i><span>" + data.school + "</span></div></div><div class='individual-time'><div class='start-time'><i class='fa fa-comment fa-lg'></i><span>回复</span><div class='' style='display: none;'><?php echo ($me["mobile"]); ?></div><p class='comments-mphone' style='display: none;'><?php echo ($me["username"]); ?></p></div></div></div><div class='comments-detail'><p>" + data.content + "</p></div></li>");
							$('#content').val("");
						}
					}
				});
				//立即抢单 自己的单不能自己抢
				$("#sure-submit").submit(function() {
					var selfss = $(this);
					$.post(selfss.attr("action"), selfss.serialize(), success, "json");
					return false;

					function success(data) {
						if (data.warning) {
							alert(data.warning);
						} else {
							window.location.href = data.url;
						}
					}
				});
			})
		</script>
	</body>

</html>