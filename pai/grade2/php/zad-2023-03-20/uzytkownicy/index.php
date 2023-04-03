<?php

const APPLICATION = true;
require_once __DIR__ . '/../common.php';
$config['db']['connect'] = true;
$config['db']['transaction'] = false;

$zFormularza = isset($_POST['ok']);
$blad = 'Nie można się połączyć z serwerem bazy danych!';

[$out, $db] = createDocument('', 'Użytkownicy', $config);

if ($db != null) {
    $wynik = null;
    if ($zFormularza) {
        $wynik = execQuery($db,
            <<<SQL
            SELECT id, `admin` FROM dane
            WHERE `login` = ?
            AND `haslo` = ?
            SQL,
            // login i zaszyfrowane hasło
            [uTrim($_POST['login']), $config['hashFunc'](uTrim($_POST['haslo']))],
        );
    } else {
        $blad = 'Nie jesteś zalogowany!';
    }
    $html = [];
    if ($wynik != null && $wynik->num_rows == 0) {
        $blad = 'Błędne dane logowania!';
    } else {
        if ($zFormularza) {
            [$userId, $isAdmin] = $wynik->fetch_all()[0];
            $dodatek = '';
            $tab = [];
            if (!$isAdmin) {
                $dodatek = 'WHERE id = ?';
                $tab = [$userId];
            }
            $wynik = execQuery($db, "SELECT `login`, `haslo` FROM dane $dodatek;", $tab);
        }
        $html[] = <<<HTML
        <h1>Baza użytkowników</h1>
        <table class="table">
            <tr>
                <th>Nazwa użytkownika</th>
                <th>Hash hasła</th>
            </tr>
        HTML;
    }
    if ($wynik) {
        foreach ($wynik as $wiersz) {
            $html = array_merge($html, ['<tr><td>', $wiersz['login'], '</td><td>', $wiersz['haslo'], '</td></tr>']);
        }
    } else {
        $html[] = <<<HTML
        <tr><td colspan="2">$blad</td></tr>
        HTML;
    }
    $html[] = '</table>';
    setInnerHTML($out->getElementsByTagName('main')->item(0), implode('', $html));
    tryOutput($out);
    $db->close();
}