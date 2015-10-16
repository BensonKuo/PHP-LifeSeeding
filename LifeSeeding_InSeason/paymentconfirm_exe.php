<?php


if ($_POST['order']) {
 	
 	include('connect.php');
	
	$OrderNo = $_POST['order'];

	$paid = "待核對";

	//有幾筆訂單 就寫入幾次 匯款資料
	for ($i=0; $i < sizeof($OrderNo) ; $i++) { 
		//記錄付款資訊
		mysql_query("INSERT INTO payment (OrderNo, TransferAcc, TransferAmt, TransferTime, CustomerPhone, CustomerName)
			VALUES ('".$OrderNo[$i]."', '".$_POST['TransferAcc']."', 
				'".$_POST['TransferAmt']."', '".$_POST['TransferTime']."', '".$_POST['CustomerPhone']."', '".$_POST['CustomerName']."');",$link); 
		//將該訂單註記已付款
		mysql_query("UPDATE purchase SET PaidCheck = '".$paid."' WHERE OrderNo='".$OrderNo[$i]."';",$link);

	}

	mysql_close($link);

	header('Location: paymentconfirm_thanku.html');

}else{

	header('Location: paymentconfirm.php');

	
}



?>