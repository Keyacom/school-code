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
    $array = array(0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red');

    echo "Element 'green' ma indeks " . array_search('green', $array);
    ?>
</body>
</html>