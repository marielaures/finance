<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        // If the username is left blank
        if (empty($_POST["username"]))
        {
            apologize("You must provide your username.");
        }
        
        // If the password is left blank
        if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
        }
        
        // If the password doesn't match the confirmation
        else if ($_POST["password"] !== $_POST["confirmation"])
        {
            apologize("Your password must match the confirmation.");
        }

        // Insert the new user into the database
        $result = CS50::query("INSERT IGNORE INTO users (username, hash, cash) VALUES(?, ?, 10000.0000)", $_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT));

        // if the 'INSERT' failed
        if ($result == 0)
        {
            apologize("We were not able to register you. Please try again");
        }    
    
        // Else remember the corresponding ID
        else
        {
            $rows = CS50::query("SELECT LAST_INSERT_ID() AS id");
            $id = $rows[0]["id"];
            
            // Log the new user in
            // remember that user's now logged in by storing user's ID in session
            $_SESSION["id"] = $id;
    
            // redirect to index
            redirect("index.php");
        }
    }
?>