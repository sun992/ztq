//设置表格颜色、最小高度
function settablecolor(){
	var isSetColor = arguments[0] ? 0 : 1
	//设置表格颜色
	if (isSetColor > 0) {
		var theTable = $("table");
		var theTr, thetd, thecolor, n;
		for (var i = 0; i < theTable.length; i++) {
			theTr = $(theTable[i]).find("tr");
			n = 1;
			for (var j = 0; j < theTr.length; j++) {
				var thetd = $(theTr[j]).find("td");
				var theth = $(theTr[j]).find("th");
				if (thetd.length > 0) {
					if (n == 0) {
						thecolor = "#ffffff";
					}
					else {
						thecolor = "#e6e6e6";
					}
					for (var s = 0; s < thetd.length; s++) {
						thetd[s].style.backgroundColor = thecolor;
						$(thetd[s]).attr("morenys", thecolor);
					}
					for (var s = 0; s < theth.length; s++) {
						theth[s].style.backgroundColor = thecolor;
						$(theth[s]).attr("morenys", thecolor);
					}
					
					$(theTr[j]).hover(function(){
						var thetd = $(this).find("td");
						var theth = $(this).find("th");
						for (var s = 0; s < thetd.length; s++) {
							thetd[s].style.backgroundColor = "#FFFFCC";
						}
						for (var s = 0; s < theth.length; s++) {
							theth[s].style.backgroundColor = "#FFFFCC";
						}
					}, function(){
						var thetd = $(this).find("td");
						var theth = $(this).find("th");
						for (var s = 0; s < thetd.length; s++) {
							thetd[s].style.backgroundColor = $(thetd[s]).attr("morenys");
						}
						for (var s = 0; s < theth.length; s++) {
							theth[s].style.backgroundColor = $(theth[s]).attr("morenys");
						}
					});
					if (n == 1) {
						n = 0;
					}
					else {
						n = 1;
					}
				}
			}
		}
	}
	//设置占位高度
	if ($(document.body).outerHeight(true) < $(document).height()) {
		$("body").append("<div id='rightZw'>&nbsp;</div>");
		$("#rightZw").css({
			"top": "100%"
		});
	}
}

//验证字符串是否只含数字，字母和下划线 是则返回True 否则返回False
function isHf(str){
	var reg = /[^A-Za-z0-9_]/g;
	if (reg.test(str)) {
		return (false);
	}
	else {
		return (true);
	}
}

//翻页的跳转
function gototheurl(TheSelect){
	location.href = TheSelect.value;
}

//全选
function selectall(name){
	var n = document.getElementsByName(name).length;
	for (var i = 0; i < n; i++) {document.getElementsByName(name)[i].checked = true;
	}
}
//全不选
function unselectall(name){
	var n = document.getElementsByName(name).length;
	for (var i = 0; i < n; i++) {
		document.getElementsByName(name)[i].checked = false;
	}
}
//反选
function antiselectall(name){
	var n = document.getElementsByName(name).length;
	for (var i = 0; i < n; i++) {
		var e = document.getElementsByName(name)[i];
		if (e.checked) {
			e.checked = false;
		}
		else {
			e.checked = true;
		}
	}
}

//判读是否有选中的复选框（有则返回用"-"分割的值的字符串）
function ifChecked(chkboxname){
	var myValue = "";
	for (var i = 0; i < document.getElementsByName(chkboxname).length; i++) {
		var e = document.getElementsByName(chkboxname)[i];
		if (e.checked) {
			if (myValue == "") {
				myValue = e.value;
			}
			else {
				myValue = myValue + "-" + e.value;
			}
		}
	}
	return myValue;
}

function ifChecked2(chkboxname){
	var myValue = "";
	for (var i = 0; i < document.getElementsByName(chkboxname).length; i++) {
		var e = document.getElementsByName(chkboxname)[i];
		if (e.checked) {
			if (myValue == "") {
				myValue = e.value;
			}
			else {
				alert("最多选择一条信息");
				return;
			}
		}
	}
	return myValue;
}

//警告框
function theWarn(){
	var mess = "你确定要执行吗？执行后无法恢复!";
	var question = confirm(mess);
	if (question == '0') {
		return false;
	}
	else {
		return true;
	}
}

//处理选中的项
function handleselect(name, theurl, target){
	var thelist = ifChecked(name);
	if (thelist != "") {
		if (theWarn()) {
			if (theurl.indexOf("?") != -1) {
				theurl += "&thelist=" + thelist + "&rad=" + Math.random();
			}
			else {
				theurl = theurl + "?thelist=" + thelist + "&rad=" + Math.random();
			}
			window.open(theurl, target);
		}
	}
	else {
		alert("请先选择需要处理的项目");
	}
}

// 参数说明
// s_Type : 文件类型，可用值为"image","flash","media","file"
// s_Link : 文件上传后，用于接收上传文件路径文件名的表单名
function showUploadDialog(s_Type, s_Link){
	//以下style=coolblue,值可以依据实际需要修改为您的样式名,通过此样式的后台设置来达到控制允许上传文件类型及文件大小
	var DiZhi = "../../BianJi/dialog/i_upload.htm?style=coolblue";
	var s_Thumbnail='';
	// s_Thumbnail : 文件上传后，用于接收上传图片时所产生的缩略图文件的路径文件名的表单名，当未生成缩略图时，返回空值，原图用s_Link参数接收，此参数专用于缩略图
	DiZhi += "&type=" + s_Type + "&link=" + s_Link + "&thumbnail=" + s_Thumbnail;
	DiZhi += "&rnd=" + Math.random()
	var arr = showmodalDialog(DiZhi, window, "dialogWidth:0px;dialogHeight:0px;help:no;scroll:no;status:no");
}

//设置单选框
function setDxk(chkboxname, theValue){
	var e;
	for (var i = 0; i < document.getElementsByName(chkboxname).length; i++) {
		e = document.getElementsByName(chkboxname)[i];
		if (e.value == theValue) {
			e.checked = true;
		}
	}
}

//设置复选框
function setFxk(theName, theValue){
	var e;
	var chkboxname = "temp" + theName;
	if (theValue == "") {
		var thelist = '';
		for (var i = 0; i < document.getElementsByName(chkboxname).length; i++) {
			e = document.getElementsByName(chkboxname)[i];
			if (e.checked) {
				if (thelist != '') {
					thelist += ",";
				}
				thelist += e.value;
			}
		}
		document.getElementById(theName).value = thelist;
	}
	else {
		var thearray = theValue.split(",");
		for (var i = 0; i < thearray.length; i++) {
			for (var i = 0; i < document.getElementsByName(chkboxname).length; i++) {
				e = document.getElementsByName(chkboxname)[i];
				if (e.value == thearray[i]) {
					e.checked = true;
				}
			}
		}
	}
}

function copynews( name ,tag ){
	var thelist = ifChecked2(name);
	if (thelist != "") {
		//alert( thelist );
		$.ajax({
			url: "../../ajax.php?action=copynews",
			type: "POST",
			data: "theid=" + thelist +"&tag=" + tag,
			dataType: "html",
			async: false,
			beforeSend: function(){
				
			},
			success: function(data){
				if(data==1){
					alert("复制成功!!!");
					location.reload(); 
				}else{
					alert("复制失败!!!");
				}
			}
		});
	}
	else {
		alert("请先选择需要处理的项目");
	}
}

//处理选中的项
function setselectsort(){
	var thelist = ifChecked(name);
	var thesort =$("#theproid").val();
	$.ajax({
		  url: "../news/theaction.php?action=lookSelectsort",
		  type: "POST",
		  data: "thesort=" + thesort,
		  dataType: "html",
		  async: false,
		  beforeSend: function(){
		  },
		  success: function(data){
			$("#thelooklist").html(data);
		  }
	  });
	
}

