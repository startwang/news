<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>menu</title>
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/admin.css" media="all">
</head>
<body class="l_body">
<div class="menu">
    <ul class="menu_item">
    
        <li><a href="javascript:expand(1)">分类管理</a>
        	<ul class="meun_sub" id="submenu1"  style="display:block">
            	<li><a href="<?php echo U('category/add');?>" target="main">添加分类</a></li>
                <li><a href="<?php echo U('category/index');?>" target="main">分类列表</a></li>
            </ul>
        </li>
        
         <li><a href="javascript:expand(2)">管理员管理</a>
        	<ul class="meun_sub" id="submenu2"  style="display:block">
            	<li><a href="<?php echo U('admins/add');?>" target="main">添加管理员</a></li>
                <li><a href="<?php echo U('admins/index');?>" target="main">管理员列表</a></li>
            </ul>
        </li>
        
    </ul>
</div>
<script language="javascript">
	function $$(id){
		return document.getElementById(id);
	}
	function expand(index){
		$$("submenu" + index).style.display = $$("submenu" + index).style.display == 'block' ? 'none' : 'block';
	}
</script>
</body>
</html>