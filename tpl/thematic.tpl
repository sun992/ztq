<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>专题板块</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
<meta http-equiv="Cache-Control" content="no-transform" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="stylesheet" type="text/css" href="tpl/css/main.css" />
<link rel="stylesheet" type="text/css" href="tpl/css/style.css" />
<script type="text/javascript" src="tpl/js/comm.js"></script>
<script type="text/javascript" src="tpl/js/jquery-1.8.3.min.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="tpl/js/html5.js"></script>
<![endif]-->
</head>
<body class="drawer drawer-right">
{:include file="tpl/comm_top.tpl":}
<div class="ejslide" style="background:url(tpl/images/ban5-1.jpg) center top no-repeat;background-size:100%;"></div>
<!--二级页主体-->
<div class="globalejmain">
	<div class="ejaddress w1200">
		<span><img src="tpl/images/ejdz.png" width="15" height="16" alt="">您所在的位置：首页&nbsp;>&nbsp;专题板块&nbsp;>&nbsp;配验预约</span>
	</div>
    <div class="ejmain w1200">
<!--		{:include file="tpl/comm_left.tpl":}-->
		<div class="left">
			<div class="leftnav">
				<h4>
					<em>专题板块</em>
					<span>THEMATIC PLATE</span>
				</h4>
				<div class="name">配验预约</div>
				<div class="list">
					<ul>
						<a href="thematic.php"><li class='onfocus'>配验预约</li></a>
					    <a href="news_list.php?tag=zsfx&theid=8"><li>知识分享</li></a>
					</ul>
			    </div>
			</div>
		</div>
        <div class="right">
           <div class="content w1200">
			  <div class="onepage">
				  <div class="name">
					  <div class="cn">简单填写资料后，我们会尽快和您联系</div>
					  <div class="en">AFTER SIMPLY FILLING IN THE INFORMATION.ME WULL CONTACT YOU AS SOON AS POSSIBLE.</div>
					  <div class="icon"></div>
				   </div>
				   <form>
					   <ul>
						   <li><input type="text" placeholder="客户姓名：" value="" name="nickname" id="add_nickname"></li>
						   <li><input type="text" placeholder="联系电话：" value="" name="email" id="add_email"></li>
						   <li><input type="text" placeholder="电子邮箱：" value="" name="tel" id="add_tel"></li>
						   <li><textarea cols="30" rows="5" placeholder="在线留言：" name="content" id="add_content"></textarea></li>
					   </ul>
					   <div class="thebtn">
						   <span class='submit' onClick="addmsg();">立即提交</span>
						   <span class='consult'><a href="http://wpa.qq.com/msgrd?v=3&uin=1845128281&site=qq&menu=yes">在线咨询</a></span>
<!--						    <span class='consult'><a href="tencent://message/?uin=1845128281&Site=sc.chinaz.com&Menu=yes">在线咨询</a></span>-->
					   </div>
				   </form>
			  </div>
           </div>
        </div>
    </div>
</div>
{:include file="tpl/comm_bottom.tpl":}
</body>
</html>