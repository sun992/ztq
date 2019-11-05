<?php
require_once 'config.php';
require 'mail/class.phpmailer.php';
/**
 * Ajax类
 *
 * @author sansanchengbao
 *        
 */
class usl_ajax {
	
	/**
	 * 构造类
	 */
	function __construct() {
		$this->_tpl = com_oftenfunction::opensmarty ();
		if (! array_key_exists ( 'action', $_REQUEST )) {
			die ( "缺少action参数" );
		}
		switch ($_REQUEST ['action']) {
			case "setnumbers" :
				echo $this->setnumbers (); // 设置浏览次数
				break;
			case "goShop" :
				echo $this->goShop (); // 商品退换
				break;
			case "copynews" :
				echo $this->copynews (); // 复制一条信息
				break;
			case "addmsg" :
				echo $this->addmsg (); // 留言
				break;
			default :
				die ( "未找到action" );
				break;
		}
	}	
	/**
	 * 设置浏览次数
	 */
	private function setnumbers() {
		$thearray = array ();
		$thearray ['theid'] = $_POST ['theid'];
		$thearray ['numbers'] = $_POST ['numbers'];
		if (bll_news::editnumbers ( $thearray )) {	
			die ( "设置成功!!!" );
		} else {
			die ( "设置失败!!!" );
		}
	}
	
	/**
	 * 商品退换
	 */
	private function addmsg() {
		$nickname = $_POST ['nickname'];
		$tel = $_POST ['tel'];
		$address = $_POST ['address'];
		$email = $_POST ['email'];
		$productname = $_POST ['productname'];
		$sl = $_POST ['sl'];
		$content = $_POST ['content'];
		$thearray = array ();
		$thearray ['nickname'] = $nickname;
		$thearray ['tel'] = $tel;
		$thearray ['address'] = $address;
		$thearray ['email'] = $email;
		$thearray ['productname'] = $productname;
		$thearray ['sl'] = $sl;
		$thearray ['content'] = $content;
		if (bll_guestbook::add ( $thearray ) > 0) {
			die("1");
		} else {
			die ("0");
		}
	}
	
	/**
	 * 复制文章
	 */
	private function copynews() {
		$theid = $_POST ['theid'];
		$tag = $_POST ['tag'];
		$tempdata=bll_news::getone( $theid );
		$thearray = array ();
		$thearray ['action'] = 'addnews';
		$thearray ['theid'] = $tempdata['sort'];
		$thearray ['tag'] = $tag;
		$thearray ['title'] = $tempdata['title'];
		$thearray ['picture_txt'] = $tempdata['picture'];
		$thearray ['picture2_txt'] = $tempdata['picture2'];
		//
		$thearray ['teaminfo_txt'] = $tempdata['teaminfo'];
		$thearray ['dizhi_txt'] = $tempdata['dizhi'];
		$thearray ['tels_txt'] = $tempdata['tels'];
		$thearray ['marker_txt'] = $tempdata['marker'];
		$thearray ['author_txt'] = $tempdata['author'];
		$thearray ['istime_txt'] = $tempdata['istime'];
		$thearray ['thekey_txt'] = $tempdata['thekey'];
		$thearray ['thedes_txt'] = $tempdata['thedes'];
		$thearray ['isgood_text'] = $tempdata['isgood'];
		//		
		$thearray ['content'] = $tempdata['content'];
		if (bll_news::add ( $thearray ) > 0) {
			echo "1";
		}else{
			echo "0";
		}
	}

}

// 实例化
$thisPage = new usl_ajax ();
?>