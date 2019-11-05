<?php 
require_once '../../config.php';
$nowmember=bll_admin::getadminnow();
if ( count($nowmember)<1) {
	header ( 'location:../index.html' );
	die();
}
$tableName = $_GET ['tableName'];
$webName = '';
$allOldCols = '';
switch ($tableName) {
	case 'onepage' :
		$_SESSION ['dataTable'] = 'tb_onepage';
		$webName = '单页表单列表';
		$allOldCols = '-id-title-content-isdelete-';
		break;
	case 'newssort' :
		$_SESSION ['dataTable'] = 'tb_newssort';
		$webName = '新闻类别表单列表';
		$allOldCols = '-id-pid-sortname-serialnum-isdelete-';
		break;
	case 'news' :
		$_SESSION ['dataTable'] = 'tb_news';
		$webName = '新闻表单列表';
		$allOldCols = '-id-sort-serialnum-title-content-addTime-isdelete-';
		break;
	case 'linksort':
		$_SESSION ['dataTable'] = 'tb_linksort';
		$webName = '链接类别表单列表';
		$allOldCols = '-id-pid-sortname-serialnum-isdelete-';
		break;
	case 'link' :
		$_SESSION ['dataTable'] = 'tb_link';
		$webName = '链接信息表单列表';
		$allOldCols = '-id-Sort-serialnum-title-isdelete-';
		break;
	case 'member' :
		$_SESSION ['dataTable'] = 'tb_member';
		$webName = '会员表单列表';
		$allOldCols = '-id-username-password-nickname-loginNum-loginTime-upLoginTime-isdelete-';
		break;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/rightfrm.css" />
<title><?php echo $webName; ?></title>
<script type="text/javascript" src="comm.js"></script>
</head>
<body>
<table  border="0" cellpadding="0" cellspacing="1" class="headtable">
  <tr>
    <th width="80%"><?php echo $webName; ?></th>
    <th width="20%" class="btnLinks"><a href="javascript:showModal({url:'DataStructure_Add.php',title:'',width:550,height:150});">新 增</a></th>
  </tr>
</table>
<table  border="0" cellpadding="0" cellspacing="1" class="listtable">
  <tr>
    <th width="40%">字段编码</th>
    <th width="40%">字段类型</th>
    <th width="20%">操作</th>
  </tr>
	<?php
	$sql = 'select * from ' . $_SESSION ['dataTable'] . '';
	$rs=$conn->Execute($sql);
	for($i=0;$i<$rs->FieldCount();$i++){
		$fld = $rs->FetchField($i);
   		$type = $rs->MetaType($fld->type);
   		
   		echo "<tr>\r\n";
		echo "<td>" . $fld->name . "</td>\r\n";
		echo "<td>";
		switch ($type) {
			case 'I' :
				echo '数字';
				break;
			case 'C' :
				echo '文本';
				break;
			case 'X' :
				echo '备注';
				break;
			case 'T' :
			case 'D' :
				echo '时间';
				break;
			default :
				break;
		}
		echo "</td>\r\n";
		echo "<td class=\"center\">";
		if (stripos ( $allOldCols, "-{$fld->name}-" ) === false) {
			echo "	<a href='system_Action.php?action=dataStructureDel&theTable=" . $_SESSION ['dataTable'] . "&theCode=" . $fld->name . "' target='hideframe'>\r\n";
			echo "	<img src='del.jpg'>\r\n";
			echo "	</a>\r\n";
		}
		echo "</td>\r\n";
		echo "</tr>\r\n";
	}
	?>
  <tr>
    <td colspan='3'>&nbsp;</td>
  </tr>
</table>
<iframe name="hideframe" width="0" height="0"></iframe>
</body>
</html>