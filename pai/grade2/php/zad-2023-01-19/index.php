<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl8.css">
    <title>Nasz sklep internetowy</title>
</head>
<body>
    <nav>
        <a href="index.php">Główna</a>
        <a href="procesory.html">Procesory</a>
        <a href="ram.html">RAM</a>
        <a href="grafika.html">Grafika</a>
    </nav>
    <header>
        <h2>Podzespoły komputerowe</h2>
    </header>
    <main>
        <h1>Dzisiejsze promocje</h1>
        <table>
            <thead>
                <tr>
                    <th>NUMER</th>
                    <th>NAZWA PODZESPOŁU</th>
                    <th>OPIS</th>
                    <th>CENA</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = mysqli_connect('localhost', 'root', null, 'baza_2tamz2');

                if (!$conn) {
                    echo <<<HTML
                    <tr>
                        <td colspan="4">
                            <strong>Nie można się połączyć z bazą danych!</strong>
                        </td>
                    </tr>
                    HTML;
                } else {
                    try {
                        $sql = <<<SQL
                        SELECT id, nazwa, opis, cena
                        FROM podzespoly
                        WHERE cena < 1000;
                        SQL;

                        $wynik = mysqli_query($conn, $sql);

                        while ($wiersz = mysqli_fetch_assoc($wynik)) {
                            echo <<<HTML
                            <tr>
                                <td>
                                    {$wiersz['id']}
                                </td>
                                <td>
                                    {$wiersz['nazwa']}
                                </td>
                                <td>
                                    {$wiersz['opis']}
                                </td>
                                <td class="cena">
                                    {$wiersz['cena']}
                                </td>
                            </tr>
                            HTML;
                        }
                    } finally {
                        mysqli_close($conn);
                    }
                }
                ?>
            </tbody>
        </table>
    </main>
    <footer>
        <div>
            <img src="materialy1/scalak.jpg" alt="Promocje na procesory">
        </div>
        <div>
            <h4>Nasz Sklep Komputerowy</h4>
            <p>Współpracujemy z hurtownią <a href="http://www.edata.pl/" target="_blank">edata</a>
        </div>
        <div>
            <p>
                zadzwoń: 601 602 603
            </p>
        </div>
        <div>
            <p>
                Stronę wykonał: 00000000000
            </p>
        </div>
    </footer>
</body>
</html>