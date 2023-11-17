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

$_GET["id"];
$_GET["artist_name"];
// Verbindung zur Datenbank herstellen
require("../connection.php");

// SQL-Abfrage für Produkte
//datenbank noch wechseln
if($_GET["id"] > 0){
$sql = "SELECT * FROM products join artists on  products.artist_name = artists.name where products.id = '".$connection->real_escape_string($_GET['id']). "'" ;
}
else{
    $sql = "SELECT * FROM products join artists on  products.artist_name = artists.name where products.artist_name = '".$connection->real_escape_string($_GET['artist_name']). "'" ;
}
$result = $connection->query($sql);

// Überprüfen, ob Ergebnisse vorhanden sind
/* if ($result->num_rows > 0) {
    // Daten aus der Abfrage abrufen
    $row = $result->fetch_assoc();

    // HTML-Tabelle mit dynamischen Daten füllen
    echo '<table cellspacing="0" cellpadding="0">';
    echo '<tr>';

    echo '<th colspan="3">' . $row['pname'] . '</th>';
    echo '</tr>';
    echo '<tr class="cell">';
    echo '<td>' . $row['artist_name'] . '</a></td>';
    echo '<td>' . $row['price'] . '€</td>';

    echo '</tr>';
    echo '<tr>';
    echo '<td>' . $row['email'] . '</td>';
    echo '<td>' . $row['category'] . '</td>';
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
    echo '<th colspan="2">Warenkorb</th>';
    echo '</tr>';
    echo '</table>';
} else {
    echo "Keine Ergebnisse gefunden";
}
*/
// <p><a href="Product/product.php?id=25">cooles zeug</a></p>
if ($result) {
    // Daten der Db als Tabelle ausgeben und auf der Webseite anzeigen
    while ($row = $result->fetch_assoc()) {
        if(!file_exists("../Bildes/" . $row['img_path']) || empty($row['img_path'])){
        $row['img_path'] = 'noimage.png';   
        }
//echo "<div class='klick'>";
  //          echo "<a href='Product/product.php?id=$row[id]'> ";
        //    echo" <button class='choice_btn' >";
                echo "<div class='klick'>";
                    echo "<table class='choice_table' cellspacing=0 cellpadding=0>";
                        echo '<tr>';

                        echo '<th colspan="3">' . $row['pname'] . '</th>';
                    echo '</tr>';
                    echo '<tr class="cell">';
                        echo '<td>' . $row['artist_name'] . '</a></td>';
                        echo '<td>' . $row['price'] . '€</td>';
                
                    echo '</tr>';
                    echo '<tr>';
                        echo '<td>' . $row['email'] . '</td>';
                        echo '<td>' . $row['category'] . '</td>';
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
                        echo '<th colspan="2">Warenkorb</th>';
                    echo '</tr>';
                echo "</table>";
      //      echo "</button>";
            echo "</a>";
            echo "</div>";
    }
    // Verbindung schließen
} else {
    echo "Fehler bei der Abfrage: " . $connection->error;
}
// Verbindung schließen
$connection->close();
?>

</body>

</html>

