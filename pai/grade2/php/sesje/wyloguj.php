<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wyloguj</title>
</head>
<body>
    <p>Wylogowano się pomyślnie.</p>
    <p><a href="loguj.php">Zaloguj się ponownie.</a></p>
    <?php
    session_start();
    if (!isset($_SESSION['log'])) {
        header('Location: loguj.php');
        exit;
    }
    session_unset();
    session_destroy();
    ?>
</body>
</html>
