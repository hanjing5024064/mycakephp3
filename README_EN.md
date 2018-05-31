## mycakephp3
====
some functions use cakephp3: user/role, menu, wechat...

## install
----
- clone code
git clone https://github.com/hanjing5024064/mycakephp3.git
  
- install vendor
under mycakephp3/ run 'composer install'

- if you have any problem of install vendor, please download vendor.zip and unzip to your mycakephp3
 

1. database
   create database 'databasename'
 
   execute sql file /mycakephp3.sql

2. config bootstrap.php

   Line 102
   
   change

   date_default_timezone_set('UTC');
   
   to your timezone
   
   date_default_timezone_set('Asia/Shanghai');

3. config app.php 

- config/app.php

   Line 42
 
   change
   
   'defaultLocale' => env('APP_DEFAULT_LOCALE', 'en_US'),
  
   to language you need
   
   'defaultLocale' => env('APP_DEFAULT_LOCALE', 'zh_CN'),

   Line 220

   change to your database parameters

4. visite

   http://.../mycakephp3
