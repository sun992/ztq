<?php
require_once 'config.php';
/**
 * 系列单页类
 *
 * @author sansanchengbao
 *        
 */
class usl_about extends usl_base {
	/**
	 * 系列的类别
	 *
	 * @var object
	 */
	private $_sortobj;
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
	 * @param int $theid
	 *        	ID
	 */
	public function __construct($theid) {
		parent::__construct ();
		$this->setonepage ( $theid );
	}
	
	/**
	 * 初始化
	 *
	 * @param string $tag
	 *        	标签
	 */
	private function init() {
		$this->_weizhi = "about";
		$this->_sortobj = bll_newssort::getone ( 1 );
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
		$this->_tpl->assign ( "about", bll_news::getlist( 1,1 ) ); //关于我们
		$this->_tpl->assign ( "rongyu", bll_link::getlist(4 , 10 ) ); //资质荣誉
	}
	
	/**
	 * 设置系列单页
	 *
	 * @param int $theid
	 *        	ID
	 */
	private function setonepage($theid) {
		$alllist = bll_news::getlist ( 1 );
//		print_r( $alllist );
//		exit();
		if ($theid > 0) {
			$this->_onepageobj = bll_news::getone ( $theid );
		} else {
			if (count ( $alllist ) == 0) {
				die ( "该栏目下无子项" );
			}
			$this->_onepageobj = $alllist [0];
		}
		$this->_weizhi .= "_{$this->_onepageobj['id']}";
		$tempwz = explode ( "_", $this->_weizhi );
		
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
		$this->_webstr = com_oftenfunction::setwebname ( "{$this->_onepageobj ['title']}-{$this->_sortobj ['sortname']}-" );
		
		$this->_address [] = array (
				"title" => $this->_sortobj ['sortname'],
				"url" => "about.php" 
		);
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
		$this->_setintronewsleftnav ( $this->_sortobj ['id'], $tempwz [count ( $tempwz ) - 2], $this->_onepageobj ['id'] );
	}
}

// 实例化
$thispage = new usl_about (array_key_exists ( 'theid', $_GET ) ? intval ( $_GET ['theid'] ) : 0 );
$thispage->_assigncontent ();
$thispage->_tpl->display ( "tpl/about.tpl" );
?>