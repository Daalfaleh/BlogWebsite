<?php

    // define variable to store error
    $error;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require $_SERVER["DOCUMENT_ROOT"].'/config/dbh.php';
    $stmt = "";
    
    $email = $_POST["email"];

        // VALIDATION: username
        if (empty($_POST["username"])) $error = "Username is required!";
        else {
            if (!preg_match('/^[a-z\d_]{5,20}$/i', $_POST["username"]))
              $error = "A username can only contain alphanumeric characters (letters A-Z, numbers 0-9) underscores, and has minimum 5 character and maximum 20 character.";
            else{
                $username = test_input($_POST["username"]);
                
                $sql = "SELECT * from users WHERE username=? LIMIT 1";
                $stmt = $conn->prepare($sql); 
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                $stmt->close();
                
                if(!empty($row)) $error = "Username already taken!";
                else{
                    // VALIDATION: email
                    if(empty($_POST["email"])) $error = "Email is required!";
                    else{
                        $email = test_input($_POST["email"]);
    				    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $error = "Invalid email format!";
    				    else{
                        
                            // VALIDATION: password
                            if (empty($_POST["password"])) $errors["password"] = "Password is required!";
                            else {
                                if(strlen($_POST["password"]) < 8)
                                    $error = "Passwords must be at least 8 characters long!";
                                else if ($_POST["password"] == "12345678")
                                    $error = "Choose a strong password!";
                                else{
                                    $password = test_input($_POST["password"]);
                                    
                                    $passwordConf = test_input($_POST["passwordConf"]);
                                    if($password != $passwordConf)
                                        $error = "Passwords don't match!";
        					        else {
                                        
                                        $sql = "SELECT * from users WHERE email=? LIMIT 1";
                                        $stmt = $conn->prepare($sql); 
                                        $stmt->bind_param("s", $email);
                                        $stmt->execute();
                                        $result = $stmt->get_result();
                                        $row = $result->fetch_assoc();
                                        $stmt->close();
                                        
                                        if(!empty($row)) $error = "An account with this email address already exists.";
                                        // ALL VALIDATION DONE!
                                        else {
        
                                            $sql = "INSERT INTO users(username, email, pwd) VALUES(?,?,?)";
                                            $stmt = $conn->prepare($sql); 
                                            // Hashing password
                                            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                                            $stmt->bind_param("sss",$username, $email, $hashedPwd);
                                            if ($stmt->execute()) {
                                                
                                                require $_SERVER["DOCUMENT_ROOT"].'/functionality/emailer.php';
                                                
                                                $code = ord($username[0]) * 10 + ord($username[1]) * 20 + ord($username[2]) * 30;
                                                $subject = "Hi, Thank you for signing up for scholarlyarch.com. Use the code ". $code . " to verify your account. <a href='https://www.scholarlyarch.com/login.php'>Verify Now!</a>";
                                                sendEmail($email, "Verify your email", $subject);
                                                
                                                $error = "Created successfully!";
                                                header('Location: signup-confirmation.php');
                                            }
                                            else 
                                                $error = $stmt->error;
                                            $stmt->close();    
                                        }
        					        }
                                }
                            }
        				}
                    }
                }
            }
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
