<?php require 'includes/login.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="icon" href="images/favicon.ico" type="image/ico" sizes="16x16">
</head>
<body>
    <!-- Page Header -->
    <?php require $_SERVER["DOCUMENT_ROOT"].'/assets/header.php';?>
    <!-- Page Body -->
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h2>Login</h2>
        <?php if(isset($error)): ?>
        <div class="message"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="mubashir">

        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="********">

        <button type="submit">Login</button>
        <div class="form-bottom">Create Account instead! <a href="signup.php">Create Account!</a></div>
    </form>
    <!-- Page Footer -->
    <?php require $_SERVER["DOCUMENT_ROOT"].'/assets/footer.php';?>
</body>
</html>