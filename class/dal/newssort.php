<?php
/**
 * 新闻类别列表数据层
 * 
 * @author sansanchengbao
 *
 */
class dal_newssort extends dal_base {
	/**
	 * 添加一个新闻类别
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function add($thearray) {
		return parent::_add ( $thearray, 4 );
	}
	
	/**
	 * 修改一个新闻类别
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function edit($thearray) {
		return parent::_edit ( $thearray, 4 );
	}
	
	/**
	 * 删除新闻类别
	 *
	 * @param string $idlist
	 *        	多个必须用逗号分割开
	 * @return bool
	 */
	public static function delete($idlist) {
		return parent::_deletea ( $idlist, 4 );
	}
	
	/**
	 * 获取一个新闻类别
	 *
	 * @param int $id        	
	 * @return array
	 */
	public static function getone($id) {
		return parent::_getone ( $id, 4 );
	}
	
	/**
	 * 获取新闻类别列表
	 *
	 * @return array
	 */
	public static function getlist() {
		return parent::_getalllist ( 4, "id asc" );
	}
}
?>