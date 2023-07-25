<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 1</title>
</head>
<body>
    <?php
    echo implode(
        '<br>',
        array_filter(
            scandir('C:\Program Files'),
            fn ($dir) => !preg_match('/^\.+$/', $dir),
        ),
    );
    ?>
</body>
</html>