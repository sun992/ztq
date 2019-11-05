//专家团队切换
function teamSwitch(){	
	var ban = document.getElementById("ban");
    var dianUl = document.getElementById("dianUl");
    var imgs = document.getElementsByTagName("img");
    var lis = dianUl.getElementsByTagName("li");
    var index = 0;//放图片的索引号 
  $(".ejteam .extend .switch ul li").click(function(){
	if(this.className!="zw-x"){
		$(".ejteam .extend .switch ul li").removeClass("on");
		this.className="on";
		$(".ejteam .extend .content").hide();
		var content=$(".ejteam .extend .content");
		$(content[$(this).attr("rel")]).show();
	}
  });
}
//  if( getParam("theid")!==null ){
//	 $(".ejteam .extend .switch ul li").removeClass("on");
//	 $(".ejteam .extend .content").hide();
//	 $("#te"+getParam("theid")).addClass("on");
//	 var content=$(".ejteam .extend .content");
//	 $(content[$("#te"+getParam("theid")).attr("rel")]).show();
//  }

//联系我们信息提交
function addmsg(){
//	$('#addMessage').click(function() {
		nickname=$("#add_nickname").attr("value");
		email=$("#add_email").attr("value");
		tel=$("#add_tel").attr("value");
//		subject=$("#add_subject").attr("value");
		content=$("#add_content").attr("value");
	    console.log(nickname);
	    console.log(email);
	    console.log(tel);
//	    console.log(subject);
		
		if (!isName( nickname )) {
			alert("请填写你的名字！");
			$("#add_nickname").focus();
			return false;
		}
		
		if( !isEmail( email ) ){
		  alert("请填写正确的邮箱！");
		  $("#add_email").focus();
		  return false;
		}
		
		if (!isTel( tel ) && !isPhone( tel ) ) {
			alert("请填写您的电话号码（区号+号码/手机号码）！");
			$("#add_tel").focus();
			return false;
		}
		
//		if( subject.length < 1 ){
//		  alert("Please fill in the correct subject items！");
//		  $("#add_subject").focus();
//		  return false;
//		}
//		
//	     if (content.length < 5) {
//		  alert("Please fill in your requirements and suggestions！");
//		  $("#add_content").focus();
//		  return false;
//	    }
	    
		$.ajax({
			url: "ajax.php?action=addmsg",
			type: "POST",
			data: "nickname=" + nickname +"&email=" + email +"&tel=" + tel +"&content=" + content,
			dataType: "html",
			async: false,
			beforeSend: function(){
				//$('#getMessagecode').html("发送中...");
			},
			success: function(data){
//				alert(data);
				switch (data){
					case "1":
						alert("提交成功，我们会尽快与您联系！");
						location.href = "index.php";
					break;
					case "2":
						alert("请将信息控制在500字以内！");
						$("#rn_content").focus();
					break;
					case "0":
						alert("请不要再次提交，稍后再试！");
						location.reload(); 
					break;
					default: 
					location.reload(); 
				}
			}
		});
		
//	});
}


function isEmail(str){
 var reg=/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((.[a-zA-Z0-9_-]{2,3}){1,2})$/;
 return reg.test(str);
}


function isName(str){
  var reg =/^[\u4e00-\u9fa5 ]{2,20}$/;
  return reg.test(str);
}

function isEnName(str){
  var reg =/^[a-z\/ ]{2,20}$/i;
  return reg.test(str);
}

function isTel(str){
  var reg = /^0\d{2,3}-?\d{7,8}$/;
  return reg.test(str);
}

function isPhone(str){
  var reg = /^1(3|4|5|7|8)\d{9}$/;
  return reg.test(str);
}

function isUsername( str ){
	var reg=/^[a-zA-Z]\w*$/i;
	return reg.test(str);
}


//翻页的跳转
function gototheurl(TheSelect){
	location.href = TheSelect.value;
}

//限制内容图片大小
function resize(o,w) {
	if (o.width>w) {
	o.style.width=w+'px';
	o.style.height='auto';
	}
}

//加入收藏(调用javascript:addfavorite();)
function shoucang(sTitle, sURL) {
	try {
		window.external.addFavorite(sURL, sTitle);
	} catch (e) {
		try {
			window.sidebar.addPanel(sTitle, sURL, "");
		} catch (e) {
			alert("加入收藏失败，请使用Ctrl+D进行添加");
		}
	}
}

 
//设为首页(调用javascript:setHome(this,window.location);)
function SetHome(obj, vrl) {
	try {
		obj.style.behavior = 'url(#default#homepage)';
		obj.setHomePage(vrl);
	} catch (e) {
		if (window.netscape) {
			try {
				netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
			} catch (e) {
				alert("此操作被浏览器拒绝！\n请在浏览器地址栏输入“about:config”并回车\n然后将 [signed.applets.codebase_principal_support]的值设置为'true',双击即可。");
			}
			var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
			prefs.setCharPref('browser.startup.homepage', vrl);
		} else {
			alert("您的浏览器不支持，请按照下面步骤操作：1.打开浏览器设置。2.点击设置网页。3.输入：" + vrl + "点击确定。");
		}
	}
}


//向左滚动
function ScrollImgLeft() {
    var speed = 20
    var scroll_begin = document.getElementById("scroll_begin");
    var scroll_end = document.getElementById("scroll_end");
    var scroll_div = document.getElementById("scroll_div");
    scroll_end.innerHTML = scroll_begin.innerHTML
    function Marquee() {
        if (scroll_end.offsetWidth - scroll_div.scrollLeft <= 0)
            scroll_div.scrollLeft -= scroll_begin.offsetWidth
        else
            scroll_div.scrollLeft++
    }
    var MyMar = setInterval(Marquee, speed)
    scroll_div.onmouseover = function() {
        clearInterval(MyMar)
    }
    scroll_div.onmouseout = function() {
        MyMar = setInterval(Marquee, speed);
    }
}

//顶部搜索
function goToSearch(theform) {
    if (theform.thetxt.value == "请输入您要搜索的关键字" || theform.thetxt.value == "") {
        alert("请输入您要搜索的关键字");
        return false;
    } else {
        location.href = 'news_list.php?tag=search&thetxt=' + encodeURIComponent(theform.thetxt.value);
        return false;
    }
}

//业务项目
function business(){
	$(".business ul li").mouseover(function(){
		if(this.className!="zw-x"){										   
		$(".business ul li").removeClass("on");
		}
		if(this.className!="zw-x"){
		 this.className="on";
		}
   });
}