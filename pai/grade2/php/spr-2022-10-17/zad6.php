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
    $wiekszeOd50 = 0;
    for ( $i = 0; $i <= 100; $i += 2 ) {
        echo "$i<br>";
        if ( $i > 50 ) {
            $wiekszeOd50++;
        }
    }
    echo "Jest $wiekszeOd50 liczb parzystych większych od 50 (mniejszych od lub równych 100)";
    ?>
</body>
</html>