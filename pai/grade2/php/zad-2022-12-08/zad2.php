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
    $razy = 1;

    if ( isset( $_COOKIE['VisitCount'] ) ) {
        $razy = $_COOKIE['VisitCount'] + 1;
    }
    
    setcookie('VisitCount', $razy);
    echo 'Odwiedziłeś stronę ' . $razy . ' raz(y)';
    ?>
</body>
</html>