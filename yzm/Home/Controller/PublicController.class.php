<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 2017/11/6
 * Time: 9:22
 */
namespace Home\Controller;

use Think\Controller;
use Think\Verify;

class PublicController extends Controller
{

    /* 生成验证码 */
    public function verify()
    {
        $config = [
            'fontSize' => 19, // 验证码字体大小
            'length' => 2, // 验证码位数
            'imageH' => 34,
            'useZh' => false,
        ];
        $Verify = new Verify($config);
        $Verify->codeSet = '0123456789';
        $Verify->entry();

    }
    /* 验证码校验 */
    public function check_verify($code)
    {
        $verify = new \Think\Verify();
        $res = $verify->check($code);
        $this->ajaxReturn($res, 'json');
    }
}

