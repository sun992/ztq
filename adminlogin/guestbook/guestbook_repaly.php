<?php 
require_once '../../config.php';
$nowmember=bll_admin::getadminnow();
if ( count($nowmember)<1) {
	header ( 'location:../index.html' );
	die();
}
$theobj = bll_guestbook::getone ( intval ( $_GET ['theid'] ) );
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
    <th width="80%">留言回复</th>
    <th width="20%"><a href="guestbook_list.php">返回</a></th>
  </tr>
</table>
<form name="theform" method="post" action="theaction.php">
  <input type="hidden" name="action" value="repaly" />
  <input type="hidden" name="theid" value="<?php echo $theobj['id']; ?>" />
  <table border="0" cellpadding="0" cellspacing="1" class="formtable">
    <tr>
      <th width="10%">主题：</th>
      <td width="90%"><?php echo $theobj['subject']; ?></td>
    </tr>
    <tr>
      <th>昵称：</th>
      <td><?php echo $theobj['nickname']; ?></td>
    </tr>
    <tr>
      <th>电话：</th>
      <td><?php echo $theobj['tel']; ?></td>
    </tr>
    <tr>
      <th>邮箱：</th>
      <td><?php echo $theobj['email']; ?></td>
    </tr>
    <tr>
      <th>留言内容：</th>
      <td><?php echo $theobj['content']; ?></td>
    </tr>
    <tr>
      <th>留言时间：</th>
      <td><?php echo $theobj['sdate']; ?></td>
    </tr>
	<tr>
		<th>回复：</th>
		<td><textarea name="repaly" cols="60" rows="6"><?php echo $theobj['repaly']; ?></textarea></td>
	</tr>
    <tr>
      <th>&nbsp;</th>
      <td>
        <input type="submit" value=" 提 交 " class='btn' />
        &nbsp;&nbsp;
        <input type="reset" value=" 重 填 " class='btn' />
      </td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
  </table>
</form>
<script type="text/javascript">$(function(){settablecolor('no');});</script>
</body>
</html>