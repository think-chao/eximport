<?php
namespace Home\Model;
use Think\Model;

class AddModel extends Model
{
	protected $patchValidate = true;
	protected $_validate = array(
		array('username','require','用户名不能为空!',0,'regex',3),
		array('username','','用户名已经存在',0,'unique',1), 
		array('username', '6,20', '不得小于 6 位，不得大于 20 位', 0, 'length'),
		);

	protected $_auto = array( 
        array('password', 'md5', 1, 'function'), // 对password字段在新增的时候使md5函数处理
    );
}