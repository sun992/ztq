<?php
/*
 * 所有命名规则 : 1:变量，方法都是小写字母开始 2:文件与类名用小写字母开始 3:所有程序中使用的图片以小写字母开始
 */

include ('adodb/adodb.inc.php');
include ('autoload.php');
define ( 'webname', '西宁市助听器验配服务中心' ); // 网站名称
define ( 'domain', "http://$_SERVER[HTTP_HOST]/" ); // 网站域名
define ( 'support', '技术支持：<a href="http://www.33chengbao.com/" target="_blank">成都网站建设</a>-<a href="http://www.33chengbao.com/" target="_blank">三三诚宝</a>' );
date_default_timezone_set ( "PRC" ); // 设置默认时区
$conn = com_oftenfunction::openconn ( "localhost", "sfdjd", "5vhkx6z7", "sfdjd" );
//$conn = com_oftenfunction::openconn ( "localhost", "hualing", "J4p3v6d7", "hualing" );
@session_start ();
?>