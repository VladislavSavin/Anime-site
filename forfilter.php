<?php
    $types = mysqli_query($connect, "SELECT DISTINCT title FROM Titles");
    $types = mysqli_fetch_all($types);
    $genres = mysqli_query($connect, "SELECT DISTINCT genre FROM Titles");
    $genres = mysqli_fetch_all($genres);
    $dubbings = mysqli_query($connect, "SELECT DISTINCT dubbing FROM Titles");
    $dubbings = mysqli_fetch_all($dubbings);
?>