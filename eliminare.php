<?php
// Connessione al database
$conn = new mysqli('localhost', 'user', 'user123', 'gestionalemusicale');

// Controllo della connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Prendi il valore inviato dal form
$titolo = $_POST['titolo'];

// Query per eliminare un album
$sql = "DELETE FROM album WHERE `Titolo` = '$titolo'";

if ($conn->query($sql) === TRUE) {
    echo "Album eliminato con successo";
} else {
    echo "Errore durante l'eliminazione dell'album: " . $conn->error;
}

// Chiusura della connessione
$conn->close();
?>
