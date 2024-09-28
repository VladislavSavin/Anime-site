<?php
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_COOKIE['login'])) {
        $login = $_COOKIE['login'];
        $newUsername = $_POST['newUsername'];

        if (!empty($newUsername)) {
            $query = $connect->prepare("UPDATE users SET username=? WHERE login=?");
            $query->bind_param("ss", $newUsername, $login);
            $result = $query->execute();
            
            if ($result) {
                setcookie('username', $newUsername, time() + (3000), '/');
                echo "Имя пользователя успешно обновлено!";
            } else {
                echo "Ошибка при обновлении имени пользователя: " . $connect->error;
            }
        }

        if (!empty($_FILES['newPhoto']['name'])) {
            $photoName = $_FILES['newPhoto']['name'];
            $photoTmpName = $_FILES['newPhoto']['tmp_name'];
            $uploadPath = 'uploads/' . $photoName;
            
            if (move_uploaded_file($photoTmpName, $uploadPath)) {
                $query = $connect->prepare("UPDATE users SET photo=? WHERE login=?");
                $query->bind_param("ss", $uploadPath, $login);
                $result = $query->execute();
                
                if (!$result) {
                    echo "Ошибка при обновлении фотографии: " . $connect->error;
                } else {
                    echo "Фотография успешно обновлена!";
                }
            } else {
                echo "Ошибка при загрузке фотографии.";
            }
        }
    } else {
        echo "Пользователь не авторизован";
    }
}
?>