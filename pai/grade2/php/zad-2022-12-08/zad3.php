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
        if (!isset($_COOKIE['ImieNazwisko'])) {
    ?>
    <form method="post" action="zad3.php">
        <label for="in">Imię i nazwisko:</label> <input name="imienazwisko" id="in"><br>
        <button type="submit">Wyślij</button>
    </form>
    <?php
        if (isset($_POST['imienazwisko'])) {
            setcookie('ImieNazwisko', $_POST['imienazwisko'], time() + 3600);
        }
    } else {
        echo 'Witamy ponownie, ' . $_COOKIE['ImieNazwisko'];
    }
    ?>
</body>
</html>