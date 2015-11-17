<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>分类列表</title>
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/admin.css" media="all">
</head>
<body>
<div class="content">
<table cellpadding="0" cellspacing="1" border="0" width="100%" class="databox">
	<tr class="blue_bg">
		<td><strong>编号</strong></td>
		<td><strong>标题</strong></td>
		<td><strong>添加人</strong></td>
		<td><strong>操作</strong></td>
	</tr>
	<?php if(!empty($list)): if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
			<td width="10%"><?php echo ($vo["n_id"]); ?></td>
			<td width="20%"><?php echo ($vo["n_title"]); ?></td>	
			<td width="20%"><?php echo ($vo["n_addadmin"]); ?></td>	
			<td width="10%">
				<a href="<?php echo U('edit',array('id'=>$vo['n_id']) );?>" target="_blank">修改</a>
				删除
			</td>	
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	<?php else: ?>
		<tr>
			<td colspan="3"> aOh! 暂时还没有内容! </td>
		</tr><?php endif; ?>
	<tr>
		<td colspan="3" style="text-align:center"><?php echo ($page); ?></td>
	</tr>
</table>
</div>
</body>
</html>