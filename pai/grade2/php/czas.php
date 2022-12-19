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
    $czas = time() + (7 * 24 * 60 * 60);
    #echo "<br>";
    echo date(
        'Y-m-d H:i:s',
        # 1_000_000_000
        $czas
    );
    ?>
</body>
</html>