<?php 
require_once '../../config.php';
$nowmember=bll_admin::getadminnow();
if ( count($nowmember)<1) {
	header ( 'location:../index.html' );
	die();
}
$makedata = $theobj = bll_news::getone ( intval ( $_GET ['theid'] ) );
$sortobj = bll_newssort::getone ( $theobj ['sort'] );
$findid = $sortobj ['id'];
$findid2 = $sortobj ['pid'];
$sortobj2 = bll_newssort::getone ( $findid2 );
$findid3 = count ( $sortobj2 ) > 0 ? $sortobj2 ['pid'] : 0;
$sortobj3 = bll_newssort::getone ( $findid3 );
$findid4 = count ( $sortobj3 ) > 0 ? $sortobj3 ['pid'] : 0;
//print_r($makedata);
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
    <th width="80%">修改信息(<?php echo $sortobj['sortname']; ?>)</th>
    <th width="20%">
        <?php 
			switch ($tag){
				case "product":
					echo "<a href='news_list.php?tag=" . $tag . "&theid=". $sortobj['id'] ."'><span class=\"btn2\">返回列表</span></a></a>";
				break;
				case "case":
					echo "<a href='news_list.php?tag=" . $tag . "&theid=". $sortobj['id'] ."'><span class=\"btn2\">返回列表</span></a></a>";
				break;
				case "news":
					echo "<a href='news_list.php?tag=" . $tag . "&theid=". $sortobj['id'] ."'><span class=\"btn2\">返回列表</span></a></a>";
				break;
				default:
				echo "<a href='news_list.php?theid=". $sortobj['id'] ."'><span class=\"btn2\">返回列表</span></a></a>";
				break;
			}
		?>
    </th>
  </tr>
</table>
<form name="theform" method="post" action="theaction.php" onSubmit="return ckTheNewsForm(this);">
  <input type="hidden" name="action" value="editnews" />
  <input type="hidden" name="theid" value="<?php echo $theobj['id']; ?>" />
  <input type="hidden" name="tag" value="<?php echo $tag; ?>" />
  <table border="0" cellpadding="0" cellspacing="1" class="formtable">
    <tr>
      <th width="10%">标题：</th>
      <td width="90%"><input type="text" name="title" value="<?php echo $theobj['title']; ?>" size="40" />
        <input type="submit" value=" 提 交 " class='btn' />
          
        <input type="reset" value=" 重 填 " class='btn' />
      </td>
    </tr>
	
    <?php if(strpos("|4|","|$findid|")!==false || strpos("|4|","|$findid2|")!==false){ ?>
	<tr>
		<th>型号：</th>
		<td><input type="text" name="marker_txt" value="<?php echo $makedata['marker']; ?>" size="40" /></td>
	</tr>
	<?php } ?>
	  
	<?php if(strpos("|15|","|$findid|")!==false || strpos("|15|","|$findid2|")!==false){ ?>
	<tr>
		<th>电话：</th>
		<td><input type="text" name="tels_txt" value="<?php echo $makedata['tels']; ?>" size="40" /></td>
	</tr>

	<tr>
		<th>地址：</th>
		<td><input type="text" name="dizhi_txt" value="<?php echo $makedata['dizhi']; ?>" size="40" /></td>
	</tr>
	<?php } ?>
	
	<?php if(strpos("|14|","|$findid|")!==false || strpos("|14|","|$findid2|")!==false){ ?>
	<tr>
		<th>专家姓名：</th>
		<td><input type="text" name="author_txt" value="<?php echo $makedata['author']; ?>" size="40" /></td>
	</tr>

	<tr>
		<th>专家介绍：</th>
		<td><textarea name="teaminfo_txt" rows="6" cols="50"><?php echo $makedata['teaminfo']; ?></textarea></td>
	</tr>

	<tr>
		<th>头像照片：</th>
		<td>
			<input type="text" name="picture_txt" id="picture" value="<?php echo $makedata['picture']; ?>" size="40" />
		    <input type="button" onclick="upImage();" value="图片上传" class="datepicker btn" />
		</td>
	</tr>

	<tr>
		<th>形象照片：</th>
		<td>
			<input type="text" name="picture2_txt" id="picture2" value="<?php echo $makedata['picture2']; ?>" size="40" />
			<input type="button" onclick="upImage2();" value="图片上传" class="datepicker btn" />
		</td>
	</tr>
	<?php } ?>
	  
	
	<?php if(strpos("|3|6|9|4|7|","|$findid|")!==false || strpos("|3|6|9|4|7|","|$findid2|")!==false){ ?>
	<tr>
		<th>作者：</th>
		<td><input type="text" name="author_txt" value="<?php echo $makedata['author']; ?>" size="40" /></td>
	</tr>
	<?php } ?>

	<?php if(strpos("|3|6|9|4|7|","|$findid|")!==false || strpos("|3|6|9|4|7|","|$findid2|")!==false){ ?>
	<tr>
		<th>时间：</th>
		<td>
        	<input type="text" name="istime_txt" value="<?php echo $makedata['istime']; ?>" size="40" />
        	<input type="hidden" name="them_txt" value="<?php echo $makedata['them']; ?>" />
            <input type="hidden" name="thed_txt" value="<?php echo $makedata['thed']; ?>" />
        </td>
	</tr>
	<?php } ?>

	<?php if(strpos("|3|4|7|11|15|","|$findid|")!==false || strpos("|3|4|7|11|15|","|$findid2|")!==false){ ?>
	<tr>
		<th>封面图：</th>
		<td>
			<input type="text" name="picture_txt" id="picture" value="<?php echo $makedata['picture']; ?>" size="40" />
			<input type="button" onclick="upImage();" value="图片上传" class="btn" />
		</td>
	</tr>
	<?php } ?>
    
    <?php if(strpos("|3|5|6|7|13|17|18|","|$findid|")!==false || strpos("|3|5|6|7|13|17|18|","|$findid2|")!==false){ ?>
	<tr>
		<th>设置推荐：</th>
		<td>
        	<select name="isgood_text" id="isgood" onChange="checkdescrib(this.id)"> 
              <option value="0">常规显示</option> 
              <option value="1">首页推荐</option>
            </select> 
        </td>
	</tr>
	<?php } ?>
    
	
    <?php if(strpos("|1|2|3|4|5|6|7|9|13|17|18|","|$findid|")!==false || strpos("|1|2|3|4|5|6|7|9|13|17|18|","|$findid2|")!==false){ ?>
	<tr>
		<th>设置seo：</th>
		<td>
        	<select name="isseo_text" id="isseo"  onChange="checkseo(this.id)"> 
              <option value="0">不设置</option> 
              <option value="1">设置seo</option>
            </select> 
        </td>
	</tr>
    <script type="text/javascript">
    	document.getElementById("isgood").value='<?php echo $makedata['isgood'];  ?>';
		document.getElementById("isseo").value='<?php echo $makedata['isseo'];  ?>';
		function checkseo(id) {
		  var thea = document.getElementById(id);
		  var theb = document.getElementById("#showthekey");
		  if(thea.value==0){
			document.getElementById("showthekey").style.display="none";//隐藏 
			document.getElementById("showthedes").style.display="none";//隐藏 
		  }else{
			document.getElementById("showthekey").style.display="";//显示 
			document.getElementById("showthedes").style.display="";//显示 
		  }
		}
    </script>
    
	<tr id="showthekey" <?php if( $makedata['isseo']!=1 ){ echo "style=\"display:none;\""; } ?>>
		<th>seo关键词：</th>
		<td>
        	<textarea name="thekey_txt" cols="40" rows="4" style="float:left;"><?php echo $makedata['thekey']; ?></textarea>
        	<font style="float:left;">提示：多个关键词请用英文逗号 "," 分隔！</font>
        </td>
	</tr>
    
    <tr id="showthedes" <?php if( $makedata['isseo']!=1 ){ echo "style=\"display:none;\""; } ?>>
		<th>seo描述：</th>
		<td>
        	<textarea name="thedes_txt" cols="40" rows="4" style="float:left;"><?php echo $makedata['thedes']; ?></textarea>
            <font style="float:left;">提示：描述不应超过80字！</font>
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
      <td colspan="2"><div id="editor2" style="display:none;"></div><div id="editor3" style="display:none;"></div></td>
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
  var ue3 = UE.getEditor('editor3');
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
//  新增编辑器
  
   ue2.ready(function () {
  //侦听图片上传
  ue3.hide();
  ue3.addListener('beforeinsertimage', function (t, arg) {
  //将地址赋值给相应的input,只去第一张图片的路径
  var imgs;
  for(var a in arg){
	  imgs +=arg[a].src+',';
  }
   $("#picture2").attr("value", arg[0].src);
  //图片预览
   $("#preview2").attr("src", arg[0].src);
  })
  });
  //弹出图片上传的对话框
  function upImage2() {
  	var myImage2 = ue3.getDialog("insertimage");
  	myImage2.open();
  }
//  新增编辑器
</script>
</body>
</html>