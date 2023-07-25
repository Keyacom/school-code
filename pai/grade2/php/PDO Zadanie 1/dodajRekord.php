<?php

if (!isset($_POST['wyslij'])) { exit("Nie wysłano formularza"); }
$baza = new PDO('mysql:host=localhost;dbname=pdo_marzec', 'root', null);
$dane = [
    'kategoria' => $_POST['kategorie'],
    'podkategoria' => $_POST['podkategorie'],
    'tytul' => $_POST['tytul'],
    'tresc' => $_POST['tresc'],
];
function quote_assoc(PDO $db, array $array): array {
    $ret = [];
    foreach ($array as $key => $value) {
        $ret[$key] = $db->quote($value);
    }
    return $ret;
}
$dane = quote_assoc($baza, $dane);

$baza->exec(<<<SQL
    INSERT INTO ogloszenie
    SET
    uzytkownik_id = 1,
    kategoria = {$dane['kategoria']},
    podkategoria = {$dane['podkategoria']},
    tytul = {$dane['tytul']},
    tresc = {$dane['tresc']};
    SQL);
//$baza->prepare();