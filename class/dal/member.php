<?php
/**
 * 会员数据层
 * 
 * @author sansanchengbao
 *
 */
class dal_member extends dal_base {
	
	/**
	 * 添加一个会员
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function add($thearray) {
		return parent::_add ( $thearray, 8 );
	}
	
	/**
	 * 修改一个会员
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function edit($thearray) {
		return parent::_edit ( $thearray, 8 );
	}
	
	/**
	 * 删除会员
	 *
	 * @param string $idlist
	 *        	多个必须用逗号分割开
	 * @return bool
	 */
	public static function delete($idlist) {
		return parent::_deletea ( $idlist, 8 );
	}
	
	/**
	 * 获取一个会员
	 *
	 * @param array $thearray
	 *        	id|username|username、passsword
	 * @return null array
	 */
	public static function getone($thearray) {
		global $conn;
		$row = null;
		if (array_key_exists ( 'id', $thearray )) {
			$sql = "select * from " . parent::_tablename ( 8 ) . " where id=$thearray[id]";
		} elseif (array_key_exists ( 'password', $thearray )) {
			$sql = "select * from " . parent::_tablename ( 8 ) . " where username='$thearray[username]' and password='$thearray[password]'";
		} else {
			$sql = "select * from " . parent::_tablename ( 8 ) . " where username='$thearray[username]'";
		}
		$rs = $conn->Execute ( $sql );
		$row = array ();
		if (! $rs->EOF) {
			$row = $rs->FetchRow ();
		}
		return $row;
	}
	
	/**
	 * 获取会员列表
	 *
	 * @return array
	 */
	public static function getlist() {
		return self::_getalllist ( 8 );
	}
}
?>