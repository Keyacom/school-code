<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Napisz opinię</title>
    <style>
        .error {
            color: red;
        }

        .info {
            color: blue;
        }
    </style>
</head>
<body>
    Dodaj komentarz... (max 255 znaków)<br>
    <?php
    function error($msg) {
        echo '<strong class="error">' . $msg . "</strong>";
    }

    const OPINIONS_FILENAME = "opinie_uzytkownikow.txt";

    if (isset($_POST['akcja'])) {
        if ($_POST['akcja'] == 'SUBMIT') {
            $fp = fopen(OPINIONS_FILENAME, 'a');
            if ($fp === false) {
                error("Błąd podczas otwierania pliku!");
            } else {
                $opinia = htmlentities($_POST['opinia']);
                if (fwrite($fp, $opinia . "<br>") === false) {
                    error("Błąd podczas zapisywania do pliku!");
                } else {
                    echo 'Dodano Twoją opinię <strong class="info">' . $opinia . "</strong> do bazy danych";
                }
                fclose($fp);
            }
        } elseif ($_POST['akcja'] == 'CLEAR') {
            // tryb 'w' wyczyszcza zawartość pliku
            $fp = fopen(OPINIONS_FILENAME, 'w');
            if ($fp === false) {
                error("Błąd podczas otwierania pliku!");
            } else {
                fclose($fp);
            }
        }
    }
    ?>
    <form method="post" id="formularz">
        <textarea name="opinia" rows="8" cols="80" maxlength="255"></textarea>
        <br>
        <button name="akcja" value="SUBMIT" type="submit">Prześlij</button>
        <button name="akcja" value="CLEAR" type="submit">Wyczyść</button>
    </form>
    <pre>
<?php
if (file_exists(OPINIONS_FILENAME)) {
    echo file_get_contents(OPINIONS_FILENAME);
}
?>
    </pre>
    <script>
        document.querySelector("#formularz").addEventListener('submit', function (event) {
            let opinia = this.querySelector("[name='opinia']").value.trim()
            if (event.submitter.value == "SUBMIT" && !opinia) {
                event.preventDefault()
            }
        })
    </script>
</body>
</html>
