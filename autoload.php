<?php
// 自动加载类文件
function __autoload($classname) {
	$baseurl = dirname ( __FILE__ ) . "/";
	if (strpos ( $classname, 'bll_' ) !== false) {
		// 逻辑层类
		require_once $baseurl . 'class/bll/' . str_replace ( "bll_", "", $classname ) . '.php';
	} elseif (strpos ( $classname, 'dal_' ) !== false) {
		// 数据层类
		require_once $baseurl . 'class/dal/' . str_replace ( "dal_", "", $classname ) . '.php';
	} elseif (strpos ( $classname, 'usl_' ) !== false) {
		// 表示层类
		require_once $baseurl . str_replace ( "usl_", "", $classname ) . '.php';
	} elseif (strpos ( $classname, 'com_' ) !== false) {
		// 辅助类
		require_once $baseurl . 'class/com/' . str_replace ( "com_", "", $classname ) . '.php';
	} elseif (strpos ( $classname, 'smarty' ) !== false || strpos ( $classname, 'smarty' ) !== false) {
		// smarty模板引擎
		if ($classname == 'smarty') {
			require_once $baseurl . 'smarty/smarty.class.php';
		} elseif ($classname == 'smartybc') {
			require_once $baseurl . 'smarty/smartybc.class';
		} else {
			if (file_exists ( $baseurl . "smarty/sysplugins/" . strtolower ( $classname ) . ".php" )) {
				require_once $baseurl . 'smarty/sysplugins/' . strtolower ( $classname ) . '.php';
			} else {
				require_once $baseurl . 'smarty/plugins/' . str_replace ( "smarty_", "", strtolower ( $classname ) ) . '.php';
			}
		}
	} elseif ($classname == "BackUSL_adminloginBase") {
		// 后台基础类
		require_once $baseurl . 'adminlogin/adminloginBase.php';
	} else {
	
	}
}
?>