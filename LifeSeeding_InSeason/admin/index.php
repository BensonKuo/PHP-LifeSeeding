<?php

include('code.php');

//登入過的，透過cookie直接進入管理頁面
if ($_COOKIE['ac']==$ac && $_COOKIE['pw']==$pw) {
	header('Location: choosefunction.html');
}

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
        .button-warning {
            color: white;
            border-radius: 4px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
            background: rgb(223, 117, 20); /* this is an orange */
        }
    </style>


<body>
<?php include_once("analyticstracking.php") ?>

<div align='center'>
<br><br>
<h2>蒔品後台登入</h2>

<form method='POST' action='login_exe.php'>
	<div>account:</div>
	<input type='text' name='ac'>

	<br><br>

	<div>password:</div>
	<input type='text' name='ps'><br><br>
	<button type='submit' class='pure-button button-warning'>login!</button>
</form>
</div>

</body>

</html>	
