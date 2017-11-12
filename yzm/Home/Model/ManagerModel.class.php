<?php

namespace Model;
use Think\Model;
class ManagerModel extends Model{
    //制作一个方法对用户名和密码进行校验
    function checkNamePwd($name,$pwd){
        //1. 根据$name查询是否有此记录
        //select  *  from  sw_manager where mg_name=$name;
        //select()  find()
        //根据指定字段进行查询getByXXX();  getByMg_name($name);
        //getBymg_pwd();  父类Model利用__call()封装的方法
        //getByXXX()函数返回一维数组信息
        $info = $this -> getByMg_name($name);
        //$info =null  说明用户名错误
        //$info = 一维数组  用户名正确

        //$info不为null，就可以继续验证密码
        if($info != null){
            //验证密码(查询出来的密码与用户输入的密码进行比较)
            if($info['mg_pwd'] != $pwd){
                return false;
            } else {
                return $info;
            }
        } else {
            return false;
        }
    }
}
