<?php

    // configuration
    require("../includes/config.php"); 

 
    
    //query database for id, symbol and shares in the portfolios table
    $rows = CS50::query("SELECT id, symbol, shares FROM portfolios WHERE user_id = ?", $_SESSION["id"]);


    // code proposé par CS50
    
    $positions = [];
    foreach ($rows as $row)
    {
    $stock = lookup($row["symbol"]);
    if ($stock !== false)
        {
            $positions[] = [
                "name" => $stock["name"],
                "price" => $stock["price"],
                "shares" => $row["shares"],
                "symbol" => $row["symbol"]
            ];
        }
    }
    
    
    //query database for cash 
    $rows = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    
    //debug
    //var_dump($rows);
    
    // render portfolio
    render("portfolio.php", ["title" => "Portfolio", "positions"=>$positions, "cash"=>$rows[0]["cash"]]);
    
?>
