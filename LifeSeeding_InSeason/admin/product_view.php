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
            background: rgb(202, 60, 60); /* this is a maroon */
        }
        .button-warning {
            color: white;
            border-radius: 4px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
            background: rgb(223, 117, 20); /* this is an orange */
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
<h2>商品管理頁面</h2>
<a href="choosefunction.html"><button class="pure-button button-green">回功能選單</button></a>

<a href="product_upload.php"><button class='pure-button button-warning'>新增商品</button></a>
<br><br>
<form class="pure-form" action='product_view_search.php' method='post'>
    <fieldset>
        <input type="text" placeholder="商品名、作者名" name='search'>
        <button type="submit" class="pure-button button-success">Search</button>
    </fieldset>
</form>

<?php
include('check.php');

include('connect.php');


$result = mysql_query("SELECT * FROM product;",$link);
?>

<table  width='' class='pure-table pure-table-horizontal'>
	<thead>
	<tr>
		<th align='center'></th>
		<th align='center'>名稱</th>
		<!--<th align='center'>作者</th> -->
		<th align='center'>售價</th>
		<th align='center'>庫存數量</th>
		<th align='center'>商品狀態</th>
		<th align='center'>詳述</th>
		<th align='center'>圖片</th>
	</tr>
	</thead>
	<tbody>
<?php

//從db抓出資料並顯示在頁面
while ($record = mysql_fetch_array($result)) {
	echo "<tr>";
		echo "<td align='center'>";
		echo	"<a style='text-decoration:none; color:green;' href='product_edit.php?no=".$record['No']."'>編輯 / </a>";
		echo 	'<a style="text-decoration:none; color:orange;" href="javascript: if (confirm(\'確認刪除本商品?\')) 
				{location.href=\'product_delete.php?no='.$record['No'].'\';}else{alert(\'取消刪除\');}">刪除</a>';
		echo "</td>";
		echo "<td align='center'>".$record['Name']."</td>";
		//echo "<td align='center'>".$record['Author']."</td>";
		echo "<td align='center'>$".$record['Price']."</td>";
		echo "<td align='center'>".$record['Stock']."</td>";
		echo "<td align='center'>".$record['Status']."</td>";
		echo "<td align='center'>".$record['Description']."</td>";
		echo "<td align='center'><a href='product_pic.php?no=".$record['No']."'><img height=120 width=120 src='product_pic.php?no=".$record['No']."'></img></a></td>";
	echo "</tr>";
};




mysql_close($link);

?>
	</tbody>
</table>
</div>

</body>

</html>	
