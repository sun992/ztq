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
    <th>留言列表</th>
  </tr>
</table>
<table  border="0" cellpadding="0" cellspacing="1" class="listtable">
  <tr>
    <th width="3%">&nbsp;</th>
    <th width="47%">内容</th>
    <th width="10%">昵称</th>
	<th width="10%">电话</th>
    <th width="20%">邮箱</th>
    <th width="10%">操作</th>
  </tr>
  <?php
  	$pd = new com_pagingdevice ( bll_guestbook::getlist(true) );
	$pd->_init ();
	$datalist = $pd->_getdatalist ();
	for($i = 0; $i < count ( $datalist ); $i ++) {
		$row = $datalist [$i];
		echo "<tr>\r\n";
		echo "<td><input type=\"checkbox\" name=\"theid\" value=\"$row[id]\"></td>\r\n";
		echo "<td>$row[content]";
		if (!empty($row["repaly"])){
			echo "&nbsp;&nbsp;&nbsp;<span style='color:#ff0000;'>已回复</span>";
		}
		echo "</td>\r\n";
		echo "<td class=\"center\">$row[nickname]</td>\r\n";
		echo "<td class=\"center\">$row[tel]</td>\r\n";
		echo "<td class=\"center\">$row[email]</td>\r\n";
		echo "<td>";
		echo "<a href=\"guestbook_repaly.php?theid=$row[id]\">回复</a>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
		if(intval($row['issh'])===1){
			echo "<a href=\"theaction.php?action=guestbooksh&issh=0&theid=$row[id]\" style=\"color:#ff0000;\" target=\"hideframe\">已审核</a>";
		}else{
			echo "<a href=\"theaction.php?action=guestbooksh&issh=1&theid=$row[id]\" target=\"hideframe\">审核</a>";
		}
		echo "</td>\r\n";
		echo "</tr>\r\n";
	}
  ?>
  <tr>
  	<td colspan='6' class="pageinfo">
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