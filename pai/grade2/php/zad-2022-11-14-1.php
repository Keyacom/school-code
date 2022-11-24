<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $slowo = 'Jestem';

    $tekst = <<<TX
    Jestem dobry z programowania.
    Jestem systematyczny.
    Jestem odważny.
    Jestem empatyczny.
    A na to mama: Jestem przy Twojej babci.
    TX;

    echo '<p>' . nl2br($tekst) . '</p>';

    $dopasowania = 0;
    $dopasowano = boolval(strstr($tekst, $slowo));

    while ($dopasowano) {
        $nowy_tekst = substr(strstr($tekst, $slowo), strlen($slowo));
        if ( $nowy_tekst === false ) {
            $dopasowano = false;
            break;
        } else {
            $dopasowania++;
            $tekst = $nowy_tekst;
        }
    }

    echo "Słowo '$slowo' znaleziono $dopasowania razy.";
    ?>
</body>
</html>