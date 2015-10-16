<?php
//刪除訂單

include('check.php');


//如果有收到訂單編號
if ($_GET['orderno']) {

	include('connect.php');


	//找出訂單的相關資訊
	$result = mysql_query("SELECT * FROM customer c, purchase p, product pr 
		WHERE c.CustomerID = p.CustomerID AND p.ProductNo = pr.No AND p.OrderNo='".$_GET['orderno']."';",$link);
	$record = mysql_fetch_array($result);

	
	//加回該商品庫存
	$afterReturn = ($record['Stock']+$record['ProductAmt']);
	mysql_query("UPDATE product SET Stock = '".$afterReturn."' WHERE No='".$record['No']."' ;",$link);

	//刪除該客戶資料
	mysql_query("DELETE FROM customer WHERE CustomerNo='".$record['CustomerNo']."';",$link);

	//刪除該訂單
	mysql_query("DELETE FROM purchase WHERE OrderNo='".$_GET['orderno']."'; ",$link);




	mysql_close($link);

	header('Location: order_view.php');
}


?>