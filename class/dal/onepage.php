<?php
/**
 * 单页数据层
 * 
 * @author sansanchengbao
 *
 */
class dal_onepage extends dal_base {
	/**
	 * 添加一个单页
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function add($thearray) {
		return parent::_add ( $thearray, 2 );
	}
	
	/**
	 * 修改一个单页
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function edit($thearray) {
		return parent::_edit ( $thearray, 2 );
	}
	
	/**
	 * 删除单页
	 *
	 * @param string $idlist
	 *        	多个必须用逗号分割开
	 * @return bool
	 */
	public static function delete($idlist) {
		return parent::_deletea ( $idlist, 2 );
	}
	
	/**
	 * 获取一个单页
	 *
	 * @param int $id        	
	 * @return array
	 */
	public static function getone($id) {
		return parent::_getone ( $id, 2 );
	}
	
	/**
	 * 获取单页列表
	 *
	 * @return array
	 */
	public static function getlist() {
		return parent::_getalllist ( 2, "id asc" );
	}
}
?>