<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>网站后台管理中心登陆 </title>
<meta http-equiv=content-type content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/admin.css" media="all">
</head>
<body>
<form id="form1" method="post" action="<?php echo U('index/dologin');?>" >

<table height="100%" cellspacing="0" cellpadding="0" width="100%" bgcolor="#002779" border="0">
	<tr>
		<td align="middle">
		<table cellspacing="0" cellpadding="0" width="468" border="0">
			<tr>
				<td><img height="23" src="http://img.7m.cn/555back/login_1.jpg" width="468"></td>
			</tr>
			<tr>
				<td><img height="147" src="http://img.7m.cn/555back/login_2.jpg" width="468"></td>
			</tr>
		</table>
		<table cellspacing="0" cellpadding="0" width="468" bgcolor="#ffffff" border="0">
			<tr>
				<td width="16"><img height="122" src="http://img.7m.cn/555back/login_3.jpg" width="16"></td>
				<td align="middle">
				<table cellspacing="0" cellpadding="0" width="230" border="0">
					<tr height="5">
						<td width="5"></td>
						<td width="56"></td>
						<td></td>
					</tr>
					<tr height="36">
						<td></td>
						<td>用户名</td>
						<td><input style="border: #000000 1px solid;" maxlength="30" size="24" name="loginname"></td>
					</tr>
					<tr height="36">
						<td>&nbsp;</td>
						<td>口 令</td>
						<td><input style="border: #000000 1px solid;" type="password" maxlength="30" size="24" name="password"></td>
					</tr>
					<tr height="5">
						<td colspan="3"></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><input type=image height="18" width="70" src="http://img.7m.cn/555back/bt_login.gif"></td>
					</tr>
				</table>
				</td>
				<td width="16"><img height="122" src="http://img.7m.cn/555back/login_4.jpg" width="16"></td>
			</tr>
		</table>
		<table cellspacing="0" cellpadding="0" width="468" border="0">
			<tr>
				<td><img height="16" src="http://img.7m.cn/555back/login_5.jpg" width="468"></td>
			</tr>
		</table>
		<table cellspacing="0" cellpadding="0" width="468" border="0">
			<tr>
				<td align="right"><a href="#" target="_blank"><img height="26" src="http://img.7m.cn/555back/login_6.gif" width="165" border="0"></a></td>
			</tr>
		</table>
		</td>
	</tr>
</table>
</form>
<iframe id="frame" name="frame"></iframe>
</body>
</html>