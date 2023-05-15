<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 5</title>
</head>
<body>
    <?php
    $sciezka = "C:\\xampp\\htdocs\\2TAmz2";
    $lista = array_filter(
        scandir($sciezka),
        fn ($dir) => !preg_match('/^\.+$/', $dir),
    );
    ?>
    <h1>Katalogi</h1>
    <?= implode('<br>', array_filter($lista, fn ($e) => is_dir($sciezka . '/' . $e))) ?>
    <h1>Pliki</h1>
    <?= implode('<br>', array_filter($lista, fn ($e) => is_file($sciezka . '/' . $e))) ?>
</body>
</html>