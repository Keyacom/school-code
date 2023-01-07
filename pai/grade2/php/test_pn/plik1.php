<?php
    include __DIR__ . "/plik2.php";

    #use Test;
?>
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

    $s1 = 'this';
    $s2 = 'that';

    echo "Dystans Levenshteina dla '$s1' i '$s2': " . Test\dystans_levenshteina( $s1, $s2 ) . "\n";

    ?>
</body>
</html>