<?php
require_once 'config.php';
/**
 * 首页类
 *
 * @author sansanchengbao
 *        
 */
class usl_index extends usl_base {
	/**
	 * 构造类
	 */
	function __construct() {
		parent::__construct ();
		$this->_weizhi = "index";
	}
	
	/**
	 * 设置变量值
	 */
	function _assigncontent() {
		parent::_showcomm ();
		$this->_tpl->assign ( "webname", com_oftenfunction::setwebname () ); // 网站标题
		$this->_tpl->assign ( "thekeywords", "这里是关键字" ); // 网站关键字
		$this->_tpl->assign ( "indexslide", bll_link::getlist( 1 , 5 ) ); //首页幻灯
		$this->_tpl->assign ( "about", bll_onepage::getone( 2 , 1 ) ); //首页关于我们
		$this->_tpl->assign ( "aboutimg", bll_link::getlist( 2 , 2 ) ); //首页关于我们图片
		$this->_tpl->assign ( "product", bll_news::getlist( 4 , 30 ) ); //首页产品展示
		$this->_tpl->assign ( "team", bll_news::getlist( 14 , 5 ) ); //首页专家团队
		$this->_tpl->assign ( "stroe", bll_news::getlist( 15 , 6 ) ); //首页门店展示
		$this->_tpl->assign ( "news", bll_news::getlist( 7 , 3 ) ); //首页新闻动态
		//$this->_tpl->assign ( "case", bll_news::getserachlist( 5 ,array (array ("type" => "=int","name" => "isgood","value" => 1 ) ), 12 ) ); // 案例推荐
	}
	
}

// 实例化
$thispage = new usl_index ();
$thispage->_assigncontent ();
$thispage->_tpl->display ( "tpl/index.tpl" );
?>