<html>

<head>
	<title>LifeSeeding - admin</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">

    <link rel="shortcut icon" href="../icon.ico">    
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" type="text/css" href="../css/card.css">


    <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/layouts/side-menu-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="../css/layouts/side-menu.css">
    <!--<![endif]-->
    <script src="../js/jquery.js" type'text/javascript'></script>

    <!--[if lte IE 8]>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-old-ie-min.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
    <!--<![endif]-->
    
    <style type="text/css">
        .button-success {
            color: white;
            border-radius: 4px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
			background: rgb(66, 184, 221); /* this is a light blue */            
        }

        .button-green {
        	color: white;
            border-radius: 4px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
            background: rgb(28, 184, 65); /* this is a green */
        }
    </style>

</head>

<body>
<?php include_once("analyticstracking.php") ?>

<div align='center'>
<br>
<h2>匯款確認頁面</h2>

<a href="choosefunction.html"><button class="pure-button button-green">回功能選單</button></a>

<form class="pure-form" action='order_view_search.php' method='post'>
    <fieldset>
        <input type="text" placeholder="匯款人姓名" name='search'>
        <button type="submit" class="pure-button button-success">Search</button>
    </fieldset>
</form>



<?php
include('check.php');

include('connect.php');


// 顯示匯款資訊  其訂單狀態為 “待核對”
$result = mysql_query("SELECT * FROM payment pay, purchase pur, product pr
	WHERE pay.OrderNo = pur.OrderNo AND pur.ProductNo = pr.No;",$link);

?>

<table class='pure-table pure-table-horizontal'>
	<thead>
		<tr>
			<th align='center'>#</th>
			<th align='center'>訂單狀態</th>

			<th align='center'>訂購人</th>
			<th align='center'>電話</th>
			<th align='center'>應付金額</th>

			<th align='center'>匯款帳號</th>
			<th align='center'>匯款金額</th>
			<th align='center'>匯款時間</th>

		</tr>
	</thead>
	<tbody>
<?php

while ($record = mysql_fetch_array($result)) {
	echo "<tr>";

		echo "<td align='center'>";
		if ($record['PaidCheck']==("待核對")) {
			echo 	'<a style="text-decoration:none; color:green;" href="payment_confirm.php?orderno='.$record['OrderNo'].'">對帳完成</a>';
		}
		
		echo "</td>";
		echo "<td align='center'>".$record['PaidCheck']."</td>";

		echo "<td align='center'>".$record['CustomerName']."</td>";
		echo "<td align='center'>".$record['CustomerPhone']."</td>";
		echo "<td align='center'>$".($record['Price']*$record['ProductAmt'])."</td>";

		echo "<td align='center'>".$record['TransferAcc']."</td>";
		echo "<td align='center'>$".$record['TransferAmt']."</td>";
		echo "<td align='center'>".$record['TransferTime']."</td>";


	echo "</tr>";

}


mysql_close($link);

?>
	</tbody>
</table>
</div>

</body>

</html>	
