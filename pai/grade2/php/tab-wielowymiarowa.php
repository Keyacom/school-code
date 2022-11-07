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
    
    $osoby = [
        ['Adam', 'Nowak'],
        ['Kasia', 'Kowalska'],
        ['Damian', 'Wiśniewski']
    ];

    echo $osoby[1][0] . '<br>';

    $osoby[2][0] = 'Roman';

    foreach ($osoby as $os) {
        foreach ($os as $i) {
            echo "$i ";
        }
        echo "<br>";
    }

    echo '<pre>';
    print_r($osoby);
    echo '</pre>';

    ?>
</body>
</html>