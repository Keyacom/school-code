<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pętle</title>
</head>
<body>
    <?php
        $lista = [];
        $suma = 0;

        while ( $suma <= 300 ) {
            $r = rand(1, 50);
            $lista[] = $r;
            $suma += $r;
        }

        echo join( " + ", $lista ) . " = " . $suma;
    ?>
</body>
</html>