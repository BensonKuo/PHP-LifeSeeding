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
    <script type="text/javascript">

    function loadOrder(str){
        var xml;
        if (window.XMLHttpRequest) {
            xml = new XMLHttpRequest();
        }else{
            //for poor IE
            xml = new ActiveXObject("Microsoft.XMLHTTP");
        };

        xml.onreadystatechange = function(){
            if (xml.readyState == 4 && xml.status == 200) {
                document.getElementById('viewproduct').innerHTML = xml.responseText;
            };
        }
        xml.open('get',str,true);
        xml.send();
    }

    </script>

</head>

<body>
<?php include_once("analyticstracking.php") ?>
    
<div align='center'>
<br>
<h2>訂單管理頁面</h2>

<a href="choosefunction.html"><button class="pure-button button-green">回功能選單</button></a>

<form class="pure-form" action='order_view_search.php' method='post'>
    <fieldset>
        <input type="text" placeholder="訂購人姓名" name='search'>
        <button type="submit" class="pure-button button-success">Search</button>
    </fieldset>
</form>



<?php
include('check.php');

include('connect.php');


// 顯示訂單 由最新到最舊
$result = mysql_query("SELECT * FROM customer c, purchase pur, product pr 
	WHERE c.CustomerID = pur.CustomerID AND pur.ProductNo = pr.No 
	ORDER BY c.TIME DESC;",$link);

?>

<table class='pure-table pure-table-horizontal'>
	<thead>
		<tr>
			<th align='center'>#</th>
			<th align='center'>訂單狀態</th>
			<th align='center'>訂購時間</th>

			<th align='center'>訂購人</th>
			<th align='center'>電話</th>
			
			<th align='center'>訂購品名</th>
			<th align='center'>訂購數量</th>
			<th align='center'>庫存</th>
			<th align='center'>小計</th>
			<th align='center'>商品圖片</th>

			<th align='center'>註</th>
			<th align='center'>#</th>
		</tr>
	</thead>
	<tbody>
<?php

while ($record = mysql_fetch_array($result)) {
	echo "<tr>";

		echo "<td align='center'>";
		if ($record['PaidCheck']==("已付款")) {
			echo '<a style="text-decoration:none; color:green;" href="order_fulfill.php?orderno='.$record['OrderNo'].'">取貨確認</a>';

		}
		echo "</td>";
		echo "<td align='center'>".$record['PaidCheck']."</td>";
		echo "<td align='center'>".$record['PurchaseTime']."</td>";
		echo "<td align='center'>".$record['CustomerName']."</td>";
		echo "<td align='center'>".$record['Phone']."</td>";

		echo "<td align='center'>".$record['Name']."</td>";
		echo "<td align='center'>".$record['ProductAmt']."</td>";
		echo "<td align='center'>".$record['Stock']."</td>";
		echo "<td align='center'>$".($record['Price']*$record['ProductAmt'])."</td>";

		echo "<td align='center'><a href='product_pic.php?no=".$record['No']."'><img height=100 width=120 src='product_pic.php?no=".$record['No']."'></img></a></td>";
		
		echo "<td align='center'>".$record['Note']."</td>";
		echo "<td align='center'>";
		//if ($record['PaidCheck']==("尚未付款")) {
			echo 	'<a style="text-decoration:none; color:orange;" href="javascript: if (confirm(\'確認刪除本訂單?\')) 
				{location.href=\'order_delete.php?orderno='.$record['OrderNo'].'\';}else{alert(\'取消刪除\');}">刪除</a>';
		//}
		
		echo "</td>";

	echo "</tr>";

}


mysql_close($link);

?>
	</tbody>
</table>
</div>

</body>

</html>	
