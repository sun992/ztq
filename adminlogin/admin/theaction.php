<?php
require_once '../../config.php';
header ( "content-type: text/html; charset=utf-8" );
new backusl_controller ( $_REQUEST['action'] );

/**
 * 管理员控制器
 *
 * @author wzb
 *        
 */
class backusl_controller {
	/**
	 * 构造函数
	 *
	 * @param string $action 处理方法名
	 */
	public function __construct($action) {
		if (! method_exists ( $this, $action )) {
			header ( 'location:../index.html' );
			die ();
		}
		switch ($action) {
			case "login" : // 管理员登陆
			case "outlogin" : // 退出登录
				break;
			case "add" : // 添加管理员
			case "edit" : // 修改管理员
			case "delete" : // 删除管理员
				if (intval ( bll_admin::islogin () ) === 0) {
					header ( 'location:../index.html' );
					die ();
				}
				break;
			default :
				die ( "该方法错误" );
				break;
		}
		$this->{$action} ();
	}
	
	/**
	 * 管理员登陆
	 */
	private function login() {
		$ckcode = $_POST['ckcode'];
		if (strtolower ( $_SESSION ['randcode'] ) != strtolower ( $ckcode ) || empty ( $_SESSION ['randcode'] )) {
			$_SESSION ['randcode'] = "";
			die ( com_oftenjavascript::alertgotourl ( "验证码输入错误!!!", "../index.html" ) );
		} else {
			$_SESSION ['randcode'] = "";
		}
		$islogin = bll_admin::login ( array ('username' => $_POST ['user'],'password' => $_POST ['pass'] ) );
		if ($islogin) {
			header ( "location:../html/frame.php" );
		} else {
			die ( com_oftenjavascript::alertgotourl ( "用户名或者密码错误,请仔细输入!!!", "../index.html" ) );
		}
	}
	
	/**
	 * 退出登录
	 */
	private function outlogin() {
		bll_admin::outlogin ();
		header ( 'location:../index.html' );
	}
	
	/**
	 * 添加管理员
	 */
	private function add() {
		if (bll_admin::add ( $_POST ) > 0) {
			echo com_oftenjavascript::alertgotourl ( "新增成功!!!", "admin_list.php" );
		} else {
			echo com_oftenjavascript::alertgoback ( "新增失败!!!" );
		}
	}
	
	/**
	 * 修改管理员
	 */
	private function edit() {
		$newarray = array ();
		$newarray ['id'] = $_POST ['theid'];
		if (! empty ( $_POST ['pass1'] )) {
			$newarray ['password_txt'] = $_POST ['pass1'];
		}
		$newarray ['nickname_txt'] = $_POST ['nickname'];
		if (bll_admin::edit ( $newarray ) > 0) {
			echo com_oftenjavascript::alertgotourl ( "修改成功!!!", "admin_edit.php?theid=" . $_POST ['theid'] );
		} else {
			echo com_oftenjavascript::alertgoback ( "修改失败!!!" );
		}
	}
	
	/**
	 * 删除管理员
	 */
	private function delete() {
		$idlist = $_get ['thelist'];
		if (bll_admin::delete ( $idlist ) == "ok") {
			echo com_oftenjavascript::parentrefurbish ();
		} else {
			echo com_oftenjavascript::parentalert ( "删除失败!!!" );
		}
	}
}
?>