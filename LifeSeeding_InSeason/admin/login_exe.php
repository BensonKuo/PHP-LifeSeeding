<?php
include('connect.php');

$result = mysql_query("SELECT * FROM admin;",$link);
$record = mysql_fetch_array($result);


if ($_POST['ac']== $record['ac']&& $_POST['ps']==$record['pw']) {
	setcookie('ac',$record['ac']);//設定cookie
	setcookie('pw',$record['pw']);
	//echo "success!";
	header('Location: choosefunction.html');
}else{
	//echo "帳號或密碼有誤，請回上頁重新輸入";
	header('Location: index.php');

}

mysql_close($link);

// 1. 回到跟使用者一樣的頁面，並顯示編輯按鈕
//header('Location: ../index.php');

// 2. 獨立的商品管理頁面
//header('Location: product_view.php');


?>