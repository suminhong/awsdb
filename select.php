<?php
    $conn = mysqli_connect('localhost', 'root', '9701hong', 'awstest');

    echo "<h1>multi row</h1>";
    $sql = "select * from subject";
    $result = mysqli_query($conn, $sql);

    while( $row = mysqli_fetch_array($result)) {
        echo '<h2>'.$row['title'].'</h2>';
        echo $row['description'];
    }
 ?>
