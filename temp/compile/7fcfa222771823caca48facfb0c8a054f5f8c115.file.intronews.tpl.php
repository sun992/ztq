<?php /* smarty version smarty-3.1.8, created on 2019-11-01 10:48:18
         compiled from "tpl\intronews.tpl" */ ?>
<?php /*%%smartyHeaderCode:11415db90406c9fb71-72249107%%*/if(!defined('smarty_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7fcfa222771823caca48facfb0c8a054f5f8c115' => 
    array (
      0 => 'tpl\\intronews.tpl',
      1 => 1572576485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11415db90406c9fb71-72249107',
  'function' => 
  array (
  ),
  'version' => 'smarty-3.1.8',
  'unifunc' => 'content_5db90406d08c86_34424724',
  'variables' => 
  array (
    'webname' => 0,
    'ejpic' => 0,
    'contact' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%smartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5db90406d08c86_34424724')) {function content_5db90406d08c86_34424724($_smarty_tpl) {?><!DOCTYPE html>
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
<!--[if lt IE 9]>
<script type="text/javascript" src="tpl/js/html5.js"></script>
<![endif]-->
</head>
<body class="drawer drawer-right">
<?php echo $_smarty_tpl->getSubTemplate ("tpl/comm_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--内页图片 start-->
<div class="ejslide" style="background:url(<?php echo $_smarty_tpl->tpl_vars['ejpic']->value[0]['picture'];?>
) center top no-repeat;background-size:100% 100%;"></div>
<!--<div class="ejslide" style="background:url(tpl/images/ban1.jpg) center top no-repeat;background-size:100% 100%;"></div>-->
<!--二级页主体-->
<div class="globalejmain">
	<div class="ejaddress w1200">
	     <img src="tpl/images/ejdz.png" width="15" height="16" alt="">您所在的位置：<?php echo $_smarty_tpl->getSubTemplate ("tpl/comm_address.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
    <div class="ejmain w1200">
		<?php echo $_smarty_tpl->getSubTemplate ("tpl/comm_left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="right">
			<div class="globalejcontact">
				  <div class="location">
					  <div class="dz"><?php echo $_smarty_tpl->tpl_vars['contact']->value['content'];?>
</div>
<!--
					  <div class="dt">
						  <img src="<?php echo $_smarty_tpl->tpl_vars['contact']->value['picture'];?>
" alt="" width="100%" height="">
					  </div>
-->
					  <div class="dt">
                          <iframe src="tpl/map.html" frameborder="0" style="width:100%;height:400px;"></iframe>
                      </div>
				  </div>
				  <div class="message">
					  <div class="name">
						  <div class="cn"><img src="tpl/images/ly.jpg" alt="">请您留言</div>
						  <div class="en">意见，建议或者想要加盟，亦可在此留言~</div>
					   </div>
					   <form>
						   <ul class='inp'>
							   <li><input type="text" placeholder="姓名" value="" name="nickname" id="add_nickname"></li>
							   <li class="zw-y"></li>
							   <li><input type="text" placeholder="邮箱" value="" name="email" id="add_email"></li>
							   <li class="zw-y"></li>
							   <li><input type="text" placeholder="电话" value="" name="tel" id="add_tel"></li>
						   </ul>
						   <div class="substance"><textarea cols="30" rows="8" placeholder="内容" name="content" id="add_content"></textarea></div>
						   <div class="thebtn">
							   <span class='submit' onClick="addmsg();">提　交</span>
						   </div>
					   </form>
				   </div>
			  </div>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("tpl/comm_bottom.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>