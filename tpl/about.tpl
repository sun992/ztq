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
<link rel="stylesheet" href="tpl/css/owl.carousel.css">
<link rel="stylesheet" href="tpl/css/owl.theme.css">
<script src="https://cdn.bootcss.com/owl-carousel/1.32/owl.carousel.js"></script>
<style>
#owl-demo {width: 100%;margin-left: auto;margin-right: auto;padding: 1% 0;}
#owl-demo .item {display: block;margin: 20px;text-align: center;font-size: 14px;text-decoration: none;cursor: pointer;}
#owl-demo img {display: block;width: 100%;}
#owl-demo .item span{display: block;margin-top:6%;font-size: 15px;}
.owl-theme .owl-controls .owl-buttons div{position: absolute;top:50%;padding: 1px 10px 6px;border-radius: 0;-webkit-border-radius:0;background:#0caa6d;opacity: 1;font-weight: 600;font-size: 30px;cursor: pointer;}
.owl-theme .owl-controls .owl-buttons div.owl-prev{left:-130px;}
.owl-theme .owl-controls .owl-buttons div.owl-next{right:-130px;}
</style>
<script>
	$(function(){
    $('#owl-demo').owlCarousel({
        navigation: true,
        navigationText: ["<",">"],
		items:3,
		pagination:false,
	    autoPlay: 3000
    });
});
</script>
<script>
$(function(){
  var m = $('#JS_SCROLLMENU');
  m.find("li").click(function(){
	  m.find("li").removeClass('onfocus');					  
	  var i = $(this).index();
	  if( i == 0){
		$('html,body').animate({scrollTop: $('#zzry').offset().top-300 + 'px'}, 1000);  
	  }
	  //alert(i);
//	  if( i==1 ){
//		 $('html,body').animate({scrollTop: $('#gsjj').offset().top-800 + 'px'}, 1000); 
//	  }
	  m.find("li:eq("+ i +")").addClass("onfocus");
  });
}); 
</script>
<!--[if lt IE 9]>
<script type="text/javascript" src="tpl/js/html5.js"></script>
<![endif]-->
</head>
<body class="drawer drawer-right">
{:include file="tpl/comm_top.tpl":}
<div class="ejslide" style="background:url(tpl/images/ban2.jpg) center top no-repeat;background-size:100% 100%;"></div>
<!--<div class="ejslide" style="background:url({:$ejpic[0].picture:}) center top no-repeat;background-size:100% 100%;"></div>-->
<!--二级页主体-->
<div class="globalejmain">
	<div class="ejaddress w1200">
<!--	     <img src="tpl/images/ejdz.png" width="15" height="16" alt="">您所在的位置：{:include file="tpl/comm_address.tpl":}-->
		<span><img src="tpl/images/ejdz.png" width="15" height="16" alt="">您所在的位置：首页&nbsp;>&nbsp;关于我们&nbsp;>&nbsp;公司简介</span>
	</div>
    <div class="ejmain w1200">
<!--		{:include file="tpl/comm_left.tpl":}-->
		<div class="left">
			<div class="leftnav">
				<h4>
					<em>关于我们</em>
					<span>ABOUT US</span>
				</h4>
				<div class="name">公司简介</div>
				<div class="list" id="JS_SCROLLMENU">
					<ul>
						<a href="about.php#gsjj"><li class='onfocus'>公司简介</li></a>
						<a href="about.php#zzry"><li>资质荣誉</li></a>
					</ul>
			    </div>
			</div>
		</div>
        <div class="right">
			<div class="content w1200">
			   <div class="onepage" id="gsjj">
				  <div class="name">
					  <div class="cn">西宁市助听器验配服务中心</div>
					  <div class="en">XININGS ZHUTINGQI YANPEI FUWUZHONGXIN</div>
					  <div class="icon"></div>
				   </div>
				   <div class="cont">
					   {:$about[0].content:}
					   <p><img src="{:$about[0].picture:}" alt=""></p>
				   </div>
			  </div>
		  </div>
        </div>
    </div>
	<div class="ejname" id="zzry">
		 <div class="cn">资质荣誉</div>
		 <div class="en">OUALIFICATION HONOR</div>
		 <div class="icon"></div>
	</div>
	<div class="ejcont w1200">
		<div class="cont">
		   <div class="producttop owl-carousel" id="owl-demo">
		    {:section name=a loop=$rongyu:}
			<a class="item">
				<img src="{:$rongyu[a].picture:}" alt="">
				<span>{:$rongyu[a].title:}</span>
			</a>
			{:/section:}
		  </div>
	   </div>
	</div>
</div>
{:include file="tpl/comm_bottom.tpl":}
</body>
</html>