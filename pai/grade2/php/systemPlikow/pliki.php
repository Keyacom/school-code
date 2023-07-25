<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ćwiczenie - dostęp do systemu plików</title>
</head>
<body>
    <?php
    $fn = 'test.txt';
    $tekst = 'Pierwszy skrypt z wykorzystaniem operacji na plikach i katalogach w PHP' . PHP_EOL;
    touch($fn);
    if ($fd = fopen($fn, 'w')) {
        echo "Plik został otwarty do odczytu<br>";
        if (fwrite($fd, $tekst) !== false) {
            echo "Zapisano zawartość do pliku<br>";
            $wynik = fopen($fn, 'r');
            while (!feof($wynik)) {
                $w = fgets($wynik);
                echo $w;
            }
            fclose($wynik);
        } else {
            echo "Błąd zapisu do pliku<br>";
        }
    } else {
        echo "Nie udało się otworzyć pliku<br>";
    }
    ?>
</body>
</html>
