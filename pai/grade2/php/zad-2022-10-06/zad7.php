<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pętle - prostokąt ze znaków #</title>
</head>
<body>
    <form action="zad7.php" method="post">
        Podaj wymiary<br>
        Szerokość:<input type="text" name="szer"><br>
        Wysokość:<input type="text" name="wys"><br>
        <button type="submit" name="ok">Oblicz</button>
    </form>
    <?php
        if ( !isset($_POST['ok']) ) exit;

        $wym = [
            'szer' => (int)$_POST['szer'],
            'wys' => (int)$_POST['wys']
        ];

        for ($i = 0; $i < $wym['wys']; $i++) {
            for ($j = 0; $j < $wym['szer']; $j++) {
                echo "#";
            }
            echo "<br>";
        }
    ?>
</body>
</html>