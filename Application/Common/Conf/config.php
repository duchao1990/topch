<?php
return array(

	//'配置项'=>'配置值'
	'MAIL'=>array(
        'EMAIL_HOST' => 'smtp.163.com',           //邮件发送服务器
        'EMAIL_PORT' => '25',                     //邮件发送服务器端口
        'EMAIL_USER' => 'blackday1990@163.com',     //邮件发送服务器
        'EMAIL_PWD'  => 'dc1990',                 //邮件发送服务器密码
        'EMAIL_NAME' => 'phptalker技术部',         //邮件发送服务器
        //网站相关设置
        'TITLE'=>'php学习平台',
    ),

    //数据库配置
    'DB_TYPE'   => 'mysqli', // 数据库类型
    'DB_HOST'   => '127.0.0.1', // 服务器地址
    'DB_NAME'   => 'test', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => 'root',  // 密码
    'DB_PORT'   => '3306', // 端口
    'DB_PREFIX' => '', // 数据库表前缀


);