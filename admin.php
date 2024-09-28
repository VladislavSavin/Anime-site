<?php
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_COOKIE['login'])) {
        $login = $_COOKIE['login'];
        $newUsername = $_POST['newUsername'];

        $query = "UPDATE users SET username=? WHERE login=?";
        $stmt = $connect->prepare($query);
        $stmt->bind_param("ss", $newUsername, $login);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Имя пользователя успешно обновлено!";
        } else {
            echo "Ошибка при обновлении имени пользователя";
        }
    } else {
        header('Location: authorization.php');
        exit();
    }
    exit();
}

if (isset($_COOKIE['login'])) {
    $login = $_COOKIE['login'];
    $query = "SELECT username, photo FROM users WHERE login=?";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['username'];
        $photo = $row['photo'];
    }
} else {
    header('Location: authorization.php');
    exit();
}

if (isset($_COOKIE['login'])) {
    $login = $_COOKIE['login'];
    $query = "SELECT photo FROM users WHERE login=?";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $photo = $row['photo'];
    }
} else {
    header('Location: authorization.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Страница админки</title>
    <link rel="stylesheet" type="text/css" href="header.css">
    <link rel="stylesheet" type="text/css" href="style4.css">
    <link rel="stylesheet" type="text/css" href="style2.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="add_title_admin.js"></script>
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

    <div class="containerAll" id="containerAll">

        <div class="change" id="change">
            <form id="profileForm" method="post" enctype="multipart/form-data">
                <div class="labelChange">
                    Изменение профиля
                </div>
                <div class="nameprofile">
                    <label for="newUsername">Новое имя:</label>
                    <input type="text" id="newUsername" name="newUsername">
                </div>
                <div class="photo">
                    <label for="newPhoto">Новая аватарка:</label>
                    <input type="file" id="newPhoto" name="newPhoto" accept="image/*">
                </div>
                <button type="submit" class="b1">Сохранить</button>
            </form>
        </div>


        <div class="container2">
            <div class="container1"> 
                <div class="containerhead"><?=$username?></div>
                <label for="fileInput">
                    <div class="avatar">
                        <img id="preview" src="<?=$photo?>" alt="Аватар">
                    </div>
                </label>
                <div class="buttons">
                    <button onclick="showMenu()" class="b1">Изменить</button>
                    <button type="submit" onclick="exitProfile()" class="b1">Выйти</button>
                </div>
                <div class="buttons">
                    <button type="submit" onclick="OpenAdminPanel()" class="b1">admin</button>
                </div>
            </div>
        </div>


        <div class="containerFavorit">
            <div class="lableFavorit">
                <label for="">Любимое</label>
            </div>
            <div class="container1">
                <?php
                if (isset($_COOKIE['login'])) {
                    $login = $_COOKIE['login'];
                    $query = "SELECT * FROM title_user WHERE user_login = ?";
                    $stmt = $connect->prepare($query);
                    $stmt->bind_param("s", $login);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        $titleIds = array();  

                        while ($row = $result->fetch_assoc()) {
                            $titleIds[] = $row['title_id'];  
                        }

                        $titles = mysqli_query($connect, "SELECT * FROM Titles WHERE id IN (" . implode(',', $titleIds) . ")");

                        if ($titles) {
                            while ($title = mysqli_fetch_assoc($titles)) {
                                ?>
                                <div class="item">
                                    <div class="itemheader">
                                        <div class="title"><?= $title['name'] ?></div>
                                    </div>
                                    <a href="title_info.php?id=<?= $title['id'] ?>">
                                        <img src="<?= $title['photo']?>" alt="Тайтл" class="image">
                                    </a>
                                    <div class="title"><?= $title['title'] ?></div>
                                    <div class="title"><?= $title['genre'] ?></div>
                                    <div class="title"><?= $title['dubbing'] ?></div>
                                    <div class="item-title">
                                        <img src="images/rating-star.png" alt="" class="images">
                                        <?= $title['rating'] ?>
                                    </div>
                                    <button onclick="checkCookie('<?= $title['id'] ?>')">
                                        <img src="images/Delete.png" alt="" class="images">
                                        Мне не нравится
                                    </button>
                                </div>
                                <?php
                            }
                        } else {
                            echo "Query failed: " . mysqli_error($connect);
                        }
                    } else {
                        echo "У вас пока что нет любимых аниме";
                    }
                } else {
                    header('Location: login.php');
                    exit();
                }
                ?>

            </div>

        </div>

        <div class="container3">
            <div class="container4">
                <form id="addTitleForm" enctype="multipart/form-data" class="addTitleForm">
                    <h1>Добавление тайтлов</h1>
                    <div class="field">
                        <label for="name">Название</label>
                        <input type="text" id="name" name="name">
                    </div>
                    <div class="field">
                        <label for="rating">Рейтинг</label>
                        <input type="number" id="rating" name="rating" min="0" max="10" step="0.1">
                    </div>
                    <div class="field">
                        <label for="genre">Жанр</label>
                        <select id="genre" name="genre">
                            <option value="Сёнен">Сёнен</option>
                            <option value="Психологическое">Психологическое</option>
                            <option value="Фэнтези">Фэнтези</option>
                            <option value="Спорт">Спорт</option>
                            <option value="Комедия">Комедия</option>
                            <option value="Романтика">Романтика</option>
                            <option value="Драма">Драма</option>
                        </select>
                    </div>
                    <div class="field">
                        <label for="title">Тип</label>
                        <select id="title" name="title">
                            <option value="Аниме">Аниме</option>
                            <option value="Манга">Манга</option>
                        </select>
                    </div>
                    <div class="field">
                        <label for="dubbing">Дубляж</label>
                        <select id="dubbing" name="dubbing">
                            <option value="AniDUB">AniDUB</option>
                            <option value="Anilibria">Anilibria</option>
                            <option value="JAM CLUB">JAM CLUB</option>
                            <option value="Dream Cast">Dream Cast</option>
                            <option value="Азбука">Азбука</option>
                            <option value="AnimeLibri">AnimeLibri</option>
                        </select>
                    </div>
                    <div class="field">
                        <label for="photo">Фото</label>
                        <input type="file" id="photo" name="photo">
                    </div>
                    <button type="submit" class="b1">Добавить тайтл</button>
                </form>

                <div class="addTitleForm">
                    <h2>Популярные тайтлы</h2>
                    <div class="field">
                        <?php
                            require_once "tableTitle.php"
                        ?>
                    </div>
                </div>
                <button type="submit" class="b1" onclick="CloseAdminPanel()">Закрыть</button>
            </div>
        </div>
    </div>
    <footer class="footer">
        <p class="firstchild">ANIME</p>
        <p class="secondchild">Спасибо, что выбираете НАС!</p>
    </footer>

    <script src="/js/close_admin_panel.js"></script>
    <script src="/js/exit_profile.js"></script>
    <script src="/js/deletetitle.js"></script>
    <script src="/js/profile_save_changes.js"></script>
    <script src="/js/profile_reload.js"></script>
    <script src="/js/exit_profile.js"></script>
</body>
</html>


