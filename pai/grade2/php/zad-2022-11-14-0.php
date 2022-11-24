<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>nl2br</h2>
    <?php
        $tekst = <<<TX
        wyrażenie reguralne, łamanie linii,prekształcanie znaku
        na znak w html nowej linii
        stosowane przy wczytwaniu
        ciągu znaków z bazy danych
        TX;
        echo "<h3>Teskt przed użyciem funkcji nl2br():</h3>";
        echo "<p>$tekst</p>";
        echo "<h3>Teskt po użyciu funkcji nl2br():</h3>";
        echo '<p>' . nl2br($tekst) . '</p>';
    ?>
    <h2>wordwrap</h2>
    <h3>Za pomocą znaku nowej linii</h3>
    <p>
    <?php
        echo wordwrap($tekst, 80);
    ?>
    </p>
    <h3>Za pomocą &lt;br></h3>
    <p>
    <?php
        echo wordwrap($tekst, 80, '<br>');
    ?>
    </p>
    <h3>Za pomocą &lt;br> z dzieleniem słów</h3>
    <p>
    <?php
        $tekst = <<<TX
        Adres skryptu napisanego w języku PHP dotyczącego funkcji wordwrap() dostępny jest poniżej:
        http://localhost/formatowanie_ciagow_znakowych/funkcja.php
        TX;
        echo wordwrap($tekst,40,"<br>\n", true);
    ?>
    </p>
    <h2>strtolower, strtoupper</h2>
    <p>
        <?php

        $npm = "NPM";
        $apl = "apl";

        echo strtolower($npm) . '<br>';
        echo strtoupper($apl);

        ?>
    </p>
    <h2>mb_strtolower, mb_strtoupper</h2>
    <p>
        <?php

        $zdanie = "Zażółć gęślą jaźń";

        echo mb_strtoupper($zdanie) . '<br>';
        echo mb_strtolower($zdanie);

        ?>
    </p>
    <h2>strtolower, strtoupper</h2>
    <p>
        <?php

        $yml = "yAML ain't markup language";

        echo ucfirst($yml) . '<br>';
        echo ucwords($yml)

        ?>
    </p>
    <h2>strlen, mb_strlen</h2>
    <p>
    <?php
        $ciag = "wyrażenie reguralne,prekształcanie znaku na znak w html nowej linii stosowane przy wczytwaniu ciągu znaków z bazy danych.";
        echo "Tekst: $ciag <br>";
        $dl_znaki = mb_strlen($ciag);
        $dl_bajty = strlen($ciag);
        echo "ma długość $dl_znaki znaków i $dl_bajty bajtów";
    ?>
    </p>
    <h2>Indeksowanie</h2>
    <p>
    <?php
        $tekst= "Sprawdzanie działania funkcji indeksowanie ciągu znaków";
        echo 'Pierwszy znak: ' . $tekst[0];
        echo '<br>Jedenasty znak: ' . $tekst[10];
    ?>
    </p>
    <h2>strstr</h2>
    <p>
    <?php
        $wyraz = "Jan Nowak, ul. Piaskowa 53, 66-100 Sulechów, tel. 603 398 398";
        $tel = strstr($wyraz, "tel.");
        if ($tel == false) {
            echo "Nie podano numeru telefonu";
        } else {
            echo "Numer telefonu:". $tel;
        }
    ?>
    </p>
    <h2>substr</h2>
    <p>
    <?php
        $wyraz = "Jan Nowak, ul. Piaskowa 53, 66-100 Sulechów, tel. 603 398 398";
        echo substr($wyraz,4,8);
    ?>
</body>
</html>