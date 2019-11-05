<?php
/**
 * 新闻逻辑层
 * 
 * @author sansanchengbao
 *
 */
class bll_news {
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
		if (empty ( $sortidlist )) {
			return array ();
		}
		$idtemparray = explode ( ",", $sortidlist );
		$sortarray = array ();
		foreach ( $idtemparray as $value ) {
			$sortarray = array_merge ( $sortarray, bll_newssort::getlist ( intval ( $value ) ) );
		}
		foreach ( $sortarray as $row ) {
			$sortidlist .= ",$row[id]";
		}
		// echo $sortidlist;
		// exit;
		return dal_news::getserachlist ( $sortidlist, $wherearray, $num );
	}
	
	/**
	 * 获取一条新闻
	 *
	 * @param int $id        	
	 * @return array
	 */
	public static function getone($id) {
		return dal_news::getone ( intval ( $id ) );
	}
	
	/**
	 * 获取新闻列表
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
			$sortarray = array_merge ( $sortarray, bll_newssort::getlist ( intval ( $value ) ) );
		}
		foreach ( $sortarray as $row ) {
			$sortidlist .= ",$row[id]";
		}
		return dal_news::getlist ( $sortidlist, $num );
	}
	
	/**
	 * 添加一个新闻
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function add($thearray) {
		$newarray = array ();
		$newarray = com_oftenfunction::makearray ( $thearray );
		$newarray ['title'] = com_oftenfunction::delspecialchar ( $thearray ['title'] );
		$newarray ['sort'] = intval ( $thearray ['theid'] );
		$newarray ['content'] = stripslashes($thearray['content']);
		$newarray ['serialnum'] = 0;
		$newarray ['isdelete'] = 0;
		$theid = dal_news::add ( $newarray );
		dal_news::edit ( array (
				"id" => $theid,
				'serialnum' => $theid 
		) );
		if ($theid > 0) {
			bll_filelog::edit ( $thearray, 'news', $theid );
		}
		return $theid;
	}
	
	/**
	 * 修改一个新闻
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function edit($thearray) {
		$newarray = com_oftenfunction::makearray ( $thearray );
		$newarray ['id'] = intval ( $thearray ['theid'] );
		$newarray ['title'] = com_oftenfunction::delspecialchar ( $thearray ['title'] );
		$newarray ['content'] = stripslashes($thearray['content']);
		$theid = dal_news::edit ( $newarray );
		if ($theid > 0) {
			bll_filelog::edit ( $thearray, 'news', $theid );
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
			bll_filelog::edit ( array (), 'news', $theid );
		}
		if (dal_news::delete ( $idlist )) {
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
		dal_news::edit ( array (
				"id" => $thearray [0],
				"serialnum" => $thearray [3] 
		) );
		dal_news::edit ( array (
				"id" => $thearray [1],
				"serialnum" => $thearray [2] 
		) );
	}
	
	/**
	 * 获取某类别下的新闻数量
	 *
	 * @param int $id
	 *        	类别ID
	 * @return int
	 */
	public static function getcount($id) {
		return dal_news::getcount ( intval ( $id ) );
	}
	
	/**
	 * 获取一组新闻的上一条与下一条
	 *
	 * @param array $thelist
	 *        	需要排序的新闻的二维数组
	 * @return array
	 */
	public static function getprenext($thelist) {
		if (count ( $thelist ) == 0) {
			return array ();
		}
		$alllist = dal_news::getlist ( $thelist [0] ['sort'] );
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
	
	/**
	 * 获取一个新闻对象的上一篇与下一篇
	 *
	 * @param array $thearray        	
	 */
	public static function getoneprenext($thearray) {
		return array (
				dal_news::getoneprenext ( $thearray ['sort'], $thearray ['serialnum'], "pre" ),
				dal_news::getoneprenext ( $thearray ['sort'], $thearray ['serialnum'], "next" ) 
		);
	}
	
	/**
	 * 修改一个新闻浏览次数
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function editnumbers($thearray) {
		$newarray = com_oftenfunction::makearray ( $thearray );
		$newarray ['id'] = intval ( $thearray ['theid'] );
		$newarray ['numbers'] = $thearray ['numbers'] + 1;
		$theid = dal_news::edit ( $newarray );
		return $theid;
	}
}
?>