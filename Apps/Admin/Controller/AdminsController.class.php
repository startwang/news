<?php
namespace Admin\Controller;
use Think\Controller;
class AdminsController extends AdminController {
	
	protected function _initialize(){
		adminCheck( 'superadmin' );
	}
	
	public function index(){
		$admins = D( 'admins' );
    	$count = $admins->count();
		$page = new \Think\Page($count,10);
		$show=$page->show();
		$list=$admins->field(array('a_id','a_name'))->order('a_id desc')->limit($page->firstRow.','.$page->listRows)->select();
    	$this->assign('list',$list);
		$this->assign('page',$show);
		$this->show();
	}
	
	public function add(){
		$this->display();
	}
	
 	public function edit(){
    	$id = I( 'id' );
    	if ( empty($id) || !is_numeric($id) ){
    		$this->error( '参数错误' );
    	}
    	$admins = D( 'Admins' );
    	$row = $admins->where( 'a_id='.$id )->find();
    	if ( empty($row) ){
    		$this->error( '没有此ID数据' );
    	}
    	$this->assign( 'row' , $row );
    	$this->show();
    }
	
	public function insert(){
		$admins = D( 'Admins' );
    	if( $admins->create() ){
    		if( $admins->add() !== false ){
    			$this->success('数据保存成功！');
    		} else {
    			$this->error('数据保存错误');
    		}
    	} else {
    		$this->error($admins->getError());
    	}
	}
	
	public	function update(){
    	$admins = D( 'Admins' );
    	$userData = I( 'post.' );
    	if ( !empty($userData['a_password']) ){
    		$userData['a_password'] = md5($userData['a_password']);
    	} else {
    		unset( $userData['a_password'] );
    	}
    	if( $admins->create( $userData ) ){
    		if( $admins->save() !== false ){
    			$this->success('数据保存成功！');
    			//echo $admins->getLastSql();
    		} else {
    			$this->error('数据保存错误');
    		}
    	} else {
    		$this->error($admins->getError());
    	}
    }
	
}
?>