<?php
    // Quote controller
    // include helpers
    require_once("../includes/config.php");
    require_once("../includes/helpers.php"); 
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("quote_form.php", ["title" => "Quote"]);
    }
    
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["symbol"]))
        {
            apologize("You must provide a symbol.");
        }
        
        $stock = lookup($_POST["symbol"]);
            
        //If the user submits an invalid symbol, apologize
        if ($stock == false) {
            apologize("Invalid symbol.");
        }
            
        //If exists, that is to say $_POST["symbol"] is a valid symbol for an actual stock 
        //Look up a stock’s latest price
        else {
            render("quote_price.php");
        }
    }    
  ?>      
