<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep papierniczy</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>W naszym sklepie internetowym kupisz najtaniej</h1>
    </header>
    <section id="lewo">
        <h3>Promocja 15% obejmuje artykuły:</h3>
        <ul>
            <?php
            $baza = new mysqli('localhost', 'root', null, 'sklep');
            $wynik = $baza->query('SELECT nazwa FROM towary WHERE promocja=1;');
            foreach ($wynik as $wiersz) {
                echo "<li>{$wiersz['nazwa']}</li>";
            }
            ?>
        </ul>
    </section>
    <section id="srodek">
        <h3>Cena wybranego artykułu w promocji</h3>
        <form method="post">
            <select name="produkt">
                <option>Gumka do mazania</option>
                <option>Cienkopis</option>
                <option>Pisaki 60 szt.</option>
                <option>Markery 4 szt.</option>
            </select>
            <input type="submit" value="WYBIERZ" name="ok">
        </form>
        <?php
        if (isset($_POST['ok'])) {
            $wiersz = $baza
                ->query(<<<SQL
                SELECT cena FROM towary
                WHERE nazwa='{$_POST['produkt']}';
                SQL)
                ->fetch_assoc();
            echo round($wiersz['cena'] * 0.85, 2);
        }
        ?>
    </section>
    <section id="prawo">
        <h3>Kontakt</h3>
        <p>telefon: 123123123 <br>e-mail: <a href="mailto:bok@sklep.pl">bok@sklep.pl</a>
        </p>
        <img src="materialy1/promocja2.png" alt="promocja">
    </section>
    <footer>
        <h4>Autor strony Marzec</h4>
    </footer>
</body>
</html><?php $baza->close(); ?>