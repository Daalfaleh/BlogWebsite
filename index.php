<?php require $_SERVER["DOCUMENT_ROOT"].'/includes/index.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Scholarly Arch</title>
    <link rel="icon" href="images/favicon.ico" type="image/ico" sizes="16x16">
    <link rel="stylesheet" href="/css/main.css?v=<?php echo time(); ?>">
</head>
<body>
    <!-- Page Header -->
    <?php require $_SERVER["DOCUMENT_ROOT"].'/assets/header.php';?>
    <!-- Page Body -->
    <div class="inner">
      <div class="users">
        <?php
          if (isset($_SESSION["_LOGIN"])) {
            echo "<ul><li><a href='/create-post.php'>Create Post <i class='fas fa-plus-circle'></i></a></li></ul>";
            echo "<h2>Recent Posts</h2>";
            viewPosts();
          }
          else {
            echo "<h2>You are not logged in!</h2>";
            echo "<p>Login or Signup to create posts.</p>";
          }
        ?>
      </div>
    </div>
    <!-- Page Footer -->
    <?php require $_SERVER["DOCUMENT_ROOT"].'/assets/footer.php';?>
</body>
</html>
