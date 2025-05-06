<?php 
    require $_SERVER["DOCUMENT_ROOT"].'/config/dbh.php';
    $error;
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(verify_code($_POST["code"])) {
            $sql = "UPDATE users SET status = 1 WHERE user_id=?";
            $stmt = $conn->prepare($sql); 
            $stmt->bind_param("i", $_SESSION["user_id"]);
            $stmt->execute();
            $stmt->close();
            $error = "Account verified successfully!";
            $_SESSION["status"] = 1;
        } else {
            $error="Security code didn't match!";
        }
    }
    
    function verify_code($code) {
        return (ord($_SESSION["username"][0]) * 10 + ord($_SESSION["username"][1]) * 20 + ord($_SESSION["username"][2]) * 30) == $code;
    }