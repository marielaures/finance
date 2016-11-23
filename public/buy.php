<?php
    // Quote controller
    // include helpers
    require_once("../includes/config.php");
    require_once("../includes/helpers.php"); 
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("buy_form.php", ["title" => "Buy"]);
    }
    
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["symbol"]))
        {
            apologize("You must provide a symbol.");
        }
        
        $stock_name = $_POST["symbol"];
        $stock_info = lookup($stock_name);
        $stock_price = number_format($stock_info["price"], 4, '.', ' ');
        //Retrieve the number of share the user wants to buy
        $quantity = $_POST["shares"]; 
        $money_needed = $stock_price * $quantity;
            
        //If the user submits an invalid symbol, apologize
        if ($stock_name == false) {
            apologize("Invalid symbol.");
        }
        
        //If the user submits a negative number of shares (or 0), apologize
        if ($quantity <= 0) {
            apologize("You must enter a valid number of shares.");
        }
        // Ensure that the users has not entered a fraction
        if (preg_match("/^\d+$/", $_POST["shares"]) == false) {
            apologize("You can only buy whole shares.");
        }
        
        var_dump($money_needed);
        
        //If exists, that is to say $_POST["symbol"] is a valid symbol for an actual stock 
        // Check that the user has enough cash
        //query database for cash 
        $rows = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
        $cash = $rows[0]["cash"];
        
        if ($money_needed > $cash) {
            apologize("Sorry, you don't have enough money!");
        }
        
        // Put everything in Uppercase
        $stock_name = strtoupper($stock_name);
    
        // Add a row in portfolio table
        $rows2 = CS50::query("INSERT INTO portfolios (user_id, symbol, shares) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", $_SESSION["id"], $stock_name, $quantity );
        
        // Add a row in history table
        $rows4 = CS50::query("INSERT INTO history (user_id, transaction, date, symbol, share, price) VALUES(?, ?, NOW(), ?, ?, ?)", $_SESSION["id"], "BUY", $stock_name, $quantity, $stock_info["price"]);
    
        // Update cash
        // update cash balance
        $rows3 = CS50::query("UPDATE users SET cash = cash - ? WHERE id = ?", $money_needed, $_SESSION["id"]);
      
        // redirect to portfolio (snippet taken from the login page)
        redirect("/");
    }    
  ?>      
