<?php
	
	include('connect.php');
 
    //從 cookie 中取出 商品號碼
	$itemNo = explode('#',$_COOKIE['cart']);
	array_pop($itemNo);

	// 從 cookie 中取出 訂購數量
	$itemAmt = explode('#', $_COOKIE['amount']);
	array_pop($itemAmt);

	//預設的訂單狀態
	$paid = '尚未付款';

	
	//清空他的購物車
	setcookie('cart','');
	setcookie('amount','');

	// 同樣的人來買兩次 或是
	// 一個人一次買兩樣以上東西 都會被當作獨立的訂單 會有各自的客戶資料 才不會刪除其一訂單後就沒他的身份資料

	// 寫入訂單資訊  並藉由寫入 CustomerID 來知道每筆訂單是誰的   最後減少商品存貨
	for ($i=0; $i < sizeof($itemNo); $i++) { 

		 // 把名字跟電話和起來成為unique欄位 哪裡unique了！ 他來買兩次你就掰了！！！！！！  改成加上 date('U')也沒用印為cpu太快了 最後用rand()
    	$id = ($_POST['CustomerName'] . rand() );

    	if ($_POST['CustomerName']=='現場購買') {
    		$paid = '已取貨';
    	}
    	//取得目前庫存量
		$result = mysql_query("SELECT * FROM product WHERE No='".$itemNo[$i]."';",$link);
		$record = mysql_fetch_array($result);

    	/*確認該商品庫存是不是 < 1  因為apache 所以不行 code 沒錯
		if ($record['Stock']<1) {

			echo "<h3>Oops!</h3>";
			echo "<p>您挑選的太久了！商品 <b>".$record['Name']."</b> 已被訂購一空，但別擔心，你購物車內的其他商品都購買成功了！</p>";
			echo "<a href='checkout_thanku.php'>按這裡檢視購物的後續步驟</a></p>";
			
			continue;   // 跳過寫入這筆訂單 其他筆仍然會寫入！
		}
		*/

	    // 記錄客戶資訊
	    mysql_query("INSERT INTO customer (CustomerName, CustomerFrom, Phone, Email, Note, CustomerID) 
    	VALUES ('".$_POST['CustomerName']."', '".$_POST['CustomerFrom']."', '".$_POST['Phone']."', '"
    		.$_POST['Email']."', '".$_POST['Note']."', '".$id."'); ",$link);

	    // 寫入訂單資料
		mysql_query("INSERT INTO purchase (ProductNo, ProductAmt, CustomerID, PaidCheck) 
	    	VALUES ('".$itemNo[$i]."', '".$itemAmt[$i]."', '".$id."', '".$paid."');",$link);

		// 減少該商品的庫存
		$afterSales = ($record['Stock']-$itemAmt[$i]);
		// 更新product 的 stock
		mysql_query("UPDATE product SET Stock = '".$afterSales."' WHERE No='".$itemNo[$i]."'; ",$link);
	}
	
	
	mysql_close($link);

	
	
	header("Location: checkout_thanku.php");
?>