<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta charset="utf-8">
		<title>个人说说</title>
		<link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="/Public/Home/css/index.css" />
		<link rel="stylesheet" type="text/css" href="/Public/static/font-awesome/css/font-awesome.min.css" />
	</head>

	<body>
		<div class="sendmessage-wrap">
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
					我的说说
				</span>
			</div>
			<div class="place">
				<a href="">
				</a>
			</div>
		</div>
		<!--<div class="head">
		</div>-->
		<div class="sendmessage">

			<form id="message-form" action="/index.php?s=/Home/Index/sendmessage.html" method="post">
				<p>
					<h3 style="text-align: center;">发表说说:</h3></p>
				<div class="form-group">
					<textarea class="form-control" rows="5" name="content" placeholder=""></textarea>
				</div>
				<div class="controls Validform_checktip text-warning"></div>
				<div class="control-group">
					<button type="submit" class="btn btn-warning  btn-lg btn-block">发表</button>
				</div>
			</form>
			<p>
				<h3 style="text-align: center;">说说列表:</h3></p>

			<ul>
				<?php if(is_array($sendmessage)): $i = 0; $__LIST__ = $sendmessage;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$message): $mod = ($i % 2 );++$i;?><li>
						<a href="<?php echo U('Home/Index/message',array('id'=>$message['id'],'sex'=>$message['sex'],'time'=>$message['time'],'school'=>$message['school'],'username'=>$message['username'],'mobile'=>$message['mobile'],'content'=>$message['content']));?>">
							<div class="messages">
								<div class="individual">

									<div class="individual-image">
										<img src="<?php echo ($picture); ?>" />
									</div>
									<div class="individual-name">
										<div class="name-nickname">
											<span><?php echo ($message["username"]); ?>
									<!--这个隐藏的电话是为了给message传入可见的参数-->
									<p style="display: none;"><?php echo ($message["mobile"]); ?></p></span>
										</div>
										<div class="name-school">
											<span id=""><p style="display: none;" id="sendmessage-sex"><?php echo ($sex); ?></p>
							<i class="fa fa-1x" style="color: #AC2925;">
							</i></span>
											<span><?php echo ($message["school"]); ?></span>
										</div>
									</div>
									<div class="individual-time">
										<div class="start-time">
											<span><?php echo ($message["time"]); ?>
						</span>
										</div>

										<!--<form action="/index.php?s=/Home/Index/sendmessage.html" method="post" id="comment-form">
								<input type="text" name="id" style="display: none;" value="<?php echo ($message["id"]); ?>" />
								<div class="end-time">
									<button type="submit"></button>
								</div>
							</form>-->

									</div>
								</div>
								<div class="messages-content">
									<p>
										<?php echo ($message["content"]); ?>
									</p>
								</div>
							</div>
						</a>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
	</div>

	</body>
	<script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js">
	</script>
	<script src="/Public/static/bootstrap-3.3.5/js/bootstrap.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			//评断性别（根据隐藏的性别）添加类
			if ($('#sendmessage-sex').text() == "女") {
				$('.name-school i').addClass('fa-venus');
			} else {
				$('.name-school i').addClass('fa-mars');
			};
			//发送说说
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
			//删除说说
			$("#comment-form").submit(function() {
				var selfs = $(this);
				$.post(selfs.attr("action"), selfs.serialize(), success, "json");
				return false;

				function success(data) {
					selfs.parent().parent().parent().parent().fadeOut();
				};
			});
		})
	</script>

</html>