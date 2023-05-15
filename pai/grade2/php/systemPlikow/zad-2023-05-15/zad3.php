<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 3</title>
</head>
<body>
    <?php
    $sciezka = 'C:\Windows\explorer.exe';
    $rozmiar = filesize($sciezka) / 2**20;
    echo "Rozmiar $sciezka: {$rozmiar} GB";
    ?>
</body>
</html>