<?php 
    session_start(); 
    if (!isset($_SESSION["_LOGIN"])) {
        header('Location: login.php');
    } else {
        require $_SERVER["DOCUMENT_ROOT"].'/includes/user.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="signup confirmation, scholarly arch">
    <title><?php echo $_SESSION["username"]; ?> | Scholarly Arch</title>
    <link rel="stylesheet" href="/css/user.css">
    <link rel="icon" href="images/favicon.ico" type="image/ico" sizes="16x16">
</head>
<body>
    <!-- Page Header -->    
    <?php require 'assets/header.php';?>
    <!-- Page Body -->
    <div class="inner">
        <div class="article-header">
            <h2 class="article-title"><?php echo $_SESSION["username"]; ?></h2>
            <div class="article-metadata"> 
                <div class="last-updated"><?php echo "Email: " . $_SESSION["email"]; ?></div>
            </div>
        </div>
        <div class="article-body" >
            <div class="para">
                <p>You are logged in as <span class="text-bold-800"><?php echo $_SESSION["username"]; ?></span>!</p>
            </div>
            <div class="para">
                <p>Account status: <span class="text-bold-800">
                    <?php 
                        if($_SESSION["status"] == 0)
                            echo "Unverified";
                        else 
                            echo "Verified" 
                    ?>
                </span></p>
            </div>
            <?php if ($_SESSION["status"] == 0): ?>
                <div class="para">
                    <p>Enter the code below to verify your account. A security code was sent to the email address you provided at the time of signup.</p>
                </div>
                
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <?php if(isset($error)): ?>
                    <div class="message"><?php echo $error; ?></div>
                    <?php endif; ?>
                     <input type="text" name="code" placeholder="Verification Code">
                     <button>Verify</button>
                </form>
            <?php endif; ?>
            
            <button type="button" onclick="location.href='/includes/logout.inc.php'">Logout</button>
        </div>
    </div>
    <!-- Page Footer -->
    <?php require 'assets/footer.php';?>
</body>
</html>
<?php } ?>