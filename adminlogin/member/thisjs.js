/**
 * 会员Js
 */

//会员添加验证
function ckAdd(theform){
	if (theform.user.value.length < 4 || theform.user.value.length > 20) {
		alert("用户名长度在4位-20位之间");
		theform.user.focus();
		return false;
	}
	if (!isHf(theform.user.value)) {
		alert("用户名只能为数字，字母或下划线");
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
	if (!isHf(theform.pass1.value)) {
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

//会员修改的验证
function ckEdit(theform){
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
		if (!isHf(theform.pass1.value)) {
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