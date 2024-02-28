<?php
// Connessione al database
$conn = new mysqli('localhost', 'user', 'user123', 'gestionalemusicale');

// Controllo della connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Prendi i valori inviati dal form
$titolo = $_POST['titolo'];
$nuovoAnno = $_POST['nuovo_anno'];

// Query per modificare l'anno di un album esistente
$sql = "UPDATE album SET `Anno d'uscita` = '$nuovoAnno' WHERE `Titolo` = '$titolo'";

if ($conn->query($sql) === TRUE) {
    echo "Anno dell'album modificato con successo";
} else {
    echo "Errore durante la modifica dell'anno dell'album: " . $conn->error;
}

// Chiusura della connessione
$conn->close();
?>
