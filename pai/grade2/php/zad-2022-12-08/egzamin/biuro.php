<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styl6.css" rel="stylesheet">
    <title>Podróże dalekie i bliskie</title>
</head>
<body>
    <header>
        <h1>Biuro podróży: WESOŁA WYPRAWA</h1>
    </header>
    <aside class="skrypt">
        <p>
        <?php
        if ( isset( $_COOKIE['ciastko'] ) ) {
            echo 'Witaj ponownie na naszej stronie';
        } else {
            setcookie('ciastko', '1', time() + 3600);
            echo 'Witaj! Nasza strona używa ciasteczek';
        }
        ?>
        </p>
    </aside>
    <section class="lewo">
        <table>
            <tr>
                <td>
                    <img src="polska.jpg" alt="zwiedzanie Krakowa">
                </td>
                <td>
                    <img src="wlochy.jpg" alt="Wenecja i nie tylko">
                </td>
            </tr>
            <tr>
                <td>
                    <img src="grecja.jpg" alt="gorące Greckie wyspy">
                </td>
                <td>
                    <img src="hiszpania.jpg" alt="Słoneczna Barcelona">
                </td>
            </tr>
        </table>
    </section>
    <aside class="prawo">
        <h3>Proponujemy wyczieczki</h3>
        <ul>
            <li>autokarowe</li>
            <ol>
                <li>po Polsce z przewodnikiem</li>
                <li>do Niemiec i Czech</li>
            </ol>
            <li>samolotem</li>
            <ol>
                <li>wczasy w Grecji</li>
                <li>zwiedzanie Barcelony</li>
                <li>zwiedzanie Wenecji</li>
            </ol>
        </ul>
        <h3>Pobierz dokumenty</h3>
        <p>
            <a href="regulamin.txt">Regulamin korzystania z usług biura podróży</a>
        </p>
        <p>
            <a href="http://galeria.pl" target="_blank">Tu znajdziesz zdjęcia z naszych wycieczek</a>
        </p>
    </aside>
    <footer>
    Stronę przygotował: 06222222203
    </footer>
</body>
</html>