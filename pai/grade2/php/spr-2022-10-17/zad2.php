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
        <label for="wzrost">Podaj wzrost w centymetrach: </label>
        <input id="wzrost" name="wzrost" type="number"> cm
        <button name="ok">Prześlij</button>
    </form>
    <?php
    if ( !isset( $_POST['ok'] ) ) die;
    echo "Jesteś ";
    $wzrost = (int)$_POST['wzrost'];
    if ( $wzrost < 150 ) {
        echo "niski";
    } elseif ( $wzrost < 180 ) {
        echo "średni";
    } else {
        echo "wysoki";
    }
    ?>
</body>
</html>