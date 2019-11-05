<?php
/**
 * 表示层基础类
 * 
 * @author sansanchengbao
 *
 */
class usl_base {
	/**
	 * 当前页名称
	 *
	 * @var string
	 */
	public $_thisname;
	/**
	 * 浏览器标题栏显示的内容（已排除网站名称）
	 *
	 * @var string
	 */
	public $_webStr;
	/**
	 * 当前位置
	 *
	 * @var string
	 */
	public $_address;
	
	/**
	 * 关键字
	 *
	 * @var string
	 */
	public $_keywords;
	
	/**
	 * 描述
	 *
	 * @var string
	 */
	public $_description;
	
	/**
	 * 位置标记
	 *
	 * @var string
	 */
	public $_weizhi;
	
	/**
	 * smarty对象
	 *
	 * @var obj
	 */
	public $_tpl;
	
	/**
	 * 当前登录的会员
	 *
	 * @var array
	 */
	public $_nowmemberobj;
	
	/**
	 * 左侧导航
	 *
	 * @var array
	 */
	public $_leftnav;
	
	/**
	 * 构造函数
	 */
	public function __construct() {
		$this->_tpl = com_oftenfunction::opensmarty ();
		$this->_nowmemberobj = bll_member::getmembernow ();
		$this->_address = array (
				array (
						"title" => "",
						"url" => "" 
				),
				array (
						"title" => "首页",
						"url" => "index.php" 
				) 
		);
	}
	
	/**
	 * 显示Meta
	 *
	 * @param boolean $isshowkeywords
	 *        	带有默认值true 是否显示关键字
	 * @param boolean $isshowDescription
	 *        	带有默认值true 是否显示描述
	 */
	public function _showmeta($isshowkeywords = true, $isshowdescription = true) {
		$value = '';
		if ($isshowkeywords) {
			$value .= '<meta name="keywords" content="' . $this->_keywords . '" />' . "\r\n";
		}
		if ($isshowdescription) {
			$value .= '<meta name="description" content="' . $this->_description . '" />' . "\r\n";
		}
		return $value;
	}
	
	/**
	 * 公共调用设置变量值
	 */
	public function _showcomm() {
		$this->_tpl->assign ( "rootwebname", webname ); // 设置项目名称
		$this->_tpl->assign ( "root", $this->_setroot () ); // 设置项目根路径
		$this->_tpl->assign ( "globalnav", $this->_setglobalnav () ); // 设置导航状态
		$this->_tpl->assign ( "memberinfo", $this->_nowmemberobj ); // 当前登录的会员
		$this->_tpl->assign ( "bottominfo", bll_onepage::getone( 4 ) ); // 底部信息
		$this->_tpl->assign ( "toptel", bll_onepage::getone( 5 ) ); // 顶部电话
		$this->_tpl->assign ( "ejpic", $this->ejpic() ); // 内页主图
		$this->_tpl->assign ( "cpname", bll_newssort::getlist( 4 , 4 ) ); // 产品分类
		$this->_tpl->assign ( "cpname2", bll_newssort::getlist( 7 , 6 ) ); // 新闻分类
		$this->_tpl->assign ( "cpname3", bll_newssort::getlist( 11 , 6 ) ); // 专题板块分类
		$this->_tpl->assign ( "cpname4", bll_newssort::getlist( 13 , 6 ) ); // 服务网点分类
	}
	
	
	/**
	 * 二级栏目图片
	 */
	
	private function ejpic() {
		$num = 0;
		$datalist = bll_link::getlist ( 3 );
		$wz = explode ( "_", $this->_weizhi );
//		print_r($datalist);
//		print_r($wz);
//		exit();
		switch ($wz [0]) {
			case "about" :
				$num = 25;
				break;
			case "product" :
				$num = 4;
				break;
			case "news" :
				$num = 8;
				break;
			case "zsfx" :
				$num = 12;
				break;
			case "service" :
				$num = 13;
				break;
			case "contact" :
				$num = 25;
				break;
			default :
				$num = 25;
				break;
		}
		$datalist = array_filter ( $datalist, create_function ( '$one', "return intval(\$one['wz'])===$num;" ) );
		$datalist = array_merge ( $datalist );
		return $datalist;
	}
	
	/**
	 * 获取绝对路径
	 */
	private function _setroot() {
		$phpself = $_SERVER ['PHP_SELF'] ? $_SERVER ['PHP_SELF'] : $_SERVER ['SCRIPT_NAME'];
		$thearray = explode ( '/', $phpself );
		$theurl = 'http://' . $_SERVER ['HTTP_HOST'];
		if (count ( $thearray ) > 2) {
			for($i = 1; $i < count ( $thearray ) - 1; $i ++) {
				$theurl .= "/$thearray[$i]/";
			}
		} else {
			$theurl .= '/';
		}
		return $theurl;
	}
	
	/**
	 * 获取顶部导航
	 */
	private function _setglobalnav() {
		$initarray = array (
				"index",
				"about",
				"product",
				"news",
				"zsfx",
				"service",
				"contact"
		);
		$thearray = array ();
		for($i = 0; $i < count ( $initarray ); $i ++) {
			$thearray [$i] = 0;
		}
		$wzarray = explode ( "_", $this->_weizhi );
		for($i = 0; $i < count ( $initarray ); $i ++) {
			if ($wzarray [0] == $initarray [$i]) {
				$thearray [$i] = 1;
				break;
			}
		}
		return $thearray;
	}
	
	/**
	 * 单页左侧导航
	 *
	 * @param int $theid
	 *        	单页id
	 * @param string $tag

	 *        	标签
	 */
	public function _setintroleftnav($theid, $tag) {
		$onepageobj = bll_onepage::getone ( $theid );
		
		$this->_leftnav = array ();
		$this->_leftnav ['thename'] = $onepageobj ['title'];
		switch ($tag) {
			case "contact" :
				$this->_leftnav ['enname'] = "CONTACT US";
				break;
			case "service" :
				$this->_leftnav ['enname'] = "SERVICE CONTENT";
				break;
			default :
				break;
		}
		$this->_leftnav ['list'] = array (
				array (
						"id" => $onepageobj ['id'],
						"pid" => 0,
						"title" => $onepageobj ['title'],
						"url" => "intro.php?tag=$tag",
						"isfocus" => 1 
				) 
		);
	}
	
	/**
	 * 系列单页左侧导航
	 *
	 * @param int $sortid
	 *        	类别id
	 * @param string $tag
	 *        	标签
	 * @param int $currentid
	 *        	当前id
	 */
	public function _setintronewsleftnav($sortid, $tag, $currentid = 0) {
		$sortobj = bll_newssort::getone ( $sortid );
		$alllist = bll_news::getlist ( $sortid );
		
		$this->_leftnav = array ();
		$this->_leftnav ['thename'] = $sortobj ['sortname'];
		switch ($tag) {
			case "about" :
				$this->_leftnav ['enname'] = "ABOUT US";
				break;
			case "dsdyy" :
				$this->_leftnav ['enname'] = "ELECTRICITY SUPPLIER";
				break;
			case "fxpt" :
				$this->_leftnav ['enname'] = "DISTRIBUTION PLATFORM";
				break;
			default :
				break;
		}
		$this->_leftnav ['list'] = array ();
		if (count ( $alllist ) > 0) {
			foreach ( $alllist as $row ) {
				$temp = array ();
				$temp ['title'] = $row ['title'];
				$temp ['url'] = "intronews.php?tag=$tag&theid=$row[id]";
				$temp ['isfocus'] = 0;
				if (intval ( $currentid ) === intval ( $row ['id'] )) {
					$temp ['isfocus'] = 1;
				}
				$this->_leftnav ['list'] [] = $temp;
			}
		}
	}
	
	/**
	 * 新闻类别左侧导航
	 *
	 * @param int $sortid
	 *        	类别id
	 * @param string $tag
	 *        	标签
	 * @param int $currentid
	 *        	当前id
	 */
	public function _setnewslistleftnav($rootsortid, $tag, $currentid = 0) {
		$sortobj = bll_newssort::getone ( $rootsortid );
		$alllist = bll_newssort::getlist ( $rootsortid, 2 );
		$this->_leftnav = array ();
		$this->_leftnav ['thename'] = $sortobj ['sortname'];
		switch ($tag) {
			case "news" :
				$this->_leftnav ['enname'] = "NEWS CENTER";
				break;
			case "zsfx" :
				$this->_leftnav ['enname'] = "THEMATIC PLATE";
				break;
			case "product" :
				$this->_leftnav ['enname'] = "PRODUCT SHOW";
				break;
			case "service" :
				$this->_leftnav ['enname'] = "SERVICE";
				break;
			default :
				break;
		}
		if (count ( $alllist ) > 0) {
			$temp = bll_newssort::getone ( $currentid );
			if( empty( $temp ) ){
				//die("该信息不存在");
			}
			$this->_leftnav ['list'] = $this->getleftnavlist ( $rootsortid, $alllist, $tag, $currentid > 0 ? $currentid : $rootsortid );
		
		} else {
			$this->_leftnav ['list'] = array (
					array (
							"id" => $sortobj ['id'],
							"pid" => $sortobj ['pid'],
							"title" => $sortobj ['sortname'],
							"url" => "news_list.php?tag=$tag&theid=$sortobj[id]",
							"isfocus" => 1 
					) 
			);
		}
	}
	
	/**
	 * 递归获取左侧新闻类别列表
	 *
	 * @param int $rootsortid
	 *        	根类别
	 * @param array $alllist
	 *        	所有的类别
	 * @param string $tag
	 *        	标签
	 * @param int $currentid
	 *        	当前id
	 * @param array $temparray
	 *        	前一步的数据
	 * @param int $preid
	 *        	上一步的id
	 * @return array
	 */
	private function getleftnavlist($rootsortid, $alllist, $tag, $currentid, $temparray = array(), $preid = 0) {
		$thelist = array ();
		if(!empty($currentid)){
			$templist = array_filter ( $alllist, create_function ( "\$a", "return intval(\$a['pid'])===$currentid;" ) );
		$templist = array_merge ( $templist );
		}else{
			echo com_oftenjavascript::alertgoback ( "非法输入!!!" );
			exit;
		}
		foreach ( $templist as $row ) {
			$temp = array ();
			$temp ['id'] = $row ['id'];
			$temp ['pid'] = $row ['pid'];
			$temp ['title'] = $row ['sortname'];
			$temp ['url'] = "news_list.php?tag=$tag&theid=$row[id]";
			if (intval ( $preid ) === intval ( $row ['id'] )) {
				$temp ['isfocus'] = 1;
			}
			if (count ( $temparray ) > 0 && intval ( $temparray [0] ['pid'] ) == intval ( $row ['id'] )) {
				$temp ['list'] = $temparray;
			}
			$thelist [] = $temp;
		}
		$temppid = array_filter ( $alllist, create_function ( '$a', 'return intval($a["id"])===' . $currentid . ';' ) );
		$temppid = array_merge ( $temppid );
		if (intval ( $currentid ) !== intval ( $rootsortid )) {
			$preid = $currentid;
			return $this->getleftnavlist ( $rootsortid, $alllist, $tag, $temppid [0] ['pid'], $thelist, $preid );
		} else {
			return $thelist;
		}
	}
}
?>