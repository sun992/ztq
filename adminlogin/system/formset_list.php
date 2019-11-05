<?php
require_once '../../config.php';
$nowmember=bll_admin::getadminnow();
if ( count($nowmember)<1) {
	header ( 'location:../' );
	die();
}
$tableName = $_GET ['tableName'];
$webName = '';
$allOldCols = '';
switch ($tableName) {
	case 'onepage' :
		$_SESSION ['dataTable'] = 'tb_onepage';
		$webName = '单页表结构列表';
		$allOldCols = '-id-title-content-isdelete-';
		break;
	case 'newssort' :
		$_SESSION ['dataTable'] = 'tb_newssort';
		$webName = '新闻类别表结构列表';
		$allOldCols = '-id-pid-sortname-serialnum-isdelete-';
		break;
	case 'news' :
		$_SESSION ['dataTable'] = 'tb_news';
		$webName = '新闻表结构列表';
		$allOldCols = '-id-sort-serialnum-title-content-addTime-isdelete-';
		break;
	case 'linksort':
		$_SESSION ['dataTable'] = 'tb_linksort';
		$webName = '链接类别表结构列表';
		$allOldCols = '-id-pid-sortname-serialnum-isdelete-';
		break;
	case 'link' :
		$_SESSION ['dataTable'] = 'tb_link';
		$webName = '链接信息表结构列表';
		$allOldCols = '-id-Sort-serialnum-title-isdelete-';
		break;
	case 'member' :
		$_SESSION ['dataTable'] = 'tb_member';
		$webName = '会员表结构列表';
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
<table border="0" cellpadding="0" cellspacing="1" class="headtable">
  <tr>
    <th width="80%"><?php echo $webName; ?></th>
    <th width="20%" class="btnLinks"><a href="javascript:showModal({url:'FormSet_Add.php',title:'',width:550,height:300});">新 增</a></th>
  </tr>
</table>
<table border="0" cellpadding="0" cellspacing="1" class="listtable">
	<tr>
		<th width="20%">受影响区域</th>
		<th width="8%">字段编码</th>
		<th width="8%">前台名称</th>
		<th width="8%">前台展现类型</th>
		<th width="35%">前台展现选项</th>
		<th width="20%">操作</th>
	</tr>
	<?php
	$xml = simplexml_load_file ( "formdata.xml" );
	foreach ( $xml as $key => $value ) {
		$item = $value->attributes ();
		if('tb_'.$tableName!=$item['theTable'])
		{continue;}
		echo '<tr>' . "\r\n";
		echo '<td class="center">';
		switch ('tb_'.$tableName) {
			case 'tb_onepage' :
				$sql = "select title from tb_onepage where id=" . $item ['theid'];
				$rs=$conn->Execute($sql);
				$row = $rs->FetchRow();
				echo $row [0];
				break;
			case 'tb_newssort' :
				$sql = "select sortname from tb_newssort where id=" . $item ['theid'];
				$rs=$conn->Execute($sql);
				$row = $rs->FetchRow();
				echo $row [0];
				break;
			case 'tb_news' :
				$sql = "select sortname from tb_newssort where id=" . $item ['theid'];
				$rs=$conn->Execute($sql);
				$row = $rs->FetchRow();
				echo $row [0];
				break;
			case 'tb_linksort' :
				$sql = "select sortname from tb_linksort where id=" . $item ['theid'];
				$rs=$conn->Execute($sql);
				$row = $rs->FetchRow();
				echo $row [0];
				break;
			case 'tb_link' :
				$sql = "select sortname from tb_linksort where id=" . $item ['theid'];
				$rs=$conn->Execute($sql);
				$row = $rs->FetchRow();
				echo $row [0];
				break;
			case 'tb_member' :
				echo '会员部分';
				break;
		}
		echo '</td>' . "\r\n";
		echo '<td class="center">' . $item['code'];
		switch ($item['codeType']){
			case "C":
				echo "(文本)";
				break;
			case "X":
				echo "(备注)";
				break;
			case "I":
				echo "(数字)";
				break;
			case "T":
			case "D":
				echo "(时间)";
				break;
		}
		echo '</td>' . "\r\n";
		echo '<td class="center">' . $item ['showName'] . '</td>' . "\r\n";
		echo '<td class="center">';
		switch (floor ( $item ['type'] )) {
			case 1 :
				echo '文本框';
				break;
			case 2 :
				echo '文本域';
				break;
			case 3 :
				echo '选择框';
				break;
			case 4 :
				echo '复选框';
				break;
			case 5 :
				echo '单选按钮';
				break;
			case 6 :
				echo '图片上传';
				break;
			case 7 :
				echo '文件上传';
				break;
			default :
				break;
		}
		echo '</td>' . "\r\n";
		echo '<td>' . $item ['showMore'] . '</td>' . "\r\n";
		echo '<td class="center">';
		
		echo "<span style='cursor:pointer;' onClick=\"showModal({url:'FormSet_Edit.php?theid=".$item['id']."',title:'',width:550,height:300});\">";
		echo "<img src='edit.jpg' />";
		echo "</span>";
		echo "&nbsp;&nbsp;";
		echo "<a href='system_Action.php?action=formSet_Del&theid=".$item['id']."' target='hideframe'><img src='del.jpg' /></a>";
		echo '</td>' . "\r\n";
		echo '</tr>' . "\r\n";
	}
	?>
	<tr>
		<td colspan="6" class='center btnLinks'><a href='system_action.php?action=makeCode&amp;tableName=tb_<?php echo $tableName; ?>' target='hideframe'>立即生成代码</a></td>
	</tr>
</table>
<iframe name="hideframe" width="0" height="0"></iframe>
</body>
</html>