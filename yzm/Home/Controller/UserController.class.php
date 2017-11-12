<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 2017/11/6
 * Time: 13:11
 */
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller
{
    public function index()
    {
        $value1 = session('username');//获得Login模块的session值
        $this->assign('name',$value1);//将value1的值传入模板,模板用{$name}调用
        $this->display();//显示页面
    }
    public function eximport()
    {
        $upload = new \Think\Upload();
        $upload->maxSize = 3145728;
        $upload->exts = array('xls', 'csv', 'xlsx');
        $upload->rootPath = './Uploads';
        $upload->savePath = '/excel/';
        $info = $upload->upload();
        if (!$info) {
            $this->error($upload->getError());
        } else {
            $filename = './Uploads/' . $info['excel']['savepath'] . $info['excel']['savename'];
           // print_r($filename);
            import("Org.Yufan.ExcelReader");
            $ExcelReader = new \ExcelReader();
            $arr = $ExcelReader->reader_excel($filename);
            foreach ($arr as $key => $value) {
                 $data['username']=$arr[$key]['1'];
                 $data['password']=$arr[$key]['2'];
                 if($arr[$key]['0']>10000){
                    $this->error('上传条目过多，请重新上传','index');
                }
                 //$data['id']=strtotime($arr[$key]['4']);
                 M('imformation')->add($data);
             }
             $this->success('导入成功','index');
         }
        }
    public function export()
    {
        import("ORG.Yufan.Excel");
        $list = M('imformation')->select();
       // print_r($list);
       $row=array();
        $row[0]=array('序号','用户名','密码');
        $i=1;
        foreach($list as $v){
            $row[$i]['i'] = $i;
            $row[$i]['username'] = $v['username'];
            $row[$i]['password'] = $v['password'];
            $i++;
        }

        $xls = new \Excel_XML('UTF-8', false, 'datalist');
        $xls->addArray($row);
        $xls->generateXML("01");
    }



}
