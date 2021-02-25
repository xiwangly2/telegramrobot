# telegram-bot
xiwangly的telegram机器人程序:telegram-bot

[@BotFather]:https://t.me/BotFather

**说在前面**
-----

对于中国大陆用户：使用此脚本需要能访问国际网络的服务器或虚拟主机，可以尝试使用ping命令判断连通性：`ping -c 3 api.telegram.org`

支持的语言：zh-CN，zh-TW（测试中）（作者语言能力有限，有翻译错误请指出）

**使用方法**
-----

建议：下载后请把文件夹重命名为`telegram-bot`或其他，不建议保留分支名称。php版本建议>=7.2

如有安全需求，请把`config.php`放置在Web文档树之外，并且修改各脚本的相关文件引入

根据Telegram的要求，搭建本项目的webhook必须使用`https`而不是`http`

>请联系telegram中的[@BotFather]机器人注册自己的机器人，机器人的多数设置都在这里进行<br/>
>请勿泄露`$token`，如果已泄露，请联系[@BotFather]机器人更改`$token`<br/>
>更换token之后需要重新访问webhook.php完成网络挂钩

>`config.php`中的`$hookurl`需要修改为自己的项目地址（网站必须使用https）<br/>
数据库信息是可选的，用于部分功能，填入后请导入`dic.sql`数据库<br/>
`$debug`可能的值为`0`或`1`，用于开启日志记录和调试，默认关闭，填`1`开启

config.php设置详解：（前面已提到过的省略）

```php
$token = '';//
$connectroot = "https://api.telegram.org/bot{$token}/";//连接根信息
$http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';//判断http协议
$http_host = $_SERVER['HTTP_HOST'];//获取主机host
$http_body = "{$http_type}{$http_host}";//合并协议和host
$branch = 'telegram-bot';//存放这个项目的文件夹名
$hookurl = "{$http_body}/{$branch}/index.php";//telegram-bot项目的主文件URL地址
$botname = '@机器人用户名';//
$administrator = '主人用户名';//用于机器功能管理
$administrator_id = '主人id';//用于向主人发送消息，这个id就是from_id，可使用自带命令'/info'查看id，不要填错，推荐用于私聊消息推送
$getdatamax = '2083';//设置允许容纳GET方式发送的数据包最大大小（单位B），设置为0则始终采用POST方法发送数据
$host = 'host(:port)';//数据库的host地址和端口，若端口默认为3306则可省略输入port
$sqlusername = '数据库用户名';//
$password = '数据库密码';//
$dbname = '数据库名';//
$tablename = '数据库表名';//
$debug = '0';//填1开启调试，消息记录和beta功能，多用于开发测试环境
```
示例：<br/>
```php
$token = '1580564475:AAEmbG-OdOnQSzd9YOU6FumQhP7mWTNcS2E';//我的token是1580564475:AAEmbG-OdOnQSzd9YOU6FumQhP7mWTNcS2E（我在填完此内容时已经废除了此token，token的格式一般是机器人id:字符串）
$connectroot = "https://api.telegram.org/bot{$token}/";//我要使用Telegram的Bot API
$http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';//我选择自动选择协议
$http_host = $_SERVER['HTTP_HOST'];//我使用服务器定义的host，端口是默认
$http_body = "{$http_type}{$http_host}";//我不需要自定义url的body部分
$branch = 'telegram-bot';//我存储这个项目的文件夹是telegram-bot
$hookurl = "{$http_body}/{$branch}/index.php";//我的这个项目的index文件是{$http_body}/{$branch}/index.php
$botname = '@xwly_bot';//我的机器人用户名是@xwly_bot（telegram强制要求机器人用户名以_bot结尾）
$administrator = 'xiwangly';//超级管理员（主人）的用户名是xiwangly
$administrator_id = '1367850918';//超级管理员（主人）的id是1367850918
$getdatamax = '0';//我始终使用post方法发送消息，填写0
$host = 'localhost';//我的数据库的host是localhost
$sqlusername = 'dic';//我的数据库的用户名是dic
$password = '********';//我的数据库的密码是********
$dbname = 'dic';//我的数据库的数据库名是dic
$tablename = 'dic';//我的数据库的表名是dic
$debug = '1';//我想要开启调试
```

**`config.php`为必填项，完成后请访问`webhook.php`完成网络挂钩**

备注：(群组中需要加/前缀,注意参数有无空格.有多个机器人且命令冲突时会选择您上次互动的机器人.)<br/>
images目录或/loli相关功能属于随机图片功能，需要请自行在`../images/`目录添加随机图片<br/>
您也可以尝试使用本地Bot API服务器，而不是`https://api.telegram.org`，见Telegram官方的[telegram-bot-api](https://github.com/tdlib/telegram-bot-api)

更新日志：
>2021.2.12 增加繁体中文支持(beta)，简化config.php设置，修复错误，优化正则表达式匹配<br/>
>2021.2.4 增加对GitHub webhook的消息推送支持(beta)，优化代码使之更易于开发者自定义，修复了一些bug

参考：
* [Bots: An introduction for developers](https://core.telegram.org/bots)
* [Telegram Bot API](https://core.telegram.org/bots/api)
* [Telegram APIs](https://core.telegram.org/api)
