<?php
require_once 'connect.php';
$data = json_decode(file_get_contents('php://input'), true);

$titleId = $data['title_id'];
$userLogin = $data['user_login'];
$deleteStmt = $connect->prepare("DELETE FROM title_user WHERE title_id = ? AND user_login = ?");
$deleteStmt->bind_param("ss", $titleId, $userLogin);
$deleteStmt->execute();

if ($deleteStmt->affected_rows > 0) {
    echo "Вам больше не нравится этот тайтл(((";
} else {
    echo "Не найдено что удалять!";
}

$deleteStmt->close();
?>