<?php 
require_once '../../config.php';
$nowmember=bll_admin::getadminnow();
if ( count($nowmember)<1) {
	header ( 'location:../index.html' );
	die();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/rightfrm.css" />
<title>后台管理系统</title>
<script type="text/javascript" src="../jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="../comm.js"></script>
<script type="text/javascript" src="thisjs.js"></script>
<script>
  window.onload=function(){
	  document.forms[0].user.focus();   
  }
</script>
</head>
<body>
<table  border="0" cellpadding="0" cellspacing="1" class="headtable">
  <tr>
    <th width="80%">新增管理员</th>
    <th width="20%"><a href="admin_list.php"><span class="btn2">返回列表</span></a></th>
  </tr>
</table>
<form name="theform" method="post" action="theaction.php" onsubmit="return ckAdd(this);">
<input type="hidden" name="action" value="add" />
<table border="0" cellpadding="0" cellspacing="1" class="formtable">
  <tr>
    <th width="20%">用户名：</th>
    <td width="80%"><input type="text" name="user" value="" size="40" /></td>
  </tr>
  <tr>
    <th>密码：</th>
    <td><input type="password" name="pass1" value="" size="40" /></td>
  </tr>
  <tr>
    <th>确认密码：</th>
    <td><input type="password" name="pass2" value="" size="40" /></td>
  </tr>
  <tr>
    <th>昵称：</th>
    <td><input type="text" name="nickname" value="" size="40" /></td>
  </tr>
  <tr>
    <th>&nbsp;</th>
    <td><input type="submit" value=" 立 即 提 交 " class="btn" /></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</form>
<script type="text/javascript">$(function(){settablecolor("no");});</script>
</body>
</html>