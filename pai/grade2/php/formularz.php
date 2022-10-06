<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz</title>
</head>
<body>
    <form action="formularz.php" method="post">
        Podaj liczbę: <input type="text" name="liczba"><br>
        <button type="submit">Oblicz</button>
    </form>
    <?php
        if ( isset( $_POST['liczba'] ) ) {
            echo "Podana liczba: " . $_POST['liczba'];
        }
    ?>
</body>
</html>