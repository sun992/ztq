<?php
require_once '../../config.php';
if ( count($nowmember)<1) {
	header ( 'location:../index.html' );
	die();
}
if (! array_key_exists ( 'action', $_REQUEST )) {
	header ( 'location:../index.html' );
}
header ( "Content-Type: text/html; charset=utf-8" );

switch ($_REQUEST ['action']) {
	//======================表结构设置==================================
	//添加字段
	case 'dataStructure_Add' :
		dataStructureAdd ();
		break;
	//删除字段
	case 'dataStructureDel' :
		dataStructureDel ();
		break;
	//======================表单设置==================================
	//添加表单项
	case 'formSet_Add' :
		formSetAdd ();
		break;
	//编辑表单项
	case 'formSet_Edit' :
		formSetEdit ();
		break;
	//删除表单项
	case 'formSet_Del' :
		formSet_Del ();
		break;
	//代码生成
	case 'makeCode' :
		switch ($_GET ['tableName']) {
			case 'tb_onepage' :
				MakeEditOnePage ();
				break;
			case 'tb_newssort' :
				MakeNewsSort ();
				break;
			case 'tb_news' :
				MakeNews ();
				break;
			case 'tb_linksort' :
				MakeLinkSort ();
				break;
			case 'tb_link' :
				MakeLink ();
				break;
			case 'tb_member' :
				MakeMember ();
				break;
			default :
				break;
		}
		break;
	default :
		break;
}

//添加字段
function dataStructureAdd() {
	global $conn;
	$theTable = $_SESSION ['dataTable'];
	$columnsType = $_POST ['columnsType'];
	$columnsCode = $_POST ['columnsCode'];
	switch ($columnsType) {
		case '1' :
			$columnsType = "varchar(255)";
			break;
		case '2' :
			$columnsType = "int(11)";
			break;
		case '3' :
			$columnsType = "longtext";
			break;
		case '4' :
			$columnsType = "datetime";
			break;
		default :
			break;
	}
	$sql = "alter table " . $theTable . " add " . $columnsCode . ' ' . $columnsType;
	if ($conn->Execute ( $sql )) {
		echo "<script type=\"text/javascript\" >\r\n";
		echo "if (navigator.appName==\"Microsoft Internet Explorer\")\r\n";
		echo "{\r\n";
		echo "window.dialogArguments.location.href=window.dialogArguments.location.href;\r\n";
		echo "}\r\n";
		echo "else\r\n";
		echo "{\r\n";
		echo "window.opener.location.href=window.opener.location.href;\r\n";
		echo "}\r\n";
		echo "window.close();\r\n";
		echo "</script>\r\n";
	}
}
//删除字段
function dataStructureDel() {
	global $conn;
	$theTable = $_GET ['theTable'];
	$theCode = $_GET ['theCode'];
	$sql = "alter table $theTable drop column $theCode";
	if ($conn->Execute ( $sql )) {
		echo com_oftenjavascript::parentRefurbish ();
	}
}
//添加表单
function formSetAdd() {
	$theTable = $_SESSION ['dataTable'];
	$code = $_POST ['code'];
	$codeType = getColType ( $theTable, $code );
	$theid = $_POST ['theid'];
	$showName = $_POST ['showName'];
	$type = $_POST ['type'];
	$showMore = $_POST ['showMore'];
	
	$doc = new DOMDocument ();
	$doc->formatOutput = true;
	if ($doc->load ( "formdata.xml" )) {
		$root = $doc->documentElement;
		$item = $doc->createElement ( 'item' );
		xmlAddSx ( $doc, $item, "id", date ( "YmdHis" ) );
		xmlAddSx ( $doc, $item, "theTable", $theTable );
		xmlAddSx ( $doc, $item, "code", $code );
		xmlAddSx ( $doc, $item, "codeType", $codeType );
		xmlAddSx ( $doc, $item, "type", $type );
		xmlAddSx ( $doc, $item, "theid", $theid );
		xmlAddSx ( $doc, $item, "showName", $showName );
		xmlAddSx ( $doc, $item, "showMore", $showMore );
		$root->appendChild ( $item );
		$doc->save ( "formdata.xml" );
	}
	
	echo "<script type=\"text/javascript\" >\r\n";
	echo "if (navigator.appName==\"Microsoft Internet Explorer\")\r\n";
	echo "{\r\n";
	echo "window.dialogArguments.location.href=window.dialogArguments.location.href;\r\n";
	echo "}\r\n";
	echo "else\r\n";
	echo "{\r\n";
	echo "window.opener.location.href=window.opener.location.href;\r\n";
	echo "}\r\n";
	echo "window.close();\r\n";
	echo "</script>\r\n";
}
//编辑表单项
function formSetEdit() {
	$xmlId = floor ( $_POST ['xmlId'] );
	$theTable = $_SESSION ['dataTable'];
	$code = $_POST ['code'];
	$codeType = getColType ( $theTable, $code );
	$theid = $_POST ['theid'];
	$showName = $_POST ['showName'];
	$type = $_POST ['type'];
	$showMore = $_POST ['showMore'];
	$isOk = false;
	
	$doc = new DOMDocument ();
	$doc->formatOutput = true;
	if ($doc->load ( "formdata.xml" )) {
		$root = $doc->documentElement;
		$items = $root->getElementsByTagName ( 'item' );
		foreach ( $items as $item ) {
			if ($item->getAttribute ( 'id' ) == $xmlId) {
				$item->setAttribute ( 'code', $code );
				$item->setAttribute ( 'codeType', $codeType );
				$item->setAttribute ( 'theid', $theid );
				$item->setAttribute ( 'showName', $showName );
				$item->setAttribute ( 'type', $type );
				$item->setAttribute ( 'showMore', $showMore );
				$doc->save ( "formdata.xml" );
				$isOk = true;
			}
		}
	}
	if ($isOk) {
		echo "<script type=\"text/javascript\" >\r\n";
		echo "if (navigator.appName==\"Microsoft Internet Explorer\")\r\n";
		echo "{\r\n";
		echo "window.dialogArguments.location.href=window.dialogArguments.location.href;\r\n";
		echo "}\r\n";
		echo "else\r\n";
		echo "{\r\n";
		echo "window.opener.location.href=window.opener.location.href;\r\n";
		echo "}\r\n";
		echo "window.close();\r\n";
		echo "</script>\r\n";
	}
}
//删除表单项
function formSet_Del() {
	$theTable = $_SESSION ['dataTable'];
	$theid = $_GET ['theid'];
	$isOk = false;
	$doc = new DOMDocument ();
	$doc->formatOutput = true;
	if ($doc->load ( "formdata.xml" )) {
		$root = $doc->documentElement;
		$items = $root->getElementsByTagName ( 'item' );
		foreach ( $items as $item ) {
			if ($item->getAttribute ( 'id' ) == $theid) {
				if ($root->removeChild ( $item )) {
					$doc->save ( "formdata.xml" );
					$isOk = true;
				}
			}
		}
	}
	if ($isOk) {
		echo com_oftenjavascript::parentRefurbish ();
	} else {
		echo com_oftenjavascript::parentAlertRefurbishParent ( "删除失败" );
	}
}
//生成修改单页代码
function MakeEditOnePage() {
	$MakeStr = MakeCode ( "Edit" );
	$file_name = "onepage_edit.txt";
	$file_pointer = fopen ( $file_name, "ra" );
	$file_read = fread ( $file_pointer, filesize ( $file_name ) );
	fclose ( $file_pointer );
	$NewsCode = str_ireplace ( "<!--这里是生成位置-->", $MakeStr, $file_read );
	$file_name = "../onepage/onepage_edit.php";
	$file_pointer = fopen ( $file_name, "wa" );
	fwrite ( $file_pointer, $NewsCode, strlen ( $NewsCode ) );
	fclose ( $file_pointer );
	echo com_oftenjavascript::parentAlertRefurbishParent ( "生成完成" );
}
//生成新闻类别代码
function MakeNewsSort() {
	$MakeStr = MakeCode ( "Add" );
	$file_name = "newssort_add.txt";
	$file_pointer = fopen ( $file_name, "ra" );
	$file_read = fread ( $file_pointer, filesize ( $file_name ) );
	fclose ( $file_pointer );
	$NewsCode = str_ireplace ( "<!--这里是生成位置-->", $MakeStr, $file_read );
	$file_name = "../news/newssort_add.php";
	$file_pointer = fopen ( $file_name, "wa" );
	fwrite ( $file_pointer, $NewsCode, strlen ( $NewsCode ) );
	fclose ( $file_pointer );
	
	$MakeStr = MakeCode ( "Edit" );
	$file_name = "NewsSort_Edit.txt";
	$file_pointer = fopen ( $file_name, "ra" );
	$file_read = fread ( $file_pointer, filesize ( $file_name ) );
	fclose ( $file_pointer );
	$NewsCode = str_ireplace ( "<!--这里是生成位置-->", $MakeStr, $file_read );
	$file_name = "../news/newssort_edit.php";
	$file_pointer = fopen ( $file_name, "wa" );
	fwrite ( $file_pointer, $NewsCode, strlen ( $NewsCode ) );
	fclose ( $file_pointer );
	echo com_oftenjavascript::parentAlertRefurbishParent ( "生成完成" );
}
//生成新闻代码
function MakeNews() {
	$MakeStr = MakeCode ( "Add" );
	$file_name = "news_add.txt";
	$file_pointer = fopen ( $file_name, "ra" );
	$file_read = fread ( $file_pointer, filesize ( $file_name ) );
	fclose ( $file_pointer );
	$NewsCode = str_ireplace ( "<!--这里是生成位置-->", $MakeStr, $file_read );
	$file_name = "../news/news_add.php";
	$file_pointer = fopen ( $file_name, "wa" );
	fwrite ( $file_pointer, $NewsCode, strlen ( $NewsCode ) );
	fclose ( $file_pointer );
	
	$MakeStr = MakeCode ( "Edit" );
	$file_name = "news_edit.txt";
	$file_pointer = fopen ( $file_name, "ra" );
	$file_read = fread ( $file_pointer, filesize ( $file_name ) );
	fclose ( $file_pointer );
	$NewsCode = str_ireplace ( "<!--这里是生成位置-->", $MakeStr, $file_read );
	$file_name = "../news/news_edit.php";
	$file_pointer = fopen ( $file_name, "wa" );
	fwrite ( $file_pointer, $NewsCode, strlen ( $NewsCode ) );
	fclose ( $file_pointer );
	echo com_oftenjavascript::parentAlertRefurbishParent ( "生成完成" );
}
//生成链接类别代码
function MakeLinkSort() {
	$MakeStr = MakeCode ( "Add" );
	$file_name = "linksort_add.txt";
	$file_pointer = fopen ( $file_name, "ra" );
	$file_read = fread ( $file_pointer, filesize ( $file_name ) );
	fclose ( $file_pointer );
	$NewsCode = str_ireplace ( "<!--这里是生成位置-->", $MakeStr, $file_read );
	$file_name = "../link/linksort_add.php";
	$file_pointer = fopen ( $file_name, "wa" );
	fwrite ( $file_pointer, $NewsCode, strlen ( $NewsCode ) );
	fclose ( $file_pointer );
	
	$MakeStr = MakeCode ( "Edit" );
	$file_name = "linksort_edit.txt";
	$file_pointer = fopen ( $file_name, "ra" );
	$file_read = fread ( $file_pointer, filesize ( $file_name ) );
	fclose ( $file_pointer );
	$NewsCode = str_ireplace ( "<!--这里是生成位置-->", $MakeStr, $file_read );
	$file_name = "../link/linksort_edit.php";
	$file_pointer = fopen ( $file_name, "wa" );
	fwrite ( $file_pointer, $NewsCode, strlen ( $NewsCode ) );
	fclose ( $file_pointer );
	echo com_oftenjavascript::parentAlertRefurbishParent ( "生成完成" );
}
//生成链接代码
function MakeLink() {
	$MakeStr = MakeCode ( "Add" );
	$file_name = "link_add.txt";
	$file_pointer = fopen ( $file_name, "ra" );
	$file_read = fread ( $file_pointer, filesize ( $file_name ) );
	fclose ( $file_pointer );
	$NewsCode = str_ireplace ( "<!--这里是生成位置-->", $MakeStr, $file_read );
	$file_name = "../../index.html";
	$file_pointer = fopen ( $file_name, "wa" );
	fwrite ( $file_pointer, $NewsCode, strlen ( $NewsCode ) );
	fclose ( $file_pointer );
	
	$MakeStr = MakeCode ( "Edit" );
	$file_name = "Link_Edit.txt";
	$file_pointer = fopen ( $file_name, "ra" );
	$file_read = fread ( $file_pointer, filesize ( $file_name ) );
	fclose ( $file_pointer );
	$NewsCode = str_ireplace ( "<!--这里是生成位置-->", $MakeStr, $file_read );
	$file_name = "../link/link_edit.php";
	$file_pointer = fopen ( $file_name, "wa" );
	fwrite ( $file_pointer, $NewsCode, strlen ( $NewsCode ) );
	fclose ( $file_pointer );
	echo com_oftenjavascript::parentAlertRefurbishParent ( "生成完成" );
}
//生成会员代码
function MakeMember() {
	$MakeStr = MakeCode ( "Add" );
	$file_name = "member_add.txt";
	$file_pointer = fopen ( $file_name, "ra" );
	$file_read = fread ( $file_pointer, filesize ( $file_name ) );
	fclose ( $file_pointer );
	$NewsCode = str_ireplace ( "<!--这里是生成位置-->", $MakeStr, $file_read );
	$file_name = "../Member/Member_Add.php";
	$file_pointer = fopen ( $file_name, "wa" );
	fwrite ( $file_pointer, $NewsCode, strlen ( $NewsCode ) );
	fclose ( $file_pointer );
	
	$MakeStr = MakeCode ( "Edit" );
	$file_name = "member_edit.txt";
	$file_pointer = fopen ( $file_name, "ra" );
	$file_read = fread ( $file_pointer, filesize ( $file_name ) );
	fclose ( $file_pointer );
	$NewsCode = str_ireplace ( "<!--这里是生成位置-->", $MakeStr, $file_read );
	$file_name = "../member/member_edit.php";
	$file_pointer = fopen ( $file_name, "wa" );
	fwrite ( $file_pointer, $NewsCode, strlen ( $NewsCode ) );
	fclose ( $file_pointer );
	echo com_oftenjavascript::parentAlertRefurbishParent ( "生成完成" );
}
//生成代码
function MakeCode($TheType) {
	$xml = simplexml_load_file ( "formdata.xml" );
	$newArr = null;
	foreach ( $xml as $key => $value ) {
		$tempArr = $value->attributes ();
		if ($tempArr ['theTable'] != $_SESSION ['dataTable']) {
			continue;
		}
		if ($newArr == null) {
			$newArr [] = $tempArr;
		} else {
			$iszd = false;
			foreach ( $newArr as $newvalue ) {
				if (strcmp ( $newvalue ['code'], $tempArr ['code'] ) != 0) {
					continue;
				}
				if (strcmp ( $newvalue ['codeType'], $tempArr ['codeType'] ) != 0) {
					continue;
				}
				if (strcmp ( $newvalue ['type'], $tempArr ['type'] ) != 0) {
					continue;
				}
				if (strcmp ( $newvalue ['showName'], $tempArr ['showName'] ) != 0) {
					continue;
				}
				if (strcmp ( $newvalue ['showMore'], $tempArr ['showMore'] ) != 0) {
					continue;
				}
				$newvalue ['theid'] = $newvalue ['theid'] . '|' . $tempArr ['theid'];
				$iszd = true;
			}
			if (! $iszd) {
				$newArr [] = $tempArr;
			}
		}
	}
	if (! isset ( $newArr )) {
		return;
	}
	$Make_str = "";
	if ($TheType == "Add") {
		foreach ( $newArr as $newvalue ) {
			$theName = $newvalue ['code'] . "_";
			switch ($newvalue ['codeType']) {
				case "C" :
					$theName .= 'txt';
					break;
				case "X" :
					$theName .= 'text';
					break;
				case "I" :
					$theName .= 'int';
					break;
				case "D" :
				case "T" :
					$theName .= 'time';
					break;
			}
			$TheValue = "<?php echo \$makedata['" . $newvalue ['code'] . "']; ?>";
			switch (( string ) $newvalue ['type']) {
				case '1' : //文本框添加
					$Make_str .= "	<?php if(strpos(\"|$newvalue[theid]|\",\"|\$findid|\")!==false){ ?>\r\n";
					$Make_str .= "	<tr>\r\n";
					$Make_str .= "		<th>$newvalue[showName]：</th>\r\n";
					$Make_str .= "		<td><input type=\"text\" name=\"$theName\" value=\"\" size=\"40\" /></td>\r\n";
					$Make_str .= "	</tr>\r\n";
					$Make_str .= "	<?php } ?>\r\n\r\n";
					break;
				case '2' : //文本域添加
					$Make_str .= "	<?php if(strpos(\"|$newvalue[theid]|\",\"|\$findid|\")!==false){ ?>\r\n";
					$Make_str .= "	<tr>\r\n";
					$Make_str .= "		<th>$newvalue[showName]：</th>\r\n";
					$Make_str .= "		<td><textarea name=\"$theName\" cols=\"50\" rows=\"4\"></textarea></td>\r\n";
					$Make_str .= "	</tr>\r\n";
					$Make_str .= "	<?php } ?>\r\n\r\n";
					break;
				case '3' : //选择列表添加
					$Make_str .= "	<?php if(strpos(\"|$newvalue[theid]|\",\"|\$findid|\")!==false){ ?>\r\n";
					$Make_str .= "	<tr>\r\n";
					$Make_str .= "		<th>$newvalue[showName]：</th>\r\n";
					$Make_str .= "		<td>\r\n\r\n";
					$Make_str .= "			<select name=\"$theName\" id=\"$theName\">\r\n";
					$optionarr = explode ( '~--~', $newvalue ['showMore'] );
					foreach ( $optionarr as $oneoption ) {
						$oneoptionarr = explode ( '%%$$', $oneoption );
						$Make_str .= "				<option value=\"$oneoptionarr[0]\">$oneoptionarr[1]</option>\r\n";
					}
					$Make_str .= "			</select>\r\n";
					$Make_str .= "		</td>\r\n";
					$Make_str .= "	</tr>\r\n";
					$Make_str .= "	<?php } ?>\r\n\r\n";
					break;
				case '4' : //复选框添加
					$Make_str .= "	<?php if(strpos(\"|$newvalue[theid]|\",\"|\$findid|\")!==false){ ?>\r\n";
					$Make_str .= "	<tr>\r\n";
					$Make_str .= "		<th>$newvalue[showName]：</th>\r\n";
					$Make_str .= "		<td>\r\n";
					$optionarr = explode ( '~--~', $newvalue ['showMore'] );
					foreach ( $optionarr as $oneoption ) {
						$oneoptionarr = explode ( '%%$$', $oneoption );
						$Make_str .= "			<input type=\"checkbox\"  name=\"temp$thename\" onclick=\"setFxk('$thename','')\" value=\"$oneoptionarr[0]\" \>&nbsp;&nbsp;$oneoptionarr[1]\r\n";
					}
					$Make_str .= "			<input type=\"hidden\"  name=\"$theName\" id=\"$theName\" value=\"\"  />\r\n";
					$Make_str .= "		</td>\r\n";
					$Make_str .= "	</tr>\r\n";
					$Make_str .= "	<?php } ?>\r\n\r\n";
					break;
				case '5' : //单选框添加
					$Make_str .= "	<?php if(strpos(\"|$newvalue[theid]|\",\"|\$findid|\")!==false){ ?>\r\n";
					$Make_str .= "	<tr>\r\n";
					$Make_str .= "		<th>$newvalue[shownName]：</th>\r\n";
					$Make_str .= "		<td>\r\n";
					$optionarr = explode ( '~--~', $newvalue ['showMore'] );
					$i = 1;
					foreach ( $optionarr as $oneoption ) {
						$oneoptionarr = explode ( '%%$$', $oneoption );
						$Make_str .= "			<input type=\"radio\"  name=\"$theName\" value=\"$oneoptionarr[0]\"";
						if ($i <= 1) {
							$Make_str .= " checked=\"checked\"";
						}
						$i ++;
						$Make_str .= " \>&nbsp;&nbsp;$oneoptionarr[1]\r\n";
					}
					$Make_str .= "		</td>\r\n";
					$Make_str .= "	</tr>\r\n";
					$Make_str .= "	<?php } ?>\r\n\r\n";
					break;
				case '6' : //图片添加
					$Make_str .= "	<?php if(strpos(\"|$newvalue[theid]|\",\"|\$findid|\")!==false){ ?>\r\n";
					$Make_str .= "	<tr>\r\n";
					$Make_str .= "		<th>$newvalue[showName]：</th>\r\n";
					$Make_str .= "		<td>\r\n";
					$Make_str .= "			<input type=\"text\" name=\"$theName\" id=\"url\" value=\"\" size=\"40\" />\r\n";
					$Make_str .= "			<input type=\"button\" id=\"J_selectImage\" value=\"图片上传\" class=\"btn\" />\r\n";
					$Make_str .= "	    <script>\r\n";
					$Make_str .= "		      KindEditor.ready(function(K) {\r\n";
					$Make_str .= "				      var editor = K.editor({\r\n";
					$Make_str .= "						      allowFileManager : true\r\n";
					$Make_str .= "				      });\r\n";
					$Make_str .= "				      K('#J_selectImage').click(function() {\r\n";
					$Make_str .= "						      editor.loadPlugin('image', function() {\r\n";
					$Make_str .= "								      editor.plugin.imageDialog({\r\n";
					$Make_str .= "										      imageUrl : K('#url').val(),\r\n";
					$Make_str .= "										      clickFn : function(url, title, width, height, border, align) {\r\n";
					$Make_str .= "												      K('#url').val(url);\r\n";
					$Make_str .= "												      editor.hideDialog();\r\n";
					$Make_str .= "										      }\r\n";
					$Make_str .= "								      });\r\n";
					$Make_str .= "						      });\r\n";
					$Make_str .= "				      });\r\n";
					$Make_str .= "		      });\r\n";
					$Make_str .= "	    </script>\r\n";
					$Make_str .= "		</td>\r\n";
					$Make_str .= "	</tr>\r\n";
					$Make_str .= "	<?php } ?>\r\n\r\n";
					
					break;
				case '7' : //文件添加
					$Make_str .= "	<?php if(strpos(\"|$newvalue[theid]|\",\"|\$findid|\")!==false){ ?>\r\n";
					$Make_str .= "	<tr>\r\n";
					$Make_str .= "		<th>$newvalue[showName]：</th>\r\n";
					$Make_str .= "		<td>\r\n";
					$Make_str .= "			<input type=\"text\" name=\"$theName\" value=\"\" size=\"40\" />\r\n";
					$Make_str .= "			<input type=\"button\" onclick=\"showUploadDialog('file','theform.$theName')\" value=\"文件上传\" class=\"btn\" />\r\n";
					$Make_str .= "		</td>\r\n";
					$Make_str .= "	</tr>\r\n";
					$Make_str .= "	<?php } ?>\r\n\r\n";
					break;
				default :
					break;
			}
		}
	}
	if ($TheType == "Edit") {
		foreach ( $newArr as $newvalue ) {
			$theName = $newvalue ['code'] . "_";
			switch ($newvalue ['codeType']) {
				case "C" :
					$theName .= 'txt';
					break;
				case "X" :
					$theName .= 'txt';
					break;
				case "I" :
					$theName .= 'int';
					break;
				case "D" :
				case "T" :
					$theName .= 'time';
					break;
			}
			$theValue = "<?php echo \$makedata['" . $newvalue ['code'] . "']; ?>";
			switch (( string ) $newvalue ['type']) {
				case '1' : //文本框修改
					$Make_str .= "	<?php if(strpos(\"|$newvalue[theid]|\",\"|\$findid|\")!==false){ ?>\r\n";
					$Make_str .= "	<tr>\r\n";
					$Make_str .= "		<th>$newvalue[showName]：</th>\r\n";
					$Make_str .= "		<td><input type=\"text\" name=\"$theName\" value=\"$theValue\" size=\"40\" /></td>\r\n";
					$Make_str .= "	</tr>\r\n";
					$Make_str .= "	<?php } ?>\r\n\r\n";
					break;
				case '2' : //文本域修改
					$Make_str .= "	<?php if(strpos(\"|$newvalue[theid]|\",\"|\$findid|\")!==false){ ?>\r\n";
					$Make_str .= "	<tr>\r\n";
					$Make_str .= "		<th>$newvalue[showName]：</th>\r\n";
					$Make_str .= "		<td><textarea name=\"$theName\" cols=\"50\" rows=\"4\">$theValue</textarea></td>\r\n";
					$Make_str .= "	</tr>\r\n";
					$Make_str .= "	<?php } ?>\r\n\r\n";
					break;
				case '3' : //选择列表修改
					$Make_str .= "	<?php if(strpos(\"|$newvalue[theid]|\",\"|\$findid|\")!==false){ ?>\r\n";
					$Make_str .= "	<tr>\r\n";
					$Make_str .= "		<th>$newvalue[showName]：</th>\r\n";
					$Make_str .= "		<td>\r\n";
					$Make_str .= "			<select name=\"$theName\" id=\"$theName\">\r\n";
					$optionArr = explode ( '~--~', $newvalue ['showMore'] );
					foreach ( $optionArr as $OneOption ) {
						$OneOptionArr = explode ( '%%$$', $OneOption );
						$Make_str .= "				<option value=\"$OneOptionArr[0]\">$OneOptionArr[1]</option>\r\n";
					}
					$Make_str .= "			</select>\r\n";
					$Make_str .= "			<script type=\"text/javascript\">\r\n";
					$Make_str .= "			document.getElementById(\"$theName\").value=\"$theValue\";\r\n";
					$Make_str .= "			</script>\r\n";
					$Make_str .= "		</td>\r\n";
					$Make_str .= "	</tr>\r\n";
					$Make_str .= "	<?php } ?>\r\n\r\n";
					break;
				case '4' : //复选框修改
					$Make_str .= "	<?php if(strpos(\"|$newvalue[theid]|\",\"|\$findid|\")!==false){ ?>\r\n";
					$Make_str .= "	<tr>\r\n";
					$Make_str .= "		<th>$newvalue[showName]：</th>\r\n";
					$Make_str .= "		<td>\r\n";
					$optionArr = explode ( '~--~', $newvalue ['showMore'] );
					foreach ( $optionArr as $OneOption ) {
						$OneOptionArr = explode ( '%%$$', $OneOption );
						$Make_str .= "			<input type=\"checkbox\"  name=\"temp$theName\" onclick=\"setFxk('$theName','')\" value=\"$OneOptionArr[0]\" \>&nbsp;&nbsp;$OneOptionArr[1]\r\n";
					}
					$Make_str .= "			<input type=\"hidden\"  name=\"$theName\" id=\"$theName\" value=\"$theValue\"  />\r\n";
					$Make_str .= "			<script type=\"text/javascript\">\r\n";
					$Make_str .= "			setFxk(\"$theName\",\"<?php echo \$makeData['$newvalue[code]']; ?>\");\r\n";
					$Make_str .= "			</script>\r\n";
					$Make_str .= "		</td>\r\n";
					$Make_str .= "	</tr>\r\n";
					$Make_str .= "	<?php } ?>\r\n\r\n";
					break;
				case '5' : //单选框修改
					$Make_str .= "	<?php if(strpos(\"|$newvalue[theid]|\",\"|\$findid|\")!==false){ ?>\r\n";
					$Make_str .= "	<tr>\r\n";
					$Make_str .= "		<th>$newvalue[showName]：</th>\r\n";
					$Make_str .= "		<td>\r\n";
					$optionArr = explode ( '~--~', $newvalue ['showMore'] );
					foreach ( $optionArr as $OneOption ) {
						$OneOptionArr = explode ( '%%$$', $OneOption );
						$Make_str .= "			<input type=\"radio\"  name=\"$theName\" value=\"$OneOptionArr[0]\" \>&nbsp;&nbsp;$OneOptionArr[1]\r\n";
					}
					$Make_str .= "			<script type=\"text/javascript\">\r\n";
					$Make_str .= "			setDxk(\"$theName\",\"<?php echo \$makeData['$newvalue[code]']; ?>\");\r\n";
					$Make_str .= "			</script>\r\n";
					$Make_str .= "		</td>\r\n";
					$Make_str .= "	</tr>\r\n";
					$Make_str .= "	<?php } ?>\r\n\r\n";
					break;
				case '6' : //图片修改
					$Make_str .= "	<?php if(strpos(\"|$newvalue[theid]|\",\"|\$findid|\")!==false){ ?>\r\n";
					$Make_str .= "	<tr>\r\n";
					$Make_str .= "		<th>$newvalue[showName]：</th>\r\n";
					$Make_str .= "		<td>\r\n";
					$Make_str .= "			<input type=\"text\" name=\"$theName\" id=\"url\" value=\"$theValue\" size=\"40\" />\r\n";
					$Make_str .= "			<input type=\"button\" id=\"J_selectImage\" value=\"图片上传\" class=\"btn\" />\r\n";
					$Make_str .= "		</td>\r\n";
					$Make_str .= "	    <script>\r\n";
					$Make_str .= "		      KindEditor.ready(function(K) {\r\n";
					$Make_str .= "				      var editor = K.editor({\r\n";
					$Make_str .= "						      allowFileManager : true\r\n";
					$Make_str .= "				      });\r\n";
					$Make_str .= "				      K('#J_selectImage').click(function() {\r\n";
					$Make_str .= "						      editor.loadPlugin('image', function() {\r\n";
					$Make_str .= "								      editor.plugin.imageDialog({\r\n";
					$Make_str .= "										      imageUrl : K('#url').val(),\r\n";
					$Make_str .= "										      clickFn : function(url, title, width, height, border, align) {\r\n";
					$Make_str .= "												      K('#url').val(url);\r\n";
					$Make_str .= "												      editor.hideDialog();\r\n";
					$Make_str .= "										      }\r\n";
					$Make_str .= "								      });\r\n";
					$Make_str .= "						      });\r\n";
					$Make_str .= "				      });\r\n";
					$Make_str .= "		      });\r\n";
					$Make_str .= "	    </script>\r\n";
					$Make_str .= "	</tr>\r\n";
					$Make_str .= "	<?php } ?>\r\n\r\n";
					break;
				case '7' : //文件修改
					$Make_str .= "	<?php if(strpos(\"|$newvalue[theid]|\",\"|\$findid|\")!==false){ ?>\r\n";
					$Make_str .= "	<tr>\r\n";
					$Make_str .= "		<th>$newvalue[showName]：</th>\r\n";
					$Make_str .= "		<td>\r\n";
					$Make_str .= "			<input type=\"text\" name=\"$theName\" value=\"$theValue\" size=\"40\" />\r\n";
					$Make_str .= "			<input type=\"button\" onclick=\"showUploadDialog('file','theForm.$theName')\" value=\"文件上传\" class=\"btn\" />\r\n";
					$Make_str .= "		</td>\r\n";
					$Make_str .= "	</tr>\r\n";
					$Make_str .= "	<?php } ?>\r\n\r\n";
					break;
				default :
					break;
			}
		}
	}
	return $Make_str;
}
//获取字段类型
function getColType($tableName, $col) {
	global $conn;
	$sql = 'select * from ' . $tableName;
	$rs = $conn->Execute ( $sql );
	for($i = 0; $i < $rs->FieldCount (); $i ++) {
		$fld = $rs->FetchField ( $i );
		if (strtolower ( $fld->name ) == strtolower ( $col )) {
			return $rs->MetaType ( $fld->type );
		}
	}
}
//XML添加一个属性
function xmlAddSx($doc, $item, $name, $value) {
	$sxm = $doc->createAttribute ( $name );
	$sxz = $doc->createTextNode ( $value );
	$sxm->appendChild ( $sxz );
	$item->appendChild ( $sxm );
}
?>