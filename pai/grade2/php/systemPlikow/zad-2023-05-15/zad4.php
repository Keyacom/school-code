<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 4</title>
</head>
<body>
    <?php
    $sciezka = 'dane.txt';
    if (!is_file($sciezka)) {
        touch($sciezka);
        echo "Utworzono plik";
    } else {
        unlink($sciezka);
        echo "Usunięto plik";
    }
    ?>
</body>
</html>