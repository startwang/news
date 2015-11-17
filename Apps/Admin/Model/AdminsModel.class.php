<?php

namespace Admin\Model;
use Think\Model;

/**
 * 管理员模型
 * @author start <start_wang@qq.com>
 */

class AdminsModel extends Model {
	
	protected $trueTableName = 'admininfo';
	
	/**
	 * 自动验证
	 *
	 * @var array
	 */
	protected $_validate = array(
        array('a_loginname', 'require', '用户名必须！'),
        array('a_loginname', '', '用户名已经存在', 0, 'unique', self::MODEL_INSERT),
        array('a_password', 'require', '密码必须！' , 1 , 'function' ,self::MODEL_INSERT),
      	array('a_name', 'require', '名称必须！'),
      	array('a_permission', 'require', '权限必须！'),
    );
    
     /**
     * 自动填充设置
     *
     * @var array
     */
    protected $_auto = array(
        array('a_addtime', 'time', self::MODEL_INSERT, 'function'),
        array('a_password','md5',self::MODEL_INSERT,'function') ,
    );
    
	
    
}
?>