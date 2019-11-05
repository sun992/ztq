<?php
/**
 * 管理员逻辑层
 * 
 * @author sansanchengbao
 *
 */
class bll_admin {
	
	/**
	 * 获取当前登录的管理员
	 */
	public static function getadminnow() {
		$theid = self::islogin ();
		return self::getone ( array (
				"id" => $theid 
		) );
	}
	
	/**
	 * 获取一个管理员
	 *
	 * @param array $thearray
	 *        	id|username|username、password
	 * @return null array
	 */
	public static function getone($thearray) {
		if (array_key_exists ( 'id', $thearray )) {
			$newarray ['id'] = intval ( $thearray ['id'] );
		} elseif (array_key_exists ( 'password', $thearray )) {
			$newarray ['username'] = com_oftenfunction::delspecialchar ( $thearray ['username'] );
			$newarray ['password'] = com_oftenfunction::delspecialchar ( $thearray ['password'] );
			if (empty ( $newarray ['username'] ) || empty ( $newarray ['password'] )) {
				die ( "数据篡改" );
			}
			$newarray ['password'] = md5 ( $thearray ['password'] );
		} else {
			$newarray ['username'] = com_oftenfunction::delspecialchar ( $thearray ['username'] );
			if (empty ( $newarray ['username'] )) {
				die ( "数据篡改" );
			}
		}
		return dal_admin::getone ( $newarray );
	}
	
	/**
	 * 获取管理员列表
	 */
	public static function getlist() {
		return dal_admin::getlist ();
	}
	
	/**
	 * 添加管理员
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function add($thearray) {
		$newarray = array ();
		$newarray ['username'] = com_oftenfunction::delspecialchar ( $thearray ['user'] );
		$newarray ['password'] = com_oftenfunction::delspecialchar ( $thearray ['pass1'] );
		$newarray ['nickname'] = com_oftenfunction::delspecialchar ( $thearray ['nickname'] );
		if (empty ( $newarray ['username'] ) || empty ( $newarray ['password'] )) {
			die ( "数据篡改" );
		}
		$temp = self::getone ( array (
				"username" => $newarray ['username'] 
		) );
		if (count ( $temp ) > 0) {
			die ( "该账号已经存在" );
		}
		$newarray ['password'] = md5 ( $newarray ['password'] );
		$newarray ['loginnum'] = 0;
		$newarray ['logintime'] = date ( "Y-m-d H:i:s" );
		$newarray ['uplogintime'] = date ( "Y-m-d H:i:s" );
		$newarray ['isdelete'] = 0;
		return dal_admin::add ( $newarray );
	}
	
	/**
	 * 修改管理员
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function edit($thearray) {
		$theobj = self::getone ( array (
				"id" => $thearray ['id'] 
		) );
		$newarray = array ();
		$newarray ['id'] = intval ( $thearray ['id'] );
		if (array_key_exists ( 'password', $thearray )) {
			$newarray ['password'] = com_oftenfunction::delspecialchar ( $thearray ['password'] );
			if (empty ( $newarray ['password'] )) {
				die ( "数据篡改" );
			}
			$newarray ['password'] = md5 ( $newarray ['password'] );
		}
		$newarray ['nickname'] = com_oftenfunction::delspecialchar ( $thearray ['nickname'] );
		$newarray ['loginnum'] = intval ( $thearray ['loginnum'] );
		$newarray ['logintime'] = date ( "Y-m-d H:i:s", strtotime ( $thearray ['logintime'] ) );
		$newarray ['uplogintime'] = date ( "Y-m-d H:i:s", strtotime ( $thearray ['uplogintime'] ) );
		return dal_admin::edit ( $newarray );
	}
	
	/**
	 * 删除一个管理员
	 *
	 * @param string $idlist
	 *        	不能为空 多个必须用-分割开
	 * @return error1 id字符串不能为空|error2 删除失败|ok 删除成功
	 */
	public static function delete($idlist) {
		if (empty ( $idlist )) {
			return 'error1';
		}
		$idlist = str_replace ( '-', ',', $idlist );
		if (dal_admin::delete ( $idlist )) {
			return 'ok';
		} else {
			return 'error2';
		}
	}
	
	/**
	 * 检测当前是否有管理员登录
	 *
	 * @return int 管理员ID
	 */
	public static function islogin() {
		if (! array_key_exists ( 'adminlogininfo', $_SESSION )) {
			return 0;
		}
		$newarray = explode ( "|", $_SESSION ['adminlogininfo'] );
		if (count ( $newarray ) != 2 || intval ( $newarray [0] ) === 0 || strlen ( $newarray [1] ) != 27) {
			return 0;
		}
		$theobj = self::getone ( array (
				"id" => $newarray [0] 
		) );
		if ($_SESSION ['adminlogininfo'] == $theobj ['id'] . '|' . substr ( md5 ( $theobj ['password'] ), 5 )) {
			return $theobj ['id'];
		} else {
			return 0;
		}
	}
	
	/**
	 * 管理员登录
	 *
	 * @param array $thearray        	
	 * @return bool true|false
	 */
	public static function login($thearray) {
		$theobj = self::getone ( $thearray );
		if (count ( $theobj ) > 0) {
			$_SESSION ['adminlogininfo'] = $theobj ['id'] . '|' . substr ( md5 ( $theobj ['password'] ), 5 );
			$theobj ['loginnum'] ++;
			$theobj ['uplogintime'] = $theobj ['logintime'];
			$theobj ['logintime'] = date ( "Y-m-d H:i:s" );
			dal_admin::edit ( $theobj );
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * 管理员退出登录
	 */
	public static function outlogin() {
		if (! isset ( $_SESSION )) {
			session_start ();
		}
		if (array_key_exists ( 'adminlogininfo', $_SESSION )) {
			unset ( $_SESSION ['adminlogininfo'] );
		}
	}
}
?>