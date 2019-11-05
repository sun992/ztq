<?php 
require_once '../../config.php';
$nowmember=bll_admin::getadminnow();
if ( count($nowmember)<1) {
	header ( 'location:../index.html' );
	die();
}
$theobj=bll_newssort::getone(intval($_GET['theid']));
$tag=$_GET['tag'];
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
    <th width="80%"><?php echo $theobj['sortname']; ?></th>
    <th width="20%">
      <a href="news_add.php?tag=<?php echo $tag; ?>&theid=<?php echo $theobj['id']; ?>"><span class="btn2">新增信息</span></a>
      <?php 
      switch ($tag){
		  case "product":
			  echo "<a href='newssort_".$tag."info.php'><span class=\"btn3\">返回分类</span></a>";
		  break;
		  case "case":
			  echo "<a href='newssort_".$tag."info.php'><span class=\"btn3\">返回分类</span></a>";
		  break;
		  case "news":
			  echo "<a href='newssort_".$tag."info.php'><span class=\"btn3\">返回分类</span></a>";
		  break;
		  default:
			  echo "";
		  break;
      }
	 ?>
    </th>
  </tr>
</table>
<table  border="0" cellpadding="0" cellspacing="1" class="listtable">
  <tr>
    <th width="5%">&nbsp;</th>
    <th width="52%">标题</th>
    <th width="10%">上移</th>
    <th width="10%">下移</th>
    <th width="20%">操作</th>
  </tr>
  <?php
	$pd = new com_pagingdevice ( bll_news::getlist ( $theobj ['id'] ) );
	$pd->_setsuffixal ( "theid=$theobj[id]" );
	$pd->_init ();
	$datalist = bll_news::getprenext ( $pd->_getdatalist () );
	for($i = 0; $i < count ( $datalist ); $i ++) {
		$j=$i+1;
		if( $_REQUEST['page']>1 ){
			$j=$i+1+($_REQUEST['page']-1)*20;
		}else{
			$j=$i+1;
		}
		$row = $datalist [$i];
		echo "<tr>\r\n";
		echo "<td class=\"center\">$j<input type=\"checkbox\" name=\"theid\" value=\"$row[id]\"></td>\r\n";
		echo "<td>$row[title]";
		if (array_key_exists ( 'picture', $row ) && ! empty ( $row ['picture'] )) {
			echo "&nbsp;&nbsp;<img src='../../$row[picture]' height='16' align='middle' />";
		}
		if (array_key_exists ( 'isgood', $row ) && $row ['isgood']==1) {
			echo "&nbsp;&nbsp;<font style=\"color:#ff0000;\">[首页显示]</font>";
		}
		if (array_key_exists ( 'isgood', $row ) && $row ['isgood']==2) {
			echo "&nbsp;&nbsp;<font style=\"color:#ff0000;\">[首页显示2]</font>";
		}
		echo "</td>\r\n";
		echo "<td class='center'>" . com_oftenfunction::getmove ( $row ['prestr'], '↑', 'newsmove' ) . "</td>\r\n";
		echo "<td class='center'>" . com_oftenfunction::getmove ( $row ['nextstr'], '↓', 'newsmove' ) . "</td>\r\n";		
		switch ($tag){
			case "product":
				echo "<td class=\"center\"><a href=\"news_edit.php?tag=". $tag . "&theid=$row[id]\">【修改】</a></td>\r\n";
			break;
			case "case":
				echo "<td class=\"center\"><a href=\"news_edit.php?tag=". $tag . "&theid=$row[id]\">【修改】</a></td>\r\n";
			break;
			case "news":
				echo "<td class=\"center\"><a href=\"news_edit.php?tag=". $tag . "&theid=$row[id]\">【修改】</a></td>\r\n";
			break;
			default:
			echo "<td class=\"center\"><a href=\"news_edit.php?theid=$row[id]\">【修改】</a></td>\r\n";
			break;
		}
		echo "</tr>\r\n";
	}
  ?>
  <tr>
  	<td colspan='5' class="pageinfo">
  	<?php echo com_oftenfunction::adminloginpageinfo($pd->_getpageinfo());?>
  	</td>
  </tr>
</table>
<table  border=0 cellpadding=0 cellspacing=1  class="cmdtable">
  <tr>
    <th>
	<span onClick="selectall('theid');">【全选】</span>&nbsp;&nbsp;&nbsp;&nbsp;
	<span onClick="unselectall('theid');">【全不选】</span>&nbsp;&nbsp;&nbsp;&nbsp;
	<span onClick="antiselectall('theid');">【反选】</span>&nbsp;&nbsp;&nbsp;&nbsp;
	<span onClick="handleselect('theid','theaction.php?action=deletenews','hideframe');">【删除】</span>&nbsp;&nbsp;&nbsp;&nbsp;
    <span onClick="copynews( 'theid' , '<?php echo $tag; ?>' );">【复制信息】</span>
	</th>
  </tr>
</table>
<iframe name="hideframe" width="0" height="0"></iframe>
<script type="text/javascript">$(function(){settablecolor();});</script>
</body>
</html>