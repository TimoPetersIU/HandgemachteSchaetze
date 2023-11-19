<!--====================================================================== Dominik Skalka ===================================================================================================>>-->
<!DOCTYPE html>
<html>
    <head>
    <link href="../tebllen.css" rel="stylesheet" type="text/css" media="screen" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(function () {
            $("#includeNavbar").load("./assets/includes/navbar.html");
        });
    </script>
    </head>
    <body class="choice_body">
    <div id="includeNavbar"></div>
         
                
                  
              
                <div class="container">
                    <div class="table_div container">
                        <?php
                         require("connection.php");
                     
                            // Überprüfen, ob die Verbindung erfolgreich hergestellt wurde
                            if ($connection->connect_error) {
                                die("Connection failed: " . $connection->connect_error);
                            }
                            $sql = "SELECT * FROM products where available = 1";

                            // Die Abfrage ausführen und das Ergebnis speichern
                            $result = $connection->query($sql);
                            
                            if ($result) {
                                while ($row = $result->fetch_assoc()) {
                                    if(!file_exists("../Bildes/" . $row['img_path']) || empty($row['img_path'])){
                                    $row['img_path'] = 'noimage.png';
                                    }
                                        echo "<div class='klick'>";
                                        echo "<a href='../Product/product.php?id=$row[id]'> ";
                                            echo "<table class='choice_table' cellspacing=0 cellpadding=0>";
                                            echo "<tr>";
                                            echo "<th class='td pname'>". $row["pname"]."</th>";
                                            echo "</tr>";
                                            echo "<tr>";
                                            echo "<td class='td Preis'>"."Preis: ". $row["price"]. " €"."</td>";
                                         
                                            echo "</tr>";
                                            echo "<tr>";
                                            echo '<td colspan="2"><div class = "product_image" style="background-image:url(../Bildes/' . $row['img_path'] . ');"></div></td>';

                                            echo "</tr>";
                                            echo "<tr>";
                                        
                                            echo "<td class='td Künstler'>". $row["category"]." by <a href='../Product/product.php?artist_name=".$row['artist_name']."'>" . $row['artist_name'] ."</a></td>";
                                            echo "</tr>";
                                           
                                            echo "</table>";

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
         
    </body>
</html>
<!--========================================================================================================================================================================================================================================-->