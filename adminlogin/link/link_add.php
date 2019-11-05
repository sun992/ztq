<?php 
require_once '../../config.php';
$nowmember=bll_admin::getadminnow();
if ( count($nowmember)<1) {
	header ( 'location:../index.html' );
	die();
}
$theobj = bll_linksort::getone ( intval ( $_GET ['theid'] ) );
$findid = $theobj ['id'];
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
<script>
	window.onload=function(){
		document.forms[0].title.focus();   
	}
</script>
</head>
<body>
<table  border="0" cellpadding="0" cellspacing="1" class="headtable" style='margin-top: -14px;'>
  <tr>
    <th width="80%">新增信息(<?php echo $theobj['sortname']; ?>)</th>
    <th width="20%"><a href="link_list.php?theid=<?php echo $theobj['id']; ?>"><span class="btn2">返回列表</span></a></th>
  </tr>
</table>
<form name="theform" method="post" action="theaction.php" onSubmit="return ckTheLinkForm(this);">
  <input type="hidden" name="action" value="addlink" />
  <input type="hidden" name="theid" value="<?php echo $theobj['id']; ?>" />
  <table border="0" cellpadding="0" cellspacing="1" class="formtable">
    <tr>
      <th width="10%">标题：</th>
      <td width="90%"><input type="text" name="title" value="" size="40" /></td>
    </tr>
	<?php if(strpos("|1|2|3|4|","|$findid|")!==false){ ?>
	<tr>
		<th>封面图：</th>
		<td>
			<input type="text" name="picture_txt" id="picture" value="" size="40" />
			<input type="button" onclick="upImage();" value="图片上传" class="datepicker btn" />
		</td>
	</tr>
	<?php } ?>
    
    <?php if(strpos("|2|3|","|$findid|")!==false){ ?>
	<tr>
		<th>所属栏目：</th>
		<td>
        	<select name="wz_txt" id="wz">
                <option value="1" selected="selected">关于我们</option>
                <option value="2">产品介绍</option>
                <option value="3">新闻发布</option>
                <option value="4">新闻版块</option>
                <option value="5">服务网点</option>
                <option value="6">联系我们</option>
            </select>
        </td>
	</tr>
	<?php } ?>

	<?php if(strpos("|10|","|$findid|")!==false){ ?>
	<tr>
		<th>链接地址：</th>
		<td><input type="text" name="url_txt" value="#" size="40" /></td>
	</tr>
	<?php } ?>

	<?php if(strpos("|10|","|$findid|")!==false){ ?>
	<tr>
		<th>顶部电话：</th>
		<td><input type="text" name="toptel_txt" value="" size="40" /></td>
	</tr>
	<?php } ?>

	<?php if(strpos("|10|","|$findid|")!==false){ ?>
	<tr>
		<th>底部电话：</th>
		<td><input type="text" name="bottomtel_txt" value="" size="40" /></td>
	</tr>
	<?php } ?>

	<?php if(strpos("|10|","|$findid|")!==false){ ?>
	<tr>
		<th>咨询QQ：</th>
		<td><input type="text" name="qq_txt" value="" size="40" /></td>
	</tr>
	<?php } ?>

	<?php if(strpos("|10|","|$findid|")!==false){ ?>
	<tr>
		<th>微信公众号：</th>
		<td><input type="text" name="weixin_txt" value="" size="40" /></td>
	</tr>
	<?php } ?>

    <tr>
      <th>&nbsp;</th>
      <td>
        <input type="submit" value=" 提 交 " class='btn' />
          
        <input type="reset" value=" 重 填 " class='btn' />
      </td>
    </tr>
    <tr>
      <td colspan="2"><div id="editor" style="display:none;"></div><div id="editor2" style="display:none;"></div></td>
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