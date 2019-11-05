<?php
/**
 * 单页逻辑层
 * 
 * @author sansanchengbao
 *
 */
class bll_onepage {
	/**
	 * 获取一个单页
	 *
	 * @param int $id        	
	 * @return array
	 */
	public static function getone($id) {
		return dal_onepage::getone ( intval ( $id ) );
	}
	
	/**
	 * 获取单页列表
	 *
	 * @return array
	 */
	public static function getlist() {
		return dal_onepage::getlist ();
	}
	
	/**
	 * 添加一个单页
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function add($thearray) {
		$newarray = array ();
		$newarray ['title'] = com_oftenfunction::delspecialchar ( $thearray ['title'] );
		$newarray ['content'] = stripslashes($thearray['content']);
		$newarray ['isdelete'] = 0;
		$theid = dal_onepage::add ( $newarray );
		if ($theid > 0) {
			bll_filelog::edit ( $thearray, 'onepage', $theid );
		}
		return $theid;
	}
	
	/**
	 * 修改一个单页
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function edit($thearray) {
		$newarray = com_oftenfunction::makearray ( $thearray );
		$newarray ['id'] = intval ( $thearray ['theid'] );
		$newarray ['title'] = com_oftenfunction::delspecialchar ( $thearray ['title'] );
		$newarray ['content'] = stripslashes($thearray['content']);
		$theid = dal_onepage::edit ( $newarray );
		if ($theid > 0) {
			bll_filelog::edit ( $thearray, 'onepage', $theid );
		}
		return $theid;
	}
	
	/**
	 * 删除一个单页
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
		$thearray = explode ( ",", $idlist );
		foreach ( $thearray as $theid ) {
			bll_filelog::edit ( array (), 'onepage', $theid );
		}
		if (dal_onepage::delete ( $idlist )) {
			return 'ok';
		} else {
			return 'error2';
		}
	}
}
?>