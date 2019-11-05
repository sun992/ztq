<?php
require_once '../../config.php';
if (intval ( bll_admin::islogin () ) === 0) {
	die(com_oftenjavascript::parentrefurbishurl("../index.html"));
}
header ( "content-type: text/html; charset=utf-8" );
ob_start ();

$valint = (false == empty ( $_POST ['pint'] )) ? $_POST ['pint'] : "未测试";
$valfloat = (false == empty ( $_POST ['pfloat'] )) ? $_POST ['pfloat'] : "未测试";
$valio = (false == empty ( $_POST ['pio'] )) ? $_POST ['pio'] : "未测试";
$mysqlreshow = "none";
$mailreshow = "none";
$funreshow = "none";
$opreshow = "none";
$sysreshow = "none";

define ( "yes", "<span class='resyes'>yes</span>" );
define ( "no", "<span class='resno'>no</span>" );
define ( "icon", "<span class='icon'>2</span>&nbsp;" );

$phpself = null;
if (array_key_exists ( 'PHP_SELF', $_SERVER )) {
	$phpself = $_SERVER ['PHP_SELF'];
} else {
	$phpself = $_SERVER ['script_name'];
}

define ( "phpself", preg_replace ( '/(.{0,}?\/+)/', "", $phpself ) );


// 系统参数
switch (php_os) {
	case "linux" :
		$sysreshow = (false !== ($sysinfo = sys_linux ())) ? "show" : "none";
		break;
	case "freebsd" :
		$sysreshow = (false !== ($sysinfo = sys_freebsd ())) ? "show" : "none";
		break;
	default :
		break;
}

if(array_key_exists('action', $_GET) && $_GET['action']=="showphpinfo"){
	echo phpinfo();
	die();
}

/*========================================================================*/
?>
<!doctype html public "-//w3c//dtd xhtml 1.0 transitional//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>后台管理系统</title>
<link rel="stylesheet" type="text/css" href="../css/rightfrm.css" />
<script type="text/javascript" src="../jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="../comm.js"></script>
<style type="text/css">
.jump { float:right; width:15px; padding-left:5px; line-height:11px; }	
.resyes { font-size: 12px;  color: #33cc00; } 
.resno { font-size: 12px;  color: #ff0000; }
</style>
</head>
<body>
<table  border=0 cellpadding=0 cellspacing=1  class="listtable">
  <tr>
    <th align=left colspan="4">&nbsp;服务器特征</th>
  </tr>
  <tr>
    <td width="20%" align=left>&nbsp;服务器时间</td>
    <td width="30%"><?php echo '北京时间：'.gmdate ( "y年n月j日 h:i:s", time () + 8 * 3600 );?></td>
    <td width="20%"  align=left>&nbsp;服务器域名/ip地址</td>
    <td width="30%" ><?php echo $_SERVER ['server_name'].'('.@gethostbyname ( $_SERVER ['server_name'] ).')';?></td>
  </tr>
  <tr>
    <td align=left>&nbsp;服务器操作系统</td>
    <td><?php $os = explode ( " ", php_uname () );echo $os [0].'&nbsp;内核版本：'.$os [2];?></td>
    <td align=left>&nbsp;主机名称</td>
    <td><?php echo $os [1];?></td>
  </tr>
  <tr>
    <td align=left>&nbsp;服务器解译引擎</td>
    <td><?php echo $_SERVER ['server_software'];?></td>
    <td align=left>&nbsp;web服务端口</td>
    <td><?php echo $_SERVER ['server_port'];?></td>
  </tr>
  <tr>
    <td align=left>&nbsp;服务器管理员</td>
    <td><?php echo array_key_exists ( 'server_admin', $_SERVER )?$_SERVER ['server_admin']:'';?></td>
    <td align=left>&nbsp;本文件路径</td>
    <td><?php echo __file__;?></td>
  </tr>
</table>
<?php
$thewflist=getxtwf();
if(count($thewflist)>0){
?>
<table  border=0 cellpadding=0 cellspacing=1  class="listtable" style="margin-top:-1px;">
  <tr>
    <th align=left colspan="4">&nbsp;系统维护</th>
  </tr>
  <?php for($i=0;$i<count($thewflist);$i++){ ?>
  <tr>
    <td style="color:#ff0000;"><?php echo ($i+1).'：'.$thewflist[$i]; ?></th>
  </tr>
  <?php } ?>
</table>
<?php } ?>
<table  border=0 cellpadding=0 cellspacing=1  class="listtable" style="margin-top:-1px;">
  <tr>
    <th align=left colspan="4">&nbsp;php基本特征 [<a href="?action=showphpinfo" style="color:#000;">查看更多</a>]</th>
  </tr>
  <tr>
    <td width="35%" align=left>&nbsp;php运行方式</td>
    <td width="15%"><?php echo strtoupper ( php_sapi_name () );?></td>
    <td width="35%"  align=left>&nbsp;php版本</td>
    <td width="15%" ><?php echo php_version;?></td>
  </tr>
  <tr>
    <td align=left>&nbsp;运行于安全模式</td>
    <td><?php echo getcon ( "safe_mode" );?></td>
    <td align=left>&nbsp;支持zend编译运行</td>
    <td><?php echo (get_cfg_var ( "zend_optimizer.optimization_level" ) || get_cfg_var ( "zend_extension_manager.optimizer_ts" ) || get_cfg_var ( "zend_extension_ts" )) ? yes : no;?></td>
  </tr>
  <tr>
    <td align=left>&nbsp;允许使用url打开文件&nbsp;allow_url_fopen</td>
    <td><?php echo getcon ( "allow_url_fopen" );?></td>
    <td align=left>&nbsp;允许动态加载链接库&nbsp;enable_dl</td>
    <td><?php echo getcon ( "enable_dl" );?></td>
  </tr>
  <tr>
    <td align=left>&nbsp;显示错误信息&nbsp;display_errors</td>
    <td><?php echo getcon ( "display_errors" );?></td>
    <td align=left>&nbsp;自动定义全局变量&nbsp;register_globals</td>
    <td><?php echo getcon ( "register_globals" );?></td>
  </tr>
  <tr>
    <td align=left>&nbsp;magic_quotes_runtime</td>
    <td><?php echo (1 === get_magic_quotes_runtime ()) ? yes : no;?></td>
    <td align=left>&nbsp;magic_quotes_gpc</td>
    <td><?php echo (1 === get_magic_quotes_gpc ()) ? yes : no;?></td>
  </tr>
  <tr>
    <td align=left>&nbsp;单次上传最大文件限制</td>
    <td><?php echo getcon ( "upload_max_filesize" );?></td>
    <td align=left>&nbsp;程序最长运行时间&nbsp;max_execution_time</td>
    <td><?php echo getcon ( "max_execution_time" ).'秒';?></td>
  </tr>
  <tr>
    <td align=left>&nbsp;被禁用的函数&nbsp;disable_functions</td>
    <td colspan="3"><?php echo ("" == ($disfuns = get_cfg_var ( "disable_functions" ))) ? "无" : str_replace ( ",", "<br />", $disfuns );?></td>
  </tr>
</table>

<table  border=0 cellpadding=0 cellspacing=1  class="listtable" style="margin-top:-1px;">
  <tr>
    <th align=left colspan="4">&nbsp;组件支持状况</th>
  </tr>
  <tr>
    <td width="35%" align=left>&nbsp;session支持</td>
    <td width="15%"><?php echo isfun ( "session_start" );?></td>
    <td width="35%" align=left>&nbsp;socket支持</td>
    <td width="15%"><?php echo isfun ( "fsockopen" );?></td>
  </tr>
  <tr>
    <td align=left>&nbsp;ftp</td>
    <td><?php echo isfun ( "ftp_login" );?></td>
    <td align=left>&nbsp;odbc数据库连接</td>
    <td><?php echo isfun ( "odbc_close" );?></td>
  </tr>
  <tr>
    <td align=left>&nbsp;压缩文件支持(zlib)</td>
    <td><?php echo isfun ( "gzclose" );?></td>
    <td align=left>&nbsp;xml解析</td>
    <td><?php echo isfun ( "xml_set_object" );?></td>
  </tr>
  <tr>
    <td align=left>&nbsp;高精度数学运算 bcmath</td>
    <td><?php echo isfun ( "bcadd" );?></td>
    <td align=left>&nbsp;图形处理 gd library</td>
    <td><?php echo isfun ( "gd_info" );?></td>
  </tr>
  <tr>
    <td align=left>&nbsp;历法运算 calendar</td>
    <td><?php echo isfun ( "cal_days_in_month" );?></td>
    <td align=left>&nbsp;wddx支持</td>
    <td><?php echo isfun ( "wddx_add_vars" );?></td>
  </tr>
  <tr>
    <td align=left>&nbsp;prel相容语法 pcre</td>
    <td><?php echo isfun ( "preg_match" );?></td>
    <td align=left>&nbsp;mysql数据库</td>
    <td><?php echo isfun ( "mysql_close" );?></td>
  </tr>
  <tr>
    <td align=left>&nbsp;sql server数据库</td>
    <td><?php echo isfun ( "mssql_close" );?></td>
    <td align=left>&nbsp;sybase数据库</td>
    <td><?php echo isfun ( "sybase_close" );?></td>
  </tr>
  <tr>
    <td align=left>&nbsp;oracle数据库</td>
    <td><?php echo isfun ( "ora_close" );?></td>
    <td align=left>&nbsp;oracle 8 数据库</td>
    <td><?php echo isfun ( "ocilogoff" );?></td>
  </tr>
  <tr>
    <td align=left>&nbsp;dbase数据库</td>
    <td><?php echo isfun ( "dbase_close" );?></td>
    <td align=left>&nbsp;dbm数据库</td>
    <td><?php echo isfun ( "dbmclose" );?></td>
  </tr>
  <tr>
    <td align=left>&nbsp;dba数据库</td>
    <td><?php echo isfun ( "dba_close" );?></td>
    <td align=left>&nbsp;filepro数据库</td>
    <td><?php echo isfun ( "filepro_fieldcount" );?></td>
  </tr>
  <tr>
    <td align=left>&nbsp;msql数据库</td>
    <td><?php echo isfun ( "msql_close" );?></td>
    <td align=left>&nbsp;hyperwave数据库</td>
    <td><?php echo isfun ( "hw_close" );?></td>
  </tr>
  <tr>
    <td align=left>&nbsp;postgre sql数据库</td>
    <td><?php echo isfun ( "pg_close" );?></td>
    <td align=left>&nbsp;yellow page系统</td>
    <td><?php echo isfun ( "yp_match" );?></td>
  </tr>
  <tr>
    <td align=left>&nbsp;vmailmgr邮件处理</td>
    <td><?php echo isfun ( "vm_adduser" );?></td>
    <td align=left>&nbsp;fdf表单资料格式</td>
    <td><?php echo isfun ( "fdf_get_ap" );?></td>
  </tr>
  <tr>
    <td align=left>&nbsp;哈稀计算 mhash</td>
    <td><?php echo isfun ( "mhash_count" );?></td>
    <td align=left>&nbsp;snmp网络管理协议</td>
    <td><?php echo isfun ( "snmpget" );?></td>
  </tr>
  <tr>
    <td align=left>&nbsp;imap电子邮件系统</td>
    <td><?php echo isfun ( "imap_close" );?></td>
    <td align=left>&nbsp;informix数据库</td>
    <td><?php echo isfun ( "ifx_close" );?></td>
  </tr>
  <tr>
    <td align=left>&nbsp;ldap目录协议</td>
    <td><?php echo isfun ( "ldap_close" );?></td>
    <td align=left>&nbsp;mcrypt加密处理</td>
    <td><?php echo isfun ( "mcrypt_cbc" );?></td>
  </tr>
  <tr>
    <td align=left>&nbsp;拼写检查 aspell library</td>
    <td><?php echo isfun ( "aspell_check_raw" );?></td>
    <td align=left>&nbsp;pdf文档支持</td>
    <td><?php echo isfun ( "pdf_close" );?></td>
  </tr> 
</table>
<script type="text/javascript">$(function(){settablecolor();});</script>
</body>
</html>
<?php
//检测php设置参数
function getcon($varname) {
	switch ($res = get_cfg_var ( $varname )) {
		case 0 :
			return no;
			break;
		case 1 :
			return yes;
			break;
		default :
			return $res;
			break;
	}
}

//检测函数支持
function isfun($funname)
{
   return (false !== function_exists($funname))?yes:no;
}

//数据io能力测试
function test_io() {
	$fp = fopen ( phpself, "r" );
	$timestart = gettimeofday ();
	for($i = 0; $i < 10000; $i ++) {
		fread ( $fp, 10240 );
		rewind ( $fp );
	}
	$timeend = gettimeofday ();
	fclose ( $fp );
	$time = ($timeend ["usec"] - $timestart ["usec"]) / 1000000 + $timeend ["sec"] - $timestart ["sec"];
	$time = round ( $time, 3 ) . "秒";
	return ($time);
}

//比例条
function bar($percent) {
	echo '<ul class=\"bar\">';
	echo "<li style=\"width:$percent%\">&nbsp;</li>";
	echo '</ul>';
}

//系统参数探测 linux
function sys_linux() {
	// cpu
	if (false === ($str = @file ( "/proc/cpuinfo" )))
		return false;
	$str = implode ( "", $str );
	@preg_match_all ( '/model\s+name\s{0,}\:+\s{0,}([\w\s\)\(.]+)[\r\n]+/', $str, $model );
	@preg_match_all ( '/cache\s+size\s{0,}\:+\s{0,}([\d\.]+\s{0,}[a-z]+[\r\n]+)/', $str, $cache );
	if (false !== is_array ( $model [1] )) {
		$res ['cpu'] ['num'] = sizeof ( $model [1] );
		for($i = 0; $i < $res ['cpu'] ['num']; $i ++) {
			$res ['cpu'] ['detail'] [] = "类型：" . $model [1] [$i] . " 缓存：" . $cache [1] [$i];
		}
		if (array_key_exists('detail', $res ['cpu']) &&  false !== is_array ( $res ['cpu'] ['detail'] ))
		{
			$res ['cpu'] ['detail'] = implode ( "<br />", $res ['cpu'] ['detail'] );
		}
	}
	
	// uptime
	if (false === ($str = @file ( "/proc/uptime" )))
		return false;
	$str = explode ( " ", implode ( "", $str ) );
	$str = trim ( $str [0] );
	$min = $str / 60;
	$hours = $min / 60;
	$days = floor ( $hours / 24 );
	$hours = floor ( $hours - ($days * 24) );
	$min = floor ( $min - ($days * 60 * 24) - ($hours * 60) );
	if ($days !== 0)
		$res ['uptime'] = $days . "天";
	if ($hours !== 0)
		$res ['uptime'] .= $hours . "小时";
	$res ['uptime'] .= $min . "分钟";
	
	// memory
	if (false === ($str = @file ( "/proc/meminfo" )))
		return false;
	$str = implode ( "", $str );
	preg_match_all ( '/memtotal\s{0,}\:+\s{0,}([\d\.]+).+?memfree\s{0,}\:+\s{0,}([\d\.]+).+?swaptotal\s{0,}\:+\s{0,}([\d\.]+).+?swapfree\s{0,}\:+\s{0,}([\d\.]+)/s', $str, $buf );
	
	$res ['memtotal'] = round ( $buf [1] [0] / 1024, 2 );
	$res ['memfree'] = round ( $buf [2] [0] / 1024, 2 );
	$res ['memused'] = ($res ['memtotal'] - $res ['memfree']);
	$res ['mempercent'] = (floatval ( $res ['memtotal'] ) != 0) ? round ( $res ['memused'] / $res ['memtotal'] * 100, 2 ) : 0;
	
	$res ['swaptotal'] = round ( $buf [3] [0] / 1024, 2 );
	$res ['swapfree'] = round ( $buf [4] [0] / 1024, 2 );
	$res ['swapused'] = ($res ['swaptotal'] - $res ['swapfree']);
	$res ['swappercent'] = (floatval ( $res ['swaptotal'] ) != 0) ? round ( $res ['swapused'] / $res ['swaptotal'] * 100, 2 ) : 0;
	
	// load avg
	if (false === ($str = @file ( "/proc/loadavg" )))
		return false;
	$str = explode ( " ", implode ( "", $str ) );
	$str = array_chunk ( $str, 3 );
	$res ['loadavg'] = implode ( " ", $str [0] );
	
	return $res;
}

//系统参数探测 freebsd
function sys_freebsd() {
	//cpu
	if (false === ($res ['cpu'] ['num'] = get_key ( "hw.ncpu" )))
		return false;
	$res ['cpu'] ['detail'] = get_key ( "hw.model" );
	
	//load avg
	if (false === ($res ['loadavg'] = get_key ( "vm.loadavg" )))
		return false;
	$res ['loadavg'] = str_replace ( "{", "", $res ['loadavg'] );
	$res ['loadavg'] = str_replace ( "}", "", $res ['loadavg'] );
	
	//uptime
	if (false === ($buf = get_key ( "kern.boottime" )))
		return false;
	$buf = explode ( ' ', $buf );
	$sys_ticks = time () - intval ( $buf [3] );
	$min = $sys_ticks / 60;
	$hours = $min / 60;
	$days = floor ( $hours / 24 );
	$hours = floor ( $hours - ($days * 24) );
	$min = floor ( $min - ($days * 60 * 24) - ($hours * 60) );
	if ($days !== 0)
		$res ['uptime'] = $days . "天";
	if ($hours !== 0)
		$res ['uptime'] .= $hours . "小时";
	$res ['uptime'] .= $min . "分钟";
	
	//memory
	if (false === ($buf = get_key ( "hw.physmem" )))
		return false;
	$res ['memtotal'] = round ( $buf / 1024 / 1024, 2 );
	$buf = explode ( "\n", do_command ( "vmstat", "" ) );
	$buf = explode ( " ", trim ( $buf [2] ) );
	
	$res ['memfree'] = round ( $buf [5] / 1024, 2 );
	$res ['memused'] = ($res ['memtotal'] - $res ['memfree']);
	$res ['mempercent'] = (floatval ( $res ['memtotal'] ) != 0) ? round ( $res ['memused'] / $res ['memtotal'] * 100, 2 ) : 0;
	
	$buf = explode ( "\n", do_command ( "swapinfo", "-k" ) );
	$buf = $buf [1];
	preg_match_all ( '/([0-9]+)\s+([0-9]+)\s+([0-9]+)/', $buf, $bufarr );
	$res ['swaptotal'] = round ( $bufarr [1] [0] / 1024, 2 );
	$res ['swapused'] = round ( $bufarr [2] [0] / 1024, 2 );
	$res ['swapfree'] = round ( $bufarr [3] [0] / 1024, 2 );
	$res ['swappercent'] = (floatval ( $res ['swaptotal'] ) != 0) ? round ( $res ['swapused'] / $res ['swaptotal'] * 100, 2 ) : 0;
	
	return $res;
}

//取得参数值 freebsd
function get_key($keyname) {
	return do_command ( 'sysctl', "-n $keyname" );
}

//确定执行文件位置 freebsd
function find_command($commandname) {
	$path = array ('/bin', '/sbin', '/usr/bin', '/usr/sbin', '/usr/local/bin', '/usr/local/sbin' );
	foreach ( $path as $p ) {
		if (@is_executable ( "$p/$commandname" ))
			return "$p/$commandname";
	}
	return false;
}

//执行系统命令 freebsd
function do_command($commandname, $args) {
	$buffer = "";
	if (false === ($command = find_command ( $commandname )))
		return false;
	if (($fp = @popen ( "$command $args", 'r' ))==true) {
		while ( ! @feof ( $fp ) ) {
			$buffer .= @fgets ( $fp, 4096 );
		}
		return trim ( $buffer );
	}
	return false;
}

//系统维护
function getxtwf(){
	$thearray=array();
	
	//系统账号
	$temp=bll_admin::getone(array("username"=>"admin","password"=>"3eeecn"));
	if(count($temp)>0){
		$thearray[]="网站管理系统的 “默认账号：admin 默认密码：3eecn” 还未修改，严重影响系统的安全,请尽早修改！";
		showeditpassjs(1);
	}
	
	$temp=bll_admin::getone(array("username"=>"admin","password"=>"admin"));
	if(count($temp)>0){
		$thearray[]="网站管理系统的 “默认账号：admin 默认密码：admin” 还未修改，严重影响系统的安全,请尽早修改！";
		showeditpassjs(2);
	}
	
	//检查写权限
	$file_hd = @fopen ( '../../upload/test.txt', 'w' );
	if (!$file_hd) {
		$thearray[]="网站服务器的上传文件夹没写权限，将导致文件上传无法正常运行";
	}
	@fclose ( $file_hd );
	@unlink ( '../../upload/test.txt' );
	
	//自动转义
	if(1 === get_magic_quotes_gpc ()){
		$thearray[]="网站服务器 php magic_quotes_gpc 自动转义没有关闭，将导致图片等信息无法正常显示";
	}
	
	//程序最多允许使用内存量
	$temp=str_replace("m", "", get_cfg_var("memory_limit"));
	if(intval($temp)<128){
		$thearray[]="网站服务器程序最多允许使用内存量为".get_cfg_var("memory_limit")."，在条件允许的情况下请调整到128m以上，过小将有可能导致时常网站无法正常打开";
	}
	
	//错误信息
	if(intval(get_cfg_var("display_errors"))===1){
		$thearray[]="网站服务器显示错误信息 display_errors没有关闭，对安全有一定影响";
	}
	
	return $thearray;
}

//提示修改密码
function showeditpassjs($type){
	if(strpos($_SERVER['http_host'], "www.")===false){
		return;
	}
	echo "<script type=\"text/javascript\">\r\n";
	echo "$(function(){\r\n";
	if($type==2){
		echo "var txt = \"网站管理系统的 “默认账号：admin 默认密码：admin” 还未修改，严重影响系统的安全,请尽早修改！\";\r\n";
	}else{
		echo "var txt = \"网站管理系统的 “默认账号：admin 默认密码：3eeecn” 还未修改，严重影响系统的安全,请尽早修改！\";\r\n";
	}
	echo "alert(txt);\r\n";
	echo "});\r\n";
	echo "</script>\r\n";
}
?>