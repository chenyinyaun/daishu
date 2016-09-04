<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>

	<head>
		<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css" />
				<link rel="stylesheet" type="text/css" href="/Public/static/font-awesome/css/font-awesome.min.css" />
		<meta charset="utf-8">
		<title>充值</title>
		<style type="text/css">
			/*通用css样式*/

			/*通用css样式*/

			body {
				color: #000000;
				font-family: "微软雅黑", sans-serif;
				font-size=62.5%;
				font-size: 1.4em;
			}

			a {
				color: #000000;
			}

			a,
			a:link,
			a:visited,
			a:hover {
				cursor: pointer;
				text-decoration: none;
				/*border: #FFFFFF solid 0px;*/
			}

			ul {
				margin: 0;
				padding: 0;
				list-style: none;
			}
			/*固定位置的顶部 header 及隐藏的高度 head*/

			.header {
				height: 2.3em;
				position: relative;
				overflow: hidden;
				/*z-index: 999;*/
				background-color: #0066FF;
				width: 100%;
				top: 0;
				left: 0;
			}

			.back {
				display: inline-block;
				float: left;
				width: 20%;
				text-align: center;
				border: 1px solid #0066FF;

			}

			.back a {
				font-size: 1.2em;
				color: #FFFFFF;
			}

			.back a:hover {
				color: #46B8DA;
			}

			.title {
				float: left;
				text-align: center;
				display: inline-block;
				width: 60%;
				overflow: hidden;
			}

			.title span {
				font-size: 1.4em;
				color: #FFFFFF;
			}

			.place {
				float: left;
				/*border: 1px solid #000000;*/
				text-align: center;
				display: inline-block;
				width: 15%;
			}

			.place a {
				font-size: 1em;
				color: #FFFFFF;
			}

			.head {
				width: 100%;
				height: 3.5em;
			}
		</style>
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
					充值页面
				</span>
			</div>
			<div class="place">
				<a href="">
				</a>
			</div>
		</div>
		<div class="re-word">
			<h4>选择充值金额：</h3>
		</div>
<div class="container">
			<form  action="<?php echo U('Home/Pay/makesure');?>" method="post" role="form">
				<div class="row">
					<div class="col-xs-4 ">
						<label class="reg-label control-label" for="school"></label>
					</div>
					<div class="col-xs-5 ">
						<select name="money" id="money" class="form-control">
							<option value="2" selected="selected">2</option>
							<option value="3">3</option>
							<option value="5">5</option>
							<option value="10">10</option>
							<option value="20">20</option>
							<option value="50">50</option>
							<option value="100">100</option>
							<option value="200">200</option>
						</select>
					</div>
					<div class="col-xs-3 ">
						<label class="reg-label control-label" for="school">元</label>
					</div>
				</div>
				<br />
				<br />
				<br />
				<button type="submit" class="btn btn-success btn-lg btn-block">前往充值</button>
			</form>
</div>
		<script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
		<script src="/Public/static/bootstrap-3.3.5/js/bootstrap.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function() {
//				$('.subs').click(function(event) {
//					event.preventDefault;
////					if($('.re-focus').text()=="3元"){'
////						$('#money').val()=$('.re-focus').text();
////						alert($('#money').val());
////						return false;
////					}else{
////						$('.money').val("new value");
//					    $('.re-form').Submit();
////					}
//				});
				$('.re-money li').click(function(event) {
					event.preventDefault;
					if ($(this).index() == 0) {
						$(this).siblings('li').removeClass('re-focus');
						$(this).addClass('re-focus');
					} else if ($(this).index() == 1) {
						$(this).siblings('li').removeClass('re-focus');
						$(this).addClass('re-focus');
					} else if ($(this).index() == 2) {
						$(this).siblings('li').removeClass('re-focus');
						$(this).addClass('re-focus');
				    } else if ($(this).index() == 3) {
				     	$(this).siblings('li').removeClass('re-focus');
				     	$(this).addClass('re-focus');
				    } else if ($(this).index() == 4) {
				     	$(this).siblings('li').removeClass('re-focus');
				     	$(this).addClass('re-focus');
				    } else if ($(this).index() == 5) {
				     	$(this).siblings('li').removeClass('re-focus');
				     	$(this).addClass('re-focus');
				    }
				   });
			});
		</script>
	</body>

</html>