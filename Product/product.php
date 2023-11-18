<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Produkt</title>
    <!-- auf CSS verlinken -->
    <link href="../tebllen.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>

<?php
error_reporting(E_ALL & ~E_WARNING);
$_GET["id"];
$_GET["artist_name"];
// Verbindung zur Datenbank herstellen

require("../connection.php");

// SQL-Abfrage für Produkte
if($_GET["id"] > 0){
$sql = "SELECT * FROM products join artists on  products.artist_name = artists.name where products.id = '".$connection->real_escape_string($_GET['id']). "'" ;
}
else{
    $sql = "SELECT * FROM products join artists on  products.artist_name = artists.name where products.artist_name = '".$connection->real_escape_string($_GET['artist_name']). "'" ;
}
$result = $connection->query($sql);



if ($result) {
    // Daten der Db als Tabelle ausgeben und auf der Webseite anzeigen
    while ($row = $result->fetch_assoc()) {
        if(!file_exists("../Bildes/" . $row['img_path']) || empty($row['img_path'])){
        $row['img_path'] = 'noimage.png';   
        }
        echo "<div class='klick'>";
        echo "<a href='?id=$row[id]'> ";
                    echo "<table class='choice_table' cellspacing=0 cellpadding=0>";
                        echo '<tr>';

                        echo '<th colspan="4">' . $row['pname'] . '</th>';
                    echo '</tr>';
                    echo '<tr class="cell">';
                        echo '<td><a href="?artist_name='.$row['artist_name'].'">' . $row['artist_name'] . '</a></td>';
                        echo '<td></td>';
                        echo '<td>' . $row['price'] . '€</td>';
                
                    echo '</tr>';
                    echo '<tr>';
                        echo '<td>' . $row['email'] . '</td>';
                        echo '<td></td>';
                        echo '<td>' . $row['category'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                        echo '<td>geboren:' . $row['date_of_birth'] . '<td>';
                        echo '<td></td>';
                        echo '<td></td>';
                    echo '</tr>';
                    echo '<tr>';
                        echo '<td colspan="3"><img src="../Bildes/' . $row['img_path'] . '" alt="bild von ' . $row['pname'] . '"></td>';
                    echo '</tr>';
                    echo '<tr>';
                        echo '<td colspan="3">' . $row['description'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                        if ($row['availability'] == 1) {
                            echo '<td colspan="3">Lagerbestand '. $row['availability'].'</td>'; }
                        else { 
                            echo'<td colspan="3">Nicht auf Lager </td>';}  
                    echo '</tr>';
                    echo '<tr>';
                        echo '<th colspan="1"><a href="../tabllenexperiment.php">Zurück</a></th>';
                        echo '<th colspan="4">Warenkorb</th>';
                    echo '</tr>';
                echo "</table>";
                echo "</a>";
                echo "</div>";
}

}
// Verbindung schließen
$connection->close();
?>

</body>
</html>

