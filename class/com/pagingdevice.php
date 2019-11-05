<?php
/**
 * 分页器类
 *(使用该类需要创建对象)
 * @author sansanchengbao
 *
 */
class com_pagingdevice {
	/**
	 * 当前页数
	 *
	 * @var int
	 */
	private $cpage;
	/**
	 * 记录总数
	 *
	 * @var int
	 */
	private $recordcount;
	/**
	 * 总页数
	 *
	 * @var int
	 */
	private $maxpage;
	/**
	 * 所有的数据列表
	 *
	 * @var array
	 */
	private $alldatalist;
	/**
	 * 翻页参数名称
	 *
	 * @var string
	 */
	private $pagename;
	/**
	 * 每页显示的数量
	 *
	 * @var int
	 */
	private $pagesize;
	/**
	 * 翻页后缀
	 *
	 * @var string
	 */
	private $suffixal;
	/**
	 * 数据列表
	 *
	 * @var array
	 */
	private $datalist;
	/**
	 * 是否为所有数据列表
	 *
	 * @var bool
	 */
	private $isalldatalist;
	
	/**
	 * 设置总记录数
	 *
	 * @param int $value        	
	 */
	public function _setrecordcount($value) {
		$this->recordcount = intval ( $value );
		$this->isalldatalist = false;
	}
	/**
	 * 设置每页显示的数量(默认20)
	 *
	 * @param int $value        	
	 */
	public function _setpagesize($value) {
		$this->pagesize = intval ( $value );
	}
	/**
	 * 设置翻页URL参数
	 *
	 * @param string $value        	
	 */
	public function _setpagename($value) {
		$this->pagename = $value;
	}
	/**
	 * 设置翻页后缀
	 *
	 * @param string $value        	
	 */
	public function _setsuffixal($value) {
		$this->suffixal = $value;
	}
	/**
	 * 获取数据列表
	 */
	public function _getdatalist() {
		return $this->datalist;
	}
	
	/**
	 * 构造函数
	 * 
	 * @param array $alldatalist
	 *        	所有数据列表
	 */
	public function __construct($alldatalist) {
		$this->isalldatalist = true;
		$this->alldatalist = $alldatalist;
	}
	
	/**
	 * 初始化数据
	 * (即从数据中的提取数据及生成翻页信息)
	 */
	public function _init() {
		if (empty ( $this->pagename )) {
			$this->pagename = "page"; // 翻页参数
		}
		if (array_key_exists ( $this->pagename, $_REQUEST )) {
			$this->cpage = intval ( $_REQUEST [$this->pagename] );
		}
		if (empty ( $this->cpage )) {
			$this->cpage = 1; // 默认当前页数
		}
		if (empty ( $this->pagesize )) {
			$this->pagesize = 20; // 默认显示的记录数
		}
		if ($this->isalldatalist) {
			$this->recordcount = count ( $this->alldatalist ); // 总记录数
		}
		// 总页数
		if ($this->recordcount % $this->pagesize == 0) {
			$this->maxpage = intval ( $this->recordcount / $this->pagesize );
		} else {
			$this->maxpage = intval ( $this->recordcount / $this->pagesize ) + 1;
		}
		// 设置数据
		$this->setdata ();
	}
	
	/**
	 * 设置数据
	 */
	private function setdata() {
		$this->datalist = array ();
		if ($this->isalldatalist) {
			$i = 0;
			if ($this->recordcount > 0) {
				foreach ( $this->alldatalist as $row ) {
					if ($i < ($this->cpage - 1) * $this->pagesize) {
						$i ++;
						continue;
					} elseif ($i >= ($this->cpage - 1) * $this->pagesize && $i < $this->cpage * $this->pagesize) {
						$this->datalist [] = $row;
						$i ++;
						continue;
					} else {
						break;
					}
				}
			}
		} else {
			$this->datalist = $this->alldatalist;
		}
	}
	
	/**
	 * 常规翻页数组
	 */
	public function _getpageinfo() {
		$thearray = array ();
		$thearray ['maxpage'] = $this->maxpage;
		$thearray ['recordcount'] = $this->recordcount;
		$thearray ['pagelist'] = array ();
		
		if ($this->cpage > 1) {
			$thearray ['frist'] = "?{$this->pagename}=1";
			$thearray ['pre'] = "?{$this->pagename}=" . ($this->cpage - 1);
		} else {
			$thearray ['frist'] = "";
			$thearray ['pre'] = "";
		}
		if ($this->cpage < $this->maxpage) {
			$thearray ['next'] = "?{$this->pagename}=" . ($this->cpage + 1);
			$thearray ['end'] = "?{$this->pagename}={$this->maxpage}";
		} else {
			$thearray ['next'] = "";
			$thearray ['end'] = "";
		}
		
		if (! empty ( $this->suffixal )) {
			if ($this->cpage > 1) {
				$thearray ['frist'] .= "&{$this->suffixal}";
				$thearray ['pre'] .= "&{$this->suffixal}";
			}
			if ($this->cpage < $this->maxpage) {
				$thearray ['next'] .= "&{$this->suffixal}";
				$thearray ['end'] .= "&{$this->suffixal}";
			}
		}
		if ($this->maxpage > 0) {
			for($i = 1; $i <= $this->maxpage; $i ++) {
				$url = "?{$this->pagename}=$i";
				if (! empty ( $this->suffixal )) {
					$url .= "&{$this->suffixal}";
				}
				$row = array (
						'num' => $i,
						'url' => $url,
						'isselected' => false 
				);
				if (intval ( $i ) == intval ( $this->cpage )) {
					$row ['isselected'] = true;
				}
				$thearray ['pagelist'] [] = $row;
			}
		} else {
			$url = "?{$this->pagename}=1";
			if (! empty ( $this->suffixal )) {
				$url .= "&{$this->suffixal}";
			}
			$thearray ['pagelist'] [] = array (
					'num' => 1,
					'url' => $url,
					'isselected' => true 
			);
		}
		return $thearray;
	}
	
	/**
	 * 伪静态翻页数组
	 */
	public function _getpageinfo2() {
		$thearray = array ();
		$thearray ['maxpage'] = $this->maxpage;
		$thearray ['recordcount'] = $this->recordcount;
		$thearray ['pagelist'] = array ();
		
		if ($this->cpage > 1) {
			$thearray ['frist'] = "-p1.html";
			$thearray ['pre'] = "-p" . ($this->cpage - 1) . '.html';
		} else {
			$thearray ['frist'] = "";
			$thearray ['pre'] = "";
		}
		if ($this->cpage < $this->maxpage) {
			$thearray ['next'] = "-p" . ($this->cpage + 1) . '.html';
			$thearray ['end'] = "-p{$this->maxpage}.html";
		} else {
			$thearray ['next'] = "";
			$thearray ['end'] = "";
		}
		
		if (! empty ( $this->suffixal )) {
			if ($this->cpage > 1) {
				$thearray ['frist'] = "{$this->suffixal}" . $thearray ['frist'];
				$thearray ['pre'] = "{$this->suffixal}" . $thearray ['pre'];
			}
			if ($this->cpage < $this->maxpage) {
				$thearray ['next'] = "{$this->suffixal}" . $thearray ['next'];
				$thearray ['end'] = "{$this->suffixal}" . $thearray ['end'];
			}
		}
		if ($this->maxpage > 0) {
			for($i = 1; $i <= $this->maxpage; $i ++) {
				$url = "-p{$i}.html";
				if (! empty ( $this->suffixal )) {
					$url = "{$this->suffixal}" . $url;
				}
				$row = array (
						'num' => $i,
						'url' => $url,
						'isselected' => false 
				);
				if (intval ( $i ) == intval ( $this->cpage )) {
					$row ['isselected'] = true;
				}
				$thearray ['pagelist'] [] = $row;
			}
		} else {
			$url = "-p1.html";
			if (! empty ( $this->suffixal )) {
				$url = "{$this->suffixal}" . $url;
			}
			$thearray ['pagelist'] [] = array (
					'num' => 1,
					'url' => $url,
					'isselected' => true 
			);
		}
		return $thearray;
	}
}
?>