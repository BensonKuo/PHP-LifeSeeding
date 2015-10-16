<?php

if ($_GET['orderno']) {
 	
 	include('connect.php');
	
	
	$paid = "已付款";


	//將該訂單註記 "已付款"
	mysql_query("UPDATE purchase SET PaidCheck = '".$paid."' WHERE OrderNo='".$_GET['orderno']."';",$link);

	
	mysql_close($link);

	header('Location: payment_view.php');

}


?>