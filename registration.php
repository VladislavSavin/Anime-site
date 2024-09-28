<?php
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'] ?? null;
    $login = $_POST['login'];
    $password = $_POST['password'];

    if (empty($username) || empty($login) || empty($password)) {
        echo "Пожалуйста, заполните все поля";
        exit();
    }

    $check_query = "SELECT * FROM users WHERE login = ?";
    $check_stmt = $connect->prepare($check_query);
    $check_stmt->bind_param("s", $login);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Пользователь с таким логином уже существует";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, login, password) VALUES (?, ?, ?)";
    
    $stmt = $connect->prepare($query);
    $stmt->bind_param("sss", $username, $login, $hashed_password);
    
    if ($stmt->execute()) {
        if ($login === 'admin' && $password === '23022004') {
            setcookie('login', $login, time() + (3000), '/');
            header('Location: admin.php');
            exit();
        } else {
            setcookie('login', $login, time() + (3000), '/');
            header('Location: profile.php');
            exit();
        }
    } else {
        echo "Ошибка: " . $query . "<br>" . $connect->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="style3.css">
    <link rel="stylesheet" type="text/css" href="header.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
</head>
<body>
    <header id="header" class="header">
            <div class="container">
                <div class="nav">
                    <div class="logoimg">
                        <li><a href="index.php"><img src="images/logo.png" alt="logo" class="logo"></a></li>
                    </div>
                    <ul class = "menu">
                        <li><a href="catalog.php">Каталог</a></li>
                        <li><a href="authorization.php">Профиль</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <img src="images/cherta.png" alt="">
    </header>

    <div class="container2">
        <div class="container1">
            <form action="registration.php" method="post" class="authform">
                <h1>Регистрация</h1>

                <div class="field">
                    <div class="label"><label for="username">Имя пользователя</label></div>
                    <div class="inputfield">
                        <input type="text" id="username" name="username" class="inputdata" required>
                    </div>
                </div>

                <div class="field">
                    <div class="label"><label for="login">Почта</label></div>
                    <div class="inputfield">
                        <input type="text" id="login" name="login" class="inputdata" required>
                    </div>
                </div>

                <div class="field">
                    <div class="label"><label for="password">Пароль</label></div>
                    <div class="inputfield">
                        <input type="password" id="password" name="password" class="inputdata" required>
                    </div>
                </div> 
                <button type="submit" class="btn">Зарегистрироваться</button>
            </form>
        </div>
    </div>
</body>
</html>
