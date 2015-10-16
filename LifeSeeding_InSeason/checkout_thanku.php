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
        #light{
            color: orange;
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
        
        <div class='pure-g'>
            <div class='pure-u-1'>
                <div class="l-box">

                    <h2>已收到您的訂單</h2>
                    <p>
                        您好，感謝您光臨蒔品餐廳的出清計畫！以下四點重要事項請務必詳閱，就能夠開心帶走蒔品的東西囉！
                    </p>
                    
                    <h4>一、繳費方式</h4>
                    <p>在此提醒您，我們採取ATM轉帳制度，請您於訂購後<span id='light'><b>一日內</b></span>（不包含訂購當日）轉帳至我們的帳戶，<span id='light'>逾期尚未付款，則該筆訂單取消。</span>
                        匯款詳細方式如下
                    </p>
                    <p id='light'>匯款銀行：808玉山銀行</p>
                    <p id='light'>匯款帳戶：0314 9790 57092</p>
                    


                   <h4>二、匯款資訊回報方式</h4>
                      <p> 匯款完成後，請您於<span id='light'>蒔品網站上<a href="paymentconfirm.php" style="text-decoration:none; color:skyblue;">回報匯款資訊</a>給我們知道！</span>
                        方式如下：</p>
                        <ol>
                            <li>點進蒔品網站左邊的功能列表，並按下「匯款回報」。<br>
                            （使用手機的客戶，頁面左上角有功能列表縮圖，點選之後，即可按下功能列表的「匯款回報」）
                            </li>
                            <li>
                                至匯款回報頁面填寫資料後，即可完成囉！
                            匯款回報資料包含以下：
                                <ol>
                                    <li>購買人姓名（請務必與訂單上的姓名相符）</li>
                                    <li>匯款帳號後5碼</li>
                                    <li>匯款金額</li>
                                    <li>約略匯款時間</li>
                                </ol>
                            </li>
                        </ol>   

                    <h4>三、物品取貨方式</h4>
                    <p id="light">時間：5/31 10:00 - 17:00 ， 6/1 12:00 - 14:00 ，  6/2 12:00 - 14:00</p> 
                    <p id="light">地點：醉月湖畔蒔品餐廳現場</p>
                    <p>我們採取統一取貨的模式，匯款完成後，請於時間內至
                        <span id='light'>醉月湖畔的蒔品餐廳現場取貨唷！</span>
                        若本人該日無法親自領取，可以請人代領，若尚有困難，
                        可以私訊<a target="_blank" href="http://ppt.cc/zpy9K" style="text-decoration:none; color:skyblue;">蒔品Life Seeding</a>粉絲專頁，我們會盡力幫助您。
                    </p>
                    <p>領貨其他注意事項：我們現場也會提供包物品的包材，但數量不多，因此請自行攜帶紙袋或報紙，在蒔品餐廳培植品味外，也愛護地球！</p>

                    <h4>四、訂單查詢方式</h4>
                    <p>您可以在蒔品網站上查詢您的<a href="checkorder.php" style="text-decoration:none; color:skyblue;">訂單紀錄</a>，也可以<span id='light'>取消您的訂單</span>。</p>
                    <p>請至左側功能列表，點選「訂單查詢」，並輸入您當初訂購時填的「姓名」、「手機」，
                        即可查詢自己的訂單記錄囉！若有些品項已不需要了，也可以刪除訂單。
                    </p>




                </div>
            </div>
            <div class='pure-u-1 pure-u-md-1-2'>
                <div class="l-box">
                    <img src='' class='pure-img-responsive'>
                </div>
            </div>
        </div>
        

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
