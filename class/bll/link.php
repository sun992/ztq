<?php
/**
 * 链接逻辑层
 * 
 * @author sansanchengbao
 *
 */
class bll_link {
	/**
	 * 获取一条链接
	 *
	 * @param int $id        	
	 * @return array
	 */
	public static function getone($id) {
		return dal_link::getone ( intval ( $id ) );
	}
	
	/**
	 * 获取链接列表
	 *
	 * @param string $sortidlist
	 *        	类别ID字符串,多个使用逗号分割
	 * @param int $num=0
	 *        	获取数量
	 * @return array
	 */
	public static function getlist($sortidlist, $num = 0) {
		if (empty ( $sortidlist )) {
			return array ();
		}
		$idtemparray = explode ( ",", $sortidlist );
		$sortarray = array ();
		foreach ( $idtemparray as $value ) {
			$sortarray = array_merge ( $sortarray, bll_linksort::getlist ( intval ( $value ) ) );
		}
		foreach ( $sortarray as $row ) {
			$sortidlist .= ",$row[id]";
		}
		return dal_link::getlist ( $sortidlist, $num );
	}
	
	/**
	 * 添加一个链接
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function add($thearray) {
		$newarray = array ();
		$newarray = com_oftenfunction::makearray ( $thearray );
		$newarray ['title'] = com_oftenfunction::delspecialchar ( $thearray ['title'] );
		$newarray ['sort'] = intval ( $thearray ['theid'] );
		$newarray ['serialnum'] = 0;
		$newarray ['isdelete'] = 0;
		$theid = dal_link::add ( $newarray );
		dal_link::edit ( array (
				"id" => $theid,
				'serialnum' => $theid 
		) );
		if ($theid > 0) {
			bll_filelog::edit ( $thearray, 'link', $theid );
		}
		return $theid;
	}
	
	/**
	 * 修改一个链接
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function edit($thearray) {
		$newarray = com_oftenfunction::makearray ( $thearray );
		$newarray ['id'] = intval ( $thearray ['theid'] );
		$newarray ['title'] = com_oftenfunction::delspecialchar ( $thearray ['title'] );
		$theid = dal_link::edit ( $newarray );
		if ($theid > 0) {
			bll_filelog::edit ( $thearray, 'link', $theid );
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
			bll_filelog::edit ( array (), 'link', $theid );
		}
		if (dal_link::delete ( $idlist )) {
			return 'ok';
		} else {
			return 'error2';
		}
	}
	
	/**
	 * 交换两个类别的序号
	 *
	 * @param string $idstr        	
	 */
	public static function swapserial($idstr) {
		$thearray = explode ( "-", $idstr );
		for($i = 0; $i < 4; $i ++) {
			$thearray [$i] = intval ( $thearray [$i] );
		}
		dal_link::edit ( array (
				"id" => $thearray [0],
				"serialnum" => $thearray [3] 
		) );
		dal_link::edit ( array (
				"id" => $thearray [1],
				"serialnum" => $thearray [2] 
		) );
	}
	
	/**
	 * 获取某类别下的链接数量
	 *
	 * @param int $id
	 *        	类别ID
	 * @return int
	 */
	public static function getcount($id) {
		return dal_link::getcount ( intval ( $id ) );
	}
	
	/**
	 * 获取一组链接的上一条与下一条
	 *
	 * @param array $thelist
	 *        	需要排序的链接的二维数组
	 * @return array
	 */
	public static function getprenext($thelist) {
		if (count ( $thelist ) == 0) {
			return array ();
		}
		$alllist = dal_link::getlist ( $thelist [0] ['sort'] );
		$begin = 0;
		for($j = 0; $j < count ( $alllist ); $j ++) {
			if (intval ( $alllist [$j] ['id'] ) == intval ( $thelist [0] ['id'] )) {
				$begin = $j;
				break;
			}
		}
		for($i = $begin; $i < $begin + count ( $thelist ); $i ++) {
			$thelist [$i - $begin] ['prestr'] = '';
			$thelist [$i - $begin] ['nextstr'] = '';
			if ($i > 0) {
				$thelist [$i - $begin] ['prestr'] = $thelist [$i - $begin] ['id'] . '-' . $alllist [$i - 1] ['id'] . '-' . $thelist [$i - $begin] ['serialnum'] . '-' . $alllist [$i - 1] ['serialnum'];
			}
			if ($i < count ( $alllist ) - 1) {
				$thelist [$i - $begin] ['nextstr'] = $thelist [$i - $begin] ['id'] . '-' . $alllist [$i + 1] ['id'] . '-' . $thelist [$i - $begin] ['serialnum'] . '-' . $alllist [$i + 1] ['serialnum'];
			}
		}
		return $thelist;
	}
}
?>