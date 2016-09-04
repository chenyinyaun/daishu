<?php
$APPID='wx92ba7ebc07b9b5bf';
$REDIRECT_URI='http://www.doododo.com/get.php';
$scope='snsapi_base';
//应用授权作用域，snsapi_base （不弹出授权页面，直接跳转，只能获取用户openid），snsapi_userinfo （弹出授权页面，可通过openid拿到昵称、性别、所在地。并且，即使在未关注的情况下，只要用户授权，也能获取其信息）
// $scope='snsapi_userinfo';//需要授权
$url='https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$APPID.'&redirect_uri='.urlencode($REDIRECT_URI).'&response_type=code&scope='.$scope.'&state=STATE#wechat_redirect';
header("Location:".$url);
?>
