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
    <th width="80%">案例分类</th>
  </tr>
</table>
<table  border="0" cellpadding="0" cellspacing="1" class="listtable">
  <tr>
    <th width="50%">类别名</th>
    <th width="10%">上移</th>
    <th width="10%">下移</th>
    <th width="30%">操作</th>
  </tr>
  <tr>
    <td colspan="3" style="color: #ff0000;">案例分类</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="newssort_add.php?tag=case&theid=5">【新增分类】</a></td>
  </tr>
  <?php getlist(2); ?>
  <tr>
    <td colspan="4">&nbsp;</td>
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
	$thislist = array_filter ( $alllist, create_function ( '$one', "return \$one['pid']==$pid && strpos('|0|',\"|\$one[id]|\")===false;" ) );
	$nextlist = array_filter ( $alllist, create_function ( '$one', "return \$one['pid']!=$pid;" ) );
	usort ( $thislist, create_function ( '$a,$b', "if (\$a['serialnum'] == \$b['serialnum']) {return 0;} return (\$a['serialnum'] < \$b['serialnum']) ? -1 : 1;" ) );
	$h = 1;
	foreach ( $thislist as $row ) {
		$presort = bll_newssort::getpre ( $row ['serialnum'], $thislist );
		$nextsort = bll_newssort::getnext ( $row ['serialnum'], $thislist );
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
		echo "<td>$kongGe $row[sortname]</td>\r\n";
		echo "<td class='center'>";
		if (count ( $presort ) > 0) {
			echo com_oftenfunction::getmove ( "$row[id]-$presort[id]-$row[serialnum]-$presort[serialnum]", '↑' , 'sortmove' );
		}
		echo "</td>\r\n";
		echo "<td class='center'>";
		if (count ( $nextsort ) > 0) {
			echo com_oftenfunction::getmove ( "$row[id]-$nextsort[id]-$row[serialnum]-$nextsort[serialnum]", '↓' , 'sortmove' );
		}
		echo "</td>\r\n";
		echo "</td>\r\n";
		echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		
		if ($row['id']==2 ) {
			echo "<a href=\"newssort_add.php?tag=case&theid=$row[id]\">【新增】</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		} 
		else {
			echo "　　　　&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					
		}
		echo "<a href=\"newssort_edit.php?tag=case&theid=$row[id]\">【修改】</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		if (count ( $templist ) === 0 && bll_news::getcount ( $row ['id'] ) == 0) {
			echo "<a href=\"theaction.php?tag=case&action=delsort&theid=$row[id]\" target='hideframe'>【删除】</a>";
		}	
		echo "</td>\r\n";
		echo "</tr>\r\n";
		if (count ( $templist ) > 0) {
			getlist ( $row ['id'], $indexz + 1, $nextlist, false );
		}
		++ $h;
	}
}
?>