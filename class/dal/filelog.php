<?php
/**
 * 文件上传记录数据层类
 * 
 * @author sansanchengbao
 *
 */
class dal_filelog extends dal_base {
	/**
	 * 添加一个记录
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function add($thearray) {
		return parent::_add ( $thearray, 3 );
	}
	
	/**
	 * 删除记录
	 *
	 * @param string $idlist
	 *        	多个必须用逗号分割开
	 * @return bool
	 */
	public static function delete($idlist) {
		return parent::_deletea ( $idlist, 3 );
	}
	
	/**
	 * 获取记录列表
	 *
	 * @param string $type
	 *        	类型
	 * @param int $theid
	 *        	对应id
	 */
	public static function getlist($type, $theid) {
		global $conn;
		$sql = "select * from " . self::_tablename ( 3 ) . " where theType='$type' and theid=$theid and isdelete=0 order by id asc";
		$rs = $conn->Execute ( $sql );
		if (! $rs->EOF) {
			return $rs->getrows ();
		} else {
			return array ();
		}
	}
}
?>