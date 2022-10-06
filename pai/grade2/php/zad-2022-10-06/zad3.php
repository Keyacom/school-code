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
        for ( $i = 0; $i < 6; $i++ ) {
            echo rand(1, 100) . "<br>";
        }
    ?>
</body>
</html>