<?php
//请联系@BotFather机器人注册自己的机器人，并填入下面的信息
//请勿泄露$token，如果已泄露，请联系@BotFather机器人更改$token
//$hookurl需要修改为自己的项目地址（网站必须使用https），完成后请访问webhook.php完成网络挂钩
//数据库信息是可选的，用于部分功能，填入后请导入dic.sql数据库
//$debug可能的值为0或1，用于开启日志记录和调试，默认关闭，填1开启
$token = '';
$connectroot = "https://api.telegram.org/bot{$token}/";
$hookurl = 'https://您的域名/telegram-bot/index.php';
$botname = '@机器人用户名';
$administrator = '主人用户名';
$getdatamax = '2083';
$host = 'host(:port)';
$sqlusername = '数据库用户名';
$password = '数据库密码';
$dbname = '数据库名';
$tablename = '数据库表名';
$debug = '0';
?>