<?php
/**
 * 文件上传记录逻辑层类
 * 
 * @author sansanchengbao
 *
 */
class bll_filelog {
	/**
	 * 操作一次提交的文件变动记录
	 *
	 * @param array $thearray        	
	 * @param string $type        	
	 * @param int $theid        	
	 */
	public static function edit($thearray, $type, $theid) {
		$thecontent = '&nbsp;';
		if (array_key_exists ( 'oldname', $thearray )) {
			if (! empty ( $thearray ['oldname'] )) {
				$tempoldname = explode ( "|", $thearray ['oldname'] );
				$tempsavename = explode ( "|", $thearray ['savename'] );
				$tempsavepath = explode ( "|", $thearray ['savepath'] );
				for($i = 0; $i < count ( $tempoldname ); $i ++) {
					$one = array ();
					$one ['oldname'] = $tempoldname [$i];
					$one ['savename'] = $tempsavename [$i];
					$one ['savepath'] = $tempsavepath [$i];
					$one ['thetype'] = $type;
					$one ['theid'] = $theid;
					$one ['isdelete'] = 0;
					dal_filelog::add ( $one );
				}
				$thearray ['oldname'] = '';
				$thearray ['savename'] = '';
				$thearray ['savepath'] = '';
			}
		}
		
		foreach ( $thearray as $key => $value ) {
			$thecontent .= $value;
		}
		$oldarray = dal_filelog::getlist ( $type, $theid );
		$delidlist = "";
		for($i = 0; $i < count ( $oldarray ); $i ++) {
			if (strpos ( $thecontent, $oldarray [$i] ['savename'] ) === false) {
				if (! empty ( $delidlist )) {
					$delidlist .= ",";
				}
				$delidlist .= $oldarray [$i] ['id'];
			}
		}
		if (! empty ( $delidlist )) {
			dal_filelog::delete ( $delidlist );
		}
	}
}
?>