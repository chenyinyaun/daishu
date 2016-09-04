<?php
/**
 * wechat php test
 */
//define your token
define("TOKEN", "weixin");
$wechatObj = new wechatCallbackapiTest();
//$wechatObj->valid();
$wechatObj -> responseMsg();
class wechatCallbackapiTest {
	private $fromUsername;
	private $toUsername;
	public function valid() {
		$echoStr = $_GET["echostr"];
		//valid signature , option
		if ($this -> checkSignature()) {
			echo $echoStr;
			exit ;
		}
	}
	public function responseMsg() {
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
		//extract post data
		if (!empty($postStr)) {
			/* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
			 the best way is to check the validity of xml by yourself */
			libxml_disable_entity_loader(true);
			$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
			$fromUsername = $this -> fromUsername = $postObj -> FromUserName;
			//发送消息方ID
			$toUsername = $this -> toUsername = $postObj -> ToUserName;
			//接收消息方ID
			$keyword = trim($postObj -> Content);
			//用户发送的消息
			$MsgType = $postObj -> MsgType;
			//消息类型
			if ($MsgType == 'event') {
				$MsgEvent = $postObj -> Event;
				//获取事件类型
				if ($MsgEvent == 'subscribe') {//订阅事件
					$title ="新用户关注必读";
					$description ="新用户关注必读";
					$PicUrl ="http://mmbiz.qpic.cn/mmbiz/3qBsKnWywLMx97icyvOb6ror77SGUPRy8Gh856Yg83p05Z4A0rtznKpZbcJW8x9V9FibVcmW92M0NldwKfiaEPptg/0";
					$Url ="http://mp.weixin.qq.com/s?__biz=MzI3NjA5NDYxNg==&mid=407502416&idx=1&sn=1a9fa05cff7f33375f7f701ded44ed15#rd";
					echo $this -> news($title,$description,$PicUrl,$Url);
					exit ;
				} elseif ($MsgEvent == 'CLICK') {//点击事件
					$EventKey = $postObj -> EventKey;
					//菜单的自定义的key值，可以根据此值判断用户点击了什么内容，从而推送不同信息
					if ($EventKey == "怎样赚钱") {
						$title ="新用户关注必读";
						$description ="新用户关注必读";
						$PicUrl ="http://mmbiz.qpic.cn/mmbiz/3qBsKnWywLMx97icyvOb6ror77SGUPRy8Gh856Yg83p05Z4A0rtznKpZbcJW8x9V9FibVcmW92M0NldwKfiaEPptg/0";
						$Url ="http://mp.weixin.qq.com/s?__biz=MzI3NjA5NDYxNg==&mid=407502416&idx=1&sn=1a9fa05cff7f33375f7f701ded44ed15#rd";
						echo $this -> news($title,$description,$PicUrl,$Url);
						exit ;
					} elseif ($EventKey == "代鼠招聘") {
						$title ="加入我们！你就是团队核心！";
						$description ="加入我们！你就是团队核心！";
						$PicUrl ="http://mmbiz.qpic.cn/mmbiz/3qBsKnWywLMx97icyvOb6ror77SGUPRy8FT9JjkQEDgBDPT1hJco0z9xDjBnKTOzulHgvvII90muzQ4ERPVI9Fw/0";
						$Url ="http://mp.weixin.qq.com/s?__biz=MzI3NjA5NDYxNg==&mid=403061509&idx=1&sn=4c1701a97546bb06d14f87008399cee0#rd";
						echo $this -> news($title,$description,$PicUrl,$Url);
						exit ;
					}
				}
			}
		} else {
			echo "this a file for weixin API!";
			exit ;
		}
	}
	/**
	 *@param type: text 文本类型, news 图文类型
	 *@param value_arr array(内容),array(ID)
	 *@param o_arr array(array(标题,介绍,图片,超链接),...小于10条),array(条数,ID)
	 */
	private function news($title,$description,$PicUrl,$Url) {
		$imageTpl = "<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[news]]></MsgType>//消息类型为news（图文）
						<ArticleCount>1</ArticleCount>//图文数量为1（单图文）
						<Articles>
						<item>//第一张图文消息
						<Title><![CDATA[%s]]></Title> //标题
						<Description><![CDATA[%s]]></Description>//描述
						<PicUrl><![CDATA[%s]]></PicUrl>//打开前的图片链接地址
						<Url><![CDATA[%s]]></Url>//点击进入后显示的图片链接地址
						</item>
						</Articles>
						</xml> ";

		$fromUsername = $this -> fromUsername;
		$toUsername = $this -> toUsername;
		// $title = "";
		//标题
		// $description = "";
		//描述
		$time = time();
		// $PicUrl = "http://mmbiz.qpic.cn/mmbiz/3qBsKnWywLPzLTyKMtgHRBN09YjNzgbJSdYwZKZLORcaBNNpKz3bDXGsEuke4cIW5nwXMsJQKeTY5kRMeFZtmQ/0";
		//图片链接
		// $Url = "http://mp.weixin.qq.com/s?__biz=MzI3NjA5NDYxNg==&mid=407502416&idx=1&sn=1a9fa05cff7f33375f7f701ded44ed15#rd";
		//打开后的图片链接
		$resultStr = sprintf($imageTpl, $fromUsername, $toUsername, $time, $title, $description, $PicUrl, $Url);
		return $resultStr;

	}
	private function text($content) {
		$contentStr = $content;
		$msgType = "text";
		$fromUsername = $this -> fromUsername;
		$toUsername = $this -> toUsername;
		$time = time();
		$textTpl = "<xml>
			<ToUserName><![CDATA[%s]]></ToUserName>
			<FromUserName><![CDATA[%s]]></FromUserName>
			<CreateTime>%s</CreateTime>
			<MsgType><![CDATA[%s]]></MsgType>
			<Content><![CDATA[%s]]></Content>
			<FuncFlag>0</FuncFlag>
			</xml>";
		$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
		echo $resultStr;
	}
	// https请求 支持get和post
	protected function https_request($url,$data = null){
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

	private function checkSignature() {
		// you must define TOKEN by yourself
		if (!defined("TOKEN")) {
			throw new Exception('TOKEN is not defined!');
		}
		$signature = $_GET["signature"];
		$timestamp = $_GET["timestamp"];
		$nonce = $_GET["nonce"];
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode($tmpArr);
		$tmpStr = sha1($tmpStr);
		if ($tmpStr == $signature) {
			return true;
		} else {
			return false;
		}
	}

}
?>
