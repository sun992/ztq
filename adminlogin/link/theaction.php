<?php
require_once '../../config.php';
header ( "Content-Type: text/html; charset=utf-8" );
$nowmember=bll_admin::getadminnow();
if ( count($nowmember)<1) {
	header ( 'location:../index.html' );
	die();
}
new BackUSL_Controller ( $_REQUEST ['action'] );

/**
 * 链接控制器
 *
 * @author sansanchengbao
 *        
 */
class BackUSL_Controller {
	/**
	 * 构造函数
	 *
	 * @param string $action
	 *        	处理方法名
	 */
	public function __construct($action) {
		if (! method_exists ( $this, $action )) {
			die ( "该方法不存在" );
		}
		switch ($action) {
			case "addsort" : // 新增类别
			case "editsort" : // 修改类别
			case "sortmove" : // 移动类别
			case "delsort" : // 删除类别
			
			case "addlink" : // 新增链接
			case "editlink" : // 修改链接
			case "linkmove" : // 移动链接
			case "deletelink" : // 删除链接
				break;
			default :
				die ( "该方法错误" );
				break;
		}
		$this->{$action} ();
	}
	
	/**
	 * 添加类别
	 */
	private function addsort() {
		if (bll_linksort::add ( $_POST ) > 0) {
			echo com_oftenjavascript::alertgotourl ( "新增成功!!!", "linksort_list.php" );
		} else {
			echo com_oftenjavascript::alertgoback ( "新增失败!!!" );
		}
	}
	
	/**
	 * 修改类别
	 */
	private function editsort() {
		if (bll_linksort::edit ( $_POST ) > 0) {
			echo com_oftenjavascript::alertgotourl ( "修改成功!!!", "linksort_edit.php?theid=" . $_POST ['theid'] );
		} else {
			echo com_oftenjavascript::alertgoback ( "修改失败!!!" );
		}
	}
	
	/**
	 * 移动类别
	 */
	private function sortmove() {
		bll_linksort::swapserial ( $_GET ['idstr'] );
		echo com_oftenjavascript::parentrefurbish ();
	}
	
	/**
	 * 删除类别
	 */
	private function delsort() {
		if (bll_linksort::delete ( $_GET ['theid'] )) {
			echo com_oftenjavascript::parentalertrefurbishparent ( "删除成功!!!" );
		} else {
			echo com_oftenjavascript::parentalert ( "删除失败" );
		}
	}
	
	/**
	 * 添加链接
	 */
	private function addlink() {
		if (bll_link::add ( $_POST ) > 0) {
			echo com_oftenjavascript::alertgotourl ( "新增成功!!!", "link_list.php?theid=" . $_POST ['theid'] );
		} else {
			echo com_oftenjavascript::alertgoback ( "新增失败!!!" );
		}
	}
	
	/**
	 * 修改链接
	 */
	private function editlink() {
		if (bll_link::edit ( $_POST ) > 0) {
			echo com_oftenjavascript::alertgotourl ( "修改成功!!!", "link_edit.php?theid=" . $_POST ['theid'] );
		} else {
			echo com_oftenjavascript::alertgoback ( "修改失败!!!" );
		}
	}
	
	/**
	 * 移动链接
	 */
	private function linkmove() {
		bll_link::swapserial ( $_GET ['idstr'] );
		echo com_oftenjavascript::parentrefurbish ();
	}
	
	/**
	 * 删除链接
	 */
	private function deletelink() {
		$idlist = $_GET ['thelist'];
		if (bll_link::delete ( $idlist )) {
			echo com_oftenjavascript::parentrefurbish ();
		} else {
			echo com_oftenjavascript::parentAlert ( "删除失败!!!" );
		}
	}
}
?>