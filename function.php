<?php
function getHttps($url,$isoutput = 0)
{
	//初始化
	$ch = curl_init();
	//设置选项，包括URL
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_HEADER,0);
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
	//https请求 不验证证书和hosts
	curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
	$output = curl_exec($ch);
	//执行并获取HTML文档内容
	if($isoutput == 1 | $isoutput == true)
	{
		echo $output;
	}
	elseif($isoutput == 2)
	{
		@file_put_contents('./curldata.txt');
	}
	//$str = htmlspecialchars($output);
	//释放curl句柄
	curl_close($ch);
return $output;
}
function post($url,$post_string = '')
{
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_POSTFIELDS,'mypost='.$post_string);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch, CURLOPT_USERAGENT,"xiwangly CURL Example beta");
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}
function uuid()
{
	$chars = md5(uniqid(mt_rand(),true));
	$uuid = substr($chars,0,8).'-'.substr($chars,8,4).'-'.substr($chars,12,4).'-'.substr($chars,16,4).'-'.substr($chars,20,12);
	return $uuid;
}