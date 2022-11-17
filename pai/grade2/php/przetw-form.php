<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz</title>
    <style>
        label {
            display: block;
        }
    </style>
</head>
<body>
    <fieldset>
        <form action="przetw-form.php" method="post">
            <h1>Formularz kontaktowy</h1>
            <label for="imie">Imię:</label>
            <input name="imie" id="imie">
            <label for="nazwisko">Nazwisko:</label>
            <input name="nazwisko" id="nazwisko">
            <label for="zawod">Zawód:</label>
            <input name="zawod" id="zawod">
            <label for="email">Adres e-mail:</label>
            <input name="email" id="email" type="email">
            <h3>Wykształcenie:</h3>
            <label><input name="wykszt" type="radio" value="podst"> podstawowe</label>
            <label><input name="wykszt" type="radio" value="sred"> średnie</label>
            <label><input name="wykszt" type="radio" value="wyz"> wyższe</label>
            <h3><label for="jezyki">Wybór języka:</label></h3>
            <select name="jezyki[]" id="jezyki" multiple size="4">
                <option value="en">Język angielski</option>
                <option value="de">Język niemiecki</option>
                <option value="fr">Język francuski</option>
                <option value="it">Język włoski</option>
                <option value="ru">Język rosyjski</option>
                <option value="es">Język hiszpański</option>
                <option value="el">Język grecki</option>
            </select>
            <label><input name="do" type="checkbox">Zgadzam się na przetwarzanie moich danych osobowych</label>
            <textarea name="wiad" rows="4" cols="50"></textarea><br>
            <button name="ok">Wyślij</button>
            <button type="reset">Resetuj</button>
        </form>
    </fieldset>
    <?php
    if ( !isset( $_POST['ok'] ) ) die;

    $spr_imie = '/^[A-Z][a-z]{2,}$/';

    $imie = trim($_POST['imie']);
    if ($imie === '') {
        echo "Nie podano imienia!<br>";
    } else {
        if ( preg_match($spr_imie, $imie) ) {
            echo "Imię: $imie<br>";
        } else {
            echo "Imię jest niepoprawne!<br>";
        }
    }

    $nazwisko = trim($_POST['nazwisko']);
    if ($nazwisko === '') {
        echo "Nie podano nazwiska!<br>";
    } else {
        echo "Nazwisko: $nazwisko<br>";
    }

    $zawód = trim($_POST['zawod']);
    if ($zawód === '') {
        echo "Nie podano zawodu!<br>";
    } else {
        echo "Zawód: $zawod<br>";
    }

    $email = $_POST['email'];
    if ($email === '') {
        echo "Nie podano adresu e-mail!<br>";
    } else {
        echo "Adres e-mail: $email<br>";
    }

    $wykształcenie = isset($_POST['wykszt']);
    if (!$wykształcenie) {
        echo "Nie podano wykształcenia!<br>";
    } else {
        echo "Wykształcenie: $wykształcenie<br>";
    }
    
    if (isset($_POST['jezyki']) && gettype($_POST['jezyki']) === 'array') {
        $języki = implode(', ', $_POST['jezyki']);
        echo "Języki: $języki<br>";
    } else {
        echo "Nie podano języków!<br>";
    }

    if (empty($_POST['do'])) {
        echo "Nie wyrażono zgody na przetwarzanie danych osobowych!<br>";
    } else {
        echo "Wyrażono zgodę na przetwarzanie danych osobowych.<br>";
    }

    $wiadomość = htmlentities(trim($_POST['wiad']));
    if (empty($wiadomość)) {
        echo "Nie podano wiadomości!";
    } else {
        echo "Wiadomość: <pre>$wiadomość</pre>";
    }
    ?>
</body>
</html>