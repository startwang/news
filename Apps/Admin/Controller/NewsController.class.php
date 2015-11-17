<?php
namespace Admin\Controller;
use Think\Controller;

class NewsController extends AdminController {
	
	protected function _initialize(){
		adminCheck( 'news' );
	}
	
	public function index(){
		$news = D( 'news' );
    	$count = $news->count();
		$page = new \Think\Page($count,10);
		$show=$page->show();
		$list=$news->field(array('n_id','n_title','n_addadmin'))->order('n_id desc')->limit($page->firstRow.','.$page->listRows)->select();
    	$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();
	}
	
	public function add(){
		$category = D( 'category' );
		$c_cid = $category->getKeyValueData();
    	$this->assign( 'n_cid' , outSelect( $c_cid , 'n_cid' , '' , true ) );
		$this->display();
	}
	
	public function edit(){
		$id = I( 'id' );
    	if ( empty($id) || !is_numeric($id) ){
    		$this->error( '参数无效' );
    	}
    	$news = D( 'news' );
    	$row = $news->where( 'n_id='.$id )->find();
    	if ( empty($row) ){
    		$this->error( '没有此ID数据' );
    	}
    	$category = D( 'category' );
    	$c_cid = $category->getKeyValueData();
    	$this->assign( 'n_cid' , outSelect( $c_cid , 'n_cid' , $row['n_cid'] , true ) );
    	$this->assign( 'row' , $row );
    	$this->display();
	}
	
	public function insert(){
    	$news = D( 'news' );
    	if( $news->create() ){
    		if( $news->add() !== false ){
    			$this->success('数据保存成功！');
    		} else {
    			$this->error('数据保存错误');
    		}
    	} else {
    		$this->error($news->getError());
    	}
    }
    
 	public	function update(){
    	$news = D( 'news' );
    	if( $news->create() ){
    		if( $news->save() !== false ){
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