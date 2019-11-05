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
    <th width="80%">单页列表</th>
    <th width="20%"><a href="onepage_add.php"><span class="btn2">新增信息</span></a></th>
  </tr>
</table>
<table  border="0" cellpadding="0" cellspacing="1" class="listtable">
  <tr>
    <th width="3%">&nbsp;</th>
    <th width="77%">标题</th>
    <th width="20%">操作</th>
  </tr>
  <?php
	$pd = new com_pagingdevice ( bll_onepage::getlist () );
	$pd->_init ();
	$datalist = $pd->_getdatalist ();
	for($i = 0; $i < count ( $datalist ); $i ++) {
		$row = $datalist [$i];
		echo "<tr>\r\n";
		echo "<td class=\"center\"><input type=\"checkbox\" name=\"theid\" value=\"$row[id]\"></td>\r\n";
		echo "<td>$row[title]</td>\r\n";
		echo "<td class=\"center\"><a href=\"onepage_edit.php?theid=$row[id]\">【修改】</a></td>\r\n";
		echo "</tr>\r\n";
	}
  ?>
  <tr>
  	<td colspan='3' class="pageinfo">
  	<?php echo com_oftenfunction::adminloginpageinfo($pd->_getpageinfo());?>
  	</td>
  </tr>
</table>
<table  border=0 cellpadding=0 cellspacing=1  class="cmdtable">
  <tr>
    <th>
	<span onClick="selectall('theid');">全选</span>&nbsp;&nbsp;&nbsp;&nbsp;
	<span onClick="unselectall('theid');">全不选</span>&nbsp;&nbsp;&nbsp;&nbsp;
	<span onClick="antiselectall('theid');">反选</span>&nbsp;&nbsp;&nbsp;&nbsp;
	<span onClick="handleselect('theid','theaction.php?action=delete','hideframe');">删除</span>
	</th>
  </tr>
</table>
<iframe name="hideframe" width="0" height="0"></iframe>
<script type="text/javascript">$(function(){settablecolor();});</script>
</body>
</html>