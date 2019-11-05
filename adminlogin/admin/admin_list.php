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
</head>
<body>
<table  border="0" cellpadding="0" cellspacing="1" class="headtable">
  <tr>
    <th width="80%">管理员列表</th>
    <th width="20%"><a href="admin_add.php"><span class="btn2" style="width:80px">添加管理员</span></a></th>
  </tr>
</table>
<table  border="0" cellpadding="0" cellspacing="1" class="listtable">
  <tr>
    <th width="3%">&nbsp;</th>
    <th width="27%">用户名</th>
    <th width="20%">前台名称</th>
	<th width="20%">最后登录时间</th>
    <th width="10%">登录次数</th>
    <th width="20%">操作</th>
  </tr>
  <?php
	$Pd = new com_pagingdevice ( bll_admin::getlist () );
	$Pd->_init ();
	$datalist = $Pd->_getdatalist ();
	for($i = 0; $i < count ( $datalist ); $i ++) {
		$row = $datalist [$i];
		echo "<tr>\r\n";
		echo "<td class=\"center\">";
		if (intval ( $row ['id'] ) !== intval ( bll_admin::getadminnow () )) {
			echo "<input type=\"checkbox\" name=\"theid\" value=\"$row[id]\">";
		} else {
			echo "&nbsp;";
		}
		echo "</td>\r\n";
		echo "<td>$row[username]</td>\r\n";
		echo "<td class=\"center\">$row[nickname]</td>\r\n";
		echo "<td class=\"center\">$row[logintime]</td>\r\n";
		echo "<td class=\"center\">$row[loginnum]</td>\r\n";
		echo "<td class=\"center\"><a href=\"admin_edit.php?theid=$row[id]\">【修改】</a></td>\r\n";
		echo "</tr>\r\n";
	}
  ?>
  <tr>
  	<td colspan='6' class="pageInfo">
  	<?php echo com_oftenfunction::adminloginPageInfo($Pd->_getPageInfo());?>
  	</td>
  </tr>
</table>
<table  border=0 cellpadding=0 cellspacing=1  class="cmdtable">
  <tr>
    <th>
	<span onClick="selectAll('theid');">全选</span>&nbsp;&nbsp;&nbsp;&nbsp;
	<span onClick="unSelectAll('theid');">全不选</span>&nbsp;&nbsp;&nbsp;&nbsp;
	<span onClick="antiSelectAll('theid');">反选</span>&nbsp;&nbsp;&nbsp;&nbsp;
	<span onClick="handleSelect('theid','theaction.php?action=delete','hideframe');">删除</span>
	</th>
  </tr>
</table>
<iframe name="hideframe" width="0" height="0"></iframe>
<script type="text/javascript">$(function(){settablecolor();});</script>
</body>
</html>