
<!DOCTYPE html>
 <html>
     
     <head>
         <title>Quote Price</title>
     </head>
     <body>
  
         <?php
         $stock = lookup($_POST["symbol"]);
         $res_stock = number_format($stock["price"], 4, '.', ' ');
         print("Price: " .$res_stock);
         ?>
         
         
     </body>
     
     
 </html>
