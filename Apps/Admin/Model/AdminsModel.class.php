<?php

namespace Admin\Model;
use Think\Model;

/**
 * @name 管理员数据模型
 * @author start <start_wang@qq.com>
 * @date 2015-11-18
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
    
	/**
	 * 获取管理员详细数据数组
	 *
	 * @param array $maps		查询条件
	 * @return array			返回一维数组
	 */
	public function getRows($maps){
		return $this->where($maps)->find();
	}
    
    /**
     * 获取管理员数据数组
     *
     * @param array $field		查询字段
     * @param array $maps		查询条件
     * @param array $order		查询排序
     * @param int $firstRow		开始下标
     * @param int $listRows		数据行数
     * @return array			返回二维数组
     */
	public function getList($field, $maps, $order, $firstRow, $listRows){
		$list = $this->field($field)
			->where($maps)
			->order($order)
			->limit($firstRow.','.$listRows)
			->select();
		return $list;
	}
	
}
?>