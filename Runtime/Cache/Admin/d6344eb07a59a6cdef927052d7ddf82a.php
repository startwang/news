<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>添加新闻分类</title>
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/admin.css" media="all">
</head>
<body>

<form action="<?php echo U('insert');?>" method="post">
<div class="content">
	<table cellpadding="0" cellspacing="0" border="0" width="100%" class="sinbox">
		<tr>
			<th colspan="2">添加新闻分类</th>
		</tr>
		<!-- 
		<tr>
			<td>父类</td>
			<td><?php echo ($c_cid); ?></td>			
		</tr>
		 -->
		<tr>
			<td class="blue_bg" width="100px">分类名称</td>
			<td><input type="text" class="text_box" value="" name="c_name" id="c_name"></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" value="添加" class="save_but"></td>
		</tr>
	</table>
</div>
</form>

</body>
</html>