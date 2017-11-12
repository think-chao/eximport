<?php
return array(
	//'配置项'=>'配置值'
	//数据库配置信息
        'DB_TYPE'   => 'mysql', // 数据库类型
        'DB_HOST'   => 'localhost', // 服务器地址
        'DB_NAME'   => 'shzu', // 数据库名
        'DB_USER'   => 'root', // 用户名
        'DB_PWD'    => '', // 密码
        'DB_PORT'   => 3306, // 端口
        'DB_PREFIX'   =>  'shzu_',    // 数据库表前缀


        'TMPL_PARSE_STRING'=>array(           //添加自己的模板变量规则
        '__CSS__'=>__ROOT__.'/Public/Css',
        '__JS__'=>__ROOT__.'/Public/Js',
        '__IMAGES__'=>__ROOT__.'/Public/Images',

        ),

            
);
?>