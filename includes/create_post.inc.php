<?php
  require $_SERVER["DOCUMENT_ROOT"]."/config/dbh.php";

  if (isset($_POST["post-btn"])) {
    global $conn;
    $sql = "INSERT INTO posts(title, content) VALUES(?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $_POST["title"], $_POST["content"]);
    if (!$stmt->execute())
      echo $stmt->error;
    $stmt->close();
    header('Location: /index.php');
  }
