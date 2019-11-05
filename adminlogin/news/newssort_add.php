<?php 
require_once '../../config.php';
$nowmember=bll_admin::getadminnow();
if ( count($nowmember)<1) {
	header ( 'location:../index.html' );
	die();
}
$theid = $findid = intval ( $_GET ['theid'] );
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
	  document.forms[0].sortname.focus();   
  }
</script>
</head>
<body>
<table  border="0" cellpadding="0" cellspacing="1" class="headtable">
  <tr>
    <th width="80%">新增类别</th>
    <th width="20%">
    	<?php 
		    $tag=$_REQUEST['tag'];
			switch ($tag){
				case "product":
					echo " <a href='newssort_productlist.php'><span class=\"btn2\">返回列表</span></a>";
					break;
				case "case":
					echo " <a href='newssort_newslist.php'><span class=\"btn2\">返回列表</span></a>";
					break;
				case "news":
					echo " <a href='newssort_newslist.php'><span class=\"btn2\">返回列表</span></a>";
					break;
				default:
					echo " <a href='newssort_list.php'><span class=\"btn2\">返回列表</span></a>";	
					break;
			}
		?>
     </th>
  </tr>
</table>
<form name="theform" method="post" action="theaction.php" onsubmit="return ckTheSortForm(this);">
  <input type="hidden" name="action" value="addsort" />
  <input type="hidden" name="theid" value="<?php echo $theid; ?>" />
  <input type="hidden" name="tag" value="<?php echo $tag; ?>" />
  <table border="0" cellpadding="0" cellspacing="1" class="formtable">
    <tr>
      <th width="10%">标题：</th>
      <td width="90%"><input type="text" name="sortname" value="" size="40" /></td>
    </tr>

    <tr>
      <th>&nbsp;</th>
      <td><input type="submit" value=" 提 交 " class='btn' />
        &nbsp;&nbsp;
        <input type="reset" value=" 重 填 " class='btn' />
      </td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
  </table>
  <input type="hidden" name="oldname" value="" />
  <input type="hidden" name="savename" value="" />
  <input type="hidden" name="savepath" value="" />
</form>
<script type="text/javascript">$(function(){settablecolor('no');});</script>
</body>
</html>