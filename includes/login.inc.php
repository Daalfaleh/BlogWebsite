<?php

    session_start();
    if (isset($_SESSION["_LOGIN"]))
        header('Location: /user.php');

    $error;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        require 'config/dbh.php';

        $username = $_POST["username"];
        $password = $_POST["password"];

        // VALIDATION
        if (empty($_POST["username"]))
            $error = "Username or email is required!";
        else if(empty($_POST["password"]))
            $error = "Password is required!";
        else {
          $sql = "SELECT * FROM users WHERE username=? OR email=? LIMIT 1";
          $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt,$sql)) {
              $error = "Error code: erl " . __LINE__ . " <a href='report.php'>Kindly Report!";
            } else {
              mysqli_stmt_bind_param($stmt,"ss",$username,$username);
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
              if($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($password, $row["pwd"]);
                if($pwdCheck == false)
                  $error = "Username/Email and password don't match!";
                else if ($pwdCheck == true){
                    // Login User
                    $_SESSION["_LOGIN"] = true;
                    $_SESSION["user_id"] = $row["user_id"];
                    $_SESSION["username"] = $row["username"];
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["status"] = $row["status"];

                    $error = "Log in success!";
                    header('Location: /user.php');
                } else
                    $error = "User not found!";
              }
              else
                $error = "User not found!";
            }
        }
    }
