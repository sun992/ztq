<?php /* smarty version smarty-3.1.8, created on 2019-10-30 11:31:06
         compiled from "tpl\comm_top.tpl" */ ?>
<?php /*%%smartyHeaderCode:214145db8ffaf87bf84-41657748%%*/if(!defined('smarty_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '09ea5298030a0988016019420822e6aa7700bb01' => 
    array (
      0 => 'tpl\\comm_top.tpl',
      1 => 1572406222,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '214145db8ffaf87bf84-41657748',
  'function' => 
  array (
  ),
  'version' => 'smarty-3.1.8',
  'unifunc' => 'content_5db8ffaf903198_87648253',
  'variables' => 
  array (
    'toptel' => 0,
    'globalnav' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%smartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5db8ffaf903198_87648253')) {function content_5db8ffaf903198_87648253($_smarty_tpl) {?><script type="text/javascript" src="tpl/js/iscroll.js"></script>
<script type="text/javascript" src="tpl/js/jquery.drawer.min.js"></script>
<div class="globaltop">
	<div class="w1200">
	<div class="topLeft">20年听力连锁行业持续创新的领航者</div>
<!--	<div class="topRight"><a href="tel:<?php echo $_smarty_tpl->tpl_vars['toptel']->value['content'];?>
"><div class="tel"><?php echo $_smarty_tpl->tpl_vars['toptel']->value['content'];?>
</div></a></div>-->
	<div class="topRight"><div class="tel"><?php echo $_smarty_tpl->tpl_vars['toptel']->value['content'];?>
</div></div>
	</div>
</div>
<div class="globalheader">
	<div class="w1200">
		<div class="globallogo">
		<a href="index.php"><img src="tpl/images/logo.png" alt="XBOX" width='402' height="40"></a>
		</div>
		<div class="globalnav">
			<ul class='nav'>
			  <li <?php if ($_smarty_tpl->tpl_vars['globalnav']->value[0]==1){?>class="cur"<?php }else{ ?>onmouseover="this.className='cur'" onMouseOut="this.className=''"<?php }?>><a href="index.php">首页</a></li>
			  <li <?php if ($_smarty_tpl->tpl_vars['globalnav']->value[1]==1){?>class="cur"<?php }else{ ?>onmouseover="this.className='cur'" onMouseOut="this.className=''"<?php }?>><a href="about.php">关于我们</a></li>
			  <li <?php if ($_smarty_tpl->tpl_vars['globalnav']->value[2]==1){?>class="cur"<?php }else{ ?>onmouseover="this.className='cur'" onMouseOut="this.className=''"<?php }?>><a href="news_list.php?tag=product&theid=5">产品介绍</a></li>
			  <li <?php if ($_smarty_tpl->tpl_vars['globalnav']->value[3]==1){?>class="cur"<?php }else{ ?>onmouseover="this.className='cur'" onMouseOut="this.className=''"<?php }?>><a href="news_list.php?tag=news&theid=8">新闻发布</a></li>
			  <li <?php if ($_smarty_tpl->tpl_vars['globalnav']->value[4]==1){?>class="cur"<?php }else{ ?>onmouseover="this.className='cur'" onMouseOut="this.className=''"<?php }?>><a href="news_list.php?tag=zsfx&theid=12">专题板块</a></li>
			  <li <?php if ($_smarty_tpl->tpl_vars['globalnav']->value[5]==1){?>class="cur"<?php }else{ ?>onmouseover="this.className='cur'" onMouseOut="this.className=''"<?php }?>><a href="news_list.php?tag=service&theid=15">服务网点</a></li>
			  <li <?php if ($_smarty_tpl->tpl_vars['globalnav']->value[6]==1){?>class="cur"<?php }else{ ?>onmouseover="this.className='cur'" onMouseOut="this.className=''"<?php }?>><a href="intro.php?tag=contact">联系我们</a></li>
			</ul>
		</div>
	</div>
	<div class="drawer-toggle drawer-hamberger"><span></span></div>
	<div class="drawer-main drawer-default">
	   <nav class="drawer-nav" role="navigation">
		   <ul class="drawer-nav-list">
			  <li class="cur"><a href="index.php">首页</a></li>
			  <li>
				  <a href="about.php"><p>关于我们</p></a>
			   </li>
			  <li>
				  <a href="news_list.php?tag=product&theid=5"><p>产品介绍</p></a>
			  </li>
			  <li>
				  <a href="news_list.php?tag=news&theid=8"><p>新闻发布</p></a>
			  </li>
			  <li>
				  <a href="news_list.php?tag=zsfx&theid=12"><p>专题板块</p></a>
			  </li>
			  <li>
				  <a href="news_list.php?tag=service&theid=15"><p>服务网点</p></a>
			  </li>
			  <li>
				  <a href="intro.php?tag=contact"><p>联系我们</p></a>
			  </li>
		   </ul>
		   <div class="topcode" style="text-align: center;">
			   <em><img src="tpl/images/code.jpg" alt="" style="margin-left:12px;" width="100px" height="100px"></em>
			   <p style="margin-left:10px;margin-top:5px;">微信公众号</p>
		   </div>
	   </nav>
	</div>
</div>
<script>
$(document).ready(function(){
	$('.drawer').drawer();
	$('.js-trigger').click(function(){
	  $('.drawer').drawer("open");
	});
});
</script> 
<!--头部分end-->
</body>
</html><?php }} ?>