<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller  {
    
	public function _before_index(){
		if ( !isLogin() ){
			$this->error( '非法进入' , U( 'index/login' ) );
		}
	}
	
	public function index(){
    	$this->show();
    }
    
    public function menu(){
    	$this->show();
    }
    
    public function right(){
    	$this->show();
    }
    
    public function login(){
    	if ( isLogin() ){
    		redirect( U('index/index') );
    	}
    	$this->display();
    }
    
    public function loginout(){
    	openSession();
    	$_SESSION['admin'] = '';
    	jump( U('index/login') );
    }
    
    public function dologin(){
    	$loginname = I( 'loginname' );
    	$password =I( 'password' );
   		if(empty($loginname) ||  empty($password)){	
			$this->error( '登录失败' );
			return;
		}
		$admins = D( 'admins' );
		$map = array();
		$map['a_loginname'] = $loginname;
		$map['a_password'] = md5( $password );
		$row = $admins->where( $map )->find();
		if ( empty($row) ){
			$this->error( '登录失败' );
		}
		openSession();
		$_SESSION['admin'] = json_encode( $row );
		$this->success( '登录成功' );
    }
    
}