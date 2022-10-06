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
        $suma = 0;
        $i = 0;

        while ( true ) {
            $n = rand(1, 100);
            $suma += $n;
            echo $suma . "<br>";
            $i += 1;
            if ( $n === 10 ) {
                break;
            }
        }
        echo "Liczba iteracji: $i";
    ?>
</body>
</html>