--WICHTIG INFO: Dein DatenbankName sowie. TabellenName sollten mit deinen werten im PHP Skript uebereinstimmen.

CREATE DATABASE USER_DATA; --OPTIONAL: ...IF NOT EXIST [DATENBANKNAME]

CREATE TABLE USERS (    --OPTIONAL: CREATE TABLE IF NOT EXIST [TABELLENNAME]
    ID INT AUTO_INCREMENT PRIMARY KEY,
    NAME VARCHAR(255) NOT NULL,
    AGE INT NOT NULL,
    BIRTHDATE DATE NOT NULL
);