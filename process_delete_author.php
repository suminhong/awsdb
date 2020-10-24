<?php
    $conn = mysqli_connect('localhost', 'root', '9701hong', 'awstest');

    settype($_POST['id'], 'integer');
    $filtered = array(
        'id' => mysqli_real_escape_string($conn, $_POST['id'])
    );

    $sql = "
        DELETE FROM subject WHERE author_id = '{$filtered['id']}'
        ";
        mysqli_multi_query($conn, $sql);

    $sql = "
        DELETE FROM author WHERE id = '{$filtered['id']}'
        ";

    $result = mysqli_multi_query($conn, $sql);
    if($result === false) {
        echo '삭제하는 과정에서 오류가 발생하였습니다. 관리자에게 문의하세요.';
        error_log(mysqli_error($conn));
    } else {
        header('Location: author.php');
    }
 ?>
