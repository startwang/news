<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends AdminController {
	
	protected function _initialize(){
		adminCheck( 'category' );
	}
	
    public function index(){
    	$category = D( 'Category' );
    	$count = $category->count();
		$page = new \Think\Page($count,10);
		$show=$page->show();
		$list=$category->field(array('c_id','c_name'))->order('c_id desc')->limit($page->firstRow.','.$page->listRows)->select();
    	$this->assign('list',$list);
		$this->assign('page',$show);
		$this->show();
    }
    
    public function add(){
    	$category = D( 'Category' );
    	$c_cid = $category->getKeyValueData();
    	$this->assign( 'c_cid' , outSelect( $c_cid , 'c_cid' , '' , true ) );
    	$this->display();
    }
    
    public function edit(){
    	$id = I( 'id' );
    	if ( empty($id) || !is_numeric($id) ){
    		$this->error( '参数无效' );
    	}
    	$category = D( 'Category' );
    	$c_cid = $category->getKeyValueData();
    	$row = $category->getRowById( $id );
    	if ( empty($row) ){
    		$this->error( '没有此ID数据' );
    	}
    	$this->assign( 'row' , $row );
    	$this->assign( 'c_cid' , outSelect( $c_cid , 'c_cid' , $row['c_id'] , true ) );
    	$this->display();
    }
    
    public function insert(){
    	$category = D( 'Category' );
    	if( $category->create() ){
    		if( $category->add() !== false ){
    			$this->success('数据保存成功！');
    		} else {
    			$this->error('数据保存错误');
    		}
    	} else {
    		$this->error($category->getError());
    	}
    }
    
 	public	function update(){
    	$category = D( 'Category' );
    	if( $category->create() ){
    		if( $category->save() !== false ){
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