<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona</title>
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['log'])) {
        header('Location: loguj.php');
        exit;
    }
    ?>
    <p>Witaj na stronie, <?php echo $_SESSION['log'] ?>!</p>
    <p>Jesteś na stronie głównej.</p>
    <p>Zanim wyjdziesz, <a href="wyloguj.php">wyloguj się</a>.</p>
</body>
</html>
