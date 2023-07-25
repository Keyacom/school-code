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
    $sciezka = 'dane.txt';
    if (file_put_contents($sciezka, implode(PHP_EOL, ['Wojciech', 'Marzec']) . PHP_EOL)) {
        $fd = fopen($sciezka, 'r');
        while ($c = fgetc($fd)) {
            echo $c;
        }
    }
    ?>
</body>
</html>