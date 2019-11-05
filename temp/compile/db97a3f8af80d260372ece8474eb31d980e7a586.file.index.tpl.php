<?php /* smarty version smarty-3.1.8, created on 2019-10-30 11:31:06
         compiled from "tpl\index.tpl" */ ?>
<?php /*%%smartyHeaderCode:327185db8ffaf5cb8d2-70680089%%*/if(!defined('smarty_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db97a3f8af80d260372ece8474eb31d980e7a586' => 
    array (
      0 => 'tpl\\index.tpl',
      1 => 1572406222,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '327185db8ffaf5cb8d2-70680089',
  'function' => 
  array (
  ),
  'version' => 'smarty-3.1.8',
  'unifunc' => 'content_5db8ffaf852775_49648591',
  'variables' => 
  array (
    'indexslide' => 0,
    'about' => 0,
    'aboutimg' => 0,
    'product' => 0,
    'team' => 0,
    'stroe' => 0,
    'news' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%smartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5db8ffaf852775_49648591')) {function content_5db8ffaf852775_49648591($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>西宁市助听器验配服务中心</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
<meta http-equiv="Cache-Control" content="no-transform" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="stylesheet" type="text/css" href="tpl/css/index.css" />
<link rel="stylesheet" type="text/css" href="tpl/css/main.css" />
<!--<link rel="stylesheet" type="text/css" href="tpl/css/normalize.css" />-->
<script type="text/javascript" src="tpl/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="tpl/js/comm.js"></script>
<link rel="stylesheet" href="tpl/css/owl.carousel.css">
<link rel="stylesheet" href="tpl/css/owl.theme.css">
<script src="https://cdn.bootcss.com/owl-carousel/1.32/owl.carousel.js"></script>
<script type="text/javascript" src="tpl/js/jquery.SuperSlide.2.1.1.js"></script> 
<script type="text/javascript" src="tpl/js/jquery.flexslider-min.js"></script>
<style>
#owl-demo {width: 100%;margin-left: auto;margin-right: auto;padding-top: 2%;}
#owl-demo .item {display: block;margin: 10px;text-align: center;font-size: 14px;text-decoration: none;cursor: pointer;}
#owl-demo img {display: block;width: 100%;box-shadow: 0px 0px 8px 2px #ccc;overflow: hidden;}
#owl-demo .item span{display: block;margin-top:10%;}
#owl-demo .item em{font-style: normal;line-height: 30px;}
</style>
<script>
	$(function(){
    $('#owl-demo').owlCarousel({
		items:4
    });
});
</script>
<script>
	$(function(){
	$('.flexslider').flexslider({
		directionNav: true,
		pauseOnAction: false
	});
});
</script>

<!--[if lt IE 9]>
<script type="text/javascript" src="tpl/js/html5.js"></script>
<![endif]-->
</head>
<body class="drawer drawer-right">
<?php echo $_smarty_tpl->getSubTemplate ("tpl/comm_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--首页幻灯start-->
<div class="indexslide">
	<div class="flexslider">
        <ul class="slides">
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['a'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['a']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['name'] = 'a';
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['indexslide']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<li style="background:url(<?php echo $_smarty_tpl->tpl_vars['indexslide']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['picture'];?>
) 50% 0 no-repeat;background-size:100%;" >
				<div class="ad_txt">
					<a href="" target="_blank"></a>				
				</div>
            </li>
			<?php endfor; endif; ?>
        </ul>
     </div>
</div>
<!--首页幻灯end-->
<!--关于我们start-->
<div class="indexabout">
	<div class="w1200">
		<div class='aboutleft'>
			 <div class="name">
				 <div class="cn">关于我们</div>
				 <div class="en">ABOUT US</div>
				 <div class="line"></div>
			 </div>
			 <div class="extend">
				 <?php echo $_smarty_tpl->tpl_vars['about']->value['content'];?>

			 </div>
			 <div class="more">
				 <a href="product.php?tag=step2">查看详情</a>
			 </div>
		</div>
		<div class="aboutcontent">
			<div class='one'><img src="<?php echo $_smarty_tpl->tpl_vars['aboutimg']->value[0]['picture'];?>
" alt="" width="275" height="305"></div>
			<div class='two'><img src="<?php echo $_smarty_tpl->tpl_vars['aboutimg']->value[1]['picture'];?>
" alt="" width="275" height="305"></div>
		</div>
		<div class="aboutright">
			 <ul>
				 <li class="zw-x"></li>
				 <li>
					 <a href="news_show.php?theid=17">
						 <i>01</i>
						 <p>助听器购买流程</p>
						 <span></span>
                     </a>
				 </li>
				 <li class="zw-x"></li>
				 <li>
					 <a href="news_show.php?theid=18">
						 <i>02</i>
						 <p>助听器在哪里买</p>
						 <span></span>
				     </a>
				 </li>
				 <li class="zw-x"></li>
				 <li>
					 <a href="news_show.php?theid=19">
						 <i>03</i>
						 <p>助听器怎么买</p>
						 <span></span>
				     </a>
				 </li>
				 <li class="zw-x"></li>
			</ul>					
		</div>
	</div>
 </div>
<!--关于我们end-->
<!--产品中心start-->
<div class="indexproduct">
	<div class="w1200">
		<div class="producttop">
			<div class="name">
				<div class="cn">产品中心</div>
				<div class="en">PRODUCTS</div>
				<div class="line"></div>
			</div>
			<div class="classinfo">
				<dl>
					<dt>品牌：</dt>
					<dd><a href="news_list.php?tag=product&theid=13">美国斯达克</a></dd>
					<dd class="cur"><a href="news_list.php?tag=product&theid=13">瑞士峰力</dd>
					<dd><a href="news_list.php?tag=product&theid=13">欧仕达</dd>
				</dl>
				<dl>
					<dt>价格：</dt>
					<dd><a href="news_list.php?tag=product&theid=13">1-3000</a></dd>
					<dd><a href="news_list.php?tag=product&theid=13">3000-6000</a></dd>
					<dd><a href="news_list.php?tag=product&theid=13">6000-10000</a></dd>
					<dd><a href="news_list.php?tag=product&theid=13">10000-20000</a></dd>
					<dd><a href="news_list.php?tag=product&theid=13">20000以上</a></dd>
				</dl>
			</div>
		</div>
		<div class="producttop owl-carousel" id="owl-demo">
		    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['a'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['a']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['name'] = 'a';
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['product']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				<img src="<?php echo $_smarty_tpl->tpl_vars['product']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['picture'];?>
" alt="" width="100%" height="230px">
				<span><?php echo $_smarty_tpl->tpl_vars['product']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['marker'];?>
</span>
				<em><?php echo $_smarty_tpl->tpl_vars['product']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['title'];?>
</em>
			</a>
			<?php endfor; endif; ?>
<!--
			<a class="item">
				<img src="tpl/images/bgn6.jpg" alt="">
				<span>PHONAK AUDEO B-R</span>
				<em>锋力锂航系列</em>
			</a>
			<a class="item">
				<img src="tpl/images/bgn7.jpg" alt="">
				<span>PHONAK AUDEO B-R</span>
				<em>锋力锂航系列</em>
			</a>
			<a class="item">
				<img src="tpl/images/bgn8.jpg" alt="">
				<span>PHONAK AUDEO B-R</span>
				<em>锋力锂航系列</em>
			</a>
			<a class="item">
				<img src="tpl/images/bgn5.jpg" alt="">
				<span>PHONAK AUDEO B-R</span>
				<em>锋力锂航系列</em>
			</a>
			<a class="item">
				<img src="tpl/images/bgn6.jpg" alt="">
				<span>PHONAK AUDEO B-R</span>
				<em>锋力锂航系列</em>
			</a>
			<a class="item">
				<img src="tpl/images/bgn7.jpg" alt="">
				<span>PHONAK AUDEO B-R</span>
				<em>锋力锂航系列</em>
			</a>
			<a class="item">
				<img src="tpl/images/bgn8.jpg" alt="">
				<span>PHONAK AUDEO B-R</span>
				<em>锋力锂航系列</em>
			</a>
			<a class="item">
				<img src="tpl/images/bgn5.jpg" alt="">
				<span>PHONAK AUDEO B-R</span>
				<em>锋力锂航系列</em>
			</a>
			<a class="item">
				<img src="tpl/images/bgn6.jpg" alt="">
				<span>PHONAK AUDEO B-R</span>
				<em>锋力锂航系列</em>
			</a>
			<a class="item">
				<img src="tpl/images/bgn7.jpg" alt="">
				<span>PHONAK AUDEO B-R</span>
				<em>锋力锂航系列</em>
			</a>
			<a class="item">
				<img src="tpl/images/bgn8.jpg" alt="">
				<span>PHONAK AUDEO B-R</span>
				<em>锋力锂航系列</em>
			</a>
			<a class="item">
				<img src="tpl/images/bgn5.jpg" alt="">
				<span>PHONAK AUDEO B-R</span>
				<em>锋力锂航系列</em>
			</a>
			<a class="item">
				<img src="tpl/images/bgn6.jpg" alt="">
				<span>PHONAK AUDEO B-R</span>
				<em>锋力锂航系列</em>
			</a>
			<a class="item">
				<img src="tpl/images/bgn7.jpg" alt="">
				<span>PHONAK AUDEO B-R</span>
				<em>锋力锂航系列</em>
			</a>
			<a class="item">
				<img src="tpl/images/bgn8.jpg" alt="">
				<span>PHONAK AUDEO B-R</span>
				<em>锋力锂航系列</em>
			</a>
-->
		</div>
	</div>
</div>
<!--产品中心end-->
<!--专家团队start-->
<div class="globalteam">
	<div class="ejteam w1200">
    	<div class="name">
		    <div class="cn">专家团队</div>
			<div class="en">PROFESSIONAL TEAM</div>
			<div class="line"></div>
		</div>
        <div class="extend">
			<div class="teambox">
            <div class="content" >
            	<div class="info">
                	<div class="title">李洋</div>
                    <div class="intro">
						<span>国家三级（高级）验配师 &nbsp;&nbsp;&nbsp;</span>	
					    <span>斯达克专业助听器验配师</span>
					</div>
                    <div class="msg">
						<p>毕业于南京金陵学院，听力学助听器验配专业并获得助听器验配师国家职业资格三级证书，1999年涉足助听器验配工作，在助听器验配调试、日常维护、耳聋诊断、聋儿言语康复等方面有着丰富的经验和自己独到的见解。曾多次参加美国、瑞士、徳国等国际助听器公司技术培训和听力学研讨，并取得了斯达克公司、峰力公司的验配资格证书。多年来,积极参与“情系聋儿”社会公益活动，曾获“青海省首席听力学家”荣誉称号。</p>
					</div>
                </div>
                <div class="pic"><img src="tpl/images/ren1.jpg" width="273" height="694" alt="国家三级（高级）验配师"></div>
            </div>
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['a'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['a']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['name'] = 'a';
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['team']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <div class="content" style="display:none;">
            	<div class="info">
                	<div class="title"><?php echo $_smarty_tpl->tpl_vars['team']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['author'];?>
</div>
                    <div class="intro"><?php echo $_smarty_tpl->tpl_vars['team']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['teaminfo'];?>
</div>
                    <div class="msg"><?php echo $_smarty_tpl->tpl_vars['team']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['content'];?>
</div>
                </div>
                <div class="pic"><img src="<?php echo $_smarty_tpl->tpl_vars['team']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['picture'];?>
" width="273" height="694" alt="<?php echo $_smarty_tpl->tpl_vars['team']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['title'];?>
"></div>
            </div>
			<?php endfor; endif; ?>
			</div>
            <div class="switch w1200">
            	<ul>
                	<li  class="on" rel="0" id="te27">
                    	<div class="pic"><img src="tpl/images/ren1.jpg" width="60" height="60" alt="国家三级（高级）验配师"></div>
                        <div class="info">
                        	<em>李洋</em>
                            <span>国家三级（高级）验配师</span>
                        </div>
                    </li>
                    <li  rel="1" id="te26">
                    	<div class="pic"><img src="<?php echo $_smarty_tpl->tpl_vars['team']->value[0]['picture'];?>
" width="60" height="60" alt="<?php echo $_smarty_tpl->tpl_vars['team']->value[0]['title'];?>
"></div>
                        <div class="info">
                        	<em><?php echo $_smarty_tpl->tpl_vars['team']->value[0]['author'];?>
</em>
                            <span><?php echo $_smarty_tpl->tpl_vars['team']->value[0]['title'];?>
</span>
                        </div>
                    </li>
                    <li  rel="2" id="te25">
                    	<div class="pic"><img src="<?php echo $_smarty_tpl->tpl_vars['team']->value[1]['picture'];?>
" width="60" height="60" alt="<?php echo $_smarty_tpl->tpl_vars['team']->value[1]['title'];?>
"></div>
                        <div class="info">
                        	<em><?php echo $_smarty_tpl->tpl_vars['team']->value[1]['author'];?>
</em>
                            <span><?php echo $_smarty_tpl->tpl_vars['team']->value[1]['title'];?>
</span>
                        </div>
                    </li>
                    <li  rel="3" id="te24">
                    	<div class="pic"><img src="<?php echo $_smarty_tpl->tpl_vars['team']->value[2]['picture'];?>
" width="60" height="60" alt="<?php echo $_smarty_tpl->tpl_vars['team']->value[2]['title'];?>
"></div>
                        <div class="info">
                        	<em><?php echo $_smarty_tpl->tpl_vars['team']->value[2]['author'];?>
</em>
                            <span><?php echo $_smarty_tpl->tpl_vars['team']->value[2]['title'];?>
</span>
                        </div>
                    </li>
                    <li  rel="4" id="te23">
                    	<div class="pic"><img src="<?php echo $_smarty_tpl->tpl_vars['team']->value[3]['picture'];?>
" width="60" height="60" alt="<?php echo $_smarty_tpl->tpl_vars['team']->value[3]['title'];?>
"></div>
                        <div class="info">
                        	<em><?php echo $_smarty_tpl->tpl_vars['team']->value[3]['author'];?>
</em>
                            <span><?php echo $_smarty_tpl->tpl_vars['team']->value[3]['title'];?>
</span>
                        </div>
                    </li>
                 </ul>
            </div>
<!--			<div class="btn_l btn"></div>-->
<!--			<div class="btn_r btn"></div>-->
        </div>
    </div>
</div>
<!--<script>teamSwitch();</script>-->
<!--
<script>
$(function(){
	var count = 0;
	var $li = $(".globalteam .content");
	$(".btn_r").click(function(){
		count++;				
		if(count == $li.length){
			count =0;
		}
		$li.eq(count).show().siblings().hide();
		$(".ejteam .extend .switch ul li").eq(count).addClass("on").siblings().removeClass('on');
		console.log(count);
	});
	$(".btn_l").click(function(){
		count--;
		if(count == -1){
			count = $li.length-1;
		}
		console.log(count);
		$li.eq(count).show().siblings().hide();
		$(".ejteam .extend .switch ul li").eq(count).addClass("on").siblings().removeClass('on');
	});
	$(".ejteam .extend .switch ul li").click(function(){
		if(this.className!="zw-x"){
		$(this).addClass('on').siblings().removeClass("on");
		$li.eq($(this).index()).show().siblings().hide();
		count = $(this).index();
		}
	});
});

</script>
-->
<!--专家团队end-->
<!--门店展示start-->
<div class="indexstore">
	<div class="w1200">
		<div class="name">
		    <div class="cn">门店展示</div>
			<div class="en">STORE DISPLAY</div>
			<div class="line"></div>
		</div>
		<div class="extend">
			<link rel="stylesheet" href="tpl/css/swiper.css">
			<script type='text/javascript' src='tpl/js/swiper.min.js'></script>
			<section class="pc-banner">
				<div class="swiper-container">
					<div class="swiper-wrapper">
						<div class="swiper-slide swiper-slide-center none-effect">
							<a href="news_show.php?theid=<?php echo $_smarty_tpl->tpl_vars['stroe']->value[0]['id'];?>
">
								<img src="<?php echo $_smarty_tpl->tpl_vars['stroe']->value[0]['picture'];?>
" width='100%' height="">
							</a>
							<div class="layer-mask"></div>
							<div class="message">
								<div class="name"><?php echo $_smarty_tpl->tpl_vars['stroe']->value[0]['title'];?>
</div>
								<div class="address"> 
									<p>电话：<?php echo $_smarty_tpl->tpl_vars['stroe']->value[0]['tels'];?>
</p>
									<p>地址：<?php echo $_smarty_tpl->tpl_vars['stroe']->value[0]['dizhi'];?>
</p>
								</div>
								<div class='more'><a href="news_show.php?theid=<?php echo $_smarty_tpl->tpl_vars['stroe']->value[0]['id'];?>
">查看详情</a></div>
							</div>
						</div>
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['a'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['a']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['name'] = 'a';
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['stroe']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['start'] = (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['max']);
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
						<div class="swiper-slide">
							<a href="news_show.php?theid=<?php echo $_smarty_tpl->tpl_vars['stroe']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
">
								<img src="<?php echo $_smarty_tpl->tpl_vars['stroe']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['picture'];?>
" width='100%' height="">
							</a>
							<div class="layer-mask"></div>
							<div class="message">
								<div class="name"><?php echo $_smarty_tpl->tpl_vars['stroe']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['title'];?>
</div>
								<div class="address"> 
									<p>电话：<?php echo $_smarty_tpl->tpl_vars['stroe']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['tels'];?>
</p>
									<p>地址：<?php echo $_smarty_tpl->tpl_vars['stroe']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['dizhi'];?>
</p>
								</div>
								<div class='more'><a href="news_show.php?theid=<?php echo $_smarty_tpl->tpl_vars['stroe']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
">查看详情</a></div>
							</div>
						</div>
						<?php endfor; endif; ?>
					</div>
					<div class="button">
						<div class="swiper-button-prev"></div>
						<div class="swiper-button-next"></div>
					</div>
				</div>
		    </section>
            <script type="text/javascript">
			window.onload = function() {
				var swiper = new Swiper('.swiper-container',{
					autoplay: false,
					speed: 1000,
					autoplayDisableOnInteraction: false,
					loop: true,
					centeredSlides: true,
					slidesPerView: 2,
					pagination: '.swiper-pagination',
					paginationClickable: true,
					prevButton: '.swiper-button-prev',
					nextButton: '.swiper-button-next',
					onInit: function(swiper) {
						swiper.slides[2].className = "swiper-slide swiper-slide-active";
					},
					breakpoints: {
						668: {
							slidesPerView: 1,
						}
					}
				});
			}
		</script>
        </div>
    </div>
</div>
<!--门店展示end-->
<!--资讯中心start-->
<div class="indexnews">
	<div class="w1200">
		<div class="name">
		    <div class="cn">资讯中心</div>
			<div class="en">INFORMATION CENTER</div>
			<div class="line"></div>
		</div>
		<div class="extend">
			<ul>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['a'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['a']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['name'] = 'a';
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['news']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				<li style='background:url(<?php echo $_smarty_tpl->tpl_vars['news']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['picture'];?>
) 50% 0 no-repeat;background-size:100% 100%;'>
					<a href="news_show.php?theid=<?php echo $_smarty_tpl->tpl_vars['news']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
">
						<div class="date">
							<span><?php echo $_smarty_tpl->tpl_vars['news']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['istime'];?>
</span>
							<i><?php echo $_smarty_tpl->tpl_vars['news']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['istime'];?>
</i>
						</div>
						<div class="title"><?php echo $_smarty_tpl->tpl_vars['news']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['title'];?>
</div>
						<div class="content">
							<p><?php echo $_smarty_tpl->tpl_vars['news']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['content'];?>
</p>
						</div>
					</a>
				</li>
				<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['a']['rownum']<count($_smarty_tpl->tpl_vars['news']->value)){?>
				    <li class="zw-x">&nbsp;</li>
				<?php }?>
				<?php endfor; endif; ?>
			</ul>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function () {
	var month = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"];
		$(".date i").each(function () {
			var m = $(this).text().substring(5,7);
			$(this).text(m) ;
			for (var i = 0; i <= month.length;i++) {
				if ($(this).text() == i.toString()) {
					$(this).text(month[i-1]);
				}
			}
		});
	var d = $(".date span").text().substring(8,10);
	$(".date span").text(d) ;
})
</script>
<!--资讯中心end-->
<?php echo $_smarty_tpl->getSubTemplate ("tpl/comm_bottom.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>