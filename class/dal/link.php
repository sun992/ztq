<?php
/**
 * 链接列表数据层
 * 
 * @author sansanchengbao
 *
 */
class dal_link extends dal_base {
	/**
	 * 添加一个链接
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function add($thearray) {
		return parent::_add ( $thearray, 7 );
	}
	
	/**
	 * 修改一个链接
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function edit($thearray) {
		return parent::_edit ( $thearray, 7 );
	}
	
	/**
	 * 删除链接
	 *
	 * @param string $idlist
	 *        	多个必须用逗号分割开
	 * @return bool
	 */
	public static function delete($idlist) {
		return parent::_deletea ( $idlist, 7 );
	}
	
	/**
	 * 获取一个链接
	 *
	 * @param int $id        	
	 * @return array
	 */
	public static function getone($id) {
		return parent::_getone ( $id, 7 );
	}
	
	/**
	 * 获取链接列表
	 *
	 * @param string $sortidlist
	 *        	类别ID，多个用逗号分割
	 * @param int $num=0        	
	 * @return array
	 */
	public static function getlist($sortidlist, $num = 0) {
		global $conn;
		$datalist = array ();
		$idarray = explode ( ",", $sortidlist );
		$sql = "select * from " . parent::_tablename ( 7 ) . " where isdelete=0 and sort";
		if (count ( $idarray ) > 0) {
			$sql .= " in ($sortidlist)";
		} else {
			$sql .= "=$sortidlist";
		}
		$sql .= " order by serialnum desc";
		$rs = null;
		if ($num > 0) {
			$rs = $conn->SelectLimit ( $sql, $num, 0 );
		} else {
			$rs = $conn->Execute ( $sql );
		}
		if (! $rs->EOF) {
			$datalist = $rs->getrows ();
		}
		return $datalist;
	}
	
	/**
	 * 获取某类别下的链接数量
	 *
	 * @param int $id
	 *        	类别ID
	 * @return int
	 */
	public static function getcount($id) {
		global $conn;
		$sql = "select count(*) from " . parent::_tablename ( 7 ) . " where isdelete=0 and sort=$id";
		return $conn->getone ( $sql );
	}
}
?>