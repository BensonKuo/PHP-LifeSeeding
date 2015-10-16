<?php
//都會 Include check.php 來完善檢查有無管理者權限

/*
$link = mysql_connect('localhost','root','student');
mysql_select_db('LifeSeeding');

$result = mysql_query("SELECT * FROM admin;",$link);
$record = mysql_fetch_array($result);
*/

//偷懶寫法
include('code.php');

$check = FALSE;

//檢查cookie
if ($_COOKIE['ac']==$ac && $_COOKIE['pw']==$pw) {
	$check = TRUE;
	//這裏不能跳轉啦！！
}

if ($check==FALSE) {
	//echo 'ACCESS DENIED!';
	header('Location: index.php');
}

//mysql_close($link);
?>