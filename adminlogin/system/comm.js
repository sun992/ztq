// JavaScript Document
//弹出框
function showModal(ie8Option)
{
	var ieHeight = ie8Option.height;
	if(navigator.userAgent.indexOf("MSIE 8.")>0)
	{}
	else
	{
		if(navigator.userAgent.indexOf("MSIE 7.")>0)
		{ieHeight -= 10;}
		else
		{ieHeight += 60;}
	}
	if(ie8Option.url.indexOf("?")!=-1)
	{ie8Option.url=ie8Option.url+"&rnd="+Math.random()}
	else
	{ie8Option.url=ie8Option.url+"?rnd="+Math.random()}
	
	var retVal
	if (navigator.appName=="Microsoft Internet Explorer")
	{
		Cs="dialogWidth:" + ie8Option.width + "px; dialogHeight:" + ieHeight+ "px;";
		Cs=Cs+"directories:no; localtion:no; menubar:no; status=no;toolbar=no;scrollbars:yes;Resizeable=no;scroll:yes";
		retVal = window.showModalDialog(ie8Option.url,window,Cs);
	}
	else
	{
		retVal = window.open(ie8Option.url,"newWin","modal=yes,width="+ie8Option.width+",height="+ieHeight+",top=400;left=680;resizable=no,scrollbars=yes");
	}
	return retVal;
}
//添加表结构验证
function ckData_Talbe_Handle(theForm)
{
	if(theForm.columnsType.value=="0")
	{
		alert("请选择字段类型");
		theForm.columnsType.focus();
		return false;
	}
	if(theForm.columnsCode.value=="")
	{
		alert("请输入字段代码");
		theForm.columnsCode.focus();
		return false;
	}
}
//表单设置中是否显示前台展现选项所在行
function isshowXz_Tr(theValue)
{
	if (theValue>=3 && theValue<=5)
	{
		document.getElementById("xz_Tr").style.display='';
	}
	else
	{
		document.getElementById("xz_Tr").style.display='none';
		document.getElementById("showMore").value='';
	}
}
//单页表单设置
function formSet_Handle(theForm)
{
	if(theForm.code.value=="")
	{
		alert("请选择字段编码");
		theForm.code.focus();
		return false;
	}
	if(theForm.theid.value=="0")
	{
		alert("请选择受影响页面");
		theForm.theid.focus();
		return false;
	}
	if(theForm.showName.value=="")
	{
		alert("请输入前台名称");
		theForm.showName.focus();
		return false;
	}
	if(theForm.type.value=="0")
	{
		alert("请选择前台展现类型");
		theForm.type.focus();
		return false;
	}
	if(theForm.type.value>=3 && theForm.type.value<=5)
	{
		if(theForm.showMore.value=="")
		{
			alert("请输入前台展现选项");
			theForm.showMore.focus();
			return false;
		}
	}
}
