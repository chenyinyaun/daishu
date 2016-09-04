<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,minimal-ui">

		<link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css" />
		<link rel="stylesheet" type="text/css" href="/Public/static/font-awesome/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="/Public/Home/css/index.css" />
		<meta charset="utf-8">
		<title>实名认证</title>
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
					实名认证
				</span>
			</div>
			<div class="place">
				<a href="">
				</a>
			</div>
		</div>
		<!--<div class="head">
		</div>-->
		<div class="container">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title">你的实名认证状态为：<span id="status-one">认证不通过或没有实名认证，请重新提交</span><span id="status-two">正在审核你的实名认证资料</span><span id="status-there">实名认证已通过,可以接单了</span></h3>
				</div>
			</div>
			<p id="status-num" style="display: none;"><?php echo ($certificate); ?></p>
			<form action="<?php echo U('File/certificate');?>" enctype="multipart/form-data" method="post" role="form">
				<label for="inputfile">务必上传身份证正面照片:</label>
				<input type="file" name="photo" />
				<br />
				<div class="input-group">
					<span class="input-group-addon">真实姓名</span>
					<input type="text" class="form-control" name="realname" placeholder="填写你的真实姓名" value="">
				</div>
				<br />
				<div class="input-group">
					<span class="input-group-addon">身份证号</span>
					<input type="text" class="form-control" name="idcard" placeholder="填写你的真实身份证号" value="">
				</div>
				<br />
				<div class="input-group">
					<span class="input-group-addon">宿舍号</span>
					<input type="text" class="form-control" name="dormitory" placeholder="填写格式：＊＊公寓+宿舍号" value="">
				</div>
				<br />
				<div class="input-group">
					<span class="input-group-addon">学号</span>
					<input type="text" class="form-control" name="xuehao" placeholder="填写你的真实学号" value="">
				</div>
				<br />
				<div class=" Validform_checktip text-warning">
				</div>
				<div class="row">
					<div class="col-xs-12">
						<button class="btn btn-success btn-lg btn-block" type="submit" value="">点击提交</button>
					</div>
				</div>
			</form>
		</div>
		<script src="/Public/static/bootstrap-3.3.5/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="/Public/static/jquery-2.0.3.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			if ($('#status-num').text() == 0) {
				$('#status-one').show();
				$('#status-two').hide();
				$('#status-there').hide();
			} else if ($('#status-num').text() == 1) {
				$('#status-one').hide();
				$('#status-two').show();
				$('#status-there').hide();
			} else {
				$('#status-one').hide();
				$('#status-two').hide();
				$('#status-there').show();
			}
		</script>
		<script type="text/javascript">
			$(document).ready(function() {})
		</script>
	</body>

</html>