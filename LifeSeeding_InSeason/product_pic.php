<?php

 //如果有收到get值
 if ($_GET['no']) {
 	
	include('connect.php');

	// 取出圖片類型和內容值
	$result = mysql_query("SELECT * FROM product WHERE No= '".$_GET['no']."'; ",$link);
 	
 	$pic = mysql_fetch_array($result);

 	mysql_close($link);

	//有mimetype才會解讀成圖片!  會依照上傳的 所以什麼類型都可以! 不只是圖片!
 	header("Content-type: ".$pic['PicType']);

 	echo $pic['PicBlob'];
 	exit;
 }

?>