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
 * 会员控制器
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
			case "add" : // 添加会员
			case "edit" : // 修改会员
			case "delete" : // 删除会员
				break;
			default :
				die ( "该方法错误" );
				break;
		}
		$this->{$action} ();
	}
	
	/**
	 * 添加会员
	 */
	private function add() {
		if (bll_member::add ( $_POST ) > 0) {
			echo com_oftenjavascript::alertgotourl ( "新增成功!!!", "member_list.php" );
		} else {
			echo com_oftenjavascript::alertgoback ( "新增失败!!!" );
		}
	}
	
	/**
	 * 修改会员
	 */
	private function edit() {
		$theobj = bll_member::getone ( array (
				"id" => intval ( $_POST ['theid'] ) 
		) );
		
		if (count ( $theobj ) <= 0) {
			die ( "没有找到该会员" );
		}
		
		$newarray = com_oftenfunction::makearray ( $_POST );
		$newarray ['id'] = $theobj ['id'];
		if (! empty ( $_POST ['pass1'] )) {
			$newarray ['password'] = $_POST ['pass1'];
		}
		$newarray ['nickname'] = $_POST ['nickname'];
		$newarray ['loginnum'] = $theobj ['loginnum'];
		$newarray ['logintime'] = $theobj ['logintime'];
		$newarray ['uplogintime'] = $theobj ['uplogintime'];
		
		if (bll_member::edit ( $newarray ) > 0) {
			echo com_oftenjavascript::alertgotourl ( "修改成功!!!", "member_edit.php?theid=" . $theobj ['id'] );
		} else {
			echo com_oftenjavascript::alertgoback ( "修改失败!!!" );
		}
	}
	
	/**
	 * 删除会员
	 */
	private function delete() {
		$idlist = $_GET ['thelist'];
		if (bll_member::delete ( $idlist )) {
			echo com_oftenjavascript::parentrefurbish ();
		} else {
			echo com_oftenjavascript::parentalert ( "删除失败!!!" );
		}
	}
}
?>