<?php
/**
 * 新闻列表数据层
 * 
 * @author sansanchengbao
 *
 */
class dal_news extends dal_base {
	/**
	 * 搜索列表
	 *
	 * @param string $sortidlist
	 *        	类别ID，多个用逗号分割
	 * @param array $wherearray(type,name,value)
	 *        	type:likeString|=String|=Int|>Int|<Int
	 * @param int $num=0        	
	 * @return array
	 */
	public static function getserachlist($sortidlist, $wherearray, $num = 0) {
		global $conn;
		$datalist = array ();
		$idarray = explode ( ",", $sortidlist );
		$sql = "select * from " . parent::_tablename ( 5 ) . " where isdelete=0 and sort";
		if (count ( $idarray ) > 0) {
			$sql .= " in ($sortidlist)";
		} else {
			$sql .= "=$sortidlist";
		}
		if (count ( $wherearray ) > 0) {
			$sql2 = "(";
			foreach ( $wherearray as $row ) {
				if ($sql2 != "(") {
					$sql2 .= " or ";
				}
				if ($row ['type'] == "likestring") {
					$sql2 .= "  $row[name] like '%$row[value]%' ";
				} elseif ($row ['type'] == "=string") {
					$sql2 .= " $row[name] = '$row[value]' ";
				} elseif ($row ['type'] == "=int") {
					$sql2 .= " $row[name] = $row[value] ";
				} elseif ($row ['type'] == ">int") {
					$sql2 .= " $row[name] > $row[value] ";
				} elseif ($row ['type'] == "<int") {
					$sql2 .= " $row[name] < $row[value] ";
				} else {
				}
			}
			$sql2 .= ")";
		}
		$sql .= " and " . $sql2 . " order by serialnum desc";
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
	 * 添加一个新闻
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function add($thearray) {
		return parent::_add ( $thearray, 5 );
	}
	
	/**
	 * 修改一个新闻
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function edit($thearray) {
		return parent::_edit ( $thearray, 5 );
	}
	
	/**
	 * 删除新闻
	 *
	 * @param string $idlist
	 *        	多个必须用逗号分割开
	 * @return bool
	 */
	public static function delete($idlist) {
		return parent::_deleteb ( $idlist, 5 );
	}
	
	/**
	 * 获取一个新闻
	 *
	 * @param int $id        	
	 * @return array
	 */
	public static function getone($id) {
		return parent::_getone ( $id, 5 );
	}
	
	/**
	 * 获取新闻列表
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
		$sql = "select * from " . parent::_tablename ( 5 ) . " where isdelete=0 and sort";
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
	 * 获取某类别下的新闻数量
	 *
	 * @param int $id
	 *        	类别ID
	 * @return int
	 */
	public static function getcount($id) {
		global $conn;
		$sql = "select count(*) from " . parent::_tablename ( 5 ) . " where isdelete=0 and sort=$id";
		return $conn->getone ( $sql );
	}
	
	/**
	 * 获取某个新闻的上一条或者下一条
	 *
	 * @param int $sort        	
	 * @param int $serialnum        	
	 * @param string $type        	
	 */
	public static function getoneprenext($sort, $serialnum, $type) {
		global $conn;
		if ($type == "pre") {
			$sql = "select * from " . parent::_tablename ( 5 ) . " where sort=$sort and serialnum>$serialnum order by serialnum asc";
		} else {
			$sql = "select * from " . parent::_tablename ( 5 ) . " where sort=$sort and serialnum<$serialnum order by serialnum desc";
		}
		$datalist = array ();
		$rs = $conn->SelectLimit ( $sql, 1, 0 );
		if (! $rs->EOF) {
			$datalist = $rs->getrows ();
		}
		if (count ( $datalist ) > 0) {
			return $datalist [0];
		} else {
			return array ();
		}
	}
}
?>