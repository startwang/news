<?php

namespace Admin\Model;
use Think\Model;

/**
 * 类别模型
 * @author start <start_wang@qq.com>
 */

class CategoryModel extends Model {
	
	protected $trueTableName = 'category';
	
	/**
	 * 自动验证
	 *
	 * @var array
	 */
	protected $_validate = array(
        array('c_name', 'require', '名称必须！'),
        array('c_name', '', '名称已经存在', 0, 'unique', self::MODEL_INSERT),
    );
	
    /**
     * 自动填充设置
     *
     * @var array
     */
    protected $_auto = array(
        array('c_addtime', 'time', self::MODEL_INSERT, 'function'),
    );
    
    
	/**
	 * 获取分类详细数据数组
	 *
	 * @param array $maps		查询条件
	 * @return array			返回一维数组
	 */
	public function getRows($maps){
		return $this->where($maps)->find();
	}
    
	/**
     * 获取分类数据数组
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
    public function getKeyValueData(){
    	return $this->where( 'c_cid=0' )->getField( 'c_id,c_name' );
    }
    
	public function getDataByKey($map){
		 return $this->where($map)->select();
	}
}
