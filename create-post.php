<?php require $_SERVER["DOCUMENT_ROOT"].'/includes/index.inc.php'; ?>
<?php require $_SERVER["DOCUMENT_ROOT"].'/includes/create_post.inc.php'; ?>
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
        <?php if (isset($_SESSION["_LOGIN"])): ?>
        <ul>
          <li><a>Create Post</a></li>
        </ul>
        <form method="POST">
          <input type="text" name="title" placeholder="Title of the Post">
          <br>
          <textarea name="content" placeholder="Type here.." rows="10"></textarea>
          <button type="submit" name="post-btn">Post</button>
        </form>
        <?php else: ?>
        <h2>You are not logged in!</h2>
        <p>Login or Signup to create posts.</p>
        <?php endif; ?>
      </div>
    </div>
    <!-- Page Footer -->
    <?php require $_SERVER["DOCUMENT_ROOT"].'/assets/footer.php';?>
</body>
</html>
