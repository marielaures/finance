<?php
    // Quote controller
    // include helpers
    require_once("../includes/config.php");
    require_once("../includes/helpers.php"); 
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("cash_form.php", ["title" => "Add cash"]);
    }
    
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["cash"]))
        {
            apologize("You must provide a amount.");
        }
        
        //If the user submits a negative amount (or 0), apologize
        if ($_POST["cash"] <= 0) {
            apologize("You must enter a valid amount.");
        }
    
        
        /*var_dump($money_needed);*/

    
        // Update cash
  
        $rows3 = CS50::query("UPDATE users SET cash = cash + ? WHERE id = ?", $_POST["cash"], $_SESSION["id"]);
      
        // redirect to portfolio (snippet taken from the login page)
        redirect("/");
    }    
  ?>      
