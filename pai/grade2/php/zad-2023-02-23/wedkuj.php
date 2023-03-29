<?php
try {
    $conn = mysqli_connect('localhost', 'root', null, 'baza_wedkowanie_2ta');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wędkowanie</title>
    <link href="styl_1.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Portal dla wędkarzy</h1>
    </header>
    <section id="prawy">
        <img src="ryba1.jpg" alt="Sum">
        <br>
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </section>
    <section id="lewy1">
        <h3>Ryby zamieszkujące rzeki</h3>
        <ul>
            <?php
            if (!$conn) {
                echo "<li><strong>Nie mogę się połączyć z serwerem bazy danych!</strong></li>";
            } else {
                $sql = 'SELECT nazwa, akwen, wojewodztwo from lowisko, ryby where ryby.id=ryby_id and rodzaj=3;';
                $wynik = mysqli_query($conn, $sql);
                foreach ($wynik as $i) {
                    echo <<<HTML
                    <li>
                        {$i['nazwa']} pływa
                        w rzece {$i['akwen']}, {$i['wojewodztwo']}
                    </li>
                    HTML;
                }
            }
            ?>
        </ul>
    </section>
    <section id="lewy2">
        <h3>Ryby drapieżne naszych wód</h3>
        <table>
            <tr>
                <th>Lp.</th>
                <th>Gatunek</th>
                <th>Występowanie</th>
            </tr>
            <?php
            if (!$conn) {
                echo '<tr><td colspan="3"><strong>Nie mogę się połączyć z serwerem bazy danych!</strong></td></tr>';
            } else {
                $sql = 'SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia=1;';
                $wynik = mysqli_query($conn, $sql);
                foreach ($wynik as $i) {
                    echo <<<HTML
                    <tr>
                        <td>{$i['id']}</td>
                        <td>{$i['nazwa']}</td>
                        <td>{$i['wystepowanie']}</td>
                    </tr>
                    HTML;
                }
            }
            ?>
        </table>
    </section>
    <footer>
        <p>Stronę wykonał: 00000000000</p>
    </footer>
    
</body>
</html><?php } finally {
    if ($conn) {
        mysqli_close($conn);
    }
}
?>