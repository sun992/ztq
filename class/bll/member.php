<?php
/**
 * 会员逻辑层
 * 
 * @author sansanchengbao
 *
 */
class bll_member {
	
	/**
	 * 获取当前登录的会员
	 */
	public static function getmembernow() {
		$theid = self::islogin ();
		return self::getone ( array (
				"id" => $theid 
		) );
	}
	
	/**
	 * 获取一个会员
	 *
	 * @param array $thearray
	 *        	id|username|username、passsword
	 * @return null array
	 */
	public static function getone($thearray) {
		if (array_key_exists ( 'id', $thearray )) {
			$newarray ['id'] = intval ( $thearray ['id'] );
		} elseif (array_key_exists ( 'passsword', $thearray )) {
			$newarray ['username'] = com_oftenfunction::delspecialchar ( $thearray ['username'] );
			$newarray ['passsword'] = com_oftenfunction::delspecialchar ( $thearray ['passsword'] );
			if (empty ( $newarray ['username'] ) || empty ( $newarray ['passsword'] )) {
				die ( "数据篡改" );
			}
			$newarray ['passsword'] = md5 ( $thearray ['passsword'] );
		} else {
			$newarray ['username'] = com_oftenfunction::delspecialchar ( $thearray ['username'] );
			if (empty ( $newarray ['username'] )) {
				die ( "数据篡改" );
			}
		}
		return dal_member::getone ( $newarray );
	}
	
	/**
	 * 获取会员列表
	 */
	public static function getlist() {
		return dal_member::getlist ();
	}
	
	/**
	 * 添加会员
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function add($thearray) {
		$newarray = array ();
		$newarray = com_oftenfunction::makearray ( $thearray );
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
		$theid = dal_member::add ( $newarray );
		if ($theid > 0) {
			bll_filelog::edit ( $thearray, 'member', $theid );
		}
		return $theid;
	}
	
	/**
	 * 修改会员
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function edit($thearray) {
		$theobj = self::getone ( array (
				"id" => $thearray ['id'] 
		) );
		$newarray = array ();
		$newarray = com_oftenfunction::makearray ( $thearray );
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
		$theid = dal_member::edit ( $newarray );
		if ($theid > 0) {
			bll_filelog::edit ( $thearray, 'member', $theid );
		}
		return $theid;
	}
	
	/**
	 * 删除一个会员
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
		$thearray = explode ( ",", $idlist );
		foreach ( $thearray as $theid ) {
			bll_filelog::edit ( array (), 'member', $theid );
		}
		if (dal_member::delete ( $idlist )) {
			return 'ok';
		} else {
			return 'error2';
		}
	}
	
	/**
	 * 检测当前是否有会员登录
	 *
	 * @return int 会员ID
	 */
	public static function islogin() {
		if (! array_key_exists ( 'memberlogininfo', $_SESSION )) {
			return 0;
		}
		$newarray = explode ( "|", $_SESSION ['memberlogininfo'] );
		if (count ( $newarray ) != 2 || intval ( $newarray [0] ) === 0 || strlen ( $newarray [1] ) != 27) {
			return 0;
		}
		$theobj = self::getone ( array (
				"id" => $newarray [0] 
		) );
		if ($_SESSION ['memberlogininfo'] == $theobj ['id'] . '|' . substr ( md5 ( $theobj ['password'] ), 5 )) {
			return $theobj ['id'];
		} else {
			return 0;
		}
	}
	
	/**
	 * 会员登录
	 *
	 * @param array $thearray        	
	 * @return bool true|false
	 */
	public static function login($thearray) {
		$theobj = self::getone ( $thearray );
		if (count ( $theobj ) > 0) {
			$_SESSION ['memberlogininfo'] = $theobj ['id'] . '|' . substr ( md5 ( $theobj ['password'] ), 5 );
			$theobj ['loginnum'] ++;
			$theobj ['uplogintime'] = $theobj ['logintime'];
			$theobj ['logintime'] = date ( "Y-m-d H:i:s" );
			dal_member::edit ( $theobj );
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * 会员退出登录
	 */
	public static function outlogin() {
		if (! isset ( $_SESSION )) {
			session_start ();
		}
		if (array_key_exists ( 'memberlogininfo', $_SESSION )) {
			unset ( $_SESSION ['memberlogininfo'] );
		}
	}
}
?>