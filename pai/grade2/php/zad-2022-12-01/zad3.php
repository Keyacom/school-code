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
    
    /**
     * Sprawdź, czy rok jest przestępny.
     * @param int $rok Rok do sprawdzenia
     * @return bool `true` jeśli rok jest przestępny, `false` jeśli nie. Ponieważ `bool` to podklasa `int`, można używać w działaniach matematycznych.
     */
    function czyPrzestępny( int $rok ): bool {
        if ( $rok % 4 == 0 ) {
            if ( $rok % 100 == 0 ) {
                if ( $rok % 400 == 0 ) {
                    return true;
                }
                return false;
            }
            return true;
        }
        return false;
    }

    $data = getdate();

    echo "Minęło " . $data['yday'] . " dni<br>";
    echo "Zostało " . (365 + czyPrzestępny($data['year']) - $data['yday']) . " dni";

    ?>
</body>
</html>