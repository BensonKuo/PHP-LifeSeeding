<?php
    
    //若cookie cart 存在
    if ($_COOKIE['cart'] && $_COOKIE['amount']) {
        
        include('connect.php');
        

        //以＃分隔
        $shoplist = explode('#',$_COOKIE['cart']);
        //丟掉最後一個元素
        array_pop($shoplist);


        $shopamt = explode('#', $_COOKIE['amount']);
        array_pop($shopamt);
        

        echo "<table class='pure-table pure-table-horizontal' >";
        echo    "<thead>";
        echo        "<tr>";
        echo           "<td><b>訂購內容</b></td>";
        echo           "<td>品名</td>";
        echo           "<td>數量</td>";
        echo           "<td align='right'>金額</td>";
        echo        "</tr>";
        echo    "</thead>";      
        echo    "<tbody>";

        //計算總金額
        $total = 0;

        for ($i=0; $i < sizeof($shoplist); $i++) { 
            $result = mysql_query("SELECT * FROM product WHERE No='".$shoplist[$i]."'; ",$link);
            
            while ($record = mysql_fetch_array($result)) {
            //其實只有一排                

                //計算總金額
                $total += ($record['Price']*$shopamt[$i]);

        echo        "<tr>";
        echo           "<td>".($i+1)."</td>";
        echo           "<td>".$record['Name']."</td>";
        echo           "<td align='center'>".$shopamt[$i]."</td>";   //顯示購買數量
        echo           "<td align='right'>$".($record['Price']*$shopamt[$i])."</td>";
        echo        "<tr>";        

            }  //end while  
        } // end for

        echo        "<tr>";
        echo           "<td>Total</td>";
        echo           "<td></td>";
        echo           "<td></td>";
        echo           "<td align='right'>$".$total."</td>";
        echo        "<tr>";


        echo    "</tbody>";


        echo "</table>";

    } // end if

    mysql_close($link);
?>




