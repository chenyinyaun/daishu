<?php if (!defined('THINK_PATH')) exit();?><html>

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8" />
		<title></title>
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
					我的发单
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
		<div class="panel panel-primary">
					<div class="panel-heading">
						<h6 class="panel-title" style="font-size:0.9em" >说明：这里将显示你所发出的所有单。每个单分为五种状态，一是刚发布时候为
							［刚发布］，二是被别人接单之后状态为［被抢啦］，三是对方送达之后为［已送达］，四是你确认付款给对方之后为［已接单］，五是如果在过期
							时间前没有人接单该单将自动取消，此单金额立即返回给发单人的个人余额；取消订单的条件只能是
						［刚发布］。一旦单被别人接下来，该单将显示对方的电话号码，双方将自己联系！你确认付款之后此单金额将立即打给对方代鼠个人余额</h6>
					</div>
		</div>
		<ul class="task-whole">
			<?php if(is_array($bills)): $i = 0; $__LIST__ = $bills;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bill): $mod = ($i % 2 );++$i;?><li>
					<a href="<?php echo U('Home/Index/sendbill',array('sex'=>$bill['sex'],'id'=>$bill['id'],'address'=>$bill['address'],'time'=>$bill['time'],'times'=>$bill['times'],'school'=>$bill['school'],'username'=>$bill['username'],'content'=>$bill['content'],'sum'=>$bill['sum'],'mobile'=>$bill['mobile']));?>">
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
									<p style="display: none;" id="mybill-sex"><?php echo ($bill["sex"]); ?></p>
								</div>
							</div>
							<div class="individual-time">
								<div class="start-time">
									<span><?php echo ($bill["times"]); ?>
										</span>
								</div>
								<div class="end-time">
									<span id="money"><?php echo ($bill["sum"]); ?></span>元
								</div>
							</div>
						</div>
						<div class="task-detail">
							<div class="content-explain">
								<span>
										<p><?php echo ($bill["content"]); ?>
										</p>
									</span>
							</div>
							<div class="content-place">
								<p>
									地点:
									<span id="task-place">
											<?php echo ($bill["address"]); ?>
										</span>
								</p>
							</div>
						</div>
						<div class="task-status">
							<ul>
								<li>
									<?php if($bill['status'] == 1 ): ?><span id="status">刚发布
										</span>
										<?php elseif($bill['status'] == 2 ): ?><span>被抢啦
										</span>
										<?php elseif($bill['status'] == 3 ): ?><span>被抢啦
										</span>
										<?php else: ?><span>已结单
										</span><?php endif; ?>
								</li>
								<li>
									<span id="task">
										</span>
								</li>
							</ul>
						</div>
						<a href="">
						</a>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
		<div class="foot">
		</div>
		<script src="/Public/static/bootstrap-3.3.5/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="/Public/static/jquery-2.0.3.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				//单的性别
				$('.task-whole li').each(function() {
					if ($(this).find('#mybill-sex').text() == "女") {
						$(this).find('.name-school i').addClass('fa-venus');
					} else {
						$(this).find('.name-school i').addClass('fa-mars');
					};
				});
			});
		</script>

	</body>

</html>