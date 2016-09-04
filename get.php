<?php
header("content-type:text/html;charset=utf8");
$appid = "wx92ba7ebc07b9b5bf";
$secret = "fd21910b685b93962908ca79033293cb";
$code = $_GET["code"];
//第一步:取全局access_token
$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$secret";
$token = getJson($url);
$access_token = $token["access_token"];
//第二步:取得openid的同时也能够同时获取access_token
$oauth2Url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code";
$oauth2 = getJson($oauth2Url);
//第三步:根据全局access_token和openid查询用户信息

$openid = $oauth2['openid'];
// echo $oauth2['access_token'];
// $get_user_info_url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=$access_token&openid=$openid&lang=zh_CN";
// $userinfo = getJson($get_user_info_url);
// //打印用户信息
// foreach ($userinfo as $key => $value) {
//
//   echo $key.":".$value."<br>";
// }
function getJson($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return json_decode($output, true);
}
$urls = "http://www.doododo.com/index.php?s=/Home/User/login.html&openid=$openid";
header("Location:".$urls);



?>
