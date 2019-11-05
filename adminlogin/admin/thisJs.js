/**
 * 管理员js
 */

//验证字符串是否只含数字，字母，汉字和下划线 是则返回true 否则返回false
function isuser(str){
	var reg = /[^a-za-z0-9\u4e00-\u9fa5_]/g;
	if (reg.test(str)) {
		return (false);
	}
	else {
		return (true);
	}
}

//管理员添加验证
function ckadd(theform){
	if (theform.user.value.length == 0) {
		alert("用户名长度在4位-20位之间,一个汉字占2位");
		theform.user.focus();
		return false;
	}
	if (!isuser(theform.user.value)) {
		alert("用户名只能为数字，字母，汉字或下划线");
		theform.user.focus();
		return false;
	}
	
	var uservalue = theform.user.value.replace(/[\u4e00-\u9fa5]/g, "aa");
	if (uservalue.length < 4 || uservalue.length > 20) {
		alert("用户名长度在4位-20位之间,一个汉字占2位");
		theform.user.focus();
		return false;
	}
	if (theform.pass1.value.length < 4 || theform.pass1.value.length > 20) {
		alert("密码长度在4位-20位之间");
		theform.pass1.focus();
		return false;
	}
	if (theform.pass1.value != theform.pass2.value) {
		alert("两次输入密码不一致");
		theform.pass1.focus();
		return false;
	}
	if (!ishf(theform.pass1.value)) {
		alert("密码只能为数字，字母或下划线");
		theform.pass1.focus();
		return false;
	}
	if (theform.nickname.value == "") {
		alert("请输入昵称");
		theform.nickname.focus();
		return false;
	}
}

//管理员修改的验证
function ckedit(theform){
	if (theform.pass1.value.length != 0 || theform.pass2.value.length != 0) {
		if (theform.pass1.value.length == 0 || theform.pass2.value.length == 0) {
			alert("两次输入新密码不一致");
			theform.pass1.focus();
			return false;
		}
		if (theform.pass1.value.length < 4 || theform.pass1.value.length > 20) {
			alert("密码长度在4位-20位之间");
			theform.pass1.focus();
			return false;
		}
		if (theform.pass1.value != theform.pass2.value) {
			alert("两次输入密码不一致");
			theform.pass1.focus();
			return false;
		}
		if (!ishf(theform.pass1.value)) {
			alert("密码只能为数字，字母或下划线");
			theform.pass1.focus();
			return false;
		}
	}
	if (theform.nickname.value == "") {
		alert("请输入昵称");
		theform.nickname.focus();
		return false;
	}
}