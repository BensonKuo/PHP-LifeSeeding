<?php
	include('check.php');

	include('connect.php');

	$result = mysql_query("SELECT * FROM product WHERE No='".$_GET['no']."';",$link);

	$record = mysql_fetch_array($result);

?>
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
            background: rgb(28, 184, 65); /* this is a green */
        }
    </style>
</head>

<body>
<?php include_once("analyticstracking.php") ?>

<div align='center'>
<br>
<h2>商品修改頁面</h2>

<form method='POST'  action='product_edit_exe.php' enctype="multipart/form-data" class='pure-form pure-form-aligned'>
<!--藉由hidden 把get 轉成post-->
<input type='hidden' name='no' value='<?php echo $_GET['no']?>'>
名稱：<input type='text' name='name' value='<?php echo $record['Name']?>'><br><br>
<!--創作者：<input type='text' name='author' value='<?php echo $record['Author']?>'><br><br>-->
主類別：<select name='category'>
		<option value='1'>餐飲用具</option>
		<option value='2'>電器</option>
		<option value='3'>藝術品</option>
		<option value='4'>其他</option>
	</select><br>
子類別：<select name='subcategory'>
		<option value='11'>餐具</option>
		<option value='12'>廚具</option>
		<option value=''>====</option>
		
		<option value='2'>電器</option>
		<option value=''>====</option>

		<option value='31'>工藝作品</option>
		<option value='32'>花藝作品</option>
		<option value=''>====</option>

		<option value='4'>其他</option>

	</select><br><br>
售價：<input type='text' name='price' value='<?php echo $record['Price']?>'><br><br>
庫存數量：<input type='text' name='stock' value='<?php echo $record['Stock']?>'><br><br>
圖片(除要更換，不然不需重新上傳)：<input type='file' name='product'><br><br>
商品狀態：<input type='text' name='status' value='<?php echo $record['Status']?>'><br><br>
詳細介紹：<textarea name='des'><?php echo $record['Description']?></textarea><br><br>

<button type='submit' class='pure-button button-success'>完成修改！</button>
</form>
</form>
</div>

</body>

</html>	
