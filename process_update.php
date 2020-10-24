<?php
    $conn = mysqli_connect('localhost', 'root', '9701hong', 'awstest');

    settype($_POST['id'], 'integer');
    $filtered = array(
        'title' => mysqli_real_escape_string($conn, $_POST['title']),
        'description' => mysqli_real_escape_string($conn, $_POST['description']),
        'id' => mysqli_real_escape_string($conn, $_POST['id'])
    );

    $sql = "
        UPDATE subject
        SET title ='{$filtered['title']}', description = '{$filtered['description']}'
        WHERE id = '{$filtered['id']}'
        ";

    $result = mysqli_multi_query($conn, $sql);
    if($result === false) {
        echo '글을 수정하는 과정에서 오류가 발생하였습니다. 관리자에게 문의하세요.';
        error_log(mysqli_error($conn));
    } else {
        echo '정상적으로 등록되었습니다.<br> <a href="index.php">메인 페이지로 돌아가기</a>';
    }
 ?>
