<?php
require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $rating = $_POST['rating'];
    $genre = $_POST['genre'];
    $title = $_POST['title'];
    $dubbing = $_POST['dubbing'];

    // Обработка загружаемого файла
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);

    $query = "INSERT INTO Titles (name, rating, genre, title, dubbing, photo) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("sdssss", $name, $rating, $genre, $title, $dubbing, $target_file);
    
    if ($stmt->execute()) {
        echo "Тайтл успешно добавлен";
    } else {
        echo "Ошибка при добавлении тайтла: " . mysqli_error($connect);
    }
}
?>