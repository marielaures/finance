<?php

    // configuration
    require("../includes/config.php"); 
    
    // query database for info in the history table
    $rows = CS50::query("SELECT user_id, transaction, date, symbol, share, price FROM history WHERE user_id = ?", $_SESSION["id"]);

    // code proposé par CS50
    $histories = [];
    foreach ($rows as $row)
    {
    $histories[] = [
        "transaction" => $row["transaction"],
        "date" => $row["date"],
        "symbol" => $row["symbol"],
        "share" => $row["share"],
        "price" => $row["price"]
    ];
    }
    
    // render history
    render("history.php", ["title" => "History", "histories" => $histories]);
?>
