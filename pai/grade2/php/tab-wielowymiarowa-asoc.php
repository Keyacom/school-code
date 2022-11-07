<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablice wielowymiarowe</title>
</head>
<body>
    <?php

    $dane = [
        [
            'imie' => 'Jan',
            'nazwisko' => 'Kowalski',
            'wiek' => 30
        ],
        [
            'imie' => 'Kamil',
            'nazwisko' => 'Kozłowski',
            'wiek' => 20
        ],
        [
            'imie' => 'Roman',
            'nazwisko' => 'Nowak',
            'wiek' => 40
        ]
    ];

    #echo $dane[0]['nazwisko'];

    #$dane[1]['imie'] = 'Kasia';

    foreach ($dane as $os) {
        foreach ($os as $i) {
            echo "$i ";
        }
        echo '<br>';
    }

    ?>
</body>
</html>