<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablice</title>
</head>
<body>
    <?php
    $tab = [5, 2, 3, 1, 4];
    $tab2 = array(4, 1, 5, 2, 3);
    $doTablicy = "/usr/bin:/bin:/usr";
    print_r($tab);
    sort($tab);
    echo "<br>";
    print_r($tab);

    $tabAssoc = [
        '1' => 'Adam',
        '2' => 'Janek',
        '3' => 'Wojtek'
    ];
    echo "<br>";
    print_r($tabAssoc);
    echo "<br>";
    foreach ($tabAssoc as $k => $v) {
        echo "$k ma wartość $v<br>";
    }
    #echo PHP_VERSION;
    $podzielona = explode(":", $doTablicy);
    foreach($podzielona as $sciezka) {
        echo "$sciezka<br>";
    }
    echo implode(";", $tab)
    ?>
</body>
</html>