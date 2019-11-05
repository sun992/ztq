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
 * 单页控制器
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
			case "add" : // 新增单页
			case "edit" : // 修改单页
			case "delete" : // 删除单页
				break;
			default :
				die ( "该方法错误" );
				break;
		}
		$this->{$action} ();
	}
	
	/**
	 * 添加单页
	 */
	private function add() {
		if (bll_onepage::add ( $_POST ) > 0) {
			echo com_oftenjavascript::alertgotourl ( "新增成功!!!", "onepage_list.php" );
		} else {
			echo com_oftenjavascript::alertgoback ( "新增失败!!!" );
		}
	}
	
	/**
	 * 修改单页
	 */
	private function edit() {
		if (bll_onepage::edit ( $_POST ) > 0) {
			echo com_oftenjavascript::alertgotourl ( "修改成功!!!", "onepage_edit.php?theid=" . $_POST ['theid'] );
		} else {
			echo com_oftenjavascript::alertgoback ( "修改失败!!!" );
		}
	}
	
	/**
	 * 删除单页
	 */
	private function delete() {
		$idlist = $_GET ['thelist'];
		if (bll_onepage::delete ( $idlist )) {
			echo com_oftenjavascript::parentrefurbish ();
		} else {
			echo com_oftenjavascript::parentalert ( "删除失败!!!" );
		}
	}
}
?>