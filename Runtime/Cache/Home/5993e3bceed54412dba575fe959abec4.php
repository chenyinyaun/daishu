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
					我的接单
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
						<h6 class="panel-title" style="font-size:0.9em" >说明：这里将显示你所有接到的单。接到的单分为三种状态，一是
							接单之后状态为［被抢啦］，二是你送达之后点击［我已送达］状态就为为［已送达］，三是让对方面对面付款后该单结束状态为［已接单］
							。一旦接单之后你办不了或者对方要取消该单，请线下根据电话号码自己协商，代鼠对每一单有详细的记录，请认真对待你所接的单</h6>
					</div>
		</div>
		<ul class="task-whole">
			<?php if(is_array($bills)): $i = 0; $__LIST__ = $bills;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bill): $mod = ($i % 2 );++$i;?><li>
					<a href="<?php echo U('Home/Index/receivebill',array('sex'=>$bill['sex'],'id'=>$bill['id'],'address'=>$bill['address'],'time'=>$bill['time'],'times'=>$bill['times'],'school'=>$bill['school'],'username'=>$bill['username'],'content'=>$bill['content'],'sum'=>$bill['sum'],'mobile'=>$bill['mobile']));?>">
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
									<p style="display: none;" id="myreceive-sex"><?php echo ($bill["sex"]); ?></p>
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
										<?php elseif($bill['status'] == 3 ): ?><span>已送达
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
					if ($(this).find('#myreceive-sex').text() == "女") {
						$(this).find('.name-school i').addClass('fa-venus');
					} else {
						$(this).find('.name-school i').addClass('fa-mars');
					};
				});
			});
		</script>
	</body>

</html>