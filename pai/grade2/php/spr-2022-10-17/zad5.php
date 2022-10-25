<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label for="wzrost">Wzrost (w cm):</label> <input type="number" name="wzrost" id="wzrost"><br>
        <label for="waga">Waga (w kg):</label> <input type="number" name="waga" id="waga"><br>
        <button name="ok">Oblicz</button>
    </form>
    Twoje BMI: 
    <?php
    if ( !isset( $_POST['ok'] ) ) die("Nie obliczono");

    $wzrost = (int)$_POST['wzrost'];
    $waga = (int)$_POST['waga'];

    $bmi = $waga / ( $wzrost / 100 ) ** 2;
    echo "$bmi (";

    if ( $bmi > 31 ) {
        echo "otyłość";
    } elseif ( $bmi > 26 ) {
        echo "nadwaga";
    } elseif ( $bmi > 19 ) {
        echo "waga prawidłowa";
    } else {
        echo "niedowaga";
    }
    echo ")";
    ?>
</body>
</html>