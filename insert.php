<?php
    $conn = mysqli_connect('localhost', 'root', '9701hong', 'awstest');
    $sql = "
        INSER INTO subject (title, description, created)
        VALUES ('Network', 'Network is ...', NOW())";
    $result = mysqli_query($conn, $sql);
    if($result === false) {
        echo mysqli_error($conn);
    }
 ?>
