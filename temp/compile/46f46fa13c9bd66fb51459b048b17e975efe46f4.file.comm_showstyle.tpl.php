<?php /* smarty version smarty-3.1.8, created on 2019-11-01 16:43:49
         compiled from "tpl\comm_showstyle.tpl" */ ?>
<?php /*%%smartyHeaderCode:280465db90fbad904c3-61359903%%*/if(!defined('smarty_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46f46fa13c9bd66fb51459b048b17e975efe46f4' => 
    array (
      0 => 'tpl\\comm_showstyle.tpl',
      1 => 1572597826,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '280465db90fbad904c3-61359903',
  'function' => 
  array (
  ),
  'version' => 'smarty-3.1.8',
  'unifunc' => 'content_5db90fbb0270b5_57946015',
  'variables' => 
  array (
    'newsobj' => 0,
    'style' => 0,
    'prenextobj' => 0,
    'news' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%smartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5db90fbb0270b5_57946015')) {function content_5db90fbb0270b5_57946015($_smarty_tpl) {?><!--<div><?php echo $_smarty_tpl->tpl_vars['newsobj']->value;?>
</div>-->
<span><<?php ?>?php  var_dump($resulet);?<?php ?>> </span><?php if ($_smarty_tpl->tpl_vars['style']->value=="titlelist"){?>
<div class="newsshow">
    <div class="thetitle"><?php echo $_smarty_tpl->tpl_vars['newsobj']->value['title'];?>
</div>
    <div class="theother">发布者：<?php echo $_smarty_tpl->tpl_vars['newsobj']->value['author'];?>
&nbsp;&nbsp;&nbsp;&nbsp;发布时间：<?php echo $_smarty_tpl->tpl_vars['newsobj']->value['istime'];?>
&nbsp;&nbsp;&nbsp;&nbsp;信息来源：<?php echo $_smarty_tpl->tpl_vars['newsobj']->value['source'];?>
</div>
    <div class="thecontent"><?php echo $_smarty_tpl->tpl_vars['newsobj']->value['content'];?>
</div>
    <div class="thepageinfo">
        <?php if (count($_smarty_tpl->tpl_vars['prenextobj']->value[0])>0){?>
        上一篇：<a href="news_show.php?theid=<?php echo $_smarty_tpl->tpl_vars['prenextobj']->value[0]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['prenextobj']->value[0]['title'];?>
</a><br />
        <?php }?>
        <?php if (count($_smarty_tpl->tpl_vars['prenextobj']->value[1])>0){?>
        下一篇：<a href="news_show.php?theid=<?php echo $_smarty_tpl->tpl_vars['prenextobj']->value[1]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['prenextobj']->value[1]['title'];?>
</a><br />
        <?php }?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['prenextobj']->value[2];?>
">返回列表</a><br />
    </div>
</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['style']->value=="piclist"){?>
<div class="newsshow">
    <div class="thetitle"><?php echo $_smarty_tpl->tpl_vars['newsobj']->value['title'];?>
</div>
    <div class="thecontent"><?php echo $_smarty_tpl->tpl_vars['newsobj']->value['content'];?>
</div>
    <div class="thepageinfo">
        <?php if (count($_smarty_tpl->tpl_vars['prenextobj']->value[0])>0){?>
        上一篇：<a href="news_show.php?theid=<?php echo $_smarty_tpl->tpl_vars['prenextobj']->value[0]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['prenextobj']->value[0]['title'];?>
</a><br />
        <?php }?>
        <?php if (count($_smarty_tpl->tpl_vars['prenextobj']->value[1])>0){?>
        下一篇：<a href="news_show.php?theid=<?php echo $_smarty_tpl->tpl_vars['prenextobj']->value[1]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['prenextobj']->value[1]['title'];?>
</a><br />
        <?php }?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['prenextobj']->value[2];?>
">返回列表</a><br />
    </div>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['newsobj']->value['sort']==14){?>
<div class="newsshow">
	
    <div class="thetitle"><?php echo $_smarty_tpl->tpl_vars['newsobj']->value['title'];?>
</div>
    <div class="thecontent">
		<div class='img' style='width: 50%;margin:10px auto 0'><img src="<?php echo $_smarty_tpl->tpl_vars['newsobj']->value['picture'];?>
" alt="" width="100%"></div>
		<div class='cont' style='text-align: center;font-size:16px;font-weight:600;color:#0caa6d;'><?php echo $_smarty_tpl->tpl_vars['newsobj']->value['author'];?>
</div>
		<?php echo $_smarty_tpl->tpl_vars['newsobj']->value['content'];?>

	</div>
    <div class="thepageinfo">
        <?php if (count($_smarty_tpl->tpl_vars['prenextobj']->value[0])>0){?>
        上一篇：<a href="news_show.php?theid=<?php echo $_smarty_tpl->tpl_vars['prenextobj']->value[0]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['prenextobj']->value[0]['title'];?>
</a><br />
        <?php }?>
        <?php if (count($_smarty_tpl->tpl_vars['prenextobj']->value[1])>0){?>
        下一篇：<a href="news_show.php?theid=<?php echo $_smarty_tpl->tpl_vars['prenextobj']->value[1]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['prenextobj']->value[1]['title'];?>
</a><br />
        <?php }?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['prenextobj']->value[2];?>
">返回列表</a><br />
    </div>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['newsobj']->value['sort']==15){?>
<div class="newsshow">
	<div class="piclist3">
	    <ul>
		   <li>
			   <div class="pic">
				   <em><img src="tpl/images/bgn2.jpg" alt="" width="100%" height=""></em>
			   </div>	
			   <div class="exend">
				   <div class="name"><?php echo $_smarty_tpl->tpl_vars['newsobj']->value['title'];?>
</div>
				   <div class="info">
					   <p>电话：<span><?php echo $_smarty_tpl->tpl_vars['newsobj']->value['tels'];?>
</span></p>
					   <p>地址：<span><?php echo $_smarty_tpl->tpl_vars['newsobj']->value['dizhi'];?>
</span></p>
					   <p><a href="https://map.baidu.com/search/<?php echo $_smarty_tpl->tpl_vars['newsobj']->value['dizhi'];?>
/@13150679.221723197,2796423.3856349997,19z?querytype=s&wd=<?php echo $_smarty_tpl->tpl_vars['newsobj']->value['dizhi'];?>
&c=75&pn=0&device_ratio=1&da_src=shareurl">查看地图<img src="tpl/images/ckdt.png" alt=""></a></p>
				   </div>	
			   </div>
		   </li>
	    </ul>
	    <div class="notice">
			<div class="notice-tit" id="notice-tit">
				<ul>
				   <li class="selected">中心简介</li>
				   <li>专家团队</li>
				   <li>交通路线</li>
				</ul>
			</div>
			<div class="notice-con" id="notice-con">
			     <!--中心简介-->
				 <div style="display:block" class='box'>
					 <div class="onepage" style='width:100%'><?php echo $_smarty_tpl->tpl_vars['newsobj']->value['content'];?>
</div>
				 </div>
				 <!--专家团队-->
				 <div class='box'>
					 <?php if ($_smarty_tpl->tpl_vars['newsobj']->value['sort']==15){?>
					 <div class="piclist2" style='width:100%'>
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
						   <li>
							   <div class="pic">
								   <em><img src="<?php echo $_smarty_tpl->tpl_vars['news']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['picture'];?>
" alt=""></em>
								   <span><a href="news_show.php?theid=<?php echo $_smarty_tpl->tpl_vars['news']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
">专家详情</a></span>
							   </div>
							   <div class="exend">
								   <div class="name"><?php echo $_smarty_tpl->tpl_vars['news']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['author'];?>
</div>
								   <div class="line"></div>
								   <div class="intro"><?php echo $_smarty_tpl->tpl_vars['news']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['teaminfo'];?>
</div>
								   <div class="msg"><?php echo $_smarty_tpl->tpl_vars['news']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['content'];?>
</div>
							   </div>
						   </li>
						   <li class="zw-y">&nbsp;</li>
		                   <?php endfor; endif; ?>
						</ul>
					 </div>
					 <?php }?>
				 </div>
				 <!--查看路线-->
				 <div class='box'>
<!--					 <p style='text-align: center;margin:2.5% 1%;'><img src="tpl/images/map.jpg" alt=""></p>-->
					 <form name="companyForm" class="companysel">
<!--						  <span>选择公司位置：</span>-->
<!--						  <select name="companyPick" OnChange="companyReveal()">-->
<!--							<option value="0"> 厦门总部 </option>-->
<!--							<option value="1"> 南京分部 </option>-->
<!--							<option value="2"> 新加坡分部 </option>-->
<!--						  </select>-->
						  <span>地址：</span>
						  <input name="companyField" type="text" id="suggestId"  value="<?php echo $_smarty_tpl->tpl_vars['newsobj']->value['dizhi'];?>
" style="overflow:auto" disabled>
					 </form>
					 <div id="l-map" style="width: 100%; height: 400px"></div> 
					 <script type="text/javascript">
						// 百度地图API功能
						function G(id) {
							return document.getElementById(id);
						}
						var map = new BMap.Map("l-map");
						//map.centerAndZoom("厦门",12);    // 初始化地图,设置城市和地图级别。
						map.enableScrollWheelZoom();   	//启用滚轮放大缩小，默认禁用
						map.enableContinuousZoom();    	//启用地图惯性拖拽，默认禁用
						var local = new BMap.LocalSearch(map, {
							renderOptions:{map: map}
						});
						var msearch = document.getElementById("suggestId").value;
						local.search(msearch);  //百度地图关键字检索 默认加载一次
						var company = new Array(); 
						company[0] = "<?php echo $_smarty_tpl->tpl_vars['newsobj']->value['dizhi'];?>
";			//这里写入每个选项对应的说明文字
//						company[1] = "厦门市某某某有限公司";
//						company[2] = "51 Changi Business Park Central 2#06-09 The Signature, Singapore 486066";	   

						function companyReveal() {	
						  var companyindex = document.companyForm.companyPick.selectedIndex;//取得当前下拉菜单选定项目的序号
						  helpmsg = company[companyindex];//根据序号取得当前选项的说明
						  document.companyForm.companyField.value = helpmsg//将说明写进文框
						  var msearch = document.getElementById("suggestId").value;
						  local.search(msearch);  //百度地图关键字检索 触发加载
						}	
					 </script>
				  </div>
			 </div>
		</div>
	    <style>
			.notice {width: 100%;height: auto;overflow: hidden;/* 点击导航栏第一个或最后一个标签时，超出的部分隐藏*/box-sizing: border-box;}
			.notice-tit {position: relative;height: 28px;}
			.notice-tit ul {position: absolute;width: 100%;left: -1px;/* 当点击第一个导航栏标签时，左边边框会与大盒子的边框发生叠加，解决的方法利用定位让两个边框重合叠加在一起 */height: 30px;}
			.notice-tit ul li {float: left;width:33.1%;padding: 0 1px;height:35px;text-align: center;line-height: 35px;cursor: pointer;margin:0;border-bottom: 1px solid #ddd;font-size: 17px;color:#000;}
			.notice-tit ul li.selected {border-bottom: 1px solid #0caa6d;color:#0caa6d;padding: 0;}
			.notice-con .box {height:auto;padding: 20px 0;display: none;}
			
			#l-map {height: 500px;width: 100%;}
            #r-result {width: 100%;}
            form.companysel {width: 100%;margin: 0px auto 20px;}
            form.companysel span {font-size: 16px;color: #000;height: 40px;line-height: 40px;display: inline-block;padding: 0 10px}
            form.companysel select {width: 250px;height: 40px;line-height: 40px;color: #000;font-size: 14px;padding: 0 10px;border-radius: 5px;-webkit-border-radius: 5px;cursor: pointer;}
            form.companysel input {width: 70%;height: 40px;line-height: 40px;color: #000;font-size: 14px;border-radius: 5px;display: inline-block;-webkit-border-radius: 5px;cursor: pointer;background: #fff;border: 1px #ccc solid;padding: 0 10px}
            /*.BMap_mask{left:0 !important;width: 100% !important;}*/
	   </style>
	    <script>
			 $('#notice-tit li').click(function() {
			 $(this).siblings().removeClass('selected');
			 $(this).addClass('selected');
			 var index = $(this).index();  // 获取当前点击元素的下标
			 // alert(index);
			 $('#notice-con .box').hide();
			 $('#notice-con .box').eq(index).show();
			})
	   </script>
    </div>
    <div class="thepageinfo">
        <?php if (count($_smarty_tpl->tpl_vars['prenextobj']->value[0])>0){?>
        上一篇：<a href="news_show.php?theid=<?php echo $_smarty_tpl->tpl_vars['prenextobj']->value[0]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['prenextobj']->value[0]['title'];?>
</a><br />
        <?php }?>
        <?php if (count($_smarty_tpl->tpl_vars['prenextobj']->value[1])>0){?>
        下一篇：<a href="news_show.php?theid=<?php echo $_smarty_tpl->tpl_vars['prenextobj']->value[1]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['prenextobj']->value[1]['title'];?>
</a><br />
        <?php }?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['prenextobj']->value[2];?>
">返回列表</a><br />
    </div>
</div>
<?php }?><?php }} ?>