<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
		<meta charset="UTF-8" />
		<meta name="apple-mobile-web-app-title" content="">
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta name="format-detection" content="telephone=no">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,minimal-ui">
		<title>
			购买奶茶
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
				<a href="javascript:history.go(-1);">
					<i class="fa fa-angle-left fa-2x">
					</i>
				</a>
			</div>
			<div class="title">
				<span id="title">
					购买奶茶
				</span>
			</div>
			<div class="place">

			</div>
		</div>
		<!--撑开顶部的高度-->
		<!--<div class="head">
		</div>-->
		<!--第二 发布任务-->
		<div id="task" class="task">
			<div class="content" id="content">
				<!--具体的任务-->
				<div class="task-name">
					<p>
						购买奶茶
					</p>
				</div>
				<div class="container">
					<!--发单的表单-->
					<form class="bs-example bs-example-form" action="/index.php?s=/Home/Pay/milktea.html" method="post" id="send-bill" role="form">
						<div class="input-group">
							<span class="input-group-addon">选择店铺</span>
							<select name="store" id="store" class="form-control">
								<option value="请选择奶茶店" selected="selected">
									请选择奶茶店
								</option>
								<option value="后街地铁港饮">
									后街地铁港饮
								</option>
								<option value="冰淋城下">
									冰淋城下
								</option>
								<option value="街景奶茶">
									街景奶茶
								</option>
								<option value="搜茶令">
									搜茶令
								</option>
								<!-- <option value="">
								</option>
								<option value="">
								</option>
								<option value="">
								</option> -->
							</select>
						</div>
						<br />
						<div class="input-group">
							<span class="input-group-addon">奶茶类型</span>
							<select name="type" id="type" class="form-control">
								<option value="请选择奶茶类型" selected="selected">
									请选择奶茶类型
								</option>
								<option value="奶绿系列">
									奶绿系列
								</option>
								<option value="手工酸奶系列">
									手工酸奶系列
								</option>
								<option value="沙冰奶昔系列">
									沙冰奶昔系列
								</option>
								<option value="热牛奶系列">
									热牛奶系列
								</option>
								<option value="果茶系列">
									果茶系列
								</option>
								<option value="冰激凌系列">
									冰激凌系列
								</option>
								<option value="招牌奶盖系列">
									招牌奶盖系列
								</option>
							</select>
						</div>

						<br />
						<div class="input-group">
							<span class="input-group-addon">自定义项</span>
							<input type="text" class="form-control" name="more" placeholder="输入“奶茶味道”--“大约价钱”" value="">
						</div>
						<br />
						<label for="name">个人信息:收货地址请前往个人中心收货地址处填写</label>
						<br />
						<fieldset disabled>
							<div class="input-group">
								<span class="input-group-addon">收货地址</span>
								<input type="text" id="disabledTextInput" class="form-control" name="address" placeholder="想想给你送到什么地" value="<?php echo ($address); ?>">
							</div>
						</fieldset>
						<br />
						<label for="name">送达时间为此单发布之后的有效生存时间。送达时间后，如果没人接单，该单将自动过期，且该单金额立即退款到个人余额:</label>
						<div class="input-group">
							<span class="input-group-addon">送达时间</span>
							<select name="timeout" id="timeout" class="form-control">
								<option value="过期时间" selected="selected">
									送达时间
								</option>
								<option value="3小时">
									3小时
								</option>
								<option value="5小时">
									5小时
								</option>
								<option value="1天">
									1天
								</option>
								<option value="2天">
									2天
								</option>
								<option value="3天">
									3天
								</option>
								<option value="5天">
									5天
								</option>
								<option value="永不">
									永不
								</option>
							</select>
						</div>
						<br />
						<div class="input-group">
							<span class="input-group-addon">联系电话</span>
							<input type="text" class="form-control" name="mobilephone" placeholder="对方联系能到你的电话" value="<?php echo ($mobilephone); ?>">
						</div>
						<br />
						<!--<div class="input-group">
						<span class="input-group-addon">本人姓名</span>
						<input type="text" class="form-control" value="" name="name" placeholder="本人真实姓名">
						</div>
						<br />-->
						<div class="input-group">
							<span class="input-group-addon">答谢报酬</span>
							<input type="text" class="form-control" name="sum" placeholder="不少于2元">
							<span class="input-group-addon">元</span>
						</div>
						<br />
						<div class=" Validform_checktip text-warning">
						</div>
						<br />
						<button type="submit" class="btn btn-success btn-lg btn-block">
							下一步
						</button>
					</form>
				</div>
			</div>
		</div>
		<!--js内容页面最后加载-->
		<script src="/Public/static/bootstrap-3.3.5/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="/Public/static/jquery-2.0.3.min.js" type="text/javascript"></script>
		<script src="/Public/static/swiper.js" type="text/javascript"></script>
		<script type="text/javascript">//异步提交表单进行发单
$("#send-bill").submit(function() {
	var self = $(this);
	self.find(".Validform_checktip").text("");
	$.post(self.attr("action"), self.serialize(), success, "json");
	return false;

	function success(data) {
		if (data.status) {
			window.location.href = data.url;
		} else {
			//错误消息反馈
			self.find(".Validform_checktip").text(data.info);
		}
	};
});</script>
	</body>
</html>