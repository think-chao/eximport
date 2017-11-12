<?php
namespace Home\Controller;
use Think\Controller;
class UpdateController extends Controller
{
    function index()
    {
        $value1 = session('username');//获得Login模块的session值

        $this->assign('name',$value1);//将value1的值传入模板

        $this->display();//显示登陆页面

        $User = M("imformation");
    }

    //更新个人数据
    public function update()
    {
        $value1 = session('username');//获得Login模块的session值
        $User = M("imformation");

        // 获取username为$value1的用户的id getField()方法
        $nickname = $User->where(" username = '$value1' ")->getField('id');
        //were语句对于常量这样用where('id=2'),变量如上
        $User->find($nickname); // 查找主键为$nickname的数据

        $User->username = $_POST['username']; // 修改数据对象
        $User->password = $_POST['password'];

        $result = $User->save(); // 保存当前数据对象:save()方法

        if($result !== false)
        {
            $this->success('数据更新成功!','../Login');
        }
        else
        {
            $this->error('数据更新失败！');
        }
    }

}