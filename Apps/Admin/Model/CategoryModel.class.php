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
    
    public function getRowById( $id ){
    	return $this->where( 'c_id='.$id )->find();
    }
    
    public function getKeyValueData(){
    	return $this->where( 'c_cid=0' )->getField( 'c_id,c_name' );
    }
    
	public function getDataByKey($map){
		 return $this->where($map)->select();
	}
}
