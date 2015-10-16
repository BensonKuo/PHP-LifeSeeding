<?php

    //用 ajax 載入本頁面 
    include('connect.php');
    
    //   <p>創作者：".$record['Author']."</p><br>

    //選擇主類別時
    if ($_GET['c']) {
        // 用where 來找出不同類別
        $result = mysql_query("SELECT * FROM product WHERE Category='".$_GET['c']."';",$link);
        
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
                                    <p>商品描述：".$record['Description']."</p>
                                    <p>商品狀態：".$record['Status']."</p>
                                    <p>定價：$".$record['Price']."</p>
                                    <p>庫存數量：".$record['Stock']."</p>
                                
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
        } //end while
    }// end if
    
    // 選擇的是 副類別 時
    elseif ($_GET['sc']) {
        $result = mysql_query("SELECT * FROM product WHERE Subcategory='".$_GET['sc']."';",$link);
        

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
                                    <p>商品描述：".$record['Description']."</p>
                                    <p>商品狀態：".$record['Status']."</p>
                                    <p>定價：$".$record['Price']."</p>
                                    <p>庫存數量：".$record['Stock']."</p>
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
        } //end while        
    }  // end elseif
    
    // 選擇的是 所有類別 時
    elseif ($_GET['all']) {
        $result = mysql_query("SELECT * FROM product;",$link);
        

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
                                    <p>商品描述：".$record['Description']."</p>
                                    <p>商品狀態：".$record['Status']."</p>
                                    <p>定價：$".$record['Price']."</p>
                                    <p>庫存數量：".$record['Stock']."</p>
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
        } //end while        
    }  // end elseif
    else{
        header('sales.php');
    }  


    
    
    mysql_close($link);
?>