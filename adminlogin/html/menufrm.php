<?php 
require_once '../../config.php';
if (intval ( bll_admin::islogin () ) === 0) {
	header ( 'location:../index.html' );
	die ();
}
?>
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
		<h5>首页信息</h5>
		<ul>
			<li><a href="../link/link_list.php?theid=1">首页幻灯</a></li>
            <li><a href="../onepage/onepage_edit.php?theid=2">首页关于我们</a></li>
            <li><a href="../link/link_list.php?theid=2">关于我们照片</a></li>
		</ul>
	</div>
	<div class="onerecord">
		<h5>关于我们</h5>
		<ul>
			<li><a href="../news/news_list.php?theid=1">公司简介</a></li>
            <li><a href="../link/link_list.php?theid=4">资质荣誉</a></li>
		</ul>
	</div>
	
	<div class="onerecord">
		<h5>产品信息</h5>
		<ul>
			<li><a href="../news/newssort_productinfo.php">产品信息</a></li>
            <li><a href="../news/newssort_productlist.php">栏目分类</a></li>
		</ul>
	</div>
	
	<div class="onerecord">
		<h5>新闻发布</h5>
		<ul>
			<li><a href="../news/newssort_newsinfo.php">新闻信息</a></li>
            <li><a href="../news/newssort_newslist.php">栏目分类</a></li>
		</ul>
	</div>
	
	<div class="onerecord">
		<h5>专题板块</h5>
		<ul>
			<li><a href="../news/newssort_zsfxinfo.php">知识分享</a></li>
			<li><a href="../news/newssort_zsfxlist.php">栏目分类</a></li>
		</ul>
	</div>
	
	<div class="onerecord">
		<h5>服务网点</h5>
		<ul>
			<li><a href="../news/news_list.php?theid=15">连锁门店</a></li>
			<li><a href="../news/news_list.php?theid=14">专家团队</a></li>
		</ul>
	</div>
    
    <div class="onerecord">
		<h5>联系我们</h5>
		<ul>
			<li><a href="../onepage/onepage_edit.php?theid=3">联系我们</a></li>
			<li><a href="../guestbook/guestbook_list.php">留言列表</a></li>
		</ul>
	</div>
	
	<div class="onerecord">
		<h5>其它管理</h5>
		<ul>
            <li><a href="../link/link_list.php?theid=3">栏目图片</a></li>
            <li><a href="../onepage/onepage_edit.php?theid=4">底部信息</a></li>
            <li><a href="../onepage/onepage_edit.php?theid=5">顶部电话</a></li>
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
