<div class="globalbottom">
	<div class="foot-t">
		<div class="commbottom w1200">
			<div class="subnav">
				<dl>
					<dt>关于我们</dt>
					<dd><a href="about.php">公司简介</a></dd>
					<dd><a href="about.php">资质荣誉</a></dd>
				</dl>
				<dl>
					<dt>产品介绍</dt>
					{:section name=a loop=$cpname:}
					<dd><a href="news_list.php?tag=product&theid={:$cpname[a].id:}">{:$cpname[a].sortname:}</a></dd>
					{:/section:}
				</dl>
				<dl>
					<dt>新闻发布</dt>
					{:section name=a loop=$cpname2:}
					<dd><a href="news_list.php?tag=news&theid={:$cpname2[a].id:}">{:$cpname2[a].sortname:}</a></dd>
					{:/section:}
				</dl>
				<dl>
					<dt>专题板块</dt>
					{:section name=a loop=$cpname3:}
					<dd><a href="news_list.php?tag=zsfx&theid={:$cpname3[a].id:}">{:$cpname3[a].sortname:}</a></dd>
					{:/section:}
				</dl>
				<dl>
					<dt>服务网点</dt>
					{:section name=a loop=$cpname4:}
					<dd><a href="news_list.php?tag=service&theid={:$cpname4[a].id:}">{:$cpname4[a].sortname:}</a></dd>
					{:/section:}
				</dl>
				<dl>
					<dt>联系我们</dt>
					<dd><a href="intro.php?tag=contact">联系我们</a></dd>
				</dl>
			</div>
			<div class="footerCode">
				<div class='code'><img src="tpl/images/code.jpg" alt="" width="90%"></div>
				<div class='wz'>关注公众号</div>
			</div>
		</div>
	</div>
	<div class="foot-b">
		<div class="w1200">
			<div class="fleft">{:$bottominfo.content:}</div>
			<div class="fright">
				<ul>
					<li><a href="">网站地图</a></li>
					<li class="zw-x"></li>
					<li><a href="">免责申明</a></li>
					<li class="zw-x"></li>
					<li><a href="">隐私政策</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>