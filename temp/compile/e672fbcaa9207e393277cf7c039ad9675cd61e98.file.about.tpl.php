<?php /* smarty version smarty-3.1.8, created on 2019-10-30 15:16:53
         compiled from "tpl\about.tpl" */ ?>
<?php /*%%smartyHeaderCode:50635db90e0ebea599-17523465%%*/if(!defined('smarty_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e672fbcaa9207e393277cf7c039ad9675cd61e98' => 
    array (
      0 => 'tpl\\about.tpl',
      1 => 1572419802,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '50635db90e0ebea599-17523465',
  'function' => 
  array (
  ),
  'version' => 'smarty-3.1.8',
  'unifunc' => 'content_5db90e0ec7acd3_15619801',
  'variables' => 
  array (
    'webname' => 0,
    'ejpic' => 0,
    'about' => 0,
    'rongyu' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%smartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5db90e0ec7acd3_15619801')) {function content_5db90e0ec7acd3_15619801($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $_smarty_tpl->tpl_vars['webname']->value;?>
</title>
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
<?php echo $_smarty_tpl->getSubTemplate ("tpl/comm_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--<div class="ejslide" style="background:url(tpl/images/ban2.jpg) center top no-repeat;background-size:100% 100%;"></div>-->
<div class="ejslide" style="background:url(<?php echo $_smarty_tpl->tpl_vars['ejpic']->value[0]['picture'];?>
) center top no-repeat;background-size:100% 100%;"></div>
<!--二级页主体-->
<div class="globalejmain">
	<div class="ejaddress w1200">
<!--	     <img src="tpl/images/ejdz.png" width="15" height="16" alt="">您所在的位置：<?php echo $_smarty_tpl->getSubTemplate ("tpl/comm_address.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
-->
		<span><img src="tpl/images/ejdz.png" width="15" height="16" alt="">您所在的位置：首页&nbsp;>&nbsp;关于我们&nbsp;>&nbsp;公司简介</span>
	</div>
    <div class="ejmain w1200">
<!--		<?php echo $_smarty_tpl->getSubTemplate ("tpl/comm_left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
-->
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
					   <?php echo $_smarty_tpl->tpl_vars['about']->value[0]['content'];?>

					   <p><img src="<?php echo $_smarty_tpl->tpl_vars['about']->value[0]['picture'];?>
" alt=""></p>
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
		    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['a'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['a']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['name'] = 'a';
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['rongyu']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['total']);
?>
			<a class="item">
				<img src="<?php echo $_smarty_tpl->tpl_vars['rongyu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['picture'];?>
" alt="">
				<span><?php echo $_smarty_tpl->tpl_vars['rongyu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['title'];?>
</span>
			</a>
			<?php endfor; endif; ?>
		  </div>
	   </div>
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("tpl/comm_bottom.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>