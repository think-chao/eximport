<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 2017/11/8
 * Time: 0:38
 */
namespace Home\Controller;
use Think\Controller;
class SearchController extends Controller
{
    public function index()
    {
        $this->display();//显示页面
    }
    public function search()
    {
        //获取post的数据，根据数据组装查询的条件，根据条件从数据库中获取数据，返回给页面中遍历
        if(isset($_POST['username']) && $_POST['username']!=null)
        {
            $where['username']=array('like',"{$_POST['username']}");
        }

        $m=M("imformation");

        $arr=$m->where($where)->select();

        $this->assign('data',$arr);

        $this->display('index');

    }
}