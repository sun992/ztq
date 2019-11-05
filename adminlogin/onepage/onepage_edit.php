<?php 
require_once '../../config.php';
$nowmember=bll_admin::getadminnow();
if ( count($nowmember)<1) {
	header ( 'location:../index.html' );
	die();
}
$makedata = $theobj = bll_onepage::getone ( intval ( $_GET ['theid'] ) );
$findid = $theobj['id'];
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
<script type="text/javascript" charset="utf-8" src="../../ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="../../ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="../../ueditor/lang/zh-cn/zh-cn.js"></script>
</head>
<body>
<table  border="0" cellpadding="0" cellspacing="1" class="headtable">
  <tr>
    <th width="80%">修改<?php echo $theobj['title']; ?></th>
    <th width="20%"></th>
  </tr>
</table>
<form name="theform" method="post" action="theaction.php" onSubmit="return cktheform(this);">
  <input type="hidden" name="action" value="edit" />
  <input type="hidden" name="theid" value="<?php echo $theobj['id']; ?>" />
  <table border="0" cellpadding="0" cellspacing="1" class="formtable">
    <tr>
      <th width="10%">标题：</th>
      <td width="90%">
      	<input type="text" name="title" value="<?php echo $theobj['title']; ?>" size="40" />
          
        <input type="submit" value=" 提 交 " class='btn' />
          
        <input type="reset" value=" 重 填 " class='btn' />
      </td>
    </tr>
	<?php if(strpos("|1|2|3|4|11|","|$findid|")!==false){ ?>
	<tr>
		<th>封面图：</th>
		<td>
			<input type="text" name="picture_txt" id="picture" value="<?php echo $makedata['picture']; ?>" size="40" />
			<input type="button" onclick="upImage();" value="图片上传" class="datepicker btn" />
		</td>
	</tr>
	<?php } ?>


    <tr>
      <th>编辑框：</th>
      <td>
        <script id="editor" type="text/plain" name="content" style="width:1024px;height:500px;"><?php echo $theobj['content']; ?></script>
      </td>   
      </th>
    </tr>
    <tr>
      <td colspan="2"><div id="editor2" style="display:none;"></div></td>
    </tr>
  </table>
  <input type="hidden" name="oldname" value="" />
  <input type="hidden" name="savename" value="" />
  <input type="hidden" name="savepath" value="" />
</form>
<script type="text/javascript">$(function(){settablecolor('no');});</script>
<script type="text/javascript">
  var ue = UE.getEditor('editor');
  var ue2 = UE.getEditor('editor2');
  ue2.ready(function () {
  //侦听图片上传
  ue2.hide();
  ue2.addListener('beforeinsertimage', function (t, arg) {
  //将地址赋值给相应的input,只去第一张图片的路径
  var imgs;
  for(var a in arg){
	  imgs +=arg[a].src+',';
  }
   $("#picture").attr("value", arg[0].src);
  //图片预览
   $("#preview").attr("src", arg[0].src);
  })
  });
  //弹出图片上传的对话框
  function upImage() {
  	var myImage = ue2.getDialog("insertimage");
  	myImage.open();
  }
</script>
</body>
</html>