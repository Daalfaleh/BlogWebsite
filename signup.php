<?php require $_SERVER["DOCUMENT_ROOT"].'/includes/signup.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="icon" href="images/favicon.ico" type="image/ico" sizes="16x16">
</head>
<body>

    <!-- Page Header -->
    <?php require $_SERVER["DOCUMENT_ROOT"].'/assets/header.php';?>
    <!-- Page Body -->
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h2>Registration Form</h2>
        
        <?php if (isset($error)): ?>
        <div class="message"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="ahmed1" value="<?php if (isset($username)) echo $username; ?>">

        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="ahmed123@example.com" value="<?php if (isset($email)) echo $email; ?>">

        <label for="pwd">Password</label>
        <input type="password" name="password" id="pwd" placeholder="********">

        <label for="conf-pwd">Confirm Password</label>
        <input type="password" name="passwordConf" id="conf-pwd" placeholder="********">

        <button type="submit">Create Account</button>
        <div class="form-bottom">Already have an account? <a href="login.php">Log in!</a></div>
    </form>
    <!-- Page Footer -->
    <?php require $_SERVER["DOCUMENT_ROOT"].'/assets/footer.php';?>
</body>
</html>