<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz</title>
</head>
<body>
    <form action="zad1.php" method="post">
        Działanie: <input type="text" name="licz1">
        <select name="op">
            <option value="+">+: Dodaj liczby</option>
            <option value="-">-: Odejmij liczby</option>
            <option value="*">*: Pomnóż liczby</option>
            <option value="/">/: Podziel liczby</option>
        </select>
        <input type="text" name="licz2"><br>
        <button type="submit" name="ok">Oblicz</button>
    </form>
    <?php
        if ( !isset( $_POST['ok'] ) ) exit;

        $licz = [
            (float)$_POST['licz1'],
            (float)$_POST['licz2']
        ];

        function oblicz( $l1, $l2 ) {
            $op = $_POST['op'];
            switch ( $op ) {
                case '+':
                    return $l1 + $l2;
                case '-':
                    return $l1 - $l2;
                case '*':
                    return $l1 * $l2;
                case '/':
                    if ( $l2 === 0.0 ) {
                        return "Nie można dzielić przez 0!";
                    }
                    return $l1 / $l2;
                default: return "Nieznany operator '$op'!";
            }
        }

        echo oblicz( ...$licz );
    ?>
</body>
</html>