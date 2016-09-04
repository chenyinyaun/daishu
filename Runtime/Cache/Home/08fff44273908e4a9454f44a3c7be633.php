<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css" />
		<link rel="stylesheet" type="text/css" href="/Public/static/font-awesome/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="/Public/Home/css/index.css" />
		<meta charset="utf-8">
		<title></title>
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
					更换个人头像
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
			<form action="<?php echo U('File/upload');?>" enctype="multipart/form-data" method="post" role="form">
				<label for="inputfile">选取图片:</label>
				<br />

				<input type="file" name="photo" />
				<br />
				<br />
				<div class="row">
					<div class="col-xs-12">
						<button class="btn btn-success btn-primary btn-block" type="submit" value="">点击替换</button>
					</div>
				</div>
			</form>
		</div>
		<script src="/Public/static/kindeditor/kindeditor-min.js" type="text/javascript"></script>
		<script src="/Public/static/kindeditor/zh_CN.js" type="text/javascript"></script>
		<script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
		<script src="/Public/static/bootstrap-3.3.5/js/bootstrap.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js">
		</script>
		<script>
			KindEditor.ready(function(K) {
				var editor = K.editor({
					allowFileManager: true
				});
				K('#image').click(function() {
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
							imageUrl: K('#thumb').val(),
							clickFn: function(url, title, width, height, border, align) {
								K('#thumb').val(url);
								editor.hideDialog();
							}
						});
					});
				});
			});
		</script>
	</body>

</html>