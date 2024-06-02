<?php
//Hier kommen deine Login daten sowie. Serverdaten rein. Bei XAMPP oder Lokalen Servern bitte diese beibehalten.
$servername = "localhost";
$username = "root";
$password = "";

$dbname = "user_data"; //Hier bitte drauf achten das der Datenbank Name der SELBE ist. Ansonsten wird die Datenbank nicht gefunden.

//Erzeuge eine Verbindung mit der Datenbank mit den obenstehenden Werten.
$conn = new mysqli($servername, $username, $password, $dbname);

//SEHR WICHTIG
//Hier kommen die von dir gesetzten POST Werte (Die du in deiner HTML hinterlegt hast) der Attribute rein. Achte auf die Beschriftung!
$name = $_POST['name'];
$age = $_POST['age'];
$birthdate = $_POST['birthdate'];

//SEHR WICHTIG
//Hier wird die SQL Abfrage gemacht um deine POST Werte in die Datenbank zu INSERTEN. Auch hier auf die Beschriftung achten!
$sql = "INSERT INTO users (name, age, birthdate) VALUES ('$name', $age, '$birthdate')";

//Wichtig fuer die Uebertragung der Daten
//Hier wird geguckt ob erfolgreich deine angegebenen Daten von deiner Webseite in die Datenbank verschoben/hinzugefuegt wurden.
$conn->query($sql);

//Hier wird die Verbindung nachdem das PHP Skript gelaufen ist beendet.
$conn->close();
?>
