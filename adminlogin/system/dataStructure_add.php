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
<script type="text/javascript" src="comm.js"></script>
<title>新增表结构</title>
<base target="_self" />
</head>
<body>
<form name="TheForm" method="post" action="system_action.php" onSubmit="return ckData_Talbe_Handle(this);">
  <input type="hidden" name="action" value="dataStructure_Add">
  <table border="0" cellpadding="0" cellspacing="1" class="formtable">
    <tr>
      <th width="30%">字段类型：</th>
      <td width="70%"><select name="columnsType">
          <option value="0">===选择===</option>
          <option value="1">===文本===</option>
          <option value="2">===数字===</option>
          <option value="3">===备注===</option>
          <option value="4">===时间===</option>
        </select>
      </td>
    </tr>
    <tr>
      <th>字段代码：</th>
      <td><input type="text" name="columnsCode" value="" /></td>
    </tr>
    <tr>
      <th>&nbsp;</th>
      <td><input type="submit" value=" 保 存 " class="btn" />
        &nbsp;&nbsp;
        <input type="reset" value=" 重 填 " class="btn" />
      </td>
    </tr>
    <tr>
      <th colspan="2">&nbsp;</th>
    </tr>
  </table>
</form>
</body>
</html>
