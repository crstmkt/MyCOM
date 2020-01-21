<?php

    $host = "localhost"; // Adresse des Datenbankservers, meistens localhost
    $user = "root"; // Ihr MySQL Benutzername
    $pass = ""; // Ihr MySQL Passwort
    $db = "mycom"; // Name der Datenbank
    
    $link = mysql_connect($host, $user, $pass) 
    or die 
    ("Keine Verbindung zu der Datenbank möglich.");
    
    mysql_select_db($db, $link);

?>
