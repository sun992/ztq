<?php
/**
 * smarty plugin
 *
 * @package smarty
 * @subpackage PluginsModifier
 */
function smarty_modifier_leftnav($navArray) {
	$rootUrl = getRoot ();
	$value = "<div class=\"leftnav\">\r\n";
//	$value .= "<div class=\"name\"></div>";
	$value .= "<h4><span>$navArray[enname]</span><em>$navArray[thename]</em></h4>\r\n";
	$value .= "<div class=\"list\">\r\n";
	if (array_key_exists ( 'list', $navArray ) && count ( $navArray ['list'] ) > 0) {
		$value .= showList ( $navArray ['list'], $rootUrl );
	}
	$value .= "</div>\r\n";
	$value .= "</div>\r\n";
	return $value;
}

/**
 * 递归显示列表
 *
 * @param arrat $datalist 需要递归的列表
 * @param string $rootUrl 根路径
 */
function showList($datalist, $rootUrl) {
	$value = "";
	if (count ( $datalist ) > 0) {
		$value .= "<ul>\r\n";
		foreach ( $datalist as $row ) {
			if (array_key_exists ( 'isfocus', $row ) && intval ( $row ['isfocus'] ) === 1) {
				$value .= "<a href=\"$row[url]\"><li class=\"onfocus\">";
			} else {
				$value .= "<a href=\"$row[url]\"><li onmouseover=\"this.classname='onfocus'\" onmouseout=\"this.classname=''\">";
			}
			$value .= "$row[title]";
			if (array_key_exists ( 'list', $row ) && count ( $row ['list'] ) > 0) {
				$value .= showList ( $row ['list'], $rootUrl );
			}
			
		 	
			$value .= "</li></a>\r\n";
		}
		$value .= "</ul>\r\n";
		
	}
	return $value;
}

/**
 * 获取绝对路径
 */
function getRoot() {
	$phpSelf = $_SERVER ['PHP_SELF'] ? $_SERVER ['PHP_SELF'] : $_SERVER ['SCRIPT_NAME'];
	$thearray = explode ( '/', $phpSelf );
	$theUrl = 'http://' . $_SERVER ['HTTP_HOST'];
	if (count ( $thearray ) > 2) {
		for($i = 1; $i < count ( $thearray ) - 1; $i ++) {
			$theUrl .= "/$thearray[$i]/";
		}
	} else {
		$theUrl .= '/';
	}
	return $theUrl;
}
?>