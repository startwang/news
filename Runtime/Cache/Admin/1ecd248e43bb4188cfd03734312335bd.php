<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>添加新闻</title>
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/admin.css" media="all">
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/plugins/xheditor/xheditor.js"></script>
</head>
<body>

<form action="<?php echo U('insert');?>" method="post">
<div class="content">
	<table cellpadding="0" cellspacing="0" border="0" width="100%" class="sinbox">
		<tr>
			<th colspan="2">添加新闻</th>
		</tr>
		<tr>
			<td  class="blue_bg" width="150px">分类<font color="#FF0000">*</font>：</td>
			<td><?php echo ($n_cid); ?></td>
		</tr>
		<tr>
			<td class="blue_bg">标题<font color="#FF0000">*</font>：</td>
			<td><input type="text" class="text_box" id="n_title" name="n_title"  size="50" /><span id="v_title_tip"></span></td>
		</tr>
		<tr>
			<td class="blue_bg">副标题<font color="#FF0000">*</font>：</td>
			<td><input type="text" class="text_box"  id="n_subtitle" name="n_subtitle"  size="50" /><span id="v_subtitle_tip"></span></td>
		</tr>
		<tr>
			<td class="blue_bg" colspan="2">内容<font color="#FF0000">*</font>：</td>
		</tr>
		<tr>
			<td colspan="2">
				<textarea id="n_contents" name="n_contents" style="width:98%;height:400px;" class="text_box" ></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" value="添加" class="save_but"></td>
		</tr>
	</table>
</div>
</form>
<script type="text/javascript">
	$('#n_contents').xheditor({tools:'mini'});	
</script>
</body>
</html>