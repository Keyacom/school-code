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
    const SMAK_SLODKI = 'słodki';
    const SMAK_KWASNY = 'kwaśny';
    $owoce = [
        'truskawka' => SMAK_SLODKI,
        'wiśnia' => SMAK_KWASNY,
        'cytryna' => SMAK_KWASNY,
        'czereśnia' => SMAK_SLODKI,
        'pomarańcza' => SMAK_SLODKI,
    ];

    foreach ( $owoce as $ow => $sm ) {
        echo "owoc: $ow ma smak: $sm<br>";
    }
    ?>
</body>
</html>