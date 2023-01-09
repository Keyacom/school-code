<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <?php # Dla PHP starszego niż wersja 8
    $FORM_IS_FILLED = isset( $_POST['ok'] );

    $spr = [
        'imie' => '/^[A-ZĄĆĘŁŃÓŚŹŻ][a-ząćęłńóśźż]{2,}$/u',
        'nazwisko' => '/^[A-ZĄĆĘŁŃÓŚŹŻ][a-ząćęłńóśźż]{2,}(?:-[A-ZĄĆĘŁŃÓŚŹŻ][a-ząćęłńóśźż]{2,})?$/u',
        'zawod' => '/^[a-ząćęłńóśźż]{3,}$/u',
        'email' => '/^[\w.-]+@[\w.-]+\.[a-z]{2,3}$/i', # \w to to samo, co [A-Za-z0-9_]
        'tel' => '/[0-9]{9}/',
    ];

    /**
     * Validates a form field.
     * 
     * @param mixed $post The reference to POST data from the form.
     * @param string $regexp The regular expression to check against. Default: `/(?:)/`
     * @param string $type The form field's data type. Default: `text`
     * @return string `is-valid` or `is-invalid`. This is a class name used by Bootstrap. If form checking is disabled e.g. with the `$FORM_IS_FILLED` variable, returns an empty string.
     */
    function validate($post, string $regexp = '/(?:)/', string $type = 'text'): string {
        # Workaround because you can't use expressions that depend
        # on variables as default arguments (must be known at
        # compile time)
        global $FORM_IS_FILLED;
        if ( !$FORM_IS_FILLED ) {
            return '';
        }
        $fn = function ($in) { return $in !== ''; };
        if ( array_search( $type, ['select', 'checkbox', 'radio', 'button'] ) ) {
            $fn = function ( $in ) { return isset( $in ); };
        }
        $in = $post;
        if ( is_array( $post ) ) {
            if ( empty( $in ) ) {
                return 'is-invalid';
            }
        } else {
            if ( !$fn( $in ) || !preg_match( $regexp, $post ) ) {
                return 'is-invalid';
            }
        }
        return 'is-valid';
    }
    ?>
    <fieldset>
        <form action="przetw-form.php" method="post">
            <h1>Formularz kontaktowy</h1>
            <div class="form-group">
                <label for="imie">Imię:</label>
                <input name="imie" id="imie" class="form-control <?php isset( $_POST['imie'] ) && print validate(trim($_POST['imie']), $spr['imie']); ?>" placeholder="Imię">
            </div>
            <div class="form-group">
                <label for="nazwisko">Nazwisko:</label>
                <input name="nazwisko" id="nazwisko" class="form-control <?php isset( $_POST['nazwisko'] ) && print validate(trim($_POST['nazwisko']), $spr['nazwisko']); ?>" placeholder="Nazwisko">
            </div>
            <div class="form-group">
                <label for="zawod">Zawód:</label>
                <input name="zawod" id="zawod" class="form-control <?php isset( $_POST['zawod'] ) && print validate(trim($_POST['zawod']), $spr['zawod']); ?>" placeholder="Zawód">
            </div>
            <div class="form-group">
                <label for="email">Adres e-mail:</label>
                <input name="email" id="email" type="email" class="form-control <?php isset( $_POST['email'] ) && print validate(trim($_POST['email']), $spr['email']); ?>" placeholder="Adres e-mail">
            </div>
            <div class="form-group">
                <label for="tel">Numer telefonu:</label>
                <input name="tel" id="tel" class="form-control <?php isset( $_POST['tel'] ) && print validate(trim($_POST['tel']), $spr['tel']); ?>" placeholder="Numer telefonu">
            </div>
            <h3>Wykształcenie:</h3>
            <div class="form-check">
                <input class="form-check-input <?php echo validate( isset( $_POST['wykszt'] ) ? $_POST['wykszt'] : ''); ?>" name="wykszt" type="radio" value="podst" id="podst">
                <label class="form-check-label" for="podst">podstawowe</label>
            </div>
            <div class="form-check">
                <input class="form-check-input <?php echo validate( isset( $_POST['wykszt'] ) ? $_POST['wykszt'] : ''); ?>" name="wykszt" type="radio" value="sred" id="sred">
                <label class="form-check-label" for="sred">średnie</label>
            </div>
            <div class="form-check">
                <input class="form-check-input <?php echo validate( isset( $_POST['wykszt'] ) ? $_POST['wykszt'] : ''); ?>" name="wykszt" type="radio" value="wyz" id="wyz">
                <label class="form-check-label" for="wyz">wyższe</label>
            </div>
            <h3><label for="jezyki">Wybór języka:</label></h3>
            <select name="jezyki[]" id="jezyki" class="custom-select <?php echo validate( isset( $_POST['jezyki'] ) ? $_POST['jezyki'] : [], type: 'select'); ?>" multiple size="4">
                <option value="en">Język angielski</option>
                <option value="de">Język niemiecki</option>
                <option value="fr">Język francuski</option>
                <option value="it">Język włoski</option>
                <option value="ru">Język rosyjski</option>
                <option value="es">Język hiszpański</option>
                <option value="el">Język grecki</option>
            </select>
            <label for="wiad">Dodaj komentarz:</label>
            <textarea class="form-control <?php isset( $_POST['wiad'] ) && print validate(trim($_POST['wiad'])); ?>" id="wiad" name="wiad" rows="4" cols="50" placeholder="Wiadomość"></textarea>
            <div class="form-check">
                <input name="do" id="do" class="form-check-input <?php echo validate(empty( $_POST['do'] ) ? '' : '+'); ?>" type="checkbox">
                <label class="form-check-label" for="do">Zgadzam się na przetwarzanie moich danych osobowych</label>
            </div>
            <button name="ok" type="submit" class="btn btn-primary">Wyślij</button>
            <button type="reset" class="btn btn-primary">Resetuj</button>
        </form>
    </fieldset>
    <?php
    if ( !isset( $_POST['ok'] ) ) die;

    $imie = trim($_POST['imie']);
    if ($imie === '') {
        echo "Nie podano imienia!<br>";
    } else {
        if ( preg_match($spr['imie'], $imie) ) {
            echo "Imię: $imie<br>";
        } else {
            echo "Imię jest niepoprawne!<br>";
        }
    }

    $nazwisko = trim($_POST['nazwisko']);
    if ($nazwisko === '') {
        echo "Nie podano nazwiska!<br>";
    } else {
        if ( preg_match($spr['nazwisko'], $nazwisko) ) {
            echo "Nazwisko: $nazwisko<br>";
        } else {
            echo "Nazwisko jest niepoprawne!<br>";
        }
    }

    $zawód = trim($_POST['zawod']);
    if ($zawód === '') {
        echo "Nie podano zawodu!<br>";
    } else {
        if ( preg_match($spr['zawod'], $zawód) ) {
            echo "Zawód: $zawód<br>";
        } else {
            echo "Zawód jest niepoprawny!<br>";
        }
    }

    $email = $_POST['email'];
    if ($email === '') {
        echo "Nie podano adresu e-mail!<br>";
    } else {
        if ( preg_match($spr['email'], $email) ) {
            echo "Adres e-mail: $email<br>";
        } else {
            echo "Adres e-mail jest niepoprawny!<br>";
        }
    }

    $wykszt = [
        'podst' => 'podstawowe',
        'sred' => 'średnie',
        'wyz' => 'wyższe'
    ];

    $wykształcenie = isset($_POST['wykszt']);
    if (!$wykształcenie) {
        echo "Nie podano wykształcenia!<br>";
    } else {
        echo 'Wykształcenie: ' . $wykszt[ $_POST['wykszt'] ] . '<br>';
    }

    $kody_jezykow = [
        'en' => 'angielski',
        'de' => 'niemiecki',
        'fr' => 'francuski',
        'it' => 'włoski',
        'ru' => 'rosyjski',
        'es' => 'hiszpański',
        'el' => 'grecki'
    ];
    
    if (isset($_POST['jezyki']) && gettype($_POST['jezyki']) === 'array') {
        $lista_jezykow = [];
        foreach ( $_POST['jezyki'] as $j ) {
            $lista_jezykow[] = $kody_jezykow[$j];
        }
        $języki = implode(', ', $lista_jezykow);
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