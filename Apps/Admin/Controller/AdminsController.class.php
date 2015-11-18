<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * 管理员逻辑
 * @author start <start_wang@qq.com>
 * @date 2015-11-18
 */

class AdminsController extends AdminController {
	
	protected function _initialize(){
		adminCheck( 'superadmin' );
	}
	
	/**
	 * 首页(列表页)
	 *
	 */
	public function index(){
		$admins = D('admins');
    	$count = $admins->count();
		$page = new \Think\Page($count, 10);
		$show = $page->show();
		$field = array('a_id', 'a_name');
		$order = array('a_id'=>'desc');
		$list = $admins->getList($field, '', $order, $page->firstRow, $page->listRows);
    	$this->assign('list', $list);
		$this->assign('page', $show);
		$this->display();
	}
	
	/**
	 * 添加界面
	 *
	 */
	public function add(){
		$this->display();
	}
	
	/**
	 * 修改界面
	 *
	 */
 	public function edit(){
    	$id = I('id');
    	if (empty($id) || !is_numeric($id)){
    		$this->error( '参数错误' );
    	}
    	$admins = D('admins');
    	$maps = array('a_id'=>$id);
    	$row = $admins->getRows($maps);
    	if (empty($row)){
    		$this->error( '没有此ID数据' );
    	}
    	$this->assign('row', $row);
    	$this->display();
    }
	
    /**
     * 添加数据
     *
     */
	public function insert(){
		$admins = D('admins');
    	if($admins->create()){
    		if(false !== $admins->add()){
    			$this->success('数据保存成功！');
    		} else {
    			$this->error('数据保存错误');
    		}
    	} else {
    		$this->error($admins->getError());
    	}
	}
	
	/**
	 * 更新数据
	 *
	 */
	public	function update(){
    	$admins = D('admins');
    	$userData = I('post.');
    	if (!empty($userData['a_password'])){
    		$userData['a_password'] = md5($userData['a_password']);
    	} else {
    		unset( $userData['a_password'] );
    	}
    	if($admins->create( $userData )){
    		if(false !== $admins->save()){
    			$this->success('数据保存成功！');
    		} else {
    			$this->error('数据保存错误');
    		}
    	} else {
    		$this->error($admins->getError());
    	}
    }
	
}
?>