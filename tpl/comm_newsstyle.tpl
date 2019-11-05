<div class="newslist">
    {:if $style=="titlelist":}
    <div class="{:$style:}">
        {:if $datalist|@count>0:}
        <ul>
            {:section name=a loop=$datalist:}                    
			<li>
				<div class="time">
					<em>{:$datalist[a].istime:}</em>
					<span>{:$datalist[a].istime:}</span>
				 </div>
				<div class="extend">
					<em><a href="news_show.php?theid={:$datalist[a].id:}" title="{:$datalist[a].title:}" target="_blank">{:$datalist[a].title:}</a></em>
					<span><a href="news_show.php?theid={:$datalist[a].id:}" title="" target="_blank">{:$datalist[a].content:}</a></span>
				</div>
			</li>
            {:/section:}
        </ul>
        {:/if:}
    </div>
    {:/if:}
      
    
    {:if $style=="piclist":}
    <div class="piclist">
        {:if $datalist|@count>0:}
        <ul>
            {:section name=a loop=$datalist:}
                <li>
                    <a href="news_show.php?theid={:$datalist[a].id:}" title="{:$datalist[a].title:}">
						<img src="{:$datalist[a].picture:}" width="" height="" alt="{:$datalist[a].title:}" />
						<p>{:$datalist[a].marker:}</p>
						<span>{:$datalist[a].title:}</span>
					</a>
                </li>
                {:if $smarty.section.a.rownum is div by 4:}
                    {:if $smarty.section.a.rownum<$datalist|@count:}
                    <li class="zw-y">&nbsp;</li>
                    {:/if:}
                {:else:}
                    <li class="zw-x">&nbsp;</li>
                {:/if:}
            {:/section:}
        </ul>
        {:/if:}
    </div>
    {:/if:}


    {:if $smarty.request.theid == 14:}
    <div class="piclist2">
        <ul>
            {:section name=a loop=$datalist:}
			   <li>
				   <div class="pic">
					   <em><img src="{:$datalist[a].picture2:}" alt=""></em>
					   <span><a href="news_show.php?theid={:$datalist[a].id:}">专家详情</a></span>
				   </div>
				   <div class="exend">
					   <div class="name">{:$datalist[a].author:}</div>
					   <div class="line"></div>
					   <div class="intro">{:$datalist[a].teaminfo:}</div>
					   <div class="msg">
						  {:$datalist[a].content:}
					   </div>
				   </div>
			   </li>
               <li class="zw-y">&nbsp;</li>
            {:/section:}
        </ul>
    </div>
    {:/if:}

    {:if $smarty.request.theid == 15:}
    <div class="piclist3">
        {:if $datalist|@count>0:}
        <ul>
            {:section name=a loop=$datalist:}
			   <li>
				   <div class="pic">
					   <em><img src="{:$datalist[a].picture:}" alt="" width="100%" height=""></em>
				   </div>	
				   <div class="exend">
					   <div class="name">{:$datalist[a].title:}</div>
					   <div class="info">
						   <p>电话：<span>{:$datalist[a].tels:}</span></p>
						   <p>地址：<span>{:$datalist[a].dizhi:}</span></p>
					   </div>	
					   <div class="thebtn">
						   <span class='understand'><a href="news_show.php?theid={:$datalist[a].id:}">了解详情</a></span>
					   </div>
				   </div>
			   </li>
               <li class="zw-y">&nbsp;</li>
            {:/section:}
        </ul>
        {:/if:}
    </div>
    {:/if:}
</div>
