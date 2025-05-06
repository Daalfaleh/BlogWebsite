<?php
  require $_SERVER["DOCUMENT_ROOT"]."/config/dbh.php";
  session_start();

  function viewPosts() {
    global $conn;
    $sql = "SELECT * from posts";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<h3>". $row["title"]. "</h3>";
        echo "<li>". $row["content"] . "</li>";
        echo "<li><b>Date Published: </b>" .$row["date_published"] . "</li>";
    }
    echo "</ul>";

    $stmt->close();
  }
