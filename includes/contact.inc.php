<?php

    $error;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $email = htmlspecialchars($_POST["email"]);
        $name = htmlspecialchars($_POST["name"]);
        $msg = htmlspecialchars($_POST["msg"]);
        
        $subject = "Contact Us: Response from Website!";
        $body = "Name: ". $name . " Email: " . $email . " Message: " . $msg;
        
        if(!empty($email) && !empty($msg) && !empty($name)){
            // validate email
            if (!filter_var($email,FILTER_VALIDATE_EMAIL))
                $error = "Please provide a valid Email Address!";
            else {
                require $_SERVER["DOCUMENT_ROOT"]."/functionality/emailer.php";
                $recipient = "noreply@scholarlyarch.com";
                sendEmail($recipient, $subject, $body);
                $error="We have received your message and would like to thank you for writing to us. We will reply by email as soon as possible.";
            }
        }
        else {
            $error = "Please fill out all fields!";
        }
    }
  