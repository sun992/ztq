<?php
/**
 * 链接类别列表数据层
 * 
 * @author sansanchengbao
 *
 */
class dal_linksort extends dal_base {
	/**
	 * 添加一个链接类别
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function add($thearray) {
		return parent::_add ( $thearray, 6 );
	}
	
	/**
	 * 修改一个链接类别
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function edit($thearray) {
		return parent::_edit ( $thearray, 6 );
	}
	
	/**
	 * 删除链接类别
	 *
	 * @param string $idlist
	 *        	多个必须用逗号分割开
	 * @return bool
	 */
	public static function delete($idlist) {
		return parent::_deletea ( $idlist, 6 );
	}
	
	/**
	 * 获取一个链接类别
	 *
	 * @param int $id        	
	 * @return array
	 */
	public static function getone($id) {
		return parent::_getone ( $id, 6 );
	}
	
	/**
	 * 获取链接类别列表
	 *
	 * @return array
	 */
	public static function getlist() {
		return parent::_getalllist ( 6, "id asc" );
	}
}
?>