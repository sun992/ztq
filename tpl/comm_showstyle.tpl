<!--<div>{:$newsobj  :}</div>-->
<span><?php  var_dump($resulet);?> </span>{:if $style=="titlelist" :}
<div class="newsshow">
    <div class="thetitle">{:$newsobj.title:}</div>
    <div class="theother">发布者：{:$newsobj.author:}&nbsp;&nbsp;&nbsp;&nbsp;发布时间：{:$newsobj.istime:}&nbsp;&nbsp;&nbsp;&nbsp;信息来源：{:$newsobj.source:}</div>
    <div class="thecontent">{:$newsobj.content:}</div>
    <div class="thepageinfo">
        {:if $prenextobj[0]|@count>0:}
        上一篇：<a href="news_show.php?theid={:$prenextobj[0].id:}">{:$prenextobj[0].title:}</a><br />
        {:/if:}
        {:if $prenextobj[1]|@count>0:}
        下一篇：<a href="news_show.php?theid={:$prenextobj[1].id:}">{:$prenextobj[1].title:}</a><br />
        {:/if:}
        <a href="{:$prenextobj[2]:}">返回列表</a><br />
    </div>
</div>
{:/if:}
{:if $style=="piclist":}
<div class="newsshow">
    <div class="thetitle">{:$newsobj.title:}</div>
    <div class="thecontent">{:$newsobj.content:}</div>
    <div class="thepageinfo">
        {:if $prenextobj[0]|@count>0:}
        上一篇：<a href="news_show.php?theid={:$prenextobj[0].id:}">{:$prenextobj[0].title:}</a><br />
        {:/if:}
        {:if $prenextobj[1]|@count>0:}
        下一篇：<a href="news_show.php?theid={:$prenextobj[1].id:}">{:$prenextobj[1].title:}</a><br />
        {:/if:}
        <a href="{:$prenextobj[2]:}">返回列表</a><br />
    </div>
</div>
{:/if:}

{:if $newsobj.sort == 14:}
<div class="newsshow">
	
    <div class="thetitle">{:$newsobj.title:}</div>
    <div class="thecontent">
		<div class='img' style='width: 50%;margin:10px auto 0'><img src="{:$newsobj.picture:}" alt="" width="100%"></div>
		<div class='cont' style='text-align: center;font-size:16px;font-weight:600;color:#0caa6d;'>{:$newsobj.author:}</div>
		{:$newsobj.content:}
	</div>
    <div class="thepageinfo">
        {:if $prenextobj[0]|@count>0:}
        上一篇：<a href="news_show.php?theid={:$prenextobj[0].id:}">{:$prenextobj[0].title:}</a><br />
        {:/if:}
        {:if $prenextobj[1]|@count>0:}
        下一篇：<a href="news_show.php?theid={:$prenextobj[1].id:}">{:$prenextobj[1].title:}</a><br />
        {:/if:}
        <a href="{:$prenextobj[2]:}">返回列表</a><br />
    </div>
</div>
{:/if:}

{:if $newsobj.sort == 15:}
<div class="newsshow">
	<div class="piclist3">
	    <ul>
		   <li>
			   <div class="pic">
				   <em><img src="tpl/images/bgn2.jpg" alt="" width="100%" height=""></em>
			   </div>	
			   <div class="exend">
				   <div class="name">{:$newsobj.title:}</div>
				   <div class="info">
					   <p>电话：<span>{:$newsobj.tels:}</span></p>
					   <p>地址：<span>{:$newsobj.dizhi:}</span></p>
					   <p><a href="https://map.baidu.com/search/{:$newsobj.dizhi:}/@13150679.221723197,2796423.3856349997,19z?querytype=s&wd={:$newsobj.dizhi:}&c=75&pn=0&device_ratio=1&da_src=shareurl">查看地图<img src="tpl/images/ckdt.png" alt=""></a></p>
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
					 <div class="onepage" style='width:100%'>{:$newsobj.content:}</div>
				 </div>
				 <!--专家团队-->
				 <div class='box'>
					 {:if $newsobj.sort == 15:}
					 <div class="piclist2" style='width:100%'>
					   <ul>
						   {:section name=a loop=$news:}
						   <li>
							   <div class="pic">
								   <em><img src="{:$news[a].picture:}" alt=""></em>
								   <span><a href="news_show.php?theid={:$news[a].id:}">专家详情</a></span>
							   </div>
							   <div class="exend">
								   <div class="name">{:$news[a].author:}</div>
								   <div class="line"></div>
								   <div class="intro">{:$news[a].teaminfo:}</div>
								   <div class="msg">{:$news[a].content:}</div>
							   </div>
						   </li>
						   <li class="zw-y">&nbsp;</li>
		                   {:/section:}
						</ul>
					 </div>
					 {:/if:}
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
						  <input name="companyField" type="text" id="suggestId"  value="{:$newsobj.dizhi:}" style="overflow:auto" disabled>
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
						company[0] = "{:$newsobj.dizhi:}";			//这里写入每个选项对应的说明文字
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
        {:if $prenextobj[0]|@count>0:}
        上一篇：<a href="news_show.php?theid={:$prenextobj[0].id:}">{:$prenextobj[0].title:}</a><br />
        {:/if:}
        {:if $prenextobj[1]|@count>0:}
        下一篇：<a href="news_show.php?theid={:$prenextobj[1].id:}">{:$prenextobj[1].title:}</a><br />
        {:/if:}
        <a href="{:$prenextobj[2]:}">返回列表</a><br />
    </div>
</div>
{:/if:}