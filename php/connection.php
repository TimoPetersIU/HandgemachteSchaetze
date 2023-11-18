<?php
// Verbindungsinformationen für die Datenbank
$servername = "localhost"; // Hostname des Datenbankservers
$user = "root"; // Benutzername für die Datenbankverbindung
$password = ""; // Passwort für die Datenbankverbindung
$db = "HandgemachteSchaetze"; // Name der Datenbank

// Erstellung einer neuen MySQLi-Verbindung
$connection = new mysqli($servername, $user, $password, $db);

// Überprüfung auf erfolgreiche Verbindung
if ($connection->connect_error) {
    // Ausgabe einer Fehlermeldung und Abbruch des Skripts bei fehlgeschlagener Verbindung
    die("FAILED " . $connection->connect_error);
}
?>
