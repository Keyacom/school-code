<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if ( isset( $_COOKIE['LastVisit'] ) ) {
        echo "Ostatni raz byłeś u nas: " . date("Y-m-d H:i:s",  (int)$_COOKIE["LastVisit"]);
    } else {
        echo 'Witamy po raz pierwszy!';
        setcookie("LastVisit", "" . time(), time() + 3600);
    }
    ?>
</body>
</html>