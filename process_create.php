<?php
    $conn = mysqli_connect('localhost', 'root', '9701hong', 'awstest');

    $filtered = array(
        'title' => mysqli_real_escape_string($conn, $_POST['title']),
        'description' => mysqli_real_escape_string($conn, $_POST['description']),
        'author_id' => mysqli_real_escape_string($conn, $_POST['author_id'])
    );

    $sql = "
        INSERT INTO subject (title, description, created, author_id)
          VALUES (
            '{$filtered['title']}',
            '{$filtered['description']}',
            NOW(),
            {$filtered['author_id']}
          )"
        ;
    $result = mysqli_query($conn, $sql);
    if($result === false) {
        echo '글 등록 오류가 발생하였습니다. 관리자에게 문의하세요.';
        error_log(mysqli_error($conn));
    } else {
        echo '정상적으로 등록되었습니다.<br> <a href="index.php">메인 페이지로 돌아가기</a>';
    }
 ?>
