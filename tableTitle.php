<?php
require_once 'connect.php';

$sql = "SELECT t.name, COUNT(*) as count 
        FROM title_user tu 
        INNER JOIN Titles t ON tu.title_id = t.id 
        GROUP BY t.name";

$result = $connect->query($sql);

if ($result->num_rows > 0) {
    $output = "<table>";
    $output .= "<tr><th>Название</th><th>Количество</th></tr>";
    while($row = $result->fetch_assoc()) {
        $output .= "<tr><td>" . $row["name"]. "</td><td>" . $row["count"]. "</td></tr>";
    }
    $output .= "</table>";
    echo $output;
} else {
    echo "0 результатов";
}

$connect->close();