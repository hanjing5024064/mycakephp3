## mycakephp3

   用cakephp3实现的一些功能: 用户/角色，菜单, 微信...

## 安装

- 下载代码
   git clone https://github.com/hanjing5024064/mycakephp3.git
  
- 安装依赖
   在mycakephp3/路径下运行'composer install'.
   ? 如果无法安装依赖，请下载压缩包vendor.zip, 解压到mycakephp3路径下
 
## 配置

1. 数据库

   创建数据库'databasename'
   导入sql文件mycakephp3.sql

2. 时区设置（默认Asia/Shanghai）

   config/bootstrap.php

   第102行 修改为自己的时区:
   date_default_timezone_set('Asia/Shanghai');

3. 本地化\数据库连接设置, 默认zh_CN

   config/app.php

   第42行
   'defaultLocale' => env('APP_DEFAULT_LOCALE', 'zh_CN'),

   第220行
   'Datasources' => [
      ...
      'username' => 'cakephp',
      'password' => 'cp123123',
      'database' => 'mycakephp3',
      ...
   ]
   修改为你的数据库链接参数

4. 访问

   http://.../mycakephp3

## 微信接入

# V0.0.2
1. 数据表wechat_gzhs中增加公众号配置信息
2. routes.php去掉L49的注释,注释L55
   //服务器接入使用, 微信后台配置访问路径http://your.com/wc/
   $routes->connect('/', ['controller' => 'HomepageWC', 'action' => 'join']);
   //微信处理逻辑
   //$routes->connect('/', ['controller' => 'HomepageWC', 'action' => 'index']);
3. 微信公众号后台开启开发者模式,并做相应配置
   设置服务器地址为http://yourdomain/wc?hwId=1
   hwId是步骤1添加的记录的ID
4.routes.php去掉L55的注释,注释L49
   //服务器接入使用, 微信后台配置访问路径http://your.com/wc/
   //$routes->connect('/', ['controller' => 'HomepageWC', 'action' => 'join']);
   //微信处理逻辑
   $routes->connect('/', ['controller' => 'HomepageWC', 'action' => 'index']);

# V0.0.1
1. 修改配置文件config/wechat_test.php
    填写自己的appid, appsecret, token
2. 微信公众号后台开启开发者模式,并做相应配置
    设置服务器地址为http://yourdomain/wc
3. 设置自定义菜单
    访问：http://yourdomain/homepage-w-c/set-menu

4. 调试信息
    公众号内回复info
    将获得当前用户openid及unionid
