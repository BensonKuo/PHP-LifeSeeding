<!doctype html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">

    <title>蒔品 Life Seeding</title>
    <link rel="shortcut icon" href="icon.ico">    
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" type="text/css" href="css/card.css">


    <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/layouts/side-menu-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="css/layouts/side-menu.css">
    <!--<![endif]-->
    <script src="js/jquery.js" type'text/javascript'></script>

    <!--[if lte IE 8]>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-old-ie-min.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
    <!--<![endif]-->
    
    <style type="text/css">
        .button-secondary {
            background: rgb(66, 184, 221); /* this is a light blue */
            color: white;
            border-radius: 4px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
        }
        .button-blue{
            border-radius: 4px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
             background: rgb(66, 184, 221); /* this is a light blue */
            color: white;
        }
    </style>

    <script type="text/javascript">
        
        $(document).ready(function(){
            $('#me').click(function(){
                $(this).next().slideToggle();
                //alert('gs');
            })
        });

    </script>
    <script type="text/javascript">
        //讓選單會縮回去
        $(document).ready(function(){
                    //alert('1');
                $('#menu').click(function(){
                    //alert('sense!');
                    $('#layout').removeClass('active');
                    $('#menuLink').removeClass('active');
                    $('#menu').removeClass("active");
                });
                $('#main').click(function(){
                    //alert('sense!');
                    $('#layout').removeClass('active');
                    $('#menuLink').removeClass('active');
                    $('#menu').removeClass("active");
                });
        });
    </script>
</head>

<body>
<?php include_once("analyticstracking.php") ?>


<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">   <!--class="menu-link"   show original hamburger icon-->
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <!--側邊選單-->
    <div id="menu">
        <div class="pure-menu">
            <a class="pure-menu-heading" href="#home">蒔品</a>

            <ul class="pure-menu-list">
                <li class="pure-menu-item"><a href="" class=""></a></li>
                <li class="pure-menu-item"><a href="" class=""></a></li>

                <li class="pure-menu-item"><a href="index.html#home" class="pure-menu-link">Home</a></li>
                <li class="pure-menu-item"><a href="index.html#about" class="pure-menu-link">關於蒔品</a></li>

                <li class="pure-menu-item" class="menu-item-divided pure-menu-selected">
                    <a href="sales.php" class="pure-menu-link">出清拍賣</a>
                </li>
                <li class="pure-menu-item"><a href="shoppingnote.html" class="pure-menu-link">購物須知</a></li>
                
                <li class="pure-menu-item"><a href="checkorder.php" class="pure-menu-link">訂單查詢</a></li>
                <li class="pure-menu-item"><a href="paymentconfirm.php" class="pure-menu-link">匯款回報</a></li>



                <li class="pure-menu-item"><a href="index.html#contact" class="pure-menu-link">聯絡我們</a></li>
            </ul>
        </div>
    </div>
    

<!--頁面內容-->
<div id='main'>
    <div class='header'>
                <h1>Life Seeding</h1>
                <h2>5/11 - 5/30  restaurant / pavilion</h2>
    </div>

    <div class='content'> 

        <!--訂單資訊-->
<?php

include('connect.php');



// 藉由姓名跟電話列出該用戶 所有訂單 由最新到最舊
$result = mysql_query("SELECT * FROM customer c, purchase p, product pr 
    WHERE c.CustomerID = p.CustomerID AND p.ProductNo = pr.No 
    AND c.CustomerName = '".$_POST['CustomerName']."' AND c.Phone = '".$_POST['Phone']."' ORDER BY c.TIME DESC;",$link);


if (mysql_num_rows($result)==0) {
    echo "系統中查無您的訂單！";
    mysql_close($link);
    exit();
}

?>
<form method='POST' action='paymentconfirm_exe.php'>
    <input type='hidden' name='TransferAcc' value='<?php echo $_POST['transferAcc'];?>'>
    <input type='hidden' name='TransferAmt' value='<?php echo $_POST['transferAmt'];?>'>
    <input type='hidden' name='TransferTime' value='<?php echo $_POST['transferTime'];?>'>
    <input type='hidden' name='CustomerName' value='<?php echo $_POST['CustomerName'];?>'>
    <input type='hidden' name='CustomerPhone' value='<?php echo $_POST['Phone'];?>'>


<h3>請勾選您已付款的品項</h3>
<p>若找不到訂單，可能是因為超過兩日未付款而被取消訂單，請重新下單</p>
<table class='pure-table pure-table-horizontal'>
    <thead>
        <tr>
            <th align='center'><b>＃</b></th>


            <th align='center'>狀態</th>
            <th align='center'>姓名</th>
            
            <th align='center'>品名</th>
            <th align='center'>單價</th>
            <th align='center'>數量</th>
            <th align='center'>小計</th>
            <th align='center'>商品圖片</th>

        </tr>
    </thead>
    <tbody>
<?php

while ($record = mysql_fetch_array($result)) {
        
    echo "<tr>";

        echo "<td align='center'>";
        if ($record['PaidCheck']==("尚未付款")) {   //如果尚未付款才顯示核取方塊
            echo  "<input name='order[]' type='checkbox' value='".$record['OrderNo']."'>";
            
        }
        echo "</td>";
        echo "<td align='center'>".$record['PaidCheck']."</td>";
        echo "<td align='center'>".$record['CustomerName']."</td>";

        echo "<td align='center'>".$record['Name']."</td>";
        echo "<td align='center'>$".$record['Price']."</td>";
        echo "<td align='center'>".$record['ProductAmt']."</td>";
        echo "<td align='center'>$".($record['Price']*$record['ProductAmt'])."</td>";

        echo "<td align='center'><a href='product_pic.php?no=".$record['No']."'><img height=100 width=120 src='product_pic.php?no=".$record['No']."'></img></a></td>";
        

    echo "</tr>";
    //已付款的不計入計算
    if ($record['PaidCheck']==("尚未付款")) { 
            $total += ($record['Price']*$record['ProductAmt']);
        }
    if (is_null($total)) {
            $total=0;
    }
}


mysql_close($link);
    
?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td> 
        <td>須付金額:</td>
        <td></td>
        <td>$<?php echo $total;?></td>
        <td></td>        
    </tr>
    </tbody>
</table>
<?php
    if (!$total==0) {
        echo "<button class='pure-button button-blue' type='submit'>送出資料</button>";
    }
?>
</form>        
                    
            
    
        <br><br>

            <div class="pure-g">
                <div class="pure-u-1-4">
                    <img class="pure-img-responsive" src="pic/2.jpg" alt="Peyto Lake">
                </div>
                <div class="pure-u-1-4">
                    <img class="pure-img-responsive" src="pic/1.jpg" alt="Train">
                </div>
                <div class="pure-u-1-4">
                    <img class="pure-img-responsive" src="pic/3.jpg" alt="T-Shirt Store">
                </div>
                <div class="pure-u-1-4">
                    <img class="pure-img-responsive" src="pic/4.jpg" alt="Mountain">
                </div>
            </div>  
    </div>
</div>


<script src="js/ui.js"></script>


</body>
</html>
