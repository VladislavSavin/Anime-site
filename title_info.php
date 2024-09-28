<?php
require_once "connect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($connect, "SELECT * FROM Titles WHERE id=$id");
    if ($result) {
        $title = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_title_info.css">
    <link rel="stylesheet" type="text/css" href="header.css">
</head>
<body>
    <header id="header" class="header">
        <div class="container">
            <div class="nav">
                <div class="logoimg">
                    <li><a href="index.html"><img src="images/logo.png" alt="logo" class="logo"></a></li>
                </div>
                <ul class = "menu">
                    <li><a href="catalog.php">Каталог</a></li>
                    <li><a href="authorization.php">Профиль</a></li>
                </ul>
            </div>
            <img src="images/cherta.png" alt="" class="imgchert">
        </div>
    </header>

    <div class="container1">
        <div class="photo">
            <img src="<?= $title['photo']?>" alt="Тайтл" class="image">
            <div class="item-title">
                <img src="images/rating-star.png" alt="" class="images">
                <?= $title['rating']?>
            </div>
            <button onclick="checkCookie('<?= $title['id']?>')">
                <img src="images/heart.png" alt="" class="images">
                Мне нравится
            </button>
        </div>
        <div class="info">
            <div class="itemheader">
                <div class="titles"><?= $title['name']?></div>
            </div>
            <div class="title">Тайтл: <?= $title['title']?></div>
            <div class="title">Жанр: <?= $title['genre']?></div>
            <div class="title">Дубляж: <?= $title['dubbing']?></div>
            <div class="fragmentlabel">Кадры</div>
            <div class="fragments">
                <img src="<?= $title['fragment1']?>" alt="Тайтл" class="image">
                <img src="<?= $title['fragment2']?>" alt="Тайтл" class="image">
                <img src="<?= $title['fragment3']?>" alt="Тайтл" class="image">
            </div>
        </div>
    </div>


    
    <footer class="footer">
        <p class="firstchild">ANIME</p>
        <p class="secondchild">Спасибо, что выбираете НАС!</p>
    </footer>

    <script src="/js/liketitle.js"></script>
</body>
</html>
<?php
    } else {
        echo "Ошибка при выполнении запроса: " . mysqli_error($connect);
    }
} else {
    echo "ID не найден";
}
?>