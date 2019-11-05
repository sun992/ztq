<?php
require_once 'config.php';
/**
 * 新闻列表类
 *
 * @author sansanchengbao
 *        
 */
class usl_newslist extends usl_base {
	/**
	 * 标签
	 *
	 * @var string
	 */
	private $_tag;
	
	/**
	 * 根类别ID
	 *
	 * @var int
	 */
	private $_rootsortid;
	
	/**
	 * 翻页对象
	 *
	 * @var object
	 */
	private $_pdobj;
	
	/**
	 * 排版样式
	 *
	 * @var string
	 */
	private $_stype;
	
	/**
	 * 每页显示的数量
	 *
	 * @var int
	 */
	private $_pagesize;
	
	/**
	 * 构造类
	 *
	 * @param string $tag
	 *        	标签
	 * @param int $theid
	 *        	ID
	 */
	public function __construct($tag, $theid) {
		parent::__construct ();
		$this->init ( $tag, $theid );
		$this->setnewspd ( $theid );
		$this->setother ( $theid > 0 ? $theid : $this->_rootsortid );
	}
	
	/**
	 * 初始化
	 *
	 * @param string $tag
	 *        	标签
	 * @param int $theid
	 *        	当前栏目ID
	 */
	private function init($tag, $theid) {
		$this->_weizhi = $this->_tag = $tag;
		switch ($tag) {
			case "product" : // 产品展示
				$this->_rootsortid = 4;
				$this->_stype = "piclist";
				$this->_setnewslistleftnav ( 4, "product", $theid );
				break;
			case "news" : // 公司资讯
				$this->_rootsortid = 7;
				$this->_stype = "titlelist";
				$this->_setnewslistleftnav ( 7, "news", $theid );
				break;
			case "zsfx" : // 专题板块-知识分享
				$this->_rootsortid = 11;
				$this->_stype = "titlelist";
				$this->_setnewslistleftnav ( 11, "zsfx", $theid );
				break;
			case "team" : // 专家团队
				$this->_rootsortid = 2;
				$this->_stype = "piclist2";
				$this->_setnewslistleftnav ( 2, "team", $theid );
				break;
			case "store" : // 门店连锁
				$this->_rootsortid = 7;
				$this->_stype = "piclist3";
				$this->_setnewslistleftnav ( 7, "store", $theid );
				break;
			case "service" : // 服务网点
				$this->_rootsortid = 13;
				$this->_stype = "piclist3";
				$this->_setnewslistleftnav ( 13, "service", $theid );
				break;
			default :
				die ( "标签错误" );
				break;
		}
		switch ($this->_stype) {
			case "piclist" :
				$this->_pagesize = 8;
				break;
			case "tplist" :
				$this->_pagesize = 12;
				break;
			case "piclist2" :
				$this->_pagesize = 5;
				break;
			case "piclist3" :
				$this->_pagesize = 5;
				break;
			default :
				$this->_stype = "titlelist";
				$this->_pagesize = 8;
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
		$this->_tpl->assign ( "thisname", $this->_thisname ); // 栏目名称
		$this->_tpl->assign ( "leftnav", $this->_leftnav ); // 左侧导航
		$this->_tpl->assign ( "address", $this->_address ); // 当前位置
		$this->_tpl->assign ( "style", $this->_stype ); // 排版样式
		$this->_tpl->assign ( "tag", $this->_tag ); // 栏目标签
		$this->_tpl->assign ( "datalist", $this->_pdobj->_getdatalist () ); // 数据列表
		$this->_tpl->assign ( "pageinfo", $this->_pdobj->_getpageinfo () ); // 设置翻页信息
	}
	
	/**
	 * 设置新闻翻页
	 *
	 * @param int $theid
	 *        	ID
	 */
	private function setnewspd($theid) {
		if ($this->_tag == "search") {
			$wherearray = array ();
			$suffixal = "tag=search";
			$sortstr = "1,2,3,4,5,6";
			$wherearray = array ();
			$wherearray [] = array (
					"type" => "likestring",
					"name" => "title",
					"value" => "$_REQUEST[thetxt]" 
			);
			$wherearray [] = array (
					"type" => "likestring",
					"name" => "content",
					"value" => "$_REQUEST[thetxt]" 
			);
			$this->_pdobj = new com_pagingdevice ( bll_news::getserachlist ( $sortstr, $wherearray ) );
			$this->_pdobj->_setpagesize ( $this->_pagesize );
			$this->_pdobj->_setSuffixal ( $suffixal );
			$this->_pdobj->_init ();
		} else {
			$currentid = $theid > 0 ? $theid : $this->_rootsortid;
			$this->_pdobj = new com_pagingdevice ( bll_news::getlist ( $currentid ) );
			$this->_pdobj->_setpagesize ( $this->_pagesize );
			$this->_pdobj->_setsuffixal ( "tag={$this->_tag}&theid=$currentid" );
			$this->_pdobj->_init ();
		}
	}
	
	/**
	 * 设置其他信息
	 *
	 * @param int $currentid
	 *        	当前ID
	 */
	private function setother($currentid) {
		$temp = bll_newssort::getone ( $currentid );
		if ($this->_tag == "search") {
			$temp = array (
					"id" => 2,
					"sortname" => "搜索应用" 
			);
		}
		$tempwz = explode ( "_", $this->_weizhi );
		$this->_weizhi = "$tempwz[0]_$temp[id]";
		for($i = 1; $i < count ( $tempwz ); $i ++) {
			$this->_weizhi .= "_{$tempwz[$i]}";
		}
		if (empty ( $this->_thisname )) {
			$this->_thisname = $this->_keywords = $temp ['sortname'];
		}
		
		$this->_webstr .= strval ( empty ( $this->_webstr ) ? $temp ['sortname'] : "-$temp[sortname]" );
		
		$tempaddress = $this->_address;
		$this->_address = array (
				$tempaddress [0],
				$tempaddress [1] 
		);
		$this->_address [] = array (
				"title" => $temp ['sortname'],
				"url" => "news_list.php?tag={$this->_tag}&theid=$temp[id]" 
		);
		for($i = 2; $i < count ( $tempaddress ); $i ++) {
			$this->_address [] = $tempaddress [$i];
		}
		$this->_address [count ( $this->_address ) - 1] ['url'] = '';
		if (intval ( $currentid ) === intval ( $this->_rootsortid )) {
			$this->_webstr = com_oftenfunction::setwebname ( "{$this->_webstr }-" );
		} else {
			$this->setother ( $temp ['pid'] );
		}
	}
}

// 实例化
$thispage = new usl_newslist ( $_GET ['tag'], array_key_exists ( 'theid', $_GET ) ? intval ( $_GET ['theid'] ) : 0 );
$thispage->_assigncontent ();
$thispage->_tpl->display ( "tpl/newslist.tpl" );
?>