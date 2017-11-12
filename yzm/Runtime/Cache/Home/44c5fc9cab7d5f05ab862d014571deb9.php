<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html

    PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"

    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >
<html>
<head>
    <title>更新信息</title>
</head>
<body>
<center>
    你好,<?php echo ($name); ?>!你可以完善以下信息
    <form action='/yzm/index.php/Home/Update/update' method='post'>

        用户名<input type="username" name="username" placeholder="用户名"><br><br>
        密&nbsp;码<input type="password" name="password" placeholder="密码"><br><br>

        <input type="submit" style="width:155px;">
    </form>
</center>
</body>
</html>