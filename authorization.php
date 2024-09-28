<?php
require_once 'connect.php';

if (isset($_COOKIE['login'])) {
    $login = $_COOKIE['login'];
    if ($login === 'admin') {
        header('Location: admin.php');
        exit();
    } else {
        header('Location: profile.php');
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];
    if (empty($login) || empty($password)) {
        $error = 'Пожалуйста, введите имя пользователя и пароль';
    } else {
        $query = "SELECT * FROM users WHERE login=?";
        $stmt = $connect->prepare($query);
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                if ($login === 'admin') {
                    setcookie('login', $login, time() + (3000), '/');
                    header('Location: admin.php');
                    exit();
                } else {
                    setcookie('login', $login, time() + (3000), '/');
                    header('Location: profile.php');
                    exit();
                }
            } else {
                $error = 'Неправильное имя пользователя или пароль';
            }
        } else {
            $error = 'Неправильное имя пользователя или пароль';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Вход</title>
    <link rel="stylesheet" type="text/css" href="style3.css">
    <link rel="stylesheet" type="text/css" href="header.css">
</head>
<body>
    <header id="header" class="header">
        <div class="container">
            <div class="nav">
                <div class="logoimg">
                    <li><a href="index.php"><img src="images/logo.png" alt="logo" class="logo"></a></li>
                </div>
                <ul class="menu">
                    <li><a href="catalog.php">Каталог</a></li>
                    <li><a href="authorization.php">Профиль</a></li>
                </ul>
            </div>
        </div>
        <img src="images/cherta.png" alt="">
    </header>
    <div class="container2">
        <div class="container1">
            <form action="authorization.php" method="post" class="authform">
                <h1>Авторизация</h1>
                <div class="field">
                    <div class="label"><label for="login">Login пользователя</label></div>
                    <div class="inputfield">
                        <input type="text" id="login" name="login" class="inputdata">
                    </div>
                </div>

                <div class="field">
                    <div class="label"><label for="password">Пароль</label></div>
                    <div class="inputfield">
                        <input type="password" id="password" name="password" class="inputdata">
                    </div>
                </div> 
                <div class="registration"><?=$error?></div>
                <button type="submit"  class="btn">Войти</button>
                <div class="registration">
                    <p>
                        Если у Вас нет профиля, то вы можете зарегистрироваться
                        <a href="registration.php" class="registr"> Зарегистрироваться</a>
                    </p>
                </div>

            </form>
        </div>
    </div>
</body>
</html>