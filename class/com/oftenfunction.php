<?php
/**
 * 公用函数
 * 
 * @author sansanchengbao
 *
 */
class com_oftenfunction {
	/**
	 * 打开数据库连接
	 *
	 * @param string $hostname
	 *        	服务器名称
	 * @param string $user        	
	 * @param string $pass        	
	 * @param string $basename        	
	 */
	public static function openconn($hostname, $user, $pass, $basename) {
		$conn = adonewconnection ( "mysql" );
		$conn->connect ( $hostname, $user, $pass, $basename );
		return $conn;
	}
	
	/**
	 * 实例化一个Sarty
	 */
	public static function opensmarty() {
		$tpl = new smarty ();
		$baseurl = substr ( dirname ( __FILE__ ), 0, - 10 ); // //路径
		$tpl->template_dir = "$baseurl/tpl";
		$tpl->compile_dir = "$baseurl/temp/compile";
		$tpl->config_dir = "$baseurl/temp/config";
		$tpl->cache_dir = "$baseurl/temp/cache";
		$tpl->left_delimiter = '{:';
		$tpl->right_delimiter = ':}';
		$tpl->caching = false;
		return $tpl;
	}
	
	/**
	 * 替换字符串中的特殊字符为10进制的ascii
	 * & ! ? : = > < ( ) ; + -
	 *
	 * @param string $string
	 *        	需要处理的字符串
	 * @return string 处理后的字符串
	 */
	public static function delspecialchar($string) {
		if (! empty ( $string )) {
			$string = str_ireplace ( '&', '&amp;', $string );
			$old = array (
					';',
					'!',
					'?',
					':',
					'=',
					'>',
					'<',
					'(',
					')',
					'+',
					'-' 
			);
			$now = array (
					';',
					'!',
					'?',
					':',
					'=',
					'>',
					'<',
					'(',
					')',
					'+',
					'-' 
			);
			$string = str_ireplace ( $old, $now, $string );
			$string = str_ireplace ( '&amp&#59;', '&amp;', $string );
		}
		return $string;
	}
	
	/**
	 * 去除HTML JS CSS
	 *
	 * @param string $string
	 *        	需要处理的字符串
	 * @return string 纯文本字符串
	 */
	public static function nohtml($string) {
		if ($string == "") {
			return "";
		}
		$search = array (
				"'<script[^>]*?>.*?</script>'si",
				"'<style[^>]*?>.*?</style>'si",
				"'<[/!]*?[^<>]*?>'si",
				"'<!--[/!]*?[^<>]*?>'si",
				"'([rn])[s]+'",
				"'&(quot|#34);'i",
				"'&(amp|#38);'i",
				"'&(lt|#60);'i",
				"'&(gt|#62);'i",
				"'&(nbsp|#160);'i",
				"'&(iexcl|#161);'i",
				"'&(cent|#162);'i",
				"'&(pound|#163);'i",
				"'&(copy|#169);'i",
				"'&#(d+);'e" 
		);
		$replace = array (
				"",
				"",
				"",
				"",
				"\1",
				"\"",
				"&",
				"<",
				">",
				" ",
				chr ( 161 ),
				chr ( 162 ),
				chr ( 163 ),
				chr ( 169 ),
				"chr(\1)" 
		);
		return preg_replace ( $search, $replace, $string );
	}
	
	/**
	 * 字符串截取
	 *
	 * @param string $sourcestr
	 *        	是要处理的字符串
	 * @param int $cutlength
	 *        	为截取的长度(即字数)
	 */
	public static function cut_str($sourcestr, $cutlength) {
		$returnstr = "";
		$i = 0;
		$n = 0;
		$str_length = strlen ( $sourcestr );
		// 字符串的字节数
		while ( ($n < $cutlength) and ($i <= $str_length) ) {
			$temp_str = substr ( $sourcestr, $i, 1 );
			$ascnum = Ord ( $temp_str );
			// 得到字符串中第$i位字符的ascii码
			// 如果ASCII位高与224，
			if ($ascnum >= 224) {
				$returnstr .= substr ( $sourcestr, $i, 3 );
				// 根据UTF-8编码规范，将3个连续的字符计为单个字符
				$i = $i + 3;
				// 实际Byte计为3
				$n ++; // 字串长度计1
					       // 如果ASCII位高与192，
			} elseif ($ascnum >= 192) {
				$returnstr = $returnstr . substr ( $sourcestr, $i, 2 );
				// 根据UTF-8编码规范，将2个连续的字符计为单个字符
				$i = $i + 2;
				// 实际Byte计为2
				$n ++; // 字串长度计1
					       // 如果是大写字母，
			} elseif ($ascnum >= 65 && $ascnum <= 90) {
				$returnstr = $returnstr . substr ( $sourcestr, $i, 1 );
				$i = $i + 1;
				// 实际的Byte数仍计1个
				$n ++; // 但考虑整体美观，大写字母计成一个高位字符
			} else { // 其他情况下，包括小写字母和半角标点符号，
				$returnstr = $returnstr . substr ( $sourcestr, $i, 1 );
				$i = $i + 1;
				// 实际的Byte数计1个
				$n = $n + 0.5; // 小写字母和半角标点等与半个高位字符宽…
			}
		}
		if ($str_length > $i) {
			$returnstr .= "...";
			
			// 超过长度时在尾处加上省略号
		}
		return $returnstr;
	}
	
	/**
	 * 后台数据格式化
	 * 键 ****_int、****_txt、****_text、****_time
	 *
	 * @param array $thearray        	
	 * @param
	 *        	array
	 */
	public static function makearray($thearray) {
		if (count ( $thearray ) == 0) {
			return $thearray;
		}
		$newarray = array ();
		foreach ( $thearray as $key => $value ) {
			if (strpos ( $key, "_" ) !== false) {
				$temparr = explode ( "_", $key );
				if ($temparr [0] == 'kf') {
					$newarray [$temparr [0]] = stripcslashes ( $value );
					continue;
				}
				switch (strtolower ( $temparr [1] )) {
					case "int" :
						$newarray [$temparr [0]] = intval ( $value );
						break;
					case "txt" :
						$newarray [$temparr [0]] = self::delspecialchar ( $value );
						break;
					case "text" :
						$newarray [$temparr [0]] = self::delspecialchar ( $value );
						break;
					case "time" :
						$newarray [$temparr [0]] = date ( "Y-m-d H:i:s", strtotime ( $value ) );
						break;
					default :
						break;
				}
			} else {
				$newarray [$key] = $value;
			}
		}
		return $newarray;
	}
	
	/**
	 * 发送邮箱函数
	 *
	 * @param string $theTitle
	 *        	邮件标题
	 * @param string $thebody
	 *        	邮件内容
	 * @param string $email
	 *        	收件人地址
	 */
	public static function sendTheMail($theTitle, $thebody, $email) {
		try {
			$mail = new PHPMailer ( true );
			$mail->IsSMTP (); // 启用SMTP
			$mail->SMTPAuth = true; // 开启SMTP认证
			$mail->Port = 25;
			$mail->Host = "smtp.qq.com"; // SMTP服务器
			$mail->Username = "cd.77hunjia@qq.com"; // SMTP用户名
			$mail->Password = "123liwenhua45688"; // SMTP密码
			                                      // $mail->IsSendmail ();
			$mail->AddReplyTo ( "cd.77hunjia@qq.com", webname ); // 回复地址 回复人
			$mail->From = "cd.77hunjia@qq.com"; // 发件人地址
			$mail->FromName = webname; // 发件人
			$to = $email; // 添加收件人
			$mail->AddAddress ( $to );
			$mail->Subject = $theTitle; // 邮件标题
			$mail->AltBody = '不支持HTML'; // 邮件正文不支持HTML的备用显示
			$mail->WordWrap = 80; // 设置每行字符长度
			$mail->MsgHTML ( $thebody ); // 邮件内容
			$mail->IsHTML ( true ); // 是否HTML格式邮件
			$mail->CharSet = "utf-8"; // 这里指定字符集！
			$mail->Encoding = "base64";
			$mail->Send ();
			return true;
		} catch ( phpmailerException $e ) {
			return false;
		}
	}
	
	/**
	 * 后台分页辅助函数
	 *
	 * @param array $thearray        	
	 */
	public static function adminloginpageinfo($thearray) {
		$value = '';
		if (empty ( $thearray ['frist'] )) {
			$value .= '&lt;&lt;&nbsp;首页';
			$value .= '&nbsp;&nbsp;&nbsp;&nbsp;&lt;&lt;&nbsp;上一页';
		} else {
			$value .= "<a href=\"$thearray[frist]\">&lt;&lt;&nbsp;首页</a>";
			$value .= "&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"$thearray[pre]\">&lt;&lt;&nbsp;上一页</a>";
		}
		if (empty ( $thearray ['end'] )) {
			
			$value .= '&nbsp;&nbsp;&nbsp;&nbsp;下一页&nbsp;&gt;&gt;';
			$value .= '&nbsp;&nbsp;&nbsp;&nbsp;尾页&nbsp;&gt;&gt;';
		} else {
			$value .= "&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"$thearray[next]\">下一页&nbsp;&gt;&gt;</a>";
			$value .= "&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"$thearray[end]\">尾页&nbsp;&gt;&gt;</a>";
		}
		$value .= "&nbsp;&nbsp;&nbsp;&nbsp;总计：$thearray[maxPage]页";
		$value .= "&nbsp;&nbsp;&nbsp;&nbsp;$thearray[recordCount]条记录";
		$value .= '&nbsp;&nbsp;&nbsp;&nbsp;跳转至&nbsp;';
		$value .= '<select onchange="gototheurl(this);">';
		foreach ( $thearray ['pagelist'] as $one ) {
			$value .= '<option value="' . $one ['url'] . '"';
			if ($one ['isselected']) {
				$value .= " selected=\"selected\"";
			}
			$value .= ">$one[num]</option>";
		}
		$value .= '</select>&nbsp;页';
		return $value;
	}
	
	/**
	 * 编辑器默认配置
	 */
	public static function getmreditorconfig() {
		$value = '';
		$value .= '../../bianji/ewebeditor.htm?id=content';
		$value .= '&originalfilename=oldname';
		$value .= '&savefilename=savename';
		$value .= '&savepathfilename=savepath';
		$value .= '&style=coolblue';
		return $value;
	}
	
	/**
	 * 获取移动链接
	 *
	 * @param string $thestr
	 *        	idA-idB-serialnumA-serialnumB
	 * @param string $jt
	 *        	箭头
	 * @param string $action        	
	 * @return string
	 */
	public static function getmove($thestr, $jt, $action) {
		$value = "&nbsp;";
		if (! empty ( $thestr )) {
			$temp = explode ( "-", $thestr );
			$value = "<a href=\"theaction.php?action=$action&idstr=$temp[0]-$temp[1]-$temp[2]-$temp[3]&rnd=" . rand ();
			$value .= "\" target='hideframe'>$jt</a>";
		}
		return $value;
	}
	
	/**
	 * 设置网页标题
	 * (方便修改标题)
	 *
	 * @param string $thisName
	 *        	本次标题
	 */
	public static function setwebname($thisname = '') {
		return $thisname . webname;
	}
	
	/**
	 * 时间字符串格式化(1900-01-01)
	 *
	 * @param string $string
	 *        	例如：2000-02-12 16:20:35
	 *        	@type 1:2000-02-12(默认) 2:02-12
	 */
	public static function setdate($string, $type = 1) {
		$array = explode ( "-", $string );
		$year = $array [0];
		$month = $array [1];
		$array = explode ( " ", $array [2] );
		$day = $array [0];
		$array = explode ( ":", $array [1] );
		$hour = $array [0];
		$minute = $array [1];
		$second = $array [2];
		$value = '';
		switch (intval ( $type )) {
			case 1 :
				$value = "$year-$month-$day";
			case 2 :
				$value = "$month-$day";
				break;
		}
		return $value;
	}
}
?>