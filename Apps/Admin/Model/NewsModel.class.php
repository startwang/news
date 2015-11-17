<?php

namespace Admin\Model;
use Think\Model;

/**
 * 新闻模型
 * @author start <start_wang@qq.com>
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
    
    public function getName(){
    	return getAdminName();
    }
    
}
?>