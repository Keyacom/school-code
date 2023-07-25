<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 2</title>
</head>
<body>
    <?php
    echo "Plik ";
    if (!is_file(__DIR__ . '/dane.txt')) {
        echo "nie ";
    }
    echo "istnieje";
    ?>
</body>
</html>