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
                <h1>蒔品 Life Seeding</h1>
                <h2>5/11 - 5/30  restaurant / pavilion</h2>
    </div>

    <div class='content'> 

        <h3></h3>
        <!--表單-->
        <form class="pure-form pure-form-stacked" action='checkorder_view.php' method='POST'>
            <fieldset>
                <legend>請填寫訂購時的資訊</legend>

                <div class="pure-g">
                    <div class="pure-u-1 pure-u-md-1-2">
                        <label for="first-name">Name</label>
                        <input id="first-name" name='CustomerName' class="pure-u-23-24 pure-u-md-18-24" type="text" required placeholder="您的姓名">
                    </div>


                    <div class="pure-u-1 pure-u-md-1-2">
                        <label for="phone">Phone</label>
                        <input id="phone" name='Phone' class="pure-u-23-24 pure-u-md-18-24" type="text" required placeholder="聯絡電話">
                    </div>

                    <br>
                    
                    <button type="submit" class="pure-button pure-button-primary button-blue">查詢訂單</button>
            </fieldset>
        </form>
        
    
        <br><br>

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


<script src="js/ui.js"></script>


</body>
</html>
