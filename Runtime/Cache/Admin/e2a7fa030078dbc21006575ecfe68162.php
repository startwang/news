<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>修改管理员</title>
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/admin.css" media="all">
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
</head>
<body>

<div class="content">
<form action="<?php echo U('update');?>" method="post" onsubmit="return checkFrom( )">
<input type="hidden" name="a_id" id="a_id" value="<?php echo ($row["a_id"]); ?>"  />
<input type="hidden" name="a_permission" id="a_permission" value="<?php echo ($row["a_permission"]); ?>" />
	<table cellpadding="0" cellspacing="1" border="0" width="100%" class="sinbox">
		<tr>
			<th colspan="2">修改管理员</th>
		</tr>
		<tr>
			<td width="150px">用户名：</td>
			<td><input type="text" name="a_loginname" id="a_loginname" value="<?php echo ($row["a_loginname"]); ?>"></td>
		</tr>
		<tr>
			<td width="150px">密码：</td>
			<td><input type="password" name="a_password" id="a_password"></td>
		</tr>
		<tr>
			<td width="150px">姓名：</td>
			<td><input type="text" name="a_name" id="a_name"  value="<?php echo ($row["a_name"]); ?>"></td>
		</tr>
		<tr>
			<td width="150px">权限：</td>
			<td id="permission">
				<input type="checkbox" value="superadmin" name="superadmin" id="superadmin"/>超级管理员 <br/>
		    	<input type="checkbox" value="category" name=category id="category" />新闻分类管理 <br/>
		    	<input type="checkbox" value="news" name="news" id="news" />新闻管理 <br/>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" class="save_but" value="修改" /></td>
		</tr>
	</table>
</form>
</div>
<script type="text/javascript">
	function checkFrom( ){
		if( $('#a_loginname').val() == '' ){
			alert('用户名不能空');
			return false;
		}
		if( $('#a_name').val() == '' ){
			alert('姓名不能空');
			return false;
		}
		var per = new Array();
		var pnum = 0;
		$('#permission input').each(function(i){
			if( $(this).attr('checked') == true ){
				per.push( $(this).val() );
				pnum++;
			}
		})
		if( pnum==0 ){
			alert('请选择一个权限');
			return false;
		} else {
			$('#a_permission').val( per.join(',') );
		}
		return true;
	}

	var permission = $('#a_permission').val().split(',');
	for( var i=0; i<permission.length; i++ ){
		if( permission[i] != '' ){
			$('#'+permission[i]).attr('checked',true);
		}
	}
		
</script>
</body>
</html>