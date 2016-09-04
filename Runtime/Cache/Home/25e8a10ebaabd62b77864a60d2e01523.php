<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css" />
		<link rel="stylesheet" type="text/css" href="/Public/Home/css/index.css" />
		<link rel="stylesheet" type="text/css" href="/Public/static/font-awesome/css/font-awesome.min.css" />
		<meta charset="utf-8">
		<title>提现的纪录</title>
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
					提现的纪录
				</span>
			</div>
			<div class="place">
				<a href="">
				</a>
			</div>
		</div>
		<table class="table">
   <thead>
      <tr>
         <th>提现人电话</th>
         <th>金额</th>
         <th>提现日期</th>
      </tr>
   </thead>
   <tbody>
   	<?php if(is_array($draw)): $i = 0; $__LIST__ = $draw;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$moneys): $mod = ($i % 2 );++$i;?><tr class="success">
         <td><?php echo ($moneys["mobile"]); ?></td>
         <td><?php echo ($moneys["money"]); ?>元</td>
         <td><?php echo ($moneys["time"]); ?></td>
      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
   </tbody>
</table>

		<!--<div class="head">
		</div>-->
		<script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
		<script src="/Public/static/bootstrap-3.3.5/js/bootstrap.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function() {});
		</script>
	</body>

</html>