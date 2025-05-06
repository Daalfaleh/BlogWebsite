<?php require $_SERVER["DOCUMENT_ROOT"]."/includes/contact.inc.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="icon" href="images/favicon.ico" type="image/ico" sizes="16x16">
</head>
<body>
    <!-- Page Header -->
    <?php require $_SERVER["DOCUMENT_ROOT"].'/assets/header.php';?>
    <!-- Page Body -->
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h2>Contact Us</h2>
        
        <?php if (isset($error)): ?>
            <div class="message"><? echo $error; ?></div>
        <?php endif; ?>
        
        <label for="name">Your Name</label>
        <input type="text" name="name" id="name" placeholder="mubashir">

        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="imubashir@example.com">

        <label for="msg">Your Message</label>
        <textarea name="msg" id="msg" rows="10" placeholder="Need to talk? We're listening…"></textarea>

        <button type="submit">Send <i class="fa fa-paper-plane fa-xs" style="transform: translateY(-1px);"></i></button> 
    </form>
    <!-- Page Footer -->
    <?php require $_SERVER["DOCUMENT_ROOT"].'/assets/footer.php';?>
</body>
</html>