<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontynenty</title>
</head>
<body>
    <?php
    $kontynenty = [
        'Afryka' => ['Egipt', 'Tunezja', 'Maroko', 'Kenia'],
        'Azja' => ['Chiny', 'Indie', 'Japonia', 'Korea Południowa'],
        'Europa' => ['Polska', 'Niemcy', 'Francja', 'Włochy'],
        'Ameryka Południowa' => ['Argentyna', 'Brazylia', 'Chile', 'Kolumbia']
    ];

    foreach ($kontynenty as $nazwa => $kraje) {
        echo "$nazwa: ";
        foreach($kraje as $kraj) {
            echo "$kraj, ";
        }
        echo '<br>';
    }
    ?>
</body>
</html>