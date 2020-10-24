<?php
    $conn = mysqli_connect('localhost', 'root', '9701hong', 'awstest');

    $sql = "select * from subject";
    $result = mysqli_query($conn, $sql);
    $list ='';

    while( $row = mysqli_fetch_array($result)) {
        $escaped_title = htmlspecialchars($row['title']);
        $list = $list."<li><a href=\"index.php?id={$row["id"]}\">{$escaped_title}</a></li>";
    }
    $article = array(
      'title' => 'AWSTEST',
      'description' => 'AWS-TEST'
    );

    $update_link = '';
    if( isset($_GET['id'])) {
      $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
      $sql = "select * from subject where id={$filtered_id}";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result);
      $article['title'] = htmlspecialchars($row['title']);
      $article['description'] = htmlspecialchars($row['description']);

      $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
    }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>AWSTEST</title>
  </head>
  <body>
    <h1><a href="index.php">AWSTEST</a></h1>
    <ol><?= $list ?></ol>
    <form action="process_update.php" method="post">
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <p><input type="text" name="title" placeholder="과목명" value="<?= $article['title'] ?>"></p>
        <p><textarea name="description" placeholder="과목소개글"><?=$article['description'] ?></textarea></p>
        <p><input type="submit"></p>
    </form>
  </body>
</html>
