<?php
    $conn = mysqli_connect('localhost', 'root', '9701hong', 'awstest');

    $sql = "select * from subject";
    $result = mysqli_query($conn, $sql);
    $list ='';

    while( $row = mysqli_fetch_array($result)) {
        $escaped_title = htmlspecialchars($row['title']);
        echo $escaped_title;
        $list = $list."<li><a href=\"index.php?id={$row["id"]}\">{$escaped_title}</a></li>";
    }
    $article = array(
      'title' => 'AWSTEST',
      'description' => 'AWS-TEST'
    );
    echo '<p>'.$article['title'].'</p>'.$article['description'];

    $update_link = '';
    $delete_link = '';
    $author = '';


    if( isset($_GET['id'])) {
      $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
      $sql = "SELECT * FROM subject LEFT JOIN author ON subject.author_id = author.id where subject.id={$filtered_id}";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result);
      $article['title'] = htmlspecialchars($row['title']);
      $article['description'] = htmlspecialchars($row['description']);
      $article['name'] = htmlspecialchars($row['name']);

      echo '<p>'.$article['title'].'</p>'.$article['description'];

      $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
      $delete_link = '
          <form action="process_delete.php" method="post">
              <input type="hidden" name="id" value="'.$_GET['id'].'">
              <input type="submit" value="delete">
          </form>
        ';
      $author = "<p>by {$article['name']}</p>";
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
    <a href="author.php">author</a>
    <ol><?= $list ?></ol>
    <a href="create.php">create</a>
    <?= $update_link ?>
    <?= $delete_link ?>
    <h2><?= $article['title'] ?></h2>
    <?= $article['description'] ?>
    <?= $author ?>
  </body>
</html>
