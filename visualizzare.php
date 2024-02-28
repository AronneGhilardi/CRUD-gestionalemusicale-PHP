<?php
// Connessione al database
$conn = new mysqli('localhost', 'user', 'user123', 'gestionalemusicale');

// Controllo della connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Prendi il valore dell'ordinamento dalla query string
$ordinamento = $_GET['ordinamento'];

// Funzione per eseguire una query in base all'ordinamento richiesto
function eseguiQuery($conn, $sql) {
    $result = $conn->query($sql);

    // Output dei dati nella tabella
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Titolo</th><th>Anno d'uscita</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["Titolo"] . "</td>";
            echo "<td>" . $row["Anno d'uscita"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nessun risultato trovato";
    }
}

// Switch per gestire l'ordinamento richiesto
switch ($ordinamento) {
    case 'anno':
        // Visualizza tutti i pezzi in base all'anno d'uscita
        $anno = $_GET['anno'];
        $sql = "SELECT * FROM album WHERE `Anno d'uscita` = '$anno'";
        echo "<h2>Album usciti nell'anno $anno</h2>";
        eseguiQuery($conn, $sql);
        break;
    
    case 'artista':
        // Visualizza tutti i brani di un artista
        $artista = $_GET['artista'];
        $sql = "SELECT brani.Titolo, brani.Genere, album.`Titolo album`, album.`Anno d'uscita`, autori.Nome AS Artista, informazioni.Cognome AS 'Cognome Artista', informazioni.`Data di Nascita` AS 'Data di Nascita Artista', informazioni.Origini AS 'Origini Artista'
                FROM brani
                INNER JOIN `autori-brani` ON brani.Titolo = `autori-brani`.`Titolo brani`
                INNER JOIN album ON brani.`Titolo album` = album.Titolo
                INNER JOIN autori ON `autori-brani`.`Nome autori` = autori.Nome
                INNER JOIN informazioni ON autori.Nome = informazioni.`Nome autori`
                WHERE autori.Nome = '$artista'";
        echo "<h2>Brani di $artista</h2>";
        eseguiQuery($conn, $sql);
        break;
    
    case 'genere':
        // Visualizza tutti i brani di un genere
        $genere = $_GET['genere'];
        $sql = "SELECT brani.Titolo, brani.Genere, album.`Titolo album`, album.`Anno d'uscita`, autori.Nome AS Artista, informazioni.Cognome AS 'Cognome Artista', informazioni.`Data di Nascita` AS 'Data di Nascita Artista', informazioni.Origini AS 'Origini Artista'
                FROM brani
                INNER JOIN `autori-brani` ON brani.Titolo = `autori-brani`.`Titolo brani`
                INNER JOIN album ON brani.`Titolo album` = album.Titolo
                INNER JOIN autori ON `autori-brani`.`Nome autori` = autori.Nome
                INNER JOIN informazioni ON autori.Nome = informazioni.`Nome autori`
                WHERE brani.Genere = '$genere'";
        echo "<h2>Brani del genere $genere</h2>";
        eseguiQuery($conn, $sql);
        break;
    
    case 'album':
        // Visualizza tutti i brani di un album
        $album = $_GET['album'];
        $sql = "SELECT brani.Titolo, brani.Genere, album.`Titolo album`, album.`Anno d'uscita`, autori.Nome AS Artista, informazioni.Cognome AS 'Cognome Artista', informazioni.`Data di Nascita` AS 'Data di Nascita Artista', informazioni.Origini AS 'Origini Artista'
                FROM brani
                INNER JOIN `autori-brani` ON brani.Titolo = `autori-brani`.`Titolo brani`
                INNER JOIN album ON brani.`Titolo album` = album.Titolo
                INNER JOIN autori ON `autori-brani`.`Nome autori` = autori.Nome
                INNER JOIN informazioni ON autori.Nome = informazioni.`Nome autori`
                WHERE album.`Titolo album` = '$album'";
        echo "<h2>Brani dell'album $album</h2>";
        eseguiQuery($conn, $sql);
        break;

    case 'data_nascita_asc':
        // Visualizza tutti i dati in base alla data di nascita di un artista in ordine crescente
        $sql = "SELECT brani.Titolo, brani.Genere, album.`Titolo album`, album.`Anno d'uscita`, autori.Nome AS Artista, informazioni.Cognome AS 'Cognome Artista', informazioni.`Data di Nascita` AS 'Data di Nascita Artista', informazioni.Origini AS 'Origini Artista'
                FROM brani
                INNER JOIN `autori-brani` ON brani.Titolo = `autori-brani`.`Titolo brani`
                INNER JOIN album ON brani.`Titolo album` = album.Titolo
                INNER JOIN autori ON `autori-brani`.`Nome autori` = autori.Nome
                INNER JOIN informazioni ON autori.Nome = informazioni.`Nome autori`
                ORDER BY informazioni.`Data di Nascita` ASC";
        echo "<h2>Dati degli artisti in ordine crescente per data di nascita</h2>";
        eseguiQuery($conn, $sql);
        break;

    case 'data_nascita_desc':
        // Visualizza tutti i dati in base alla data di nascita di un artista in ordine decrescente
        $sql = "SELECT brani.Titolo, brani.Genere, album.`Titolo album`, album.`Anno d'uscita`, autori.Nome AS Artista, informazioni.Cognome AS 'Cognome Artista', informazioni.`Data di Nascita` AS 'Data di Nascita Artista', informazioni.Origini AS 'Origini Artista'
                FROM brani
                INNER JOIN `autori-brani` ON brani.Titolo = `autori-brani`.`Titolo brani`
                INNER JOIN album ON brani.`Titolo album` = album.Titolo
                INNER JOIN autori ON `autori-brani`.`Nome autori` = autori.Nome
                INNER JOIN informazioni ON autori.Nome = informazioni.`Nome autori`
                ORDER BY informazioni.`Data di Nascita` DESC";
        echo "<h2>Dati degli artisti in ordine decrescente per data di nascita</h2>";
        eseguiQuery($conn, $sql);
        break;

    default:
        echo "Ordinamento non valido";
}

// Chiusura della connessione
$conn->close();
?>
