<?php
    $conn = mysqli_connect('localhost', 'root', '9701hong', 'awstest');

    $filtered = array(
        'name' => mysqli_real_escape_string($conn, $_POST['name']),
        'profile' => mysqli_real_escape_string($conn, $_POST['profile'])
    );

    $sql = "
        INSERT INTO author (name, profile)
          VALUES (
            '{$filtered['name']}',
            '{$filtered['profile']}'
          )
     ";

    $result = mysqli_query($conn, $sql);
    if($result === false) {
        echo '저장하는 과정에서 오류가 발생하였습니다. 관리자에게 문의하세요.';
        error_log(mysqli_error($conn));
    } else {
        header('Location: author.php');
    }
 ?>
