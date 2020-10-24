<?php
    $conn = mysqli_connect('localhost', 'root', '9701hong', 'awstest');

    $sql = "select * from subject";
    $result = mysqli_query($conn, $sql);
    $list ='';

    while( $row = mysqli_fetch_array($result)) {
        $escaped_title = htmlspecialchars($row['title']);
        $list = $list."<li><a href=\"index.php?id={$row["id"]}\">{$escaped_title}</a></li>";
    }

    $sql = "SELECT * FROM author";
    $result = mysqli_query($conn, $sql);
    $select_form = '<select name="author_id">';
    while( $row = mysqli_fetch_array($result)) {
        $select_form .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
    $select_form .= '</select>'
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
    <form action="process_create.php" method="post">
        <p><input type="text" name="title" placeholder="과목명"></p>
        <p><textarea name="description" placeholder="과목소개글"></textarea></p>
        <?= $select_form ?>
        <p><input type="submit"></p>
    </form>
  </body>
</html>
