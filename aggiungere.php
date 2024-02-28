<?php
// Connessione al database
$conn = new mysqli('localhost', 'user', 'user123', 'gestionalemusicale');

// Controllo della connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Prendi i valori inviati dal form
$titolo = $_POST['titolo'];
$anno = $_POST['anno'];

// Query per aggiungere un nuovo album
$sql = "INSERT INTO album (`Titolo`, `Anno d'uscita`) VALUES ('$titolo', '$anno')";

if ($conn->query($sql) === TRUE) {
    echo "Nuovo album aggiunto con successo";
} else {
    echo "Errore durante l'aggiunta dell'album: " . $conn->error;
}

// Chiusura della connessione
$conn->close();
?>
