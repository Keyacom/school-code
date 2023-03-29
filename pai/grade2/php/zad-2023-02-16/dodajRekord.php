<?php

if ($conn = mysqli_connect('localhost', 'root', null, 'ogloszenia')) {
    try {
        $kat = $_POST['kategorie'];
        $podkat = $_POST['podkategorie'];
        $tytul = $_POST['tytul'];
        $tresc = $_POST['tresc'];

        $sql = <<<SQL
        INSERT INTO ogloszenie
        VALUES(NULL, 1, '$kat', '$podkat', '$tytul', '$tresc');
        SQL;

        mysqli_query($conn, $sql);
    } finally {
        mysqli_close($conn);
    }
}