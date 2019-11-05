<?php
/**
 * 留言板数据层
 * 
 * @author sansanchengbao
 *
 */
class dal_guestbook extends dal_base {
	/**
	 * 添加一个留言
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function add($thearray) {
		return parent::_add ( $thearray, 9 );
	}
	
	/**
	 * 修改一个留言
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function edit($thearray) {
		return parent::_edit ( $thearray, 9 );
	}
	
	/**
	 * 删除留言
	 *
	 * @param string $idlist
	 *        	多个必须用逗号分割开
	 * @return bool
	 */
	public static function delete($idlist) {
		return parent::_deletea ( $idlist, 9 );
	}
	
	/**
	 * 获取一个留言
	 *
	 * @param int $id        	
	 * @return array
	 */
	public static function getone($id) {
		return parent::_getone ( $id, 9 );
	}
	
	/**
	 * 获取列表
	 *
	 * @param bool $issh
	 *        	是否显示未审核的留言
	 */
	public static function getlist($issh) {
		global $conn;
		$datalist = array ();
		if ($issh) {
			$sql = "select * from " . self::_tablename ( 9 ) . " where isdelete=0 order by id desc";
		} else {
			$sql = "select * from " . self::_tablename ( 9 ) . " where issh=1 and isdelete=0 order by id desc";
		}
		$rs = $conn->Execute ( $sql );
		if (! $rs->EOF) {
			$datalist = $rs->getrows ();
		}
		return $datalist;
	}
	
	/**
	 * 获取指定Ip列表
	 *
	 * @param bool $issh
	 *        	是否显示未审核的留言
	 */
	public static function getlistbyip($ip) {
		global $conn;
		$datalist = array ();
		$sql = "select * from " . self::_tablename ( 9 ) . " where ip='" . $ip . "' and isdelete=0 order by id desc";
		$rs = $conn->Execute ( $sql );
		if (! $rs->EOF) {
			$datalist = $rs->getrows ();
		}
		return $datalist;
	}
}
?>