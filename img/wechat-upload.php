<?php

$appid = "wx92ba7ebc07b9b5bf";
$appsecret = "fd21910b685b93962908ca79033293cb";
$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";

$output = https_request($url);
$jsoninfo = json_decode($output, true);
$access_token = $jsoninfo["access_token"];

$jsonmenu = array("media"=>"@".dirname(__FILE__)."/1.jpg");
$url = "https://api.weixin.qq.com/cgi-bin/media/uploadimg?access_token=$access_token";
$result = https_request($url, $jsonmenu);
var_dump($result);
//echo dirname(__FILE__);

function https_request($url,$data = null){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!empty($data)){
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
}

?>
