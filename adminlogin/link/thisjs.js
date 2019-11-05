//验证类别表单
function ckTheSortForm(theform){
	if (theform.sortname.value == "") {
		alert("请输入类别名称");
		theform.sortname.focus();
		return false;
	}
}
//验证信息表单
function ckTheNewsForm(theform){
	if (theform.title.value == "") {
		alert("请输入标题名称");
		theform.title.focus();
		return false;
	}
}

