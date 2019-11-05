<?php
require_once 'config.php';
/**
 * 新闻内容类
 *
 * @author sansanchengbao
 *        
 */
class usl_newsshow extends usl_base {
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
	 * 新闻对象
	 *
	 * @var object
	 */
	private $_newsobj;
	
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
		$this->_newsobj = bll_news::getone ( $theid );
		$resulet=$this->_newsobj;
		
		if (count ( $this->_newsobj ) == 0) {
			die ( "参数错误" );
		}
		$this->init ();
		$this->setnews ();
		$this->setother ();
	}
	
	/**
	 * 初始化
	 */
	private function init() {
		$this->_rootsortid = $this->getrootsortid ( "4,2,3,7,11,13", $this->_newsobj ['sort'] );
		switch ($this->_rootsortid) {
			case 4 : // 产品展示
				$this->_tag = "product";
				$this->_stype = "piclist";
				$this->_setnewslistleftnav ( 4, "product", $this->_newsobj ['sort'] );
			break;
			case 7 : // 新闻动态
				$this->_tag = "news";
				$this->_stype = "titlelist";
				$this->_setnewslistleftnav ( 7, "news", $this->_newsobj ['sort'] );
			break;
			case 11 : // 专题板块
				$this->_tag = "zsfx";
				$this->_stype = "titlelist";
				$this->_setnewslistleftnav ( 11, "zsfx", $this->_newsobj ['sort'] );
			break;
			case 2: // 专家团队
				$this->_tag = "team";
				$this->_stype = "piclist2";
				$this->_setnewslistleftnav ( 2, "team", $this->_newsobj ['sort'] );
			break;
			case 7 : // 连锁门店
				$this->_tag = "store";
				$this->_stype = "piclist3";
				$this->_setnewslistleftnav ( 7, "store", $this->_newsobj ['sort'] );
			break;
			case 13 : // 服务网点
				$this->_tag = "service";
				$this->_stype = "piclist3";
				$this->_setnewslistleftnav ( 13, "service", $this->_newsobj ['sort'] );
			break;
			default :
				die ( "错误" );
				break;
		}
		$this->_weizhi = $this->_tag;
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
		$this->_tpl->assign ( "style", $this->_stype ); // 排版样式
		//$this->_tpl->assign ( "style", $this->_stype ); // 排版样式
		$this->_tpl->assign ( "news", $this->news() ); // 栏目标签
		$this->_tpl->assign ( "newsobj", $this->_newsobj ); // 新闻对象
		$this->_tpl->assign ( "prenextobj", $this->getoneprenext () ); // 获取上一篇，下一篇
		
		//$this->_tpl->assign ( "datalist", $this->_getdatalist () );
	}
	
	private function news() {
//		$thearray = bll_news::getoneprenext ( $this->_newsobj );
//		$thearray [2] = "news_list.php?tag={$this->_tag}&theid={$this->_newsobj['sort']}";
//		return $thearray;
		//$this->_tpl->assign ( "news", bll_news::getlist( 14 , 20 ) ); //首页新闻动态
		$news = bll_news::getlist( 14 , 20 );
		return $news;
		print_r($news);
	}
	
	/**
	 * 设置内容
	 */
	private function setnews() {
		$this->_description = com_oftenfunction::cut_str ( com_oftenfunction::nohtml ( $this->_newsobj ['content'] ), 200 );
		$this->_description = str_replace ( array (
				"　",
				" ",
				"\r",
				"\n" 
		), "", $this->_description );
		$this->_newsobj ['content'] = str_replace ( array (
				"<img",
				"<IMG" 
		), "<img onload=\"resize(this,700)\"", $this->_newsobj ['content'] );
	}
	
	/**
	 * 设置其他信息
	 */
	private function setother($currentid = -1) {
		if ($currentid < 0) {
			$currentid = $this->_newsobj ['sort'];
		}
		$temp = bll_newssort::getone ( $currentid );
		
		$tempwz = explode ( "_", $this->_weizhi );
		$this->_weizhi = "$tempwz[0]_$temp[id]";
		for($i = 1; $i < count ( $tempwz ); $i ++) {
			$this->_weizhi .= "_{$tempwz[$i]}";
		}
		
		if (empty ( $this->_thisname )) {
			$this->_thisname = $temp ['sortname'];
			$this->_keywords = $this->_newsobj ['title'];
		}
		
		$this->_webstr .= strval ( empty ( $this->_webstr ) ? "{$this->_newsobj['title']}-$temp[sortname]" : "-$temp[sortname]" );
		
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
		
		if (intval ( $currentid ) === intval ( $this->_rootsortid )) {
			$this->_webstr = com_oftenfunction::setwebname ( "{$this->_webstr }-" );
			$this->_address [] = array (
					"title" => $this->_newsobj ['title'],
					"url" => "" 
			);
		} else {
			$this->setother ( $temp ['pid'] );
		}
	}
	
	
	/**
	 * 获取某类别的根路径
	 *
	 * @param string $sortlist
	 *        	类别范围,多个用逗号分开
	 * @param int $currentid
	 *        	当前类别ID
	 * @param bool $isfrist（不需要赋值，递归使用）        	
	 * @param array $alllist（不需要赋值，递归使用）        	
	 * @return int
	 */
	private function getrootsortid($sortlist, $currentid, $isfrist = true, $alllist = array()) {
		if (strpos ( ",{$sortlist},", ",{$currentid}," ) !== false) {
			return $currentid;
		} else {
			if ($isfrist) {
				$alllist = bll_newssort::getlist ( 0 );
			}
			if(!empty($currentid)){
				$temppid = array_filter ( $alllist, create_function ( '$one', "return \$one['id']==$currentid;" ) );
				$temppid = array_merge ( $temppid );
			}else{
				echo com_oftenjavascript::alertgoback ( "非法输入!!!" );
				exit;
			}
			if (count ( $temppid ) <= 0) {
				return - 1;
			} else {
				return $this->getrootsortid ( $sortlist, $temppid [0] ['pid'], false, $alllist );
			}
		}
	}
	
	/**
	 * 获取上一篇与下一篇
	 */
	private function getoneprenext() {
		$thearray = bll_news::getoneprenext ( $this->_newsobj );
		$thearray [2] = "news_list.php?tag={$this->_tag}&theid={$this->_newsobj['sort']}";
		return $thearray;
	}
}

// 实例化

$thispage = new usl_newsshow ( array_key_exists ( 'theid', $_GET ) ? intval ( $_GET ['theid'] ) : 0 );
$thispage->_assigncontent ();
$thispage->_tpl->display ( "tpl/newsshow.tpl" );
?>