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
    $los = 0;
    while ( $los !== 99 ) {
        $los = rand(50, 100);
        echo $los . "<br>";
    }
    ?>
</body>
</html>