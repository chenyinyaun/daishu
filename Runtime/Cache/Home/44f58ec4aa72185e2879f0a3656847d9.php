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
							<i class="fa  fa-1x" style="color: #AC2925;">
							</i>
						</span>
						<span><?php echo ($school); ?>
						</span>
						<p id="sex-receivebill" style="display: none;"><?php echo ($sex); ?></p>
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
						地点:
						<span id="task-place"><?php echo ($address); ?>
						</span>
					</p>
				</div>
			</div>
			<p class="task-money">
				<i class="fa fa-space-shuttle fa-1x">
					</i>已在线支付报酬<span id="page-money"><?php echo ($sum); ?></span>元
			</p>
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
			<p>发单人联系方式: <?php echo ($mobile); ?> 请主动联系他(她)</p>
			<p id="status-over" style="display: none;">备注：该单已经完成！欢迎再次发单接单</p>
			<p id="status-get" style="display: none;">备注：已送达,等待对方确认点击[确认付款]</p>
			<p id="status-done" style="display: none;">备注：送达以后点击[我已送达!],然后等待对方收到后点击[确认付款]本单交易完成,你将收到支付的现金</p>
			<form action="/index.php?s=/Home/Index/receivebill/sex/%E7%94%B7/id/126/address/6%E5%8C%BA6%E6%A0%8B305/time/1458798283/times/%E6%98%A8%E5%A4%A9+13%3A44/school/%E6%B9%96%E5%8D%97%E7%A7%91%E6%8A%80%E5%A4%A7%E5%AD%A6/username/%E5%9B%9E%E5%BF%86/content/%E3%80%90%E4%BA%AC%E4%B8%9C%E3%80%91%E6%82%A8%E5%A5%BD%EF%BC%8C%E6%82%A8%E7%9A%84%E8%AE%A2%E5%8D%9513048515721%E5%B7%B2%E5%88%B0%E6%B9%96%E5%8D%97%E7%A7%91%E6%8A%80%E5%A4%A7%E5%AD%A6%E4%BA%AC%E4%B8%9C%E6%B4%BE%EF%BC%88%EF%BC%88%E6%B9%96%E5%8D%97%E7%9C%81%E6%B9%98%E6%BD%AD%E5%B8%82%E9%9B%A8%E6%B9%96%E5%8C%BA%E6%A1%83%E5%9B%AD%E8%B7%AF%E6%B9%96%E5%8D%97%E7%A7%91%E6%8A%80%E5%A4%A7%E5%AD%A6%E5%8D%97%E6%A0%A1%E5%9B%BE%E4%B9%A6%E9%A6%86%E6%97%81%E8%BE%B9%E5%B0%8F%E5%A0%95%E8%90%BD%E8%A1%97%E5%B7%A6%E6%89%8B%E8%BE%B9%E7%AC%AC%E4%B8%80%E4%B8%AA%E9%97%A8%E5%BA%97%EF%BC%89%EF%BC%89%EF%BC%8C%E8%AF%B7%E5%8F%8A%E6%97%B6%E6%8F%90%E5%8F%96%EF%BC%8C%E8%90%A5%E4%B8%9A%E6%97%B6%E9%97%B409%3A00-19%3A00%EF%BC%8C%E5%A6%82%E9%9C%80%E5%B8%AE%E5%8A%A9%E8%AF%B7%E8%87%B4%E7%94%B518674367121%EF%BC%8C%E8%AF%84%E4%BB%B7%E5%8F%AF%E8%B5%A2%E4%BA%AC%E8%B1%86%0D%0A%E6%8F%90%E8%B4%A7%E7%A0%81%EF%BC%9A853633/sum/3/mobile/13875296136.html" method="post" id="sure-submit">
				<input type="text" name="mobile" value="<?php echo ($mobile); ?>" style="display: none;" />
				<input type="text" name="time" value="<?php echo ($time); ?>" style="display: none;" />
				<p class="bill-status">
					<button class="qiangdan" type="submit">
						我已送达！
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
			<form action="/index.php?s=/Home/Index/receivebill/sex/%E7%94%B7/id/126/address/6%E5%8C%BA6%E6%A0%8B305/time/1458798283/times/%E6%98%A8%E5%A4%A9+13%3A44/school/%E6%B9%96%E5%8D%97%E7%A7%91%E6%8A%80%E5%A4%A7%E5%AD%A6/username/%E5%9B%9E%E5%BF%86/content/%E3%80%90%E4%BA%AC%E4%B8%9C%E3%80%91%E6%82%A8%E5%A5%BD%EF%BC%8C%E6%82%A8%E7%9A%84%E8%AE%A2%E5%8D%9513048515721%E5%B7%B2%E5%88%B0%E6%B9%96%E5%8D%97%E7%A7%91%E6%8A%80%E5%A4%A7%E5%AD%A6%E4%BA%AC%E4%B8%9C%E6%B4%BE%EF%BC%88%EF%BC%88%E6%B9%96%E5%8D%97%E7%9C%81%E6%B9%98%E6%BD%AD%E5%B8%82%E9%9B%A8%E6%B9%96%E5%8C%BA%E6%A1%83%E5%9B%AD%E8%B7%AF%E6%B9%96%E5%8D%97%E7%A7%91%E6%8A%80%E5%A4%A7%E5%AD%A6%E5%8D%97%E6%A0%A1%E5%9B%BE%E4%B9%A6%E9%A6%86%E6%97%81%E8%BE%B9%E5%B0%8F%E5%A0%95%E8%90%BD%E8%A1%97%E5%B7%A6%E6%89%8B%E8%BE%B9%E7%AC%AC%E4%B8%80%E4%B8%AA%E9%97%A8%E5%BA%97%EF%BC%89%EF%BC%89%EF%BC%8C%E8%AF%B7%E5%8F%8A%E6%97%B6%E6%8F%90%E5%8F%96%EF%BC%8C%E8%90%A5%E4%B8%9A%E6%97%B6%E9%97%B409%3A00-19%3A00%EF%BC%8C%E5%A6%82%E9%9C%80%E5%B8%AE%E5%8A%A9%E8%AF%B7%E8%87%B4%E7%94%B518674367121%EF%BC%8C%E8%AF%84%E4%BB%B7%E5%8F%AF%E8%B5%A2%E4%BA%AC%E8%B1%86%0D%0A%E6%8F%90%E8%B4%A7%E7%A0%81%EF%BC%9A853633/sum/3/mobile/13875296136.html" method="post" id="comment-form">
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
			<form action="/index.php?s=/Home/Index/receivebill/sex/%E7%94%B7/id/126/address/6%E5%8C%BA6%E6%A0%8B305/time/1458798283/times/%E6%98%A8%E5%A4%A9+13%3A44/school/%E6%B9%96%E5%8D%97%E7%A7%91%E6%8A%80%E5%A4%A7%E5%AD%A6/username/%E5%9B%9E%E5%BF%86/content/%E3%80%90%E4%BA%AC%E4%B8%9C%E3%80%91%E6%82%A8%E5%A5%BD%EF%BC%8C%E6%82%A8%E7%9A%84%E8%AE%A2%E5%8D%9513048515721%E5%B7%B2%E5%88%B0%E6%B9%96%E5%8D%97%E7%A7%91%E6%8A%80%E5%A4%A7%E5%AD%A6%E4%BA%AC%E4%B8%9C%E6%B4%BE%EF%BC%88%EF%BC%88%E6%B9%96%E5%8D%97%E7%9C%81%E6%B9%98%E6%BD%AD%E5%B8%82%E9%9B%A8%E6%B9%96%E5%8C%BA%E6%A1%83%E5%9B%AD%E8%B7%AF%E6%B9%96%E5%8D%97%E7%A7%91%E6%8A%80%E5%A4%A7%E5%AD%A6%E5%8D%97%E6%A0%A1%E5%9B%BE%E4%B9%A6%E9%A6%86%E6%97%81%E8%BE%B9%E5%B0%8F%E5%A0%95%E8%90%BD%E8%A1%97%E5%B7%A6%E6%89%8B%E8%BE%B9%E7%AC%AC%E4%B8%80%E4%B8%AA%E9%97%A8%E5%BA%97%EF%BC%89%EF%BC%89%EF%BC%8C%E8%AF%B7%E5%8F%8A%E6%97%B6%E6%8F%90%E5%8F%96%EF%BC%8C%E8%90%A5%E4%B8%9A%E6%97%B6%E9%97%B409%3A00-19%3A00%EF%BC%8C%E5%A6%82%E9%9C%80%E5%B8%AE%E5%8A%A9%E8%AF%B7%E8%87%B4%E7%94%B518674367121%EF%BC%8C%E8%AF%84%E4%BB%B7%E5%8F%AF%E8%B5%A2%E4%BA%AC%E8%B1%86%0D%0A%E6%8F%90%E8%B4%A7%E7%A0%81%EF%BC%9A853633/sum/3/mobile/13875296136.html" method="post" id="reply-form">
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
			if ($('#status-num').text() == 2) {
				$('#second-step').addClass("bill-now");
				$('.bill-status').show();
				$('#status-done').show();
				$('#status-get').hide();
				$('#status-over').hide();
			} else if ($('#status-num').text() == 3) {
				$('#third-step').addClass("bill-now");
				$('.bill-status').hide();
				$('#status-done').hide();
				$('#status-get').show();
				$('#status-over').hide();
			} else if ($('#status-num').text() == 4) {
				$('#four-step').addClass("bill-now");
				$('.bill-status').hide();
				$('#status-done').hide();
				$('#status-get').hide();
				$('#status-over').show();
			}
		</script>
		<script type="text/javascript">
			$(document).ready(function() {
				//性别(根据隐藏的性别)
				if ($('#sex-receivebill').text() == "女") {
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
						$('.bill-status').hide();
						$('#status-get').show();
						$('#status-done').hide();
					}
				});
			})
		</script>
	</body>

</html>