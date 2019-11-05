<?php
/**
 * 留言板逻辑层
 * 
 * @author sansanchengbao
 *
 */
class bll_guestbook {
	/**
	 * 添加留言
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function add($thearray) {
		$newarray = array ();
		$newarray ['nickname'] = com_oftenfunction::delspecialchar ( $thearray ['nickname'] );
		$newarray ['tel'] = com_oftenfunction::delspecialchar ( $thearray ['tel'] );
		$newarray ['address'] = com_oftenfunction::delspecialchar ( $thearray ['address'] );
		$newarray ['email'] = com_oftenfunction::delspecialchar ( $thearray ['email'] );
		$newarray ['subject'] = com_oftenfunction::delspecialchar ( $thearray ['subject'] );
		$newarray ['content'] = com_oftenfunction::delspecialchar ( $thearray ['content'] );
		$newarray ['ip'] = bll_guestbook::getip ();
		$newarray ['sdate'] = date ( "Y-m-d H:i:s" );
		$newarray ['isdelete'] = 0;
		$thesql = array ();
		$thesql = dal_guestbook::getlistbyip ( $newarray ['ip'] );
		if (count ( $thesql ) != 0) {
			for($i = 0; $i < count ( $thesql ); $i ++) {
				if (strtotime ( date ( "Y-m-d H:i:s" ) ) - strtotime ( $thesql [$i] ['sdate'] ) < 180) {
					return - 1;
				}
			}
		}
		return dal_guestbook::add ( $newarray );
	}
	public static function getip() {
		if (getenv ( "HTTP_CLIENT_IP" ) && strcasecmp ( getenv ( "HTTP_CLIENT_IP" ), "unknown" ))
			$ip = getenv ( "HTTP_CLIENT_IP" );
		else if (getenv ( "HTTP_X_FORWARDED_FOR" ) && strcasecmp ( getenv ( "HTTP_X_FORWARDED_FOR" ), "unknown" ))
			$ip = getenv ( "HTTP_X_FORWARDED_FOR" );
		else if (getenv ( "REMOTE_ADDR" ) && strcasecmp ( getenv ( "REMOTE_ADDR" ), "unknown" ))
			$ip = getenv ( "REMOTE_ADDR" );
		else if (isset ( $_SERVER ['REMOTE_ADDR'] ) && $_SERVER ['REMOTE_ADDR'] && strcasecmp ( $_SERVER ['REMOTE_ADDR'], "unknown" ))
			$ip = $_SERVER ['REMOTE_ADDR'];
		else
			$ip = "unknown";
		return ($ip);
	}
	/**
	 * 回复留言
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function repaly($thearray) {
		$newarray = array ();
		$newarray ['id'] = intval ( $thearray ['id'] );
		$newarray ['repaly'] = com_oftenfunction::delspecialchar ( $thearray ['repaly'] );
		return dal_guestbook::edit ( $newarray );
	}
	
	/**
	 * 留言审核
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function checkup($thearray) {
		$newarray = array ();
		$newarray ['id'] = intval ( $thearray ['id'] );
		$newarray ['issh'] = intval ( $thearray ['issh'] );
		return dal_guestbook::edit ( $newarray );
	}
	
	/**
	 * 删除留言
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
		if (dal_guestbook::delete ( $idlist )) {
			return 'ok';
		} else {
			return 'error2';
		}
	}
	
	/**
	 * 获取一个留言
	 *
	 * @param int $id        	
	 * @return array
	 */
	public static function getone($id) {
		return dal_guestbook::getone ( intval ( $id ) );
	}
	
	/**
	 * 获取列表
	 *
	 * @param bool $issh
	 *        	是否显示未审核的留言
	 */
	public static function getlist($issh) {
		settype ( $issh, "boolean" );
		return dal_guestbook::getlist ( $issh );
	}
}
?>