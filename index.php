<?php
include_once './config.php';
include_once './function.php';
//获取反射信息
$update = json_decode(@file_get_contents('php://input'),true);
$chat_id = $update['message']['chat']['id'];
$name = $update['message']['from']['username'];
$msg = $update['message']['text'];
if($debug = '1'){
	@file_put_contents('msg.txt',$msg);
}
//发送给用户
if(!isset($msg) || $msg == ''){
	die;
}
include './tgtext.php';
//開啟繁體（測試中）
//include './tgtext2.php';
include './tgphoto.php';
include './tgdocument.php';
?>