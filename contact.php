<?php
require_once 'config.php';
/**
 * 联系我们类
 *
 * @author sansanchengbao
 *        
 */
class usl_contact extends usl_base {
	/**
	 * 构造类
	 */
	function __construct() {
		parent::__construct ();
		$this->_weizhi = "contact";
	}
	
	/**
	 * 设置变量值
	 */
	function _assigncontent() {
		parent::_showcomm ();
		$this->_tpl->assign ( "webname", com_oftenfunction::setwebname () ); // 网站标题
		$this->_tpl->assign ( "thekeywords", "这里是关键字" ); // 网站关键字
		//$this->_tpl->assign ( "indexslide", bll_link::getlist( 1 , 6 ) ); // 首页幻灯
		//$this->_tpl->assign ( "case", bll_news::getserachlist( 5 ,array (array ("type" => "=int","name" => "isgood","value" => 1 ) ), 12 ) ); // 案例推荐
	}
	
}

// 实例化
$thispage = new usl_contact ();
$thispage->_assigncontent ();
$thispage->_tpl->display ( "tpl/contact.tpl" );
?>