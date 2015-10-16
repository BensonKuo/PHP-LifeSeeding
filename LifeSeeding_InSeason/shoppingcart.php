<?php

//確定有 no & amount 傳過來
if ($_GET['no'] && $_POST['amount']) {

	//商品資訊部分

	//若cookie中有紀錄 就叫出來
	if (isset($_COOKIE['cart'])) {
		$cart = $_COOKIE['cart'];

	}else{
		$cart = " ";
	}

	// '#'用來分隔no 在cookie中為 '%23'
	$cart .= $_GET['no'].'#';
	setcookie('cart',$cart);




	//訂購數量部分
	if (isset($_COOKIE['amount'])) {
		$amount = $_COOKIE['amount'];

	}else{
		$amount = " ";
	}

	$amount .= $_POST['amount']."#";
	setcookie('amount',$amount);


	//echo "heello";

	header('Location: sales.php');
}else{

	//若有人想把庫存等於零的加入購物車
	echo "很抱歉，本商品已售完！";

}

?>