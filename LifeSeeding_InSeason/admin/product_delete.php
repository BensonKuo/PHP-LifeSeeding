<?php
include('check.php');

if ($_GET['no']) {

	include('connect.php');
	
	// 刪除該商品
	mysql_query("DELETE FROM product WHERE No= '".$_GET['no']."'; ",$link);

	mysql_close($link);

	header('Location: product_view.php');
}

header('Location: product_view.php');

	
?>