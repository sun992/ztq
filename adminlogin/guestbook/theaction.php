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
			case "delete" : // 删除留言
			case "guestbooksh" : // 审核留言
			case "repaly" : // 留言回复
				break;
			default :
				die ( "该方法错误" );
				break;
		}
		$this->{$action} ();
	}
	
	/**
	 * 删除类别
	 */
	private function delete() {
		if (bll_guestbook::delete ( $_GET ['thelist'] )) {
			echo com_oftenjavascript::parentrefurbish ();
		} else {
			echo com_oftenjavascript::parentalert ( "删除失败!!!" );
		}
	}
	
	/**
	 * 审核留言
	 */
	private function guestbooksh() {
		if (bll_guestbook::checkup ( array (
				"id" => $_GET ['theid'],
				"issh" => $_GET ['issh'] 
		) )) {
			echo com_oftenjavascript::parentrefurbish ();
		} else {
			echo com_oftenjavascript::parentalert ( "操作失败!!!" );
		}
	}
	
	/**
	 * 回复留言
	 */
	private function repaly() {
		if (bll_guestbook::repaly ( array (
				"id" => $_POST ['theid'],
				"repaly" => $_POST ['repaly'] 
		) )) {
			echo com_oftenjavascript::alertgotourl ( "回复成功!!!", "guestbook_repaly.php?theid=" . $_POST ['theid'] );
		} else {
			echo com_oftenjavascript::alertgoback ( "回复失败!!!" );
		}
	}
}
?>