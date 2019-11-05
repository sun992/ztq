<?php
/**
 * 数据层基础类
 * 
 * @author sansanchengbao
 *
 */
class dal_base {
	/**
	 * 表前缀
	 *
	 * @var string
	 */
	private static $_prefix = "tb_";
	
	/**
	 * 获取表名
	 * 
	 * @param $type 1:admin
	 *        	后台管理员表 2:onepage 单页表 3:filelog 文件上传记录表
	 *        	4:newssort 新闻类别 5:news 新闻 6:linksort 链接类别 7:link 链接 8:member
	 *        	会员
	 *        	9:guestbook 留言列表
	 *        	
	 */
	protected static function _tablename($type) {
		switch (intval ( $type )) {
			case 1 :
				return self::$_prefix . 'admin';
			case 2 :
				return self::$_prefix . 'onepage';
			case 3 :
				return self::$_prefix . 'filelog';
			case 4 :
				return self::$_prefix . 'newssort';
			case 5 :
				return self::$_prefix . 'news';
			case 6 :
				return self::$_prefix . 'linksort';
			case 7 :
				return self::$_prefix . 'link';
			case 8 :
				return self::$_prefix . 'member';
			case 9 :
				return self::$_prefix . 'guestbook';
			default :
				die ( "表名错误" );
				break;
		}
	}
	
	/**
	 * 添加一个记录
	 *
	 * @param array $thearray        	
	 * @param int $type        	
	 * @return int
	 */
	protected static function _add($thearray, $type) {
		global $conn;
		$rs = $conn->execute ( "select * from " . self::_tablename ( $type ) . " where 1<>1" );
		if ($conn->execute ( $conn->GetInsertSQL ( $rs, $thearray, false ) )) {
			return $conn->Insert_ID ();
		} else {
			return 0;
		}
	}
	
	/**
	 * 修改一个记录
	 *
	 * @param array $thearray
	 *        	(必须包含id)
	 * @param int $type        	
	 * @return int
	 */
	protected static function _edit($thearray, $type) {
		global $conn;
		$rs = $conn->execute ( "select * from " . self::_tablename ( $type ) . " where id=" . $thearray ['id'] );
		if ($conn->execute ( $conn->GetUpdateSQL ( $rs, $thearray, true, false ) )) {
			return $thearray ['id'];
		} else {
			return 0;
		}
	}
	
	/**
	 * 逻辑删除一系列记录
	 *
	 * @param string $idlist
	 *        	不能为空 多个必须用逗号分割开
	 * @param int $type        	
	 * @return true false
	 */
	protected static function _deletea($idlist, $type) {
		global $conn;
		$sql = "update " . self::_tablename ( $type ) . " set isdelete=1 where id in ($idlist)";
		if ($conn->execute ( $sql )) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * 物理删除一系列记录
	 *
	 * @param string $idlist
	 *        	不能为空 多个必须用逗号分割开
	 * @param int $type        	
	 * @return true false
	 */
	protected static function _deleteb($idlist, $type) {
		global $conn;
		$sql = "delete from " . self::_tablename ( $type ) . " where id in ($idlist)";
		if ($conn->execute ( $sql )) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * 获取一个记录
	 *
	 * @param int $id        	
	 * @param int $type        	
	 * @return null array
	 */
	protected static function _getone($id, $type) {
		global $conn;
		$row = null;
		$sql = "select * from " . self::_tablename ( $type ) . " where id=$id";
		$rs = $conn->execute ( $sql );
		$row = array ();
		if (! $rs->eof) {
			$row = $rs->FetchRow ();
		}
		return $row;
	}
	
	/**
	 * 获取所有记录
	 *
	 * @param int $type        	
	 * @param string $orderBy
	 *        	排序 默认为 id desc
	 * @param bool $isdelete
	 *        	是否含有逻辑删除 默认true
	 * @return array
	 */
	protected static function _getalllist($type, $orderby = "id desc", $isdelete = true) {
		global $conn;
		if ($isdelete) {
			$sql = "select * from " . self::_tablename ( $type ) . " where isdelete=0 order by $orderby";
		} else {
			$sql = "select * from " . self::_tablename ( $type ) . " order by $orderby";
		}
		$rs = $conn->execute ( $sql );
		if (! $rs->eof) {
			return $rs->getrows ();
		} else {
			return array ();
		}
	}
}