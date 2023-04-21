<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pole prostokąta i obwód</title>
</head>
<body>
    <form method="post">
        <label for="bok1">Bok 1</label> <input type="number" name="bok1" id="bok1"><br>
        <label for="bok2">Bok 2</label> <input type="number" name="bok2" id="bok2"><br>
        <input type="submit" name="ok" value="Prześlij">
    </form>
    <?php
    function fmtErr(Throwable $e) {
        return <<<HTML
        <strong>Podczas wykonywania skryptu PHP wystąpił błąd!</strong><br>
        <em>Treść błędu:</em> {$e->getMessage()}<br>
        <em>Kod błędu:</em> {$e->getCode()}
        HTML;
    }

    function pole($a, $b) {
        return $a * $b;
    }

    function obwod($a, $b) {
        return 2 * ($a + $b);
    }

    function walidacja($a, $b) {
        if ($a == 0 || $b == 0) {
            throw new Exception("nie oczekiwano wartości 0", 3);
        }
    }

    if (isset($_POST['ok'])) {
        try {
            $bok1 = (int)$_POST['bok1'];
            $bok2 = (int)$_POST['bok2'];
            walidacja($bok1, $bok2);
            echo "Pole: " . pole($bok1, $bok2);
            echo "<br>Obwód: " . obwod($bok1, $bok2);
        } catch (Exception $e) {
            echo fmtErr($e);
        }
    }
    ?>
</body>
</html>