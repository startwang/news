<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * 分类逻辑
 * @author start <start_wang@qq.com>
 * @date 2015-11-18
 */

class CategoryController extends AdminController {
	
	protected function _initialize(){
		adminCheck( 'category' );
	}
	
	/**
	 * 首页(列表页)
	 *
	 */
    public function index(){
    	$category = D('category');
    	$count = $category->count();
		$page = new \Think\Page($count, 10);
		$show = $page->show();
		$field = array('c_id', 'c_name');
		$order = array('c_id'=>'desc');
		$list = $category->getList($field, '', $order, $page->firstRow, $page->listRows);
    	$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();
    }
    
    /**
     * 添加界面
     *
     */
    public function add(){
    	$category = D('category');
    	$c_cid = $category->getKeyValueData();
    	$this->assign('c_cid' ,outSelect($c_cid, 'c_cid', '', true ));
    	$this->display();
    }
    
    /**
     * 修改界面
     *
     */
    public function edit(){
    	$id = I('id');
    	if (empty($id) || !is_numeric($id)){
    		$this->error('参数无效');
    	}
    	$category = D( 'category' );
    	$c_cid = $category->getKeyValueData();
    	$row = $category->getRows($id);
    	if (empty($row)){
    		$this->error('没有此ID数据');
    	}
    	$this->assign('row' ,$row );
    	$this->assign('c_cid', outSelect($c_cid, 'c_cid', $row['c_id'], true));
    	$this->display();
    }
    
    /**
     * 添加数据
     *
     */
    public function insert(){
    	$category = D('category');
    	if($category->create()){
    		if(false !== $category->add()){
    			$this->success('数据保存成功！');
    		} else {
    			$this->error('数据保存错误');
    		}
    	} else {
    		$this->error($category->getError());
    	}
    }
    
    /**
     * 更新数据
     *
     */
 	public	function update(){
    	$category = D('category');
    	if($category->create()){
    		if(false !== $category->save()){
    			$this->success('数据保存成功！');
    		} else {
    			$this->error('数据保存错误');
    		}
    	} else {
    		$this->error($category->getError());
    	}
    }
    
}
?>