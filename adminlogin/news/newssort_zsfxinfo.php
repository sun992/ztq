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
    <th width="80%">专题信息</th>
  </tr>
</table>
<table  border="0" cellpadding="0" cellspacing="1" class="listtable">
  <tr>
    <th width="40%">类别名</th>
    <th width="50%">记录数</th>
    <th width="10%">操作</th>
  </tr>
  <tr>
    <td colspan="3" style="color: #ff0000;">专题信息</td>
  </tr>
  <?php getlist(11); ?>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
<iframe name="hideframe" width="0" height="0"></iframe>
<script type="text/javascript">$(function(){settablecolor();});</script>
</body>
</html>
<?php
//获取类别列表
function getlist($pid, $indexz = 0, $alllist = array(), $isfrist = true) {
	if ($isfrist) {
		$alllist = bll_newssort::getlist ( $pid );
	}
	if (count ( $alllist ) == 0) {
		return;
	}
	$thislist = array_filter ( $alllist, create_function ( '$one', "return \$one['pid']==$pid;" ) );
	$nextlist = array_filter ( $alllist, create_function ( '$one', "return \$one['pid']!=$pid;" ) );
	usort ( $thislist, create_function ( '$a,$b', "if (\$a['serialnum'] == \$b['serialnum']) {return 0;} return (\$a['serialnum'] < \$b['serialnum']) ? -1 : 1;" ) );
	$h = 1;
	foreach ( $thislist as $row ) {
		$templist = array_filter ( $nextlist, create_function ( '$one', "return \$one['pid']==$row[id];" ) );
		$kongGe = "&nbsp;&nbsp;&nbsp;&nbsp;";
		for($i = 0; $i < $indexz; $i ++) {
			$kongGe .= "&nbsp;&nbsp;<img src='../images/x1.gif' align='absmiddle' />";
		}
		if ($indexz >= 0) {
			if ($h == count ( $thislist )) {
				$kongGe .= "&nbsp;&nbsp;<img src='../images/x3.gif' align='absmiddle' />";
			} else {
				$kongGe .= "&nbsp;&nbsp;<img src='../images/x2.gif' align='absmiddle' />";
			}
		}
		echo "<tr>\r\n";
		if (count ( $templist ) > 0) {
			echo "<td colspan='3'>$kongGe $row[sortname]</td>\r\n";
		} else {
			echo "<td>$kongGe $row[sortname]</td>\r\n";
			echo "<td>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "<a href=\"news_add.php?tag=case&theid=$row[id]\">【新增】</a>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "记录数：<span style='color:#ff0000;'>" . bll_news::getCount ( $row ['id'] ) . "</span> 条";
			echo "</td>\r\n";
			echo "<td class='center'><a href=\"news_list.php?tag=case&theid=$row[id]\">【查看】</a></td>\r\n";
		}
		echo "</tr>\r\n";
		if (count ( $templist ) > 0) {
			getlist ( $row ['id'], $indexz + 1, $nextlist, false );
		}
		++ $h;
	}
}
?>