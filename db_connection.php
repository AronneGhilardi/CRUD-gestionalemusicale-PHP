<?php
$db_host = 'localhost'; // Indirizzo del server del database
$db_name = 'gestionalemusicale'; // Nome del database
$db_user = '123'; // Nome utente del database
$db_password = '123'; // Password del database

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Errore di connessione al database: " . $e->getMessage();
    die();
}
?>