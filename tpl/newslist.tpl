<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>{:$webname:}</title>
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
 <!--内页图片 start-->
<div class="ejslide" style="background:url(tpl/images/ban8.jpg) center top no-repeat;background-size:100% 100%;"></div>
<!--<div class="ejslide" style="background:url({:$ejpic[0].picture:}) center top no-repeat;background-size:100% 100%;"></div>-->
<!--内页图片 end-->
<!--二级页主体-->
<div class="globalejmain">
	<div class="ejaddress w1200">
	     <img src="tpl/images/ejdz.png" width="15" height="16" alt="">您所在的位置：{:include file="tpl/comm_address.tpl":}
	</div>
    <div class="ejmain w1200">
		{:include file="tpl/comm_left.tpl":}
        <div class="right">
          <div class="content w1200">
                {:include file="tpl/comm_newsstyle.tpl":}
                {:include file="tpl/comm_pageinfo.tpl":}
          </div>
        </div>
    </div>
</div>
<script>
var d = $(".time em").text().substring(8,10);
$(".time em").text(d) ;
var date = $(".time span").text().substring(0,7);
$(".time span").text(date) ;
</script>
{:include file="tpl/comm_bottom.tpl":}
</body>
</html>