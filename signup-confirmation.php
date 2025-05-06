<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="signup confirmation, scholarly arch">
    <title>Signup Confirmation | Scholarly Arch</title>
    <link rel="icon" href="images/favicon.ico" type="image/ico" sizes="16x16">
</head>
<body>
    <!-- Page Header -->    
    <?php require 'assets/header.php';?>
    <!-- Page Body -->
    <div class="inner">
        <div class="article-header">
            <h2 class="article-title">Signup Success!</h2>
            <div class="article-metadata">
                <img src="/images/avatar/bot.png">  
                <div class="author">Bot</div>
                &nbsp;| 
                <div class="last-updated"><?php echo date('M j, Y'); ?></div>
            </div>
        </div>
        <div class="article-body" >
            <div class="para" style="display: flex; flex-direction: column; align-items: center;">
                <p>We have sent a verification email with the link to the address provided. Click on the link to verify.</p>
                <i class='fas fa-envelope fa-10x'></i>
            </div>
        </div>
    </div>
    <!-- Page Footer -->
    <?php require 'assets/footer.php';?>
</body>
</html>