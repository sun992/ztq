<?php
/**
 * 新闻类别逻辑层
 * 
 * @author sansanchengbao
 *
 */
class bll_newssort {
	/**
	 * 获取一个类别
	 *
	 * @param int $id        	
	 */
	public static function getone($id) {
		return dal_newssort::getone ( intval ( $id ) );
	}
	
	/**
	 * 获取指定的类别
	 *
	 * @param int $pid
	 *        	父类ID
	 * @param int $zindex=9999
	 *        	深度
	 * @param array $datalist=array()
	 *        	需要处理的数据
	 * @param bool $isfrist=true
	 *        	是否为第一次递归
	 * @return array
	 */
	public static function getlist($pid, $zindex = 9999, $datalist = array(), $isfrist = true) {
		if (count ( $datalist ) == 0 && $isfrist) {
			$datalist = dal_newssort::getlist ();
		}
		if (count ( $datalist ) == 0) {
			return array ();
		}
		$pid = intval ( $pid );
		$thislist = array_filter ( $datalist, create_function ( '$one', "return intval(\$one['pid'])===$pid;" ) );
		$nextlist = array_filter ( $datalist, create_function ( '$one', "return intval(\$one['pid'])!==$pid;" ) );
		$newarray = $thislist;
		foreach ( $thislist as $row ) {
			if ($zindex > 0) {
				$newarray = array_merge ( $newarray, self::getlist ( $row ['id'], $zindex - 1, $nextlist, false ) );
			}
		}
		usort ( $newarray, create_function ( '$a,$b', "if (\$a['serialnum'] == \$b['serialnum']) {return 0;} return (\$a['serialnum'] < \$b['serialnum']) ? -1 : 1;" ) );
		return $newarray;
	}
	
	/**
	 * 添加类别
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function add($thearray) {
		$newarray = array ();
		$newarray = com_oftenfunction::makearray ( $thearray );
		$newarray ['pid'] = intval ( $thearray ['theid'] );
		$newarray ['sortname'] = com_oftenfunction::delspecialchar ( $thearray ['sortname'] );
		$newarray ['serialnum'] = 0;
		$newarray ['isdelete'] = 0;
		$theid = dal_newssort::add ( $newarray );
		dal_newssort::edit ( array (
				"id" => $theid,
				'serialnum' => $theid 
		) );
		if ($theid > 0) {
			bll_filelog::edit ( $thearray, 'newssort', $theid );
		}
		return $theid;
	}
	
	/**
	 * 修改类别
	 *
	 * @param array $thearray        	
	 * @return int
	 */
	public static function edit($thearray) {
		$newarray = array ();
		$newarray = com_oftenfunction::makearray ( $thearray );
		$newarray ['id'] = intval ( $thearray ['theid'] );
		$newarray ['sortname'] = com_oftenfunction::delspecialchar ( $thearray ['sortname'] );
		$theid = dal_newssort::edit ( $newarray );
		if ($theid > 0) {
			bll_filelog::edit ( $thearray, 'newssort', $theid );
		}
		return $theid;
	}
	
	/**
	 * 删除指定类别
	 *
	 * @param int $id        	
	 * @return bool
	 */
	public static function delete($id) {
		bll_filelog::edit ( array (), 'newssort', intval ( $id ) );
		return dal_newssort::delete ( intval ( $id ) );
	}
	
	/**
	 * 获取上一个类别
	 *
	 * @param int $serialnum
	 *        	作为对比的序号
	 * @param array $datalist
	 *        	对比的数据列表
	 * @return array
	 */
	public static function getpre($serialnum, $datalist) {
		if (count ( $datalist ) == 0) {
			return array ();
		}
		$serialnum = intval ( $serialnum );
		$templist = array_filter ( $datalist, create_function ( '$onesort', "return \$onesort['serialnum']<$serialnum;" ) );
		if (count ( $templist ) == 0) {
			return array ();
		}
		usort ( $templist, create_function ( '$a,$b', "if (\$a['serialnum'] == \$b['serialnum']) {return 0;} return (\$a['serialnum'] < \$b['serialnum']) ? 1 : -1;" ) );
		return $templist [0];
	}
	
	/**
	 * 获取下一个类别
	 *
	 * @param int $serialnum
	 *        	作为对比的序号
	 * @param array $datalist
	 *        	对比的数据列表
	 * @return array
	 */
	public static function getnext($serialnum, $datalist) {
		if (count ( $datalist ) == 0) {
			return array ();
		}
		$serialnum = intval ( $serialnum );
		$templist = array_filter ( $datalist, create_function ( '$onesort', "return \$onesort['serialnum']>$serialnum;" ) );
		if (count ( $templist ) == 0) {
			return array ();
		}
		usort ( $templist, create_function ( '$a,$b', "if (\$a['serialnum'] == \$b['serialnum']) {return 0;} return (\$a['serialnum'] > \$b['serialnum']) ? 1 : -1;" ) );
		return $templist [0];
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
		dal_newssort::edit ( array (
				"id" => $thearray [0],
				"serialnum" => $thearray [3] 
		) );
		dal_newssort::edit ( array (
				"id" => $thearray [1],
				"serialnum" => $thearray [2] 
		) );
	}
}
?>