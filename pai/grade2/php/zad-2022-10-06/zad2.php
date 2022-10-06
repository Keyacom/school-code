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
        $s = 10;
        for ( ; $s > 0; $s-- ) {
            echo $s ** 2 . "<br>";
        }
        
        for ( $s = 10; $s > 0; $s -= 2 ) {
            echo $s ** 2 . "<br>";
        }
    ?>
</body>
</html>