<?php
require_once '../../config.php';
$nowmember=bll_admin::getadminnow();
if ( count($nowmember)<1) {
	header ( 'location:../index.html' );
	die();
}
$webName = '';
$allOldCols = '';
switch ($_SESSION ['dataTable']) {
	case 'tb_onepage' :
		$webName = '修改单页表结构';
		$allOldCols = '-id-title-content-isdelete-';
		break;
	case 'tb_newssort' :
		$webName = '修改新闻类别表结构';
		$allOldCols = '-id-pid-sortname-serialnum-isdelete-';
		break;
	case 'tb_news' :
		$webName = '修改新闻表结构';
		$allOldCols = '-id-sort-serialnum-title-content-addTime-isdelete-';
		break;
	case 'tb_linksort':
		$webName = '修改链接类别表结构';
		$allOldCols = '-id-pid-sortname-serialnum-isdelete-';
		break;
	case 'tb_link' :
		$webName = '修改链接信息表结构';
		$allOldCols = '-id-Sort-serialnum-title-isdelete-';
		break;
	case 'tb_member' :
		$webName = '修改会员表结构';
		$allOldCols = '-id-username-password-nickname-loginNum-loginTime-upLoginTime-isdelete-';
		break;
}
$theid = $_GET ['theid'];
$tempItem=null;
$doc = new DOMDocument ();
	$doc->formatOutput = true;
	if ($doc->load ( "FormData.XML" )) {
		$root = $doc->documentElement;
		$items = $root->getElementsByTagName ( 'item' );
		foreach ( $items as $item ) {
			if ($item->getAttribute ( 'id' ) == $theid) {
				$tempItem=$item;
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/rightfrm.css" />
<title><?php echo $webName; ?></title>
<script type="text/javascript" src="comm.js"></script>
<base target="_self" />
</head>
<body>
<form name="theFrom" method="post" action="system_action.php" onSubmit="return formSet_Handle(this)">
<input type="hidden" name="action" value="formSet_Edit">
<input type="hidden" name="xmlId" value="<?php echo $tempItem->getAttribute('id');?>" />
<table border=0 cellpadding=0 cellspacing=1 class="formtable">
	<tr>
		<th width="30%">字段编码：</th>
		<td width="70%">
			<select name="code" id="theCode">
				<option value="">===选择===</option>
				<?php getCodeList ( $allOldCols );?>
			</select>
			<script type="text/javascript">document.getElementById("theCode").value="<?php echo $tempItem->getAttribute('code');?>";</script>
		</td>
	</tr>
	<tr>
		<th>受影响页面：</th>
		<td>
			<select name="theid" id="thetheid">
				<option value="0">===选择===</option>
				<?php getidlist ();?>
			</select>
			<script type="text/javascript">document.getElementById("thetheid").value="<?php echo $tempItem->getAttribute('theid');?>";</script>
		</td>
	</tr>
	<tr>
		<th>前台名称：</th>
		<td><input type="text" name="showName" value="<?php echo $tempItem->getAttribute('showName');?>" /></td>
	</tr>
	<tr>
		<th>前台展现类型：</th>
		<td>
			<select name="type" id='theType' onChange="isshowXz_Tr(this.options[this.options.selectedIndex].value);">
				<option value="0">===选择===</option>
				<option value="1">文本框</option>
				<option value="2">文本域</option>
				<option value="3">选择框</option>
				<option value="4">复选框</option>
				<option value="5">单选按钮</option>
				<option value="6">图片上传</option>
				<option value="7">文件上传</option>
			</select>
		</td>
	</tr>
	<tr id="xz_Tr" style="display: none;">
		<th>前台展现选项：</th>
		<td><textarea name="showMore" id="showMore" cols="45" rows="6"><?php echo $tempItem->getAttribute('showMore');?></textarea><br>例如：2%%$$张~--~3%%$$李</td>
	</tr>
	<tr>
		<th>&nbsp;</th>
		<td><input type="submit" value=" 保 存 " class="btn" /> &nbsp;&nbsp; <input type="reset" value=" 重 填 " class="btn" /></td>
	</tr>
	<tr>
		<th colspan="2">&nbsp;</th>
	</tr>
</table>
</form>
<script type="text/javascript">
	document.getElementById("theType").value="<?php echo $tempItem->getAttribute('type');?>";
	isshowXz_Tr(<?php echo $tempItem->getAttribute('type');?>);
</script>
</body>
</html>
<?php
//允许设置的字段
function getCodeList($allOldCols) {
	global $conn;
	$sql = 'select * from ' . $_SESSION ['dataTable'] . '';
	$rs=$conn->Execute($sql);
	for($i=0;$i<$rs->FieldCount();$i++){
		$fld = $rs->FetchField($i);
		if (stripos ( $allOldCols, "-{$fld->name}-" ) === false) {
			echo "<option value=\"$fld->name\">$fld->name</option>\r\n";
		}
	}
}
//受影响的区域
function getidlist() {
	global $conn;
	switch ($_SESSION ['dataTable']) {
		case 'tb_onepage' :
			$sql = "select id,title from tb_onepage order by id asc";
			$rs=$conn->Execute($sql);
			$datalist=$rs->getrows ();
			if(count($datalist)>0){
				foreach ($datalist as $row){
					echo "<option value=\"$row[id]\">$row[title]</option>\r\n";
				}
			}
			break;
		case 'tb_newssort' :
			$sql = "select id,sortname from tb_newssort order by id asc";
			$rs=$conn->Execute($sql);
			$datalist=$rs->getrows ();
			if(count($datalist)>0){
				foreach ($datalist as $row){
					echo "<option value=\"$row[id]\">$row[sortname]</option>\r\n";
				}
			}
			break;
		case 'tb_news' :
			$sql = "select id,sortname from tb_newssort order by id asc";
			$rs=$conn->Execute($sql);
			$datalist=$rs->getrows ();
			if(count($datalist)>0){
				foreach ($datalist as $row){
					echo "<option value=\"$row[id]\">$row[sortname]</option>\r\n";
				}
			}
			break;
		case 'tb_linksort' :
			$sql = "select id,sortname from tb_linksort order by id asc";
			$rs=$conn->Execute($sql);
			$datalist=$rs->getrows ();
			if(count($datalist)>0){
				foreach ($datalist as $row){
					echo "<option value=\"$row[id]\">$row[sortname]</option>\r\n";
				}
			}
			break;
		case 'tb_link' :
			$sql = "select id,sortname from tb_linksort order by id asc";
			$rs=$conn->Execute($sql);
			$datalist=$rs->getrows ();
			if(count($datalist)>0){
				foreach ($datalist as $row){
					echo "<option value=\"$row[id]\">$row[sortname]</option>\r\n";
				}
			}
			break;
		case 'tb_member' :
			echo "<option value=\"1\">会员部分</option>\r\n";
			break;
	}
}
?>