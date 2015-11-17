<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller {
	
	protected function _initialize(){
		$url = urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']);
		if(!isLogin()){
			$this->error( '非法进入' , U('Index/login') );
		}
	}
	
}

?>