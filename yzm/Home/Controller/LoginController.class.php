<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 2017/11/6
 * Time: 9:23
 */
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller
{
    function index()
    {
            //session_destroy();
            $this->display();//显示登陆页面
    }
    function check_verify($code,$id=''){
        $verify = new \Think\Verify();
        return $verify->check($code,$id);
    }
    public function doLogin()//登陆验证
    {
        session_start();
        //print_r($_SESSION);
        print_r($_SESSION);
        $username=$_POST['username'];
        $password=$_POST['password'];
        //$code=$_POST['code'];
        $_SESSION['username'] = $username;
        if(empty($_POST['username']))
        {
            $this->error('帐号必须！','index');
        }
        else if (empty($_POST['code']))
        {
            $this->error('验证码必须！','index');
        }
        else if (empty($_POST['password']))
        {
            $this->error('密码必须！','index');
        }

        //dump($_SESSION);//调试方法

        if(!$this->check_verify($_POST['code'])) //md5是加密方式
        {
            $this->error('验证码错误！','index');//显示错误页面
        }

        $m=M('imformation');//连接表
        $where['username']=$username;
        $where['password']=$password;
        $i=$m->where($where)->count();

        if($username=="1701210366")
        {
            if($i>0)
            {
                $this->redirect('User/index');
            }

        }

        else if($i>0)
        {
            $this->redirect('User/index');//跳转
        }

        else
        {
            $this->error('用户名或密码错误');
        }

    }



}