<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Benutzerseite</title>
</head>
<body>
    <h1>Benutzerliste</h1>
    <!--ANFANG Der Aufgabe wo man Daten eintragen kann und diese dann an die Datenbank Verschickt werden. BITTE NIMMT DIE "submit.php" INBEZUG!-->
    <form action="submit.php" method="POST"> <!--Hier wird dein PHP abgeholt
        und mit deinen POST werten abgeschickt. "required" heisst
        das dass Feld PFLICHT ist. (NOT NULL in etwa)-->
        <label for="name">Name:</label> <!--Aufschrift fuer "NAME"-->
        <input type="text" id="name" name="name" required><br><br>
        <label for="age">Age:</label> <!--Aufschrift fuer "AGE"-->
        <input type="number" id="age" name="age" required><br><br>
        <label for="birthdate">Birthdate:</label> <!--Aufschrift fuer "BIRTHDATE"-->
        <input type="date" id="birthdate" name="birthdate" required><br><br>
        <!--WICHTIG: Das Attribut "name=" beschreibt die von dir gesetzten PHP
        Attribute, diese defenieren also deine Werte der Datenbank eintraege.-->
        <input type="submit" value="Submit"><br><br> <!--WICHTIG: 'type="submit"'
        muss bleiben! Er macht das die Daten verschickt werden in die Datenbank,
        VALUE Darf ruhig geaendert werden.-->
    </form>
    <!--ANFANG Der Aufgabe wo die Daten aus einer Datenbank abgelesen werden und diese auf der Seite dargestellt werden. Beachtet eure Tabellennamen und Datensaetze!-->
    <table border="1">
        <!--Hier wird ueber HTML eine tabelle mit den jeweils gewollten Daten angezeigt und visualisiert. Sie dient dazu die Daten aus der Datenbank spaeter einzutragen!-->
        <thead>
            <tr>
                <th>ID</th> <!--Eigene Tabelle fuer die ID's-->
                <th>Name</th> <!--Eigene Tabelle fuer die Namen-->
                <th>Alter</th> <!--Eigene Tabelle fuer das Alter-->
                <th>Geburtsdatum</th> <!--Eigene Tabelle fuer Geburtsdatum-->
            </tr>
        </thead>
        <!--Hier ist der PHP Abteil der dafuer sorgt um die Daten aus der Datenbank in die 4 Tabellen (siehe oben) einzutragen.-->
        <tbody>
            <?php
            //Serverdaten bzw. die Verbindungsdaten der Datenbank. Hier ist wichtig das der [DatenbankName] uebereinstimmt mit eurer existierenden!
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "user_data";
 
            //Hier wird die Verbindung zur Datenbank hergestellt mit den oben stehenden Daten!
            $conn = new mysqli($servername, $username, $password, $dbname);
 
            //Hier wird jetzt die Abfrage gemacht und alle existierenden Datenbank Datensaetze abgeholt und abgelesen.
            //WICHTIG: Genau die gleichen Atttribute nutzen die ihr fuer eure Datenbank genutzt habt. Die koennt ihr in eurer Tabellenstruktur angucken! (PhpMyAdmin)
            $sql = "SELECT id, name, age, birthdate FROM users";
            //Hier wird gesagt das alle Ergebnisse nun genutzt werden.
            $result = $conn->query($sql);
 
            //Nun erstellen wir hier anhand von PHP die gewollte Tabellen Struktur mit den 4 Oben stehen Tabellen.
            if ($result->num_rows > 0) {
                // Daten aus jeder Zeile ausgeben
                while($row = $result->fetch_assoc()) {
                    //WICHTIG: Hier sollten eure MySQL Datensaetze Columns stehen. Sprich wie im SELECT befehl: id, name, age, birthdate
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>"; //ID werden eingelesen.
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>"; //Name wird eingelesen.
                    echo "<td>" . htmlspecialchars($row['age']) . "</td>"; //Alter(Age) wird eingelesen.
                    echo "<td>" . htmlspecialchars($row['birthdate']) . "</td>"; //Geburtsdatum(birthdate) wird eingelesen.
                    echo "</tr>";
                }
            //Wenn keine Ergebnisse existieren oder ein Fehler erscheint gib folgendes aus:...
            } else {
                echo "Keine Ergebnisse"; //Hier also "Keine Ergebnisse"
            }
            //Hier wird die Verbindung nach ablauf des Skriptes Beendet.
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>

<!--Hier findest nochmal das MySQL Skript fuer die Datenbank!-->
<!--*WICHTIG INFO: Dein DatenbankName sowie. TabellenName sollten mit deinen werten im PHP Skript uebereinstimmen.

CREATE DATABASE USER_DATA; --OPTIONAL: ...IF NOT EXIST [DATENBANKNAME]

CREATE TABLE USERS (    --OPTIONAL: CREATE TABLE IF NOT EXIST [TABELLENNAME]
    ID INT AUTO_INCREMENT PRIMARY KEY,
    NAME VARCHAR(255) NOT NULL,
    AGE INT NOT NULL,
    BIRTHDATE DATE NOT NULL
);*-->