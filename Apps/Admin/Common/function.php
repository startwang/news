<?php
/**
 * 返回select
 *
 * @param array $arr
 * @param string $name
 * @param string $value
 * @return string
 */
function outSelect($arr, $name, $value = null,$all=false , $event = '') {
	$strs = array ('<select id="' . $name . '" name="' . $name . '" '.$event.' >' );
	if($all){
		$strs[] = '<option value="0">请选择</option>';
	}
	foreach ( $arr as $k => $v ) {
		$flag = $k == $value ? ' selected="selected"' : '';
		$strs [] = '<option value="' . $k . '" ' . $flag . '>' . $v . '</option>';
	}
	$strs [] = '</select>';
	return join ( "\r\n", $strs );
}

function jump( $url ){
	echo '<script type="text/javascript">parent.window.location.href = "'.$url.'"</script>';
}

	/**
	 * 管理员权限验证
	 *
	 */
	function adminCheck($permission=''){
		openSession();
		if(empty($_SESSION['admin'])){
			jump( U('index/login') );
		}
		$adm = json_decode($_SESSION['admin']);
		if(empty($adm)){
			echo 'no adm';
			exit;
		}	
		
		if(!empty($permission)){
			$adm = json_decode($_SESSION['admin']);
			$p = ','.$adm->a_permission.',';
			if(!is_numeric(strpos($p,',superadmin,'))){
				$permission=','.$permission.',';
				if(!is_numeric(strpos($p,$permission))){
					echo '您没权限访问此页面';
					exit;
				}
			}
		}
	}
	
	/**
	 * 获取管理员姓名
	 *
	 * @return string   管理员姓名
	 */
	function getAdminName(){
		openSession();
		if(empty($_SESSION['admin'])){
			return '';
		}
		$adm = json_decode($_SESSION['admin']);
		if(empty($adm)){
			return '';
		}
	
		return $adm->a_name;
		
	}
	
	
	/**
	 * 获取管理员
	 *
	 * @return AdminInfo   管理员
	 */
	function getAdmin(){
		openSession();
		if(empty($_SESSION['admin'])){
			return '';
		}
		$adm = json_decode($_SESSION['admin']);
		if(empty($adm)){
			return '';
		}	
		return $adm->a_loginname;
	}
	
	
	
	
	/**
	 * 判断是否登录
	 *
	 * @return boolean 
	 */
	function isLogin(){
		openSession();
		return empty($_SESSION['admin'])?false:true;
	}
	
	
	/**
	 * 启动Session
	 *
	 */
	function openSession(){
		if(!defined('SESSION_FLAG')) { 
			session_start();
			define('SESSION_FLAG',1);
		} 
	}
	
?>