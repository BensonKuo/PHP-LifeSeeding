<?php

include('check.php');

if ($_POST['name']) {

	include('connect.php');
	
	//   以後可能有用的 Author =' ".$_POST['author']."',
	// 先更新文字內容  所以如果圖片不重新上傳 還是會跟原本一樣
	mysql_query("UPDATE product SET Name = '".$_POST['name']."', Category =' ".$_POST['category']."', Subcategory =' ".$_POST['subcategory']."', Price=' ".$_POST['price']."', 
	Stock=' ".$_POST['stock']."', Status=' ".$_POST['status']."', 
	Description=' ".$_POST['des']."' WHERE No='".$_POST['no']."'; ",$link);


	//如果圖片有修改
	if ($_FILES['product']['name']) {
		$handle = fopen($_FILES['product']['tmp_name'], 'r');
		$content = fread($handle, filesize($_FILES['product']['tmp_name']));
		$content = addslashes($content);
		$type = $_FILES['product']['type'];
		
		
		

		fclose($handle);		

		//mysql_query("UPDATE product SET PicType='".$type."', PicBlob=' ".$content."' WHERE No='".$_POST['no']."'; ",$link);
		mysql_query("UPDATE product SET PicType = '". $type."', PicBlob = '". $content ."' WHERE No = '". $_POST['no'] ."'; ", $link);
			
	}


	mysql_close($link);
}

header('Location: product_view.php');


?>