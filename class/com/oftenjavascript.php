<?php

/**
 * 常用JS类
 * 
 * @author sansanchengbao
 *
 */
class com_oftenjavascript {
	
	/**
	 * 显示对话框后返回
	 *
	 * @param string $info
	 *        	对话框显示的内容
	 */
	public static function alertgoback($info) {
		$js = "alert('$info');history.back();";
		return self::_commhtml ( $js );
	}
	
	/**
	 * 跳转到指定页面
	 *
	 * @param string $url
	 *        	跳转的地址
	 */
	public static function gotourl($url) {
		$js = "window.document.location.href=\"$url\"";
		return self::_commhtml ( $js );
	}
	
	/**
	 * 显示对话框跳转到指定页面
	 *
	 * @param string $info
	 *        	对话框的内容
	 * @param string $url
	 *        	跳转的地址
	 */
	public static function alertgotourl($info, $url) {
		$js = "alert('$info');window.document.location.href=\"$url\"";
		return self::_commhtml ( $js );
	}
	
	/**
	 * 刷新父窗口
	 */
	public static function parentrefurbish() {
		$js = "parent.location.href=parent.location.href;";
		return self::_commhtml ( $js );
	}
	
	/**
	 * 根据指定路径刷新父窗口
	 *
	 * @param string $url
	 *        	刷新父窗口的地址
	 */
	public static function parentrefurbishurl($url) {
		$js = "parent.location.href='$url';";
		return self::_commhtml ( $js );
	}
	
	/**
	 * 父窗口弹出弹出框
	 *
	 * @param string $info
	 *        	父窗口的对话框内容
	 */
	public static function parentalert($info) {
		$js = "parent.alert('$info');";
		return self::_commhtml ( $js );
	}
	
	/**
	 * 父窗口弹出弹出框且刷新父窗口
	 *
	 * @param string $info
	 *        	父窗口的对话框内容
	 */
	public static function parentalertrefurbishparent($info) {
		$js = "parent.alert('$info');parent.location.href=parent.location.href;";
		return self::_commhtml ( $js );
	}
	
	/**
	 * 父窗口显示对话框跳转到指定页面
	 *
	 * @param string $info
	 *        	父窗口的对话框内容
	 * @param string $url
	 *        	刷新父窗口的地址
	 */
	public static function parentalertrefurbishparenturl($info, $url) {
		$js = "parent.alert('$info');parent.location.href=\"$url\";";
		return self::_commhtml ( $js );
	}
	
	/**
	 * 基础THML
	 *
	 * @param string $javaScript        	
	 */
	private static function _commhtml($javaScript) {
		$value = '';
		$value .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
		$value .= '<html xmlns="http://www.w3.org/1999/xhtml">';
		$value .= '<head>';
		$value .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$value .= '</head>';
		$value .= '<body>';
		$value .= '<script type="text/javascript">';
		$value .= $javaScript;
		$value .= '</script>';
		$value .= '</body>';
		$value .= '</html>';
		return $value;
	}
}
?>