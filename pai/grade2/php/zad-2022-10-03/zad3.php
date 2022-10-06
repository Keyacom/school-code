<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz</title>
</head>
<body>
    <form action="zad3.php" method="post">
        Podaj liczby: <input type="text" name="licz1"> <input type="text" name="licz2"><br>
        <button type="submit" name="ok">Oblicz</button>
    </form>
    <?php

    /**
     * l1 > 10 && l2 > 10 ? max(l1, l2) / min(l1, l2);
     * (l1 > 10 && l2 < 10) && (l2 > 10 && l1 < 10) ? max(l1, l2) - min(l1, l2);
     * l1 < 10 && l2 < 10 ? l1 * l2;
     */
        #echo (10 > 10);
        if ( !isset( $_POST['ok'] ) ) exit;
        
        $licz = [
            (float)$_POST['licz1'],
            (float)$_POST['licz2']
        ];
        $wiekszeOd10 = 0;

        foreach ($licz as $l) {
            if ($l >= 10) {
                $wiekszeOd10 += 1;
            }
        }
        unset($l);

        function oblicz ( $dzialanie, $licz1, $licz2 ) {
            switch ( $dzialanie ) {
                case 0: return $licz1 * $licz2;
                case 1: return $licz1 - $licz2;
                case 2: return $licz1 / $licz2;
                default: return "Nie można określić działania od liczby $dzialanie na podstawie tego, ile jest liczb większych od 10!";
            }
        }

        echo oblicz( $wiekszeOd10, ...$licz );
    ?>
</body>
</html>