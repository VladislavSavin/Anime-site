<?php
require_once 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Каталог</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
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

        <div class="navigation">
            <div class="container">
                <div class="filtermenu1">
                    <img src="images/filter.png" alt="Изображение" onclick="showMenu()"/>
                    ФИЛЬТР
                </div>
                <div class="search1">
                    ПОИСК
                    <input type="text" id="searchInput" onkeyup="searchItems()" placeholder="Найти тайтл по названию">
                </div>
            </div>
        </div>
        
        <div class="filters">
            <div class = "container">
                <div class="filter" id="filter">
                    <?php
                        require_once 'forfilter.php';
                    ?>
                    <div class="typefilter">
                        <label for="types">Тип:</label>
                        <div id="types" class="filterscheck">
                            <?php
                                foreach ($types as $type) {
                            ?>
                                <input type="checkbox" name="types[]" value="<?= $type[0] ?>" onchange="changeFilters()"><label><?= $type[0] ?></label>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <div class="typefilter">
                        <label for="genre">Жанр:</label>
                        <div id="genre" class="filterscheck">
                            <?php
                            foreach ($genres as $genre) {
                            ?>
                                <input type="checkbox" name="genre[]" value="<?= $genre[0] ?>"><label><?= $genre[0] ?></label>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="typefilter">
                        <label for="dub">Дубляж:</label>
                        <div id="dub" class="filterscheck">
                            <?php
                            foreach ($dubbings as $dubbing) {
                            ?>
                                <input type="checkbox" class = "dubbing" name="dubbing[]" value="<?= $dubbing[0] ?>"><label id="dubbinglable"><?= $dubbing[0] ?></label>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <button onclick="applyFilters()">Применить</button>
                </div>
            </div>
        </div>

   
        <div class="container1">
            <?php
            $titles = mysqli_query($connect, "SELECT * FROM Titles");
            $titles = mysqli_fetch_all($titles);
            foreach($titles as $title){
            ?>
            <div class="item">
                <div class="itemheader">
                    <div class="title"><?= $title[1]?></div>
                </div>
                <a href="title_info.php?id=<?= $title[0] ?>">
                    <img src="<?= $title[6]?>" alt="Тайтл" class="image">
                </a>
                <div class="title"><?= $title[4]?></div>
                <div class="title"><?= $title[3]?></div>
                <div class="title"><?= $title[5]?></div>
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
            ?>
            </div>
        </div>

        <footer class="footer">
            <p class="firstchild">ANIME</p>
            <p class="secondchild">Спасибо, что выбираете НАС!</p>
        </footer>

        <script src="/js/filtermenu.js"></script>
        <script src="/js/changefilters.js"></script>
        <script src="/js/script.js"></script>
        <script src="/js/liketitle.js"></script>

</body>
</html>