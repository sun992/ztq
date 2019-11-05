<?php
require_once 'config.php';
/**
 * 单页类
 *
 * @author sansanchengbao
 *        
 */
class usl_intro extends usl_base {
	/**
	 * 某个单页
	 *
	 * @var object
	 */
	private $_onepageobj;
	
	/**
	 * 构造类
	 *
	 * @param string $tag
	 *        	标签
	 */
	public function __construct($tag) {
		parent::__construct ();
		$this->init ( $tag );
		$this->setonepage ();
	
	}
	
	/**
	 * 初始化
	 *
	 * @param string $tag
	 *        	标签
	 */
	private function init($tag) {
		$this->_weizhi = $tag;
		switch ($tag) {
			case "contact" :
				$this->_onepageobj = bll_onepage::getone ( 3 );
				break;
			default :
				die ( "标签错误" );
				break;
		}
	}
	
	/**
	 * 设置变量值
	 */
	public function _assigncontent() {
		parent::_showcomm ();
		$this->_tpl->assign ( "webname", $this->_webstr ); // 网站标题
		$this->_tpl->assign ( "thekeywords", $this->_keywords ); // 网站关键字
		$this->_tpl->assign ( "thedescription", $this->_description ); // 网站描述
		$this->_tpl->assign ( "thisname", $this->_thisname ); // 栏目名称
		$this->_tpl->assign ( "leftnav", $this->_leftnav ); // 左侧导航
		$this->_tpl->assign ( "address", $this->_address ); // 当前位置
		$this->_tpl->assign ( "onepage", $this->_onepageobj ); // 单页对象
		$this->_tpl->assign ( "tag", $this->_tag ); // 栏目标签
		$this->_tpl->assign ( "contact", bll_onepage::getone( 3 ) ); //联系我们
	}
	
	/**
	 * 设置系列单页
	 */
	private function setonepage() {
		if (count ( $this->_onepageobj ) <= 0) {
			die ( "单页不存在" );
		}
		
		// 常规情况设置
		$this->_keywords = $this->_onepageobj ['title'];
		$this->_description = com_oftenfunction::cut_str ( com_oftenfunction::nohtml ( $this->_onepageobj ['content'] ), 200 );
		$this->_description = str_replace ( array (
				"　",
				" ",
				"\r",
				"\n" 
		), "", $this->_description );
		$this->_thisname = $this->_onepageobj ['title'];
		$this->_webstr = com_oftenfunction::setwebname ( "{$this->_onepageobj ['title']}-" );
		$this->_address [] = array (
				"title" => $this->_onepageobj ['title'],
				"url" => "" 
		);
		
		// 特殊情况设置
		switch ($tempwz [0]) {
			default :
				break;
		}
		
		// 设置左侧导航
		$this->_setintroleftnav ( $this->_onepageobj ['id'], $this->_weizhi );
	
	}
}

// 实例化
$thispage = new usl_intro ( $_GET ['tag'] );
$thispage->_assigncontent ();
$thispage->_tpl->display ( "tpl/intronews.tpl" );
?>