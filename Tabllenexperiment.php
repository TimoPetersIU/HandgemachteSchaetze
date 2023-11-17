<!DOCTYPE html>
<html>
    <head>
    <link href="tebllen.css" rel="stylesheet" type="text/css" media="screen" />
    </head>
    <body class="choice_body">
            <div class="">
                <div class="">
                    <h1>Unsere Künstler</h1>
                </div>
                <div class="container">
                    <div class="table_div container">
                        <?php
                         require("connection.php");
                            
                            // Verbindung zur Datenbank herstellen
                           
                            
                            // Überprüfen, ob die Verbindung erfolgreich hergestellt wurde
                            if ($connection->connect_error) {
                                die("Connection failed: " . $connection->connect_error);
                            }
// max seite, mAIN hubsch, mehr bildes, kommentieren
                            $sql = "SELECT * FROM products where availability = 1";

                            // Die Abfrage ausführen und das Ergebnis speichern
                            $result = $connection->query($sql);
                            
                            // Überprüfen, ob die Abfrage erfolgreich war
                            if ($result) {
                                // Daten der Db als Tabelle ausgeben und auf der Webseite anzeigen
                                while ($row = $result->fetch_assoc()) {
                                    if(!file_exists("Bildes/" . $row['img_path']) || empty($row['img_path'])){
                                    $row['img_path'] = 'noimage.png';
                                    }
                                        echo "<div class='klick'>";
                                        echo "<a href='Product/product.php?id=$row[id]'> ";
                                    //    echo" <button class='choice_btn' >";
                                            echo "<table class='choice_table' cellspacing=0 cellpadding=0>";
                                            echo "<tr>";
                                            echo "<th class='td pname'>". $row["pname"]."</th>";
                                            echo "</tr>";
                                            echo "<tr>";
                                            echo "<td class='td Preis'>"."Preis: ". $row["price"]. " €"."</td>";
                                         
                                            echo "</tr>";
                                            echo "<tr>";
                                            echo '<td colspan="2"><div class = "product_image" style="background-image:url(Bildes/' . $row['img_path'] . ');"></div></td>';
                                           // " alt="bild von ' . $row['pname'] . '">
                                            echo "</tr>";
                                            echo "<tr>";
                                        
                                            echo "<td class='td Künstler'>". $row["category"]." by " . $row["artist_name"]."</td>";
                                            echo "</tr>";
                                           
                                            echo "</table>";
                                  //      echo "</button>";
                                        echo "</a>";
                                        echo "</div>";
                                }
                                // Verbindung schließen
                                $connection->close();
                            } else {
                                echo "Fehler bei der Abfrage: " . $connection->error;
                            }
                        ?> 
                    </div>
                </div>
            </div>
    </body>
</html>