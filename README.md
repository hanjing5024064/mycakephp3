# mycakephp3
用cakephp3实现的一些功能: 用户/角色，菜单, 微信...
some functions use cakephp3: user/role, menu, wechat...

#install/安装
0. 
 clone code/下载代码
  git clone https://github.com/hanjing5024064/mycakephp3.git
 install vendor/安装依赖
  under mycakephp3/ run 'composer install'/在mycakephp3/路径下运行'composer install'
 if you have any problem of install vendor, please download vendor.zip and unzip to your mycakephp3//如果无法安装依赖，请下载压缩包vendor.zip, 解压到mycakephp3路径下

1. database
 create database 'databasename'/创建数据库'databasename'
 execute sql file /mycakephp3.sql/导入sql文件mycakephp3.sql

2. config bootstrap.php
 Line 102/第102行
 change/修改
  date_default_timezone_set('UTC');
 to your timezone/为你的时区
  date_default_timezone_set('Asia/Shanghai');

3. config/app.php
 Line 42/第42行
 change/修改
  'defaultLocale' => env('APP_DEFAULT_LOCALE', 'en_US'),
 to language you need/为你的母语
  'defaultLocale' => env('APP_DEFAULT_LOCALE', 'zh_CN'),

 Line 220/第220行
 change to your database parameters/修改为你的数据库链接参数

4. visite/访问
