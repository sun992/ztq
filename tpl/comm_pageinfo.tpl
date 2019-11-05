{:if $pageinfo.pagelist|@count>1 :}
<div class="pageinfo">
	{:if $pageinfo.frist=="":}
	&nbsp;<span>首页</span>&nbsp;
	&nbsp;<span>上一页</span>
	{:else:}
	<a href="{:$pageinfo.frist:}">&nbsp;首页</a>&nbsp;
	<a href="{:$pageinfo.pre:}">&nbsp;上一页</a>
	{:/if:}
	
	{:if $pageinfo.end=="":}
	&nbsp;<span>下一页</span>&nbsp;
	&nbsp;<span>尾页</span>&nbsp;
	{:else:}
	&nbsp;<a href="{:$pageinfo.next:}">下一页&nbsp;</a>
	&nbsp;<a href="{:$pageinfo.end:}">尾页&nbsp;</a>
	{:/if:}
	
	&nbsp;<span>总计：{:$pageinfo.maxpage:}页 </span>&nbsp;<span>{:$pageinfo.recordcount:}条记录</span>
	&nbsp;跳转至&nbsp; {:assign var=pagelist value=$pageinfo.pagelist:}
	<select onchange="gototheurl(this);">
	{:section name=a loop=$pagelist:}
		<option value="{:$pagelist[a].url:}"{:if $pagelist[a].isselected:} selected="selected"{:/if:}>{:$pagelist[a].num:}</option>
	{:/section:}
	</select>&nbsp;页
</div>
{:/if:}
