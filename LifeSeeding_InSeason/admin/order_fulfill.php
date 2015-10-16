<?php
//確認取貨後來的頁面
if ($_GET['orderno']) {
 	
 	include('connect.php');
	
	
	$paid = "已取貨";


	//將該訂單註記 "完成取貨"
	mysql_query("UPDATE purchase SET PaidCheck = '".$paid."' WHERE OrderNo='".$_GET['orderno']."';",$link);

	
	mysql_close($link);

	header('Location: order_view.php');

}


?>