<?php
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login = $_COOKIE['login'];
    $username = $_POST['username'];
    $photo = $_POST['photo'];
    $query = "UPDATE users SET photo='$photo' WHERE WHERE login=?";
    $result = $connect->query($query);

    if ($result === TRUE) {
        echo "Данные успешно обновлены!";
    } else {
        echo "Ошибка при обновлении данных: " . $connect->error;
    }
}
?>