<?php
    $conn = mysqli_connect("localhost", "root", "", "baza_2tamz2");
?><!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warzywniak</title>
    <link href="styl2.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Internetowy sklep z eko-warzywami</h1>
    </header>
    <nav>
        <ol>
            <li>warzywa</li>
            <li>owoce</li>
            <li><a href="https://terapiasokami.pl/" target="_blank">soki</a></li>
        </ol>
    </nav>
    <main>
        <?php
        if ($conn) {
            $sql = 'SELECT nazwa, ilosc, opis, cena, zdjecie FROM produkty WHERE Rodzaje_id IN (1, 2);';
            $wynik = mysqli_query($conn, $sql);
            while ($wiersz = mysqli_fetch_assoc($wynik)) {
                $cena = str_replace('.', ',', (string) $wiersz['cena']);
                echo <<<HTML
                <div>
                    <img src="materiały/{$wiersz['zdjecie']}" alt="Warzywniak">
                    <h5>{$wiersz['nazwa']}</h5>
                    <p>opis: {$wiersz['opis']}</p>
                    <p>na stanie: {$wiersz['ilosc']}</p>
                    <h2>{$cena} zł</h2>
                </div>
                HTML;
            }
        } else {
            echo "<strong>Nie można się połączyć z serwerem bazy danych!</strong>";
        }
        ?>
    </main>
    <footer>
        <form method="post">
            <label>Nazwa: <input type="text" name="nazwa"></label><label> Cena: <input type="text" name="cena"></label>
            <input type="submit" value="Dodaj produkt" name="ok">
        </form>
        Stronę wykonał: 00000000000
    </footer>
</body>
</html><?php
if ($conn && isset($_POST['ok'])) {
    $sql = "INSERT INTO produkty VALUES(NULL, 1, 4, '{$_POST['nazwa']}', 10, '', {$_POST['cena']}, 'owoce.jpg');";
    mysqli_query($conn, $sql);
}
mysqli_close($conn);
?>