<?php
require_once '../../config.php';
header ( "Content-Type: text/html; charset=utf-8" );
$nowmember=bll_admin::getadminnow();
if ( count($nowmember)<1) {
	header ( 'location:../index.html' );
	die();
}
new backusl_controller ( $_REQUEST ['action'] );

/**
 * 新闻控制器
 * 
 * @author sansanchengbao
 *
 */
class backusl_controller {
	/**
	 * 构造函数
	 * 
	 * @param string $action 处理方法名
	 */
	public function __construct($action) {
		if (! method_exists ( $this, $action )) {
			die ( "该方法不存在" );
		}
		switch ($action) {
			case "addsort" : //新增类别
			case "editsort" : //修改类别
			case "sortmove" : //移动类别
			case "delsort" : //删除类别 			
			

			case "addnews" : //新增新闻
			case "editnews" : //修改新闻
			case "newsmove" : //移动新闻
			case "deletenews" : //删除新闻
				break;
			default :
				die ( "该方法错误" );
				break;
		}
		$this->{$action} ();
	}
	
	/**
	 * 添加类别
	 * 
	 */
	private function addsort() {
		if (bll_newssort::add ( $_POST ) > 0) {
			switch ($_POST ['tag']) {
				case "product" :
					echo com_oftenjavascript::alertgotourl ( "新增成功!!!", "newssort_productlist.php" );
				break;
				case "case" :
					echo com_oftenjavascript::alertgotourl ( "新增成功!!!", "newssort_caselist.php" );
				break;
				case "news" :
					echo com_oftenjavascript::alertgotourl ( "新增成功!!!", "newssort_newslist.php" );
				break;
				default:
					echo com_oftenjavascript::alertgotourl ( "新增成功!!!", "newssort_list.php" );
				break;
			}
		} else {
			echo com_oftenjavascript::alertgoback ( "新增失败!!!" );
		}
	}
	
	/**
	 * 修改类别
	 * 
	 */
	private function editsort() {
		if (bll_newssort::edit ( $_POST ) > 0) {
			switch ($_POST ['tag']) {
				case "product" :
					echo com_oftenjavascript::alertgotourl ( "修改成功!!!", "newssort_edit.php?tag=product&theid=" . $_POST ['theid'] );
				break;
				case "case" :
					echo com_oftenjavascript::alertgotourl ( "修改成功!!!", "newssort_edit.php?tag=case&theid=" . $_POST ['theid'] );
				break;
				case "news" :
					echo com_oftenjavascript::alertgotourl ( "修改成功!!!", "newssort_edit.php?tag=news&theid=" . $_POST ['theid'] );
				break;
				default:
					echo com_oftenjavascript::alertgotourl ( "修改成功!!!", "newssort_edit.php?theid=" . $_POST ['theid'] );
				break;
			}
		} else {
			echo com_oftenjavascript::alertgoback ( "修改失败!!!" );
		}
	}
	
	/**
	 * 移动类别
	 * 
	 */
	private function sortmove() {
		bll_newssort::swapserial ( $_GET ['idstr'] );
		echo com_oftenjavascript::parentrefurbish ();
	}
	
	/**
	 * 删除类别
	 * 
	 */
	private function delsort() {
		if (bll_newssort::delete ( $_GET ['theid'] )) {
			echo com_oftenjavascript::parentalertrefurbishparent ( "删除成功!!!" );
		} else {
			echo com_oftenjavascript::parentalert ( "删除失败!!!" );
		}
	}
	
	/**
	 * 添加新闻
	 * 
	 */
	private function addnews() {
		if (bll_news::add ( $_POST ) > 0) {
		    $tag=$_POST ['tag'];
			switch ($tag){
				case "product":
				  echo com_oftenjavascript::alertgotourl ( "新增成功!!!", "news_list.php?tag=".$tag."&theid=" . $_POST ['theid'] );	
				  break;
				case "case":
				  echo com_oftenjavascript::alertgotourl ( "新增成功!!!", "news_list.php?tag=".$tag."&theid=" . $_POST ['theid'] );	
				  break;
				case "news":
				  echo com_oftenjavascript::alertgotourl ( "新增成功!!!", "news_list.php?tag=".$tag."&theid=" . $_POST ['theid'] );	
				  break;
				default:
				  echo com_oftenjavascript::alertgotourl ( "新增成功!!!", "news_list.php?theid=" . $_POST ['theid'] );		
				  break;
		    } 
			
		} else {
			echo com_oftenjavascript::alertgoback ( "新增失败!!!" );
		}
	}
	
	/**
	 * 修改新闻
	 * 
	 */
	private function editnews() {
		if (bll_news::edit ( $_POST ) > 0) {
			$tag=$_POST ['tag'];
			switch ($tag){
				case "product":
				  echo com_oftenjavascript::alertgotourl ( "修改成功!!!", "news_edit.php?tag=".$tag."&theid=" . $_POST ['theid'] );	
				  break;
				case "case":
				  echo com_oftenjavascript::alertgotourl ( "修改成功!!!", "news_edit.php?tag=".$tag."&theid=" . $_POST ['theid'] );	
				  break;
				case "news":
				  echo com_oftenjavascript::alertgotourl ( "修改成功!!!", "news_edit.php?tag=".$tag."&theid=" . $_POST ['theid'] );	
				  break;
				default:
				  echo com_oftenjavascript::alertgotourl ( "修改成功!!!", "news_edit.php?theid=" . $_POST ['theid'] );		
				  break;
		    } 
		} else {
			echo com_oftenjavascript::alertgoback ( "修改失败!!!" );
		}
	}
	
	/**
	 * 移动新闻
	 * 
	 */
	private function newsmove() {
		bll_news::swapserial ( $_GET ['idstr'] );
		echo com_oftenjavascript::parentrefurbish ();
	}
	
	/**
	 * 删除新闻
	 * 
	 */
	private function deletenews() {
		$idlist = $_GET ['thelist'];
		if (bll_news::delete ( $idlist )) {
			echo com_oftenjavascript::parentrefurbish ();
		} else {
			echo com_oftenjavascript::parentalert ( "删除失败!!!" );
		}
	}
}
?>