<?php
require("connection.php");

$type = $_GET ["type"];
$searchValue = $_GET["searchInput"];

$sql_select = "";

switch ($type) {
    case "artist":
        $sql_select = "SELECT * from products WHERE artist_name LIKE'" . "%" . $searchValue . "%" . "'";
        break;
    case "product":
        $sql_select = "SELECT * from products WHERE pname LIKE'" . "%" . $searchValue . "%" . "'";
        break;
    case "category":
        $sql_select = "SELECT * from products WHERE category='" . $searchValue . "'";
        break;


$result = $connection->query($sql_select);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        if(!file_exists("Bildes/" . $row['img_path']) || empty($row['img_path'])){
        $row['img_path'] = 'noimage.png';
        }
            echo "<div class='klick'>";
            echo "<a href='Product/product.php?id=$row[id]'> ";
                echo "<table class='choice_table' cellspacing=0 cellpadding=0>";
                echo "<tr>";
                echo "<th class='td pname'>". $row["pname"]."</th>";
                echo "</tr>";
                echo "<tr>";
                echo "<td class='td Preis'>"."Preis: ". $row["price"]. " €"."</td>";
             
                echo "</tr>";
                echo "<tr>";
                echo '<td colspan="2"><div class = "product_image" style="background-image:url(Bildes/' . $row['img_path'] . ');"></div></td>';

                echo "</tr>";
                echo "<tr>";
            
                echo "<td class='td Künstler'>". $row["category"]." by " . $row["artist_name"]."</td>";
                echo "</tr>";
               
                echo "</table>";

            echo "</a>";
            echo "</div>";
    }
    // Verbindung schließen
}
}
$connection->close();
?>
