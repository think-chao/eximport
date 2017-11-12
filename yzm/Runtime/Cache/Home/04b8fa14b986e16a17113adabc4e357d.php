<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html
        PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >

<html>
<head>
    <title>欢迎</title>
</head>
<body>
<center>
    <form action="<?php echo (/yzm/index.php/Home/Manager/login.html); ?>" method='post' name='myForm'>
        用户名<input type="text" name="username" placeholder="用户名"><br><br>
        密&nbsp;码<input type="password" name="password" placeholder="密码"><br><br>
        验证码<input type="tsxt" name="code" placeholder="验证码"><br><br>
        <img src="<?php echo (/yzm/index.php/Home/Manager); ?>/verifyImg"  onclick='this.src=this.src+"?"+Math.random()'><br>
        <input type="submit" style="width:155px;">
    </form>
    <br><br>
    如果您没有账号点击<a href="/yzm/index.php/Home/Add">这里</a>
</center>
</body>
</html>