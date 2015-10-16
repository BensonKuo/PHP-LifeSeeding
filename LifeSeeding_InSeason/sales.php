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
        #navicon{
            /*display: none;*/
        }
    </style>

    <script type="text/javascript">
        // invalid now
        $(document).ready(function(){
            $('#me').click(function(){
                $(this).next().slideToggle();
                //alert('gs');
            })
        });

    </script>

    <script type="text/javascript">
    //切換商品類別
    function loadPage(str){
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

    <!--側邊選單  可以按了-->
    <div id="menu">
        <div class="pure-menu">
            <a class="pure-menu-heading" href="#">蒔品</a>
        
            <ul class="pure-menu-list">
                <li class="pure-menu-item"><a href="index.html#home" class="pure-menu-link">Home</a></li>
                <li class="pure-menu-item"><a href="index.html#about" class="pure-menu-link">關於蒔品</a></li>

                <li class="pure-menu-item">
                    <a href="#sale.php" class="pure-menu-link" id='me'>出清拍賣</a>
                        <ul>
                            <li class="pure-menu-item"><a class="pure-menu-link" href="#" onclick="loadPage('productitem.php?all=1');">所有商品</a></li>
                            <li class="pure-menu-item"><a class="pure-menu-link" href="#" onclick="loadPage('productitem.php?c=1');">廚房用具</a></li>
                            <li class="pure-menu-item"><a class="pure-menu-link" href="#" onclick="loadPage('productitem.php?c=2');">家電</a></li>
                            <li class="pure-menu-item"><a class="pure-menu-link" href="#" onclick="loadPage('productitem.php?c=3');">藝術品</a></li>
                            <li class="pure-menu-item"><a class="pure-menu-link" href="#" onclick="loadPage('productitem.php?c=4');">其他</a></li>
                        </ul>
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
<!--分類navbar 大螢幕用-->
        <div class="pure-menu pure-menu-horizontal" id='largescreen'>
            <ul class="pure-menu-list">
                <li class="pure-menu-item pure-menu-allow-hover">
                    <a href="#" class="pure-menu-link" onclick="loadPage('productitem.php?all=1');">所有商品</a>
                </li>
                <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
                    <a href="#" class="pure-menu-link" onclick="loadPage('productitem.php?c=1');">廚房用具</a>
                    <ul class="pure-menu-children">
                        <li class="pure-menu-item"><a href="#" class="pure-menu-link" onclick="loadPage('productitem.php?sc=11');">餐具</a></li>
                        <li class="pure-menu-item"><a href="#" class="pure-menu-link" onclick="loadPage('productitem.php?sc=12');">廚具</a></li>
                    </ul>
                </li>
                <li class="pure-menu-item pure-menu-allow-hover">
                    <a href="#" class="pure-menu-link" onclick="loadPage('productitem.php?c=2');">電器</a>
                </li>
                <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
                    <a href="#" class="pure-menu-link" onclick="loadPage('productitem.php?c=3');">藝術品</a>
                    <ul class="pure-menu-children">
                        <li class="pure-menu-item"><a href="#" class="pure-menu-link" onclick="loadPage('productitem.php?sc=31');">工藝作品</a></li>
                        <li class="pure-menu-item"><a href="#" class="pure-menu-link" onclick="loadPage('productitem.php?sc=32');">花藝作品</a></li>

                    </ul>
                </li>
                <li class="pure-menu-item pure-menu-allow-hover">
                    <a href="#" class="pure-menu-link" onclick="loadPage('productitem.php?c=4');">其他</a>
                </li>

            </ul>
        </div>
      


<!--分類navbar 小螢幕用-->
    <div class="pure-menu pure-menu-horizontal pure-menu-scrollable" id='smallscreen'>
        <ul class="pure-menu-list">
            <li class="pure-menu-item"><a href="#" class="pure-menu-link" onclick="loadPage('productitem.php?all=1');">所有商品</a></li>
            <li class="pure-menu-item"><a href="#" class="pure-menu-link" onclick="loadPage('productitem.php?sc=11');">餐具</a></li>
            <li class="pure-menu-item"><a href="#" class="pure-menu-link" onclick="loadPage('productitem.php?sc=12');">廚具</a></li>
            <li class="pure-menu-item"><a href="#" class="pure-menu-link" onclick="loadPage('productitem.php?c=2');">電器</a></li>
            <li class="pure-menu-item"><a href="#" class="pure-menu-link" onclick="loadPage('productitem.php?sc=31');">工藝作品</a></li>
            <li class="pure-menu-item"><a href="#" class="pure-menu-link" onclick="loadPage('productitem.php?sc=32');">花藝作品</a></li>
            <li class="pure-menu-item"><a href="#" class="pure-menu-link" onclick="loadPage('productitem.php?c=4');">其他</a></li>
        </ul>
    </div>


<?php
    echo "<br>";
    //顯示已選購商品列表
    include('shoppinglist.php');
    echo "<br>";

?>
        <!--按下選單後用ajax動態載入商品 更換innerHTML-->
        <!--原先為 顯示所有產品-->
        <div class='pure-g' id='viewproduct'>
<?php
    include('connect.php');
    

    // 這裏可以用where 來找出不同類別
    $result = mysql_query("SELECT * FROM product",$link);
        //<p><b>創作者：</b>".$record['Author']."</p>    

    while ($record = mysql_fetch_array($result)) {
        
    echo "
                    <div class='pure-u-1 pure-u-md-1-2 pure-u-lg-1-3'>
                        <div card>
                            <div class='image'>
                                <a href='product_pic.php?no=".$record['No']."'><img src='product_pic.php?no=".$record['No']."'></a>
                                <span class='title'>"
                                    .$record['Name']."
                                </span>
                            </div>
                            <form action='shoppingcart.php?no=".$record['No']."' method='POST'>
                            <div class='content'>
                                <p><b>商品名稱：</b>".$record['Name']."</p>
                                <p><b>商品描述：</b>".$record['Description']."</p>
                                <p><b>商品狀態：</b>".$record['Status']."</p>
                                <p><b>定價：</b>$".$record['Price']."</p>
                                <p><b>庫存數量：</b>".$record['Stock']."</p>
                                <select name='amount'>";
                                //根據stock數量動態配置
                                for ($i=0; $i < $record['Stock']; $i++) { 
                                    echo "<option value='".($i+1)."'>".($i+1)."</option>";
                                }
    echo "
                                </select>
                            </div>
                            <div class='action' align='center'>
                                <button type='submit' class='pure-button button-secondary'>add to cart</button>
                            </div>
                            </form>
                        </div>
                    </div>               
        ";
    }
    
    mysql_close($link);
?>
        </div>
            
            <h2 class="content-subhead" id='about'>關於蒔品</h2>
            <p>5/11-5/30 蒔品，餐廳兼展場</p>
            <p>我們在台大醉月湖畔蓋了一間屋子，白天是展場兼咖啡廳，晚上則是餐廳供應無菜單料理，
            「蒔品」，是一個概念性的複合空間。我們從餐桌出發，在餐桌佈置和擺盤間呈現料理之美，
            再結合展覽空間的鋪設，展出花藝佈置、工藝選品的創作，以不同角度和形式體現生活的美感。
            </p>


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

        <div align='center'> © Copyright ·BensonKuo  & the LifeSeeding Team · 2015</div>
            
        </div>
    </div>
</div>


<script src="js/ui.js"></script>


</body>
</html>
