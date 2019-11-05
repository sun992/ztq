/**
 * 管理员Js
 */

//单页验证
function cktheform(theform){
	if (theform.title.value.length == 0) {
		alert("请输入标题");
		theform.title.focus();
		return false;
	}
}