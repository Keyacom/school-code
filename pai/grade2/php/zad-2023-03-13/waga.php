<?php
$conn = new mysqli('localhost', 'root', null, 'baza_2tamz2');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twój wskaźnik BMI</title>
    <link href="styl4.css" rel="stylesheet">
</head>
<body>
    <header>
        <h2>Oblicz wskaźnik BMI</h2>
    </header>
    <div id="logo">
        <img src="pliki/wzor.png" alt="liczymy BMI">
    </div>
    <section id="lewo">
        <img src="pliki/rys1.png" alt="zrzuć kalorie!">
    </section>
    <section id="prawo">
        <h1>Podaj dane</h1>
        <form method="post">
            <label for="waga">Waga: </label><input id="waga" name="waga" type="number"><br>
            <label for="wzrost">Wzrost [cm]: </label><input id="wzrost" name="wzrost" type="number"><br>
            <input name="ok" type="submit" value="Licz BMI i zapisz wynik">
        </form>
        <?php
        if (isset($_POST['ok']) && isset($_POST['waga']) && isset($_POST['wzrost'])) {
            $waga = (int)$_POST['waga'];
            $wzrost = (int)$_POST['wzrost'];
            $wzrost_m = $wzrost / 100;
            $wynik = $waga / ($wzrost_m ** 2);
            $data = date("Y-m-d", time());
            $kat = match (true) {
                $wynik <= 18 => 1,
                $wynik <= 25 => 2,
                $wynik <= 30 => 3,
                default => 4,
            };
            echo "Twoja waga: $waga; Twój wzrost: $wzrost<br>BMI wynosi: $wynik";
            $sql = "INSERT INTO wynik VALUES(NULL, $kat, '$data', $wynik);";
            $conn->query($sql);
        }
        ?>
    </section>
    <main>
        <table>
            <tr>
                <th>lp.</th>
                <th>Interpretacja</th>
                <th>zaczyna się od...</th>
            </tr>
            <?php
            if ($conn) {
                try {
                    $sql = "SELECT id, wart_min, informacja FROM bmi;";
                    $wynik = $conn->query($sql);
                    while ($wiersz = $wynik->fetch_assoc()) {
                        echo <<<HTML
                        <tr>
                            <td>{$wiersz['id']}</td>
                            <td>{$wiersz['wart_min']}</td>
                            <td>{$wiersz['informacja']}</td>
                        </tr>
                        HTML;
                    }
                } finally {
                    $conn->close();
                }
            } else {
                echo <<<HTML
                <tr>
                    <th colspan="3">
                        Nie można się połączyć z serwerem bazy danych!
                    </th>
                </tr>
                HTML;
            }
            ?>
        </table>
    </main>
    <footer>
    Autor: 00000000000
    <a href="kw2.jpg">Wynik działania kwerendy 2</a>
    </footer>
</body>
</html>