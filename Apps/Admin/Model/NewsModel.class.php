<?php

namespace Admin\Model;
use Think\Model;

/**
 * 新闻模型
 * @author start <start_wang@qq.com>
 * @date 2015-11-18
 */

class NewsModel extends Model {
	
	protected $trueTableName = 'newsinfo';

	/**
	 * 自动验证
	 *
	 * @var array
	 */
	protected $_validate = array(
		array('n_cid', 'require', '分类必须！'),
        array('n_title', 'require', '标题必须！'),
        array('n_title', '', '标题已经存在', 0, 'unique', self::MODEL_INSERT),
        array('n_subtitle', 'require', '副标题必须！'),
        array('n_contents', 'require', '内容必须！'),
    );
	
    /**
     * 自动填充设置
     *
     * @var array
     */
    protected $_auto = array(
        array('n_addtime', 'time', self::MODEL_INSERT, 'function'),
        array('n_addadmin', 'getName', self::MODEL_INSERT, 'callback'),
        array('n_edittime', 'time', self::MODEL_UPDATE, 'function'),
        array('n_editadmin', 'getName', self::MODEL_UPDATE, 'callback'),
    );
    
	/**
	 * 获取新闻详细数据数组
	 *
	 * @param array $maps		查询条件
	 * @return array			返回一维数组
	 */
	public function getRows($maps){
		return $this->where($maps)->find();
	}
    
    /**
     * 获取新闻数据数组
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
    
    public function getName(){
    	return getAdminName();
    }
    
}
?>