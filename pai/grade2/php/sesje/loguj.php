<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaloguj</title>
    <style>
        form label {
            font-weight: bold;
        }
        fieldset, .formfield {
            width: fit-content;
        }
    </style>
</head>
<body>
    <h1>Formularz logowania:</h1>
    <fieldset>
        <legend>Zadanie SESJE w PHP</legend>
        <form method="post">
            <div class="formfield">
                <label for="nazwa">Nazwa użytkownika: </label> <input type="text" name="nazwa" id="nazwa" required>
            </div>
            <div class="formfield">
                <label for="haslo">Hasło: </label> <input type="password" name="haslo" id="haslo" required>
            </div>
            <div class="formfield">
                <input type="submit" value="Zaloguj">
            </div>
        </form>
    </fieldset>
    <?php
    session_start();
    if (isset($_SESSION['log'])) {
        header('Location: strona.php');
        exit;
    } elseif (isset($_POST['nazwa']) && isset($_POST['haslo'])) {
        if ($_POST['nazwa'] == 'marcin' && $_POST['haslo'] == 'admin123') {
            $_SESSION['log'] = $_POST['nazwa'];
            header('Location: strona.php');
            exit;
        } else {
            echo '<p>Nieprawidłowe dane logowania!</p>';
        }
    }
    ?>
</body>
</html>
