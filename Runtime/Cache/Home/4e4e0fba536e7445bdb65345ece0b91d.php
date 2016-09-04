<?php if (!defined('THINK_PATH')) exit();?><html>

	<head>
		<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,minimal-ui">
		<meta charset="UTF-8" />
		<title>消息详情页</title>
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
					说说详情页
				</span>
			</div>
			<div class="place">
				<a href="">
				</a>
			</div>
		</div>
		<!--<div class="head">
		</div>-->
		<div class="messages">
			<div class="individual">
				<div class="individual-image">
					<img src="<?php echo ($picture); ?>" />
				</div>
				<div class="individual-name">
					<div class="name-nickname">
						<span id="usernames"><?php echo ($username); ?>
						</span>
					</div>
					<div class="name-school" id="name-school">
						<span id="">
							<i class="fa fa-1x" style="color: #AC2925;">
							</i>
							<p style="display: none;" id="sex-messages"><?php echo ($sex); ?></p>
						</span>
						<span><?php echo ($school); ?>
						</span>
					</div>
				</div>
				<div class="individual-time">
					<div class="start-time">
						<span><?php echo ($time); ?>
						</span>
					</div>
					<div class="reply-color"><span id="">
						<i class="fa fa-comment fa-1x"></i>评论
					</span>
					</div>
				</div>
			</div>
			<div class="messages-content">
				<p>
					<?php echo ($content); ?>
				</p>
			</div>
		</div>

		<ul class="message-comments" id="message-comments">
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
								<div style="display: none;"><?php echo ($me["mphone"]); ?></div>
								<a style="display: none;"><?php echo ($me["id"]); ?></a>
								<p class="comments-mphone" style="display: none;"><?php echo ($me["username"]); ?></p>
							</div>
						</div>
					</div>
					<div class="comments-detail">
						<p><?php echo ($me["content"]); ?>
						</p>
					</div>
					<?php if(is_array($reply[$me['id']]['name'])): $i = 0; $__LIST__ = $reply[$me['id']]['name'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$re): $mod = ($i % 2 );++$i;?><p> <span class="reply-name"><?php echo ($re["rphone"]); ?></span>回复<span class="reply-name"><?php echo ($re["mobile"]); ?></span>:<?php echo ($re["content"]); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
		<div class="foot">
		</div>
		<div class="flex-comments">
			<form action="/index.php?s=/Home/Index/message/id/87/sex/%E7%94%B7/time/03%E6%9C%8813%E6%97%A5+17%3A14/school/%E6%B9%96%E5%8D%97%E7%A7%91%E6%8A%80%E5%A4%A7%E5%AD%A6/username/%E4%BD%A0%E5%A5%BD/content/%E5%A4%A7%E5%AE%B6%E5%A5%BD/mobile/18693096097.html" method="post" id="comment-form">
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
			<form action="/index.php?s=/Home/Index/message/id/87/sex/%E7%94%B7/time/03%E6%9C%8813%E6%97%A5+17%3A14/school/%E6%B9%96%E5%8D%97%E7%A7%91%E6%8A%80%E5%A4%A7%E5%AD%A6/username/%E4%BD%A0%E5%A5%BD/content/%E5%A4%A7%E5%AE%B6%E5%A5%BD/mobile/18693096097.html" method="post" id="reply-form">
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
			$(document).ready(function() {
				//评论的各个性别(根据隐藏的性别)
				$('#message-comments li').each(function() {
					if ($(this).find('#message-sex').text() == "女") {
						$(this).find('#comments-sex i').addClass('fa-venus');
					} else {
						$(this).find('#comments-sex i').addClass('fa-mars');
					};
				});
				//说说的性别添加类
				if ($('#sex-messages').text() == "女") {
					$('#name-school i').addClass('fa-venus');
				} else {
					$('#name-school i').addClass('fa-mars');
				};
				//最先隐藏回复的表单
				$('#reply-form').hide();
				//两个表单一个是提供评论一个是回复，这个是 回复,先点击选中
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
					//alert(item.children("p").text());
					var selfs = $('#reply-form');
					$.post(selfs.attr("action"), selfs.serialize(), success, "json");
					return false;

					function success(data) {
						if (data.warnings) {
							alert(data.warnings);
						} else {
							item.append("<p><span class='reply-name'>" + data.user + "</span>回复<span class='reply-name'>" + data.users + "</span>:<span class='reply-content'>" + data.content + "</p>");
							$('#reply').val("");
							$('#reply').attr("placeholder", "");
						}
					}
				});
				//这个是评论的点击选中
				$('.messages').click(function() {
					$('#reply-form').hide();
					$('#comment-form').show();
					$('#content').attr("placeholder", "[评论]～" + $("#usernames").text() + ":");
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
							$("ul").append("<li class='comments-message'><div class='individual'><div class='individual-image'><img src='" + data.picture + "' /></div><div class='individual-name'><div class='name-nickname'><span>" + data.user + "</span></div><div class='name-school''><i class='fa fa-1x'></i><span>" + data.school + "</span></div></div><div class='individual-time'><div class='start-time'><i class='fa fa-comment fa-lg'></i><span>回复</span><div class='' style='display: none;'><?php echo ($me["mobile"]); ?></div><p class='comments-mphone' style='display: none;'><?php echo ($me["username"]); ?></p></div></div></div><div class='comments-detail'><p>" + data.content + "</p></div></li>");
							$('#content').val("");
						}
					}
				});
			})
		</script>
	</body>

</html>