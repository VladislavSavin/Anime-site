<!DOCTYPE html>
<html>
<head>
    <title>Главная</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="header.css">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet"> -->
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
            <img src="images/cherta.png" alt="" class="imgchert">
        </div>
    </header>

    <section id="videosection">
        <video autoplay muted loop>
          <source src="images/rasshirenie.mp4" type="video/mp4">
        </video>
        <div class="content">
          <h1>Добро пожаловать на ANIME</h1>
          <p>Посмотрим ваши предпочтения</p>
        </div>
    </section>

    <section class="about">
        <p>Здесь вы сможете найти самые новые Аниме с лучшей озвучкой, Мангу с лучшими переводами.</p>
        <p>Многообразие жанров, вы точно найдёте что-то на ваш вкус.</p>
    </section>

    <section class="recomendation">
    <h1>Рекомендуем</h1>
        <div class="container1">
            <?php
            require_once "connect.php";
            $result = mysqli_query($connect, "SELECT * FROM Titles ORDER BY rating DESC LIMIT 5");
            if ($result) {
                $titles = mysqli_fetch_all($result);
                foreach($titles as $title){
            ?>
            <div class="item">
                <div class="itemheader">
                    <div class="title"><?= $title[1]?></div>
                </div>
                <a href="title_info.php?id=<?= $title[0] ?>">
                    <img src="<?= $title[6]?>" alt="Тайтл" class="image">
                </a>
                <div class="title-list">
                    <div class="title"><?= $title[4]?></div>
                    <div class="title"><?= $title[3]?></div>
                    <div class="title"><?= $title[5]?></div>
                </div>
                <div class="item-title">
                    <img src="images/rating-star.png" alt="" class="images">
                    <?= $title[2]?>
                </div>
                <button onclick="checkCookie('<?= $title[0]?>')">
                    <img src="images/heart.png" alt="" class="images">
                    Мне нравится
                </button>
            </div>
            <?php
                }
            } else {
                echo "Ошибка при выполнении запроса: " . mysqli_error($connect);
            }
            ?>
        </div>
    </section>

    <footer class="footer">
        <p class="firstchild">ANIME</p>
        <p class="secondchild">Спасибо, что выбираете НАС!</p>
    </footer>

    <script src="/js/liketitle.js"></script>
</body>
</html>