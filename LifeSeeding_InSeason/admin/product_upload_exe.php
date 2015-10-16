<?php

include('check.php');

include('connect.php');


//如果有上傳圖片的話
if ($_FILES['product']['name']) {
	
	// fopen(filename, mode)
	// 開啟檔案
	$handle = fopen($_FILES['product']['tmp_name'], 'r');

	// fread(handle, length)
	// fread 回傳值為讀出的資料
	$content = fread($handle, filesize($_FILES['product']['tmp_name']));

	//要存入 product content的blob
	$content = addslashes($content);

	//要存入的 檔案類型
	$type = $_FILES['product']['type'];

	fclose($handle);
}


mysql_query("INSERT INTO product (Name, Price, Stock, Description, PicType, PicBlob, Category, Subcategory, Status) 
		VALUES ('".$_POST['name']."', '".$_POST['price']."', '".$_POST['stock']."', '".$_POST['des']."', '"
			.$type."', '".$content."', '".$_POST['category']."', '".$_POST['subcategory']."', '".$_POST['status']."');",$link);




mysql_close($link);

header('Location: product_view.php');

?>