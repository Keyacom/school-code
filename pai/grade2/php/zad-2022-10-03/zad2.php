<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz</title>
</head>
<body>
    <form action="zad2.php" method="post">
        Podaj liczby: <input type="text" name="licz1"> <input type="text" name="licz2"> <input type="text" name="licz3"><br>
        <button type="submit" name="ok">Oblicz</button>
    </form>
    <?php
        if ( !isset( $_POST['ok'] ) ) exit;

        $licz = [
            (integer)$_POST['licz1'],
            (integer)$_POST['licz2'],
            (integer)$_POST['licz3']
        ];

        $ln = [];
        $lp = [];

        foreach ($licz as $l) {
            if ($l % 2 === 0) {
                $lp[] = $l;
            } else {
                $ln[] = $l;
            }
        }
        unset($l);

        echo "Liczby parzyste: " . join(", ", $lp) . "<br>";
        echo "Liczby nieparzyste: " . join(", ", $ln) . "<br>";
    ?>
</body>
</html>