<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dostęp do folderów</title>
</head>
<body>
    <?php
    if (!is_dir('nowy')) {
        mkdir('nowy');
    } else {
        if ($katalog = opendir('.')) {
            echo "Odczyt prawidłowy<br>";
            while ($dir = readdir($katalog)) {
                if (!preg_match('/^\.+$/', $dir)) {
                    echo "$dir<br>";
                }
            }
            closedir($katalog);
        } else {
            echo "Nie udało się odczytać katalogu!";
        }
    }
    ?>
</body>
</html>
