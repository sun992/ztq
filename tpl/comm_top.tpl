<script type="text/javascript" src="tpl/js/iscroll.js"></script>
<script type="text/javascript" src="tpl/js/jquery.drawer.min.js"></script>
<div class="globaltop">
	<div class="w1200">
	<div class="topLeft">20年听力连锁行业持续创新的领航者</div>
<!--	<div class="topRight"><a href="tel:{:$toptel.content:}"><div class="tel">{:$toptel.content:}</div></a></div>-->
	<div class="topRight"><div class="tel">{:$toptel.content:}</div></div>
	</div>
</div>
<div class="globalheader">
	<div class="w1200">
		<div class="globallogo">
		<a href="index.php"><img src="tpl/images/logo.png" alt="XBOX" width='402' height="40"></a>
		</div>
		<div class="globalnav">
			<ul class='nav'>
			  <li {:if $globalnav[0]==1:}class="cur"{:else:}onmouseover="this.className='cur'" onMouseOut="this.className=''"{:/if:}><a href="index.php">首页</a></li>
			  <li {:if $globalnav[1]==1:}class="cur"{:else:}onmouseover="this.className='cur'" onMouseOut="this.className=''"{:/if:}><a href="about.php">关于我们</a></li>
			  <li {:if $globalnav[2]==1:}class="cur"{:else:}onmouseover="this.className='cur'" onMouseOut="this.className=''"{:/if:}><a href="news_list.php?tag=product&theid=5">产品介绍</a></li>
			  <li {:if $globalnav[3]==1:}class="cur"{:else:}onmouseover="this.className='cur'" onMouseOut="this.className=''"{:/if:}><a href="news_list.php?tag=news&theid=8">新闻发布</a></li>
			  <li {:if $globalnav[4]==1:}class="cur"{:else:}onmouseover="this.className='cur'" onMouseOut="this.className=''"{:/if:}><a href="news_list.php?tag=zsfx&theid=12">专题板块</a></li>
			  <li {:if $globalnav[5]==1:}class="cur"{:else:}onmouseover="this.className='cur'" onMouseOut="this.className=''"{:/if:}><a href="news_list.php?tag=service&theid=15">服务网点</a></li>
			  <li {:if $globalnav[6]==1:}class="cur"{:else:}onmouseover="this.className='cur'" onMouseOut="this.className=''"{:/if:}><a href="intro.php?tag=contact">联系我们</a></li>
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
</html>