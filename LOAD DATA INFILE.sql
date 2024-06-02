LOAD DATA INFILE '[Dateiname].csv' INTO TABLE USERS FIELDS TERMINATED BY ',' ENCLOSED BY '"' LINES TERMINATED BY '\r\n' IGNORE 1 LINES;

-- Erklaerungen:

-- LOAD DATA: Beschreibt das wir eine Datei lade wollen. (Mehr macht es nicht).
-- INFILE: Beschreibe das wir eine Datei in die Datenbank mit den gegebenen Datensaetzen Speichern wollen.
-- '[Dateiname].csv': Beschreibt die Datei welche Gespeichert werden soll.
-- INTO TABLE: Beschreibt die Tabelle in der die Datensaetze/Werte eingetragen werden sollen.
-- USERS: Ist hier die gegebene [DatenbankTabelle]. Diese aendern wenn eure anders heisst.

-- FIELDS TERMINATED BY ',': Beschreibt die auseinandersetzung mehrerer Datensaetze. (Siehe unten beispiel.)

-- Name: Max Mustermann                   Email: MaxMustermann@gmail.com
-- Normale Ausgabe: Max_MustermanMaxMustermann@gmail.com -> Mit TERMINATED BY => Max_Mustermann, MaxMustermann@gmail.com


-- ENCLOSED BY '"': Beschreibt die beigefuegten Texte in einen Datensatz, diese werden dann mitgenommen (Siehe Beispiel)


-- Name: Max "Mustermann"

-- Normale Ausgabe: Max -> Mit ENCLOSED BY => Max Mustermann


-- LINES TERMINATED BY '\r\n': Beschreibt einfach wenn mehrere Datensaetze existieren das man nach jedem dieser einen Zeilenumbruch macht. In etwas wie in HTML <br>

-- INGORE [Line] LINES: Ignoriert die angegebenen Linien/Datensaetze deiner CSV datei.