<?php
require_once 'connect.php';
$data = json_decode(file_get_contents('php://input'), true);

$titleId = $data['title_id'];
$userLogin = $data['user_login'];

$checkStmt = $connect->prepare("SELECT * FROM title_user WHERE title_id = ? AND user_login = ?");
$checkStmt->bind_param("ss", $titleId, $userLogin);
$checkStmt->execute();
$checkResult = $checkStmt->get_result();

if ($checkResult->num_rows > 0) {
    echo "Вы уже добавляли в любимое!";
} else {
    if (isset($_COOKIE['login'])) {
        $userLoginFromCookie = $_COOKIE['login'];
        if ($userLoginFromCookie === $userLogin) {
            $stmt = $connect->prepare("INSERT INTO title_user (title_id, user_login) VALUES (?, ?)");
            $stmt->bind_param("ss", $titleId, $userLogin);
            if ($stmt->execute()) {
                echo "Добавлено в любимое";
            } else {
                echo "Ошибка при выполнении запроса: " . $connect->error;
            }
            $stmt->close();
        } else {
            echo "Вы не авторизованны";
            exit();
        }
    } else {
        echo "Вы не авторизованны";
        exit();
    }
}
?>