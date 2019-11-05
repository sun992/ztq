<?php
require_once '../../config.php';
$theobj=bll_admin::getadminnow('nickname');
if(count($theobj)<=0){
	die(com_oftenjavascript::parentrefurbishurl("../index.html"));
}
?>
<!doctype html public "-//w3c//dtd xhtml 1.0 transitional//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>顶部</title>
<link rel="stylesheet" type="text/css" href="../css/frame.css" />
</head>
<body>
	<div id="top-sizer">
		<div class="extend">
			<div class="dispaly_1"></div>
			<div class="dispaly_2">【技术帮助：QQ <a href="tencent://Message/?Uin=1845128281&Menu=yes\" style="color:#fff;">1845128281</a>&nbsp;&nbsp;电话 181-0808-1289】<br>【当前用户：<?php echo $theobj['nickname'];?>&nbsp;<span id="showtime"></span>】</div>
		</div>
	</div>
	<iframe src="null.php" width="0" height="0"></iframe>
	<script type="text/javascript">
	//获取今天的时间
	function getTheDay(){
		today = new Date();
		var day = "";
		var date1 = "";
		switch (today.getDay()) {
			case 0:
				day = "星期日";
				break;
			case 1:
				day = "星期一";
				break;
			case 2:
				day = "星期二";
				break;
			case 3:
				day = "星期三";
				break;
			case 4:
				day = "星期四";
				break;
			case 5:
				day = "星期五";
				break;
			case 6:
				day = "星期六";
				break;
			default:
				break;
		}
		
		if (today.getYear() >= 2000) {
			date1 = (today.getYear()) + "年" + (today.getMonth() + 1) + "月" + today.getDate() + "日 ";
		}
		else {
			date1 = (1900 + today.getYear()) + "年" + (today.getMonth() + 1) + "月" + today.getDate() + "日 ";
		}
		var time = "";
		time += (today.getHours() < 10 ? "0" + today.getHours() : today.getHours());
		time += ":" + (today.getMinutes() < 10 ? "0" + today.getMinutes() : today.getMinutes());
		time += ":" + (today.getSeconds() < 10 ? "0" + today.getSeconds() : today.getSeconds());
		document.getElementById("showtime").innerHTML = date1 + day + "&nbsp;" + time;
		setTimeout("getTheDay()", 1000);
	}
	getTheDay();
	</script>
</body>
</html>
