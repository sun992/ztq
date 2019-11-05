<?php /* smarty version smarty-3.1.8, created on 2019-10-30 15:16:44
         compiled from "tpl\newslist.tpl" */ ?>
<?php /*%%smartyHeaderCode:232425db903fe107975-39219687%%*/if(!defined('smarty_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e12b13620422102a9dd5541e7f0fa9f96da668ed' => 
    array (
      0 => 'tpl\\newslist.tpl',
      1 => 1572419802,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '232425db903fe107975-39219687',
  'function' => 
  array (
  ),
  'version' => 'smarty-3.1.8',
  'unifunc' => 'content_5db903fe166081_07707432',
  'variables' => 
  array (
    'webname' => 0,
    'ejpic' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%smartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5db903fe166081_07707432')) {function content_5db903fe166081_07707432($_smarty_tpl) {?><!DOCTYPE html>
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
<!--[if lt IE 9]>
<script type="text/javascript" src="tpl/js/html5.js"></script>
<![endif]-->
</head>
<body class="drawer drawer-right">
<?php echo $_smarty_tpl->getSubTemplate ("tpl/comm_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

 <!--内页图片 start-->
<!--<div class="ejslide" style="background:url(tpl/images/ban8.jpg) center top no-repeat;background-size:100% 100%;"></div>-->
<div class="ejslide" style="background:url(<?php echo $_smarty_tpl->tpl_vars['ejpic']->value[0]['picture'];?>
) center top no-repeat;background-size:100% 100%;"></div>
<!--内页图片 end-->
<!--二级页主体-->
<div class="globalejmain">
	<div class="ejaddress w1200">
	     <img src="tpl/images/ejdz.png" width="15" height="16" alt="">您所在的位置：<?php echo $_smarty_tpl->getSubTemplate ("tpl/comm_address.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
    <div class="ejmain w1200">
		<?php echo $_smarty_tpl->getSubTemplate ("tpl/comm_left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="right">
          <div class="content w1200">
                <?php echo $_smarty_tpl->getSubTemplate ("tpl/comm_newsstyle.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                <?php echo $_smarty_tpl->getSubTemplate ("tpl/comm_pageinfo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
<?php echo $_smarty_tpl->getSubTemplate ("tpl/comm_bottom.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>