<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obsługa wyjątków w PHP</title>
</head>
<body>
    <?php
    function fmtErr(Throwable $e) {
        return <<<HTML
        <strong>Podczas wykonywania skryptu PHP wystąpił błąd!</strong><br>
        <em>Treść błędu:</em> {$e->getMessage()}<br>
        <em>Kod błędu:</em> {$e->getCode()}
        HTML;
    }

    function dzielenie($a, $b) {
        if ($b == 0) {
            throw new Exception("Nie dziel przez 0!", 30);
        }

        return $a / $b;
    }

    try {
        $liczba1 = 10;
        $liczba2 = 0;

        dzielenie($liczba1, $liczba2);
    } catch (Exception $e) {
        echo fmtErr($e);
    }
    ?>
</body>
</html>