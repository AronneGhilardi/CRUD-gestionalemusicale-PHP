<?php
// Connessione al database
$servername = "localhost";
$username = "123";
$password = "123";
$database = "gestionalemusicale";

$conn = new mysqli($servername, $username, $password, $database);

// Controlla la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Operazioni CRUD per i brani
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $azione = $_POST["azione"];
    $entita = $_POST["entita"];

    if ($azione == "aggiungi") {
        if ($entita == "brano") {
            $titolo_brano = $_POST["titolo_brano"];
            $genere_brano = $_POST["genere_brano"];
            $titolo_album = $_POST["titolo_album_brano"];
            $sql = "INSERT INTO brani (Titolo, Genere, `Titolo album`) VALUES ('$titolo_brano', '$genere_brano', '$titolo_album')";
            if ($conn->query($sql) === TRUE) {
                echo "Brano aggiunto con successo.";
            } else {
                echo "Errore durante l'aggiunta del brano: " . $conn->error;
            }
        } elseif ($entita == "album") {
            $titolo_album = $_POST["titolo_album"];
            $anno_uscita_album = $_POST["anno_uscita_album"];
            $sql = "INSERT INTO album (Titolo, `Anno d'uscita`) VALUES ('$titolo_album', '$anno_uscita_album')";
            if ($conn->query($sql) === TRUE) {
                echo "Album aggiunto con successo.";
            } else {
                echo "Errore durante l'aggiunta dell'album: " . $conn->error;
            }
        } elseif ($entita == "artista") {
            $nome_artista = $_POST["nome_artista"];
            $sql = "INSERT INTO autori (Nome) VALUES ('$nome_artista')";
            if ($conn->query($sql) === TRUE) {
                echo "Artista aggiunto con successo.";
            } else {
                echo "Errore durante l'aggiunta dell'artista: " . $conn->error;
            }
        }
    } elseif ($azione == "modifica") {
        // Codice per modificare un'entità nel database
    } elseif ($azione == "elimina") {
        // Codice per eliminare un'entità dal database
    }
}

// Chiusura della connessione
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione Dati Musicali</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        h2 {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        select, input[type="text"], input[type="number"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <h2>Gestione Dati Musicali</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="azione">Azione:</label>
        <select name="azione" id="azione">
            <option value="aggiungi">Aggiungi</option>
            <option value="modifica">Modifica</option>
            <option value="elimina">Elimina</option>
        </select>

        <label for="entita">Entità:</label>
        <select name="entita" id="entita">
            <option value="brano">Brano</option>
            <option value="album">Album</option>
            <option value="artista">Artista</option>
        </select>

        <!-- Campi specifici per l'entità selezionata -->
        <div id="campi_specifici"></div>

        <input type="submit" value="Esegui">
    </form>

    <script>
        // Aggiungi event listener per cambiamenti nella selezione dell'entità
        document.getElementById("entita").addEventListener("change", function() {
            var entita = this.value;
            var campiSpecifici = document.getElementById("campi_specifici");
            campiSpecifici.innerHTML = ""; // Pulisce i campi specifici al cambiare dell'entità

            // Aggiunge i campi specifici in base all'entità selezionata
            if (entita === "brano") {
                campiSpecifici.innerHTML = `
                    <label for="titolo_brano">Titolo Brano:</label>
                    <input type="text" id="titolo_brano" name="titolo_brano" required>
                    <label for="genere_brano">Genere Brano:</label>
                    <input type="text" id="genere_brano" name="genere_brano" required>
                    <label for="titolo_album_brano">Titolo Album:</label>
                    <input type="text" id="titolo_album_brano" name="titolo_album_brano" required>
                `;
            } else if (entita === "album") {
                campiSpecifici.innerHTML = `
                    <label for="titolo_album">Titolo Album:</label>
                    <input type="text" id="titolo_album" name="titolo_album" required>
                    <label for="anno_uscita_album">Anno Uscita Album:</label>
                    <input type="number" id="anno_uscita_album" name="anno_uscita_album" required>
                `;
            } else if (entita === "artista") {
                campiSpecifici.innerHTML = `
                    <label for="nome_artista">Nome Artista:</label>
                    <input type="text" id="nome_artista" name="nome_artista" required>
                `;
            }
        });
    </script>
</body>
</html>
