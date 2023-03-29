<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hurtownia papiernicza</title>
    <link href="styl.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1>W naszej hurtowni kupisz najtaniej</h1>
    </header>
    <section id="lewo">
        <h3>Ceny wybranych artykułów w hurtowni:</h3>
        <table>
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'baza_2tamz2');
        $sql = "SELECT nazwa, cena FROM towary LIMIT 4;";
        $wynik = mysqli_query($conn, $sql);
        foreach ($wynik as $wiersz) {
            echo <<<HTML
            <tr>
                <td>{$wiersz['nazwa']}</td>
                <td>{$wiersz['cena']}</td>
            </tr>
            HTML;
        }
        ?>
        </table>
    </section>
    <section id="srodek">
        <h3>Ile będą kosztować Twoje zakupy?</h3>
        <form method="post">
            <label>wybierz artykuł
                <select name="artykul">
                    <option>Zeszyt 60 kartek</option>
                    <option>Zeszyt 32 kartki</option>
                    <option>Cyrkiel</option>
                    <option>Linijka 30 cm</option>
                    <option>Ekierka</option>
                    <option>Linijka 50 cm</option>
                </select></label><br><label>
            liczba sztuk: <input type="number" name="liczba" value="1">
            </label><br>
            <input type="submit" value="OBLICZ" name="ok">
        </form>
        <?php
        if (isset($_POST['ok'])) {
            $licz = (int)$_POST['liczba'];
            $art = $_POST['artykul'];
            $sql = "SELECT cena FROM towary WHERE nazwa='$art'";
            $wynik = mysqli_fetch_assoc(mysqli_query($conn, $sql));
            echo str_replace('.', ',', '' . round($licz * $wynik['cena'], 1));
        }
        ?>
    </section>
    <section id="prawo">
        <img src="materialy2/zakupy2.png" alt="hurtownia">
        <h3>Kontakt</h3>
        <p>
        telefon:<br>
        111222333<br>
        email:<br>
        <a href="mailto:hurt@wp.pl">hurt@wp.pl</a></p>
    </section>
    <footer>
        <h4>Witrynę wykonał 00000000000</h4>
    </footer>
</body>
</html>
<?php
mysqli_close($conn);
?>