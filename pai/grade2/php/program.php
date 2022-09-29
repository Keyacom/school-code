<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pierwszy program w PHP</title>
</head>
<body>
    <?php
    $a = 1;
    $b = 100;
    $tekst = "Pierwszy program: $a<br>";
    echo $tekst;
    echo 'Pierwszy program: ' . $a . ' ' . $b;
    ?>
</body>
</html>