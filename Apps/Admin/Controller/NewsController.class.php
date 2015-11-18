<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * 新闻逻辑
 * @author start <start_wang@qq.com>
 * @date 2015-11-18
 */

class NewsController extends AdminController {
	
	protected function _initialize(){
		adminCheck( 'news' );
	}
	
	/**
	 * 首页(列表页)
	 *
	 */
	public function index(){
		$news = D('news');
    	$count = $news->count();
		$page = new \Think\Page($count, 10);
		$show = $page->show();
		$field = array('n_id', 'n_title', 'n_addadmin');
		$order = array('n_id'=>'desc');
		$list = $news->getList($field, '', $order, $page->firstRow, $page->listRows);
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
    	$this->assign('n_cid', outSelect($c_cid, 'n_cid', '', true ));
		$this->display();
	}
	
	/**
	 * 修改界面
	 *
	 */
	public function edit(){
		$id = I('id');
    	if ( empty($id) || !is_numeric($id)){
    		$this->error('参数无效');
    	}
    	$news = D('news');
    	$maps = array('n_id'=>$id);
    	$row = $news->getRows($row);
    	if (empty($row)){
    		$this->error('没有此ID数据');
    	}
    	$category = D('category');
    	$c_cid = $category->getKeyValueData();
    	$this->assign('n_cid', outSelect($c_cid, 'n_cid', $row['n_cid'], true));
    	$this->assign('row', $row );
    	$this->display();
	}
	
	/**
	 * 添加数据
	 *
	 */
	public function insert(){
    	$news = D('news');
    	if($news->create()){
    		if(false !== $news->add()){
    			$this->success('数据保存成功！');
    		} else {
    			$this->error('数据保存错误');
    		}
    	} else {
    		$this->error($news->getError());
    	}
    }
    
    /**
     * 更新数据
     *
     */
 	public	function update(){
    	$news = D('news');
    	if($news->create()){
    		if(false !== $news->save()){
    			$this->success('数据保存成功！');
    		} else {
    			$this->error('数据保存错误');
    		}
    	} else {
    		$this->error($news->getError());
    	}
    }
	
}
?>