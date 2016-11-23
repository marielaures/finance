<?php
    // Quote controller
    // include helpers
    require_once("../includes/config.php");
    require_once("../includes/helpers.php"); 
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        //Mettre la requête SELECT dans "GET" car cela se fait quand on clique sur le lien et non quand on submit
        $rows = CS50::query("SELECT DISTINCT symbol FROM portfolios WHERE user_id = ?", $_SESSION["id"]);
        // pour afficher ce qu il y a dans la variable. S'affiche directement sur le site après exécution : var_dump($rows);

        // code proposé par CS50
        $positions = [];
        foreach ($rows as $row)
        {
            $positions[] = $row["symbol"];
        }
        // else render form
        // passer a render les arguments dont la view va avoir besoin dans un tableau associatif : ici le titre et la variable position
        render("sell_form.php", ["title" => "Sell", "positions" => $positions]);
    }
    
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {   
        //var_dump($_POST);
        // validate submission
        if (empty($_POST["symbol"]))
        {
            apologize("You must select a stock to sell!");
        }
       
        //If exists, that is to say $_POST["symbol"] is a valid symbol for an actual stock 
        //Look up a stock’s latest price
        else {
            
            $stock_name = $_POST["symbol"];
            //determine how much money the user gets (before deleting the row from table...)
            //Look up returns 3 info : symbol, name and price in an associative array
            $stock_info = lookup($stock_name);
            
            //Store the query result in the variable $rows
            $rows = CS50::query("SELECT shares FROM portfolios WHERE user_id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
            //Get the quantity = first row (whose index equals 0 and then access the field "shares"in an associative array)
            $quantity = $rows[0]["shares"]; 
            $stock_price = $rows[0]["price"];
            $total_money = $quantity * $stock_price;

            //var_dump($quantity);
            //var_dump($money);
            
            // Add a row in history table
            $rows4 = CS50::query("INSERT INTO history (user_id, transaction, date, symbol, share, price) VALUES(?, ?, NOW(), ?, ?, ?)", $_SESSION["id"], "SELL", $stock_name, $quantity, $stock_info["price"]);
           
            //delete corresponding rows in database
            CS50::query("DELETE FROM portfolios WHERE user_id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
            
            // update cash balance
            $rows3 = CS50::query("UPDATE users SET cash = cash + ? WHERE id = ?", $total_money, $_SESSION["id"]);
            
             // redirect to portfolio (snippet taken from the login page)
            redirect("/");
        }
    }    
  ?>      
