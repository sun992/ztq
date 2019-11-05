<?php
session_start ();
header ( "content-type: image/gif" );

$alpha = "abcdefghijkmnpqrstuvwxyz123456789"; // 验证码内容
$w = 100; // 图片宽度 必须为5的倍数
$h = 22; // 图片高度
$randcode = ""; // 本次 验证码字符串
srand ( ( double ) microtime () * 1000000 ); // 初始化随机数种子

$im = imagecreatetruecolor ( $w, $h ); // 创建验证图片
$color = imagecolorallocate ( $im, mt_rand ( 230, 255 ), mt_rand ( 230, 255 ), mt_rand ( 230, 255 ) );
imagefilledrectangle ( $im, 0, 0, $w, $h, $color );

// 逐位产生随机字符
for($i = 0; $i < 5; $i ++) {
	$code = substr ( $alpha, mt_rand ( 0, strlen ( $alpha ) - 1 ), 1 ); // 取字符
	$color = imagecolorallocate ( $im, mt_rand ( 0, 200 ), mt_rand ( 0, 200 ), mt_rand ( 0, 200 ) );
	imagettftext ( $im, 15, mt_rand ( - 10, 10 ), intval ( $i * $w / 5 ), 20, $color, 'images/comic.ttf', $code ); // 绘字符
	$randcode .= $code;
}

// 绘背景干扰点
for($i = 0; $i < mt_rand ( 100, 200 ); $i ++) {
	$color = imagecolorallocate ( $im, mt_rand ( 0, 255 ), mt_rand ( 0, 255 ), mt_rand ( 0, 255 ) ); // 干扰点颜色
	imagesetpixel ( $im, mt_rand ( 0, $w ), mt_rand ( 0, $h ), $color ); // 干扰点
}

// 把验证码字符串写入session
$_SESSION ['randcode'] = $randcode;

/* 绘图结束 */
imagegif ( $im );
imagedestroy ( $im );
/* 绘图结束 */
?>