<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $tabela = array(12,2,31,4,5,6,77,8,9,10,54,32,11,78,43);

    echo "Tablica `tabela` składa się z " . count($tabela) . " elementów<br>";

    $eParzyste = 0;
    $eNieparzyste = 0;
    foreach ( $tabela as $i ) {
        if ( $i % 2 === 0 ) {
            $eParzyste++;
        } else {
            $eNieparzyste++;
        }
    }

    echo "Liczba elementów parzystych: $eParzyste<br>";
    echo "Liczba elementów nieparzystych: $eNieparzyste";
    ?>
</body>
</html>