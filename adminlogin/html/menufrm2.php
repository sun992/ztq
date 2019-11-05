<!doctype html public "-//w3c//dtd xhtml 1.0 transitional//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>左侧</title>
<link rel="stylesheet" type="text/css" href="../css/frame.css" />
<script type="text/javascript" src="../jquery-1.4.4.min.js"></script>
</head>
<base target="frmmain">
<body class="leftbody">
<div id="left-sizer">
	<div id="leftzw">&nbsp;</div>
	<div class="bengin"><em>网站建设</em></div>	
	<div class="onerecordgd">
		<h5>基本信息</h5>
		<ul>
			<li><a href="../../index.php" target="_blank">打开首页</a></li>
			<li><a href="rightfrm.php">欢迎界面</a></li>
			<li><a href="../admin/admin_list.php">管理员账户</a></li>
			<li><a href="../admin/theaction.php?action=outlogin" target="_top">安全退出</a></li>
		</ul>
	</div>
	
	<div class="onerecord">
		<h5>单页管理</h5>
		<ul>
			<li><a href="../onepage/onepage_list.php">单页列表</a></li>
			<li><a href="../system/formset_list.php?tablename=onepage">页面设置</a></li>
			<li><a href="../system/datastructure.php?tablename=onepage">单页表结构设置</a></li>
		</ul>
	</div>
	
	<div class="onerecord">
		<h5>新闻管理</h5>
		<ul>
			<li><a href="../news/newssort_list.php">类别管理</a></li>
			<li><a href="../system/formset_list.php?tablename=newssort">类别页面设置</a></li>
			<li><a href="../system/datastructure.php?tablename=newssort">类别表结构设置</a></li>
			<li><a href="../news/newssort_list2.php">信息管理</a></li>
			<li><a href="../system/formset_list.php?tablename=news">信息页面设置</a></li>
			<li><a href="../system/datastructure.php?tablename=news">信息表结构设置</a></li>
		</ul>
	</div>
	
	<div class="onerecord">
		<h5>链接管理</h5>
		<ul>
			<li><a href="../link/linksort_list.php">链接类别管理</a></li>
			<li><a href="../system/formset_list.php?tablename=linksort">类别页面设置</a></li>
			<li><a href="../system/datastructure.php?tablename=linksort">类别表结构设置</a></li>
			<li><a href="../link/linksort_list2.php">链接信息管理</a></li>
			<li><a href="../system/formset_list.php?tablename=link">链接信息页面设置</a></li>
			<li><a href="../system/datastructure.php?tablename=link">链接信息表结构设置</a></li>
		</ul>
	</div>
	
	<div class="onerecord">
		<h5>留言板管理</h5>
		<ul>
			<li><a href="../guestbook/guestbook_list.php">留言列表</a></li>
		</ul>
	</div>
	
	<div class="onerecord">
		<h5>会员管理</h5>
		<ul>
			<li><a href="../member/member_list.php">会员列表</a></li>
			<li><a href="../system/formset_list.php?tablename=member">会员页面设置</a></li>
			<li><a href="../system/datastructure.php?tablename=member">会员表结构设置</a></li>
		</ul>
	</div>
	
	<div class="onerecord">
		<h5>其它管理</h5>
		<ul>
			<li><a href="../webset/webset_edit.php">系统设置</a></li>
			<li><a href="../float/float_list.php">右侧漂浮</a></li>
		</ul>
	</div>
	
	<script type="text/javascript">
	$(function(){
		$(".onerecord h5").click(function(){
			if (this.className != "open") {
				$(".open").parent().children("ul").hide("slow");
				$(".open").removeClass("open");
				$(this).parent().children("ul").show("slow");
				$(this).addClass("open");
			}
		});
		if($(document.body).outerheight(true)<$(document).height()){
			$("#leftzw").css({"top":"100%"});
		}
	});
	</script>
</div>
</body>
</html>
