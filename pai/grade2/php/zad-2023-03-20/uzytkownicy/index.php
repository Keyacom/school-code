<?php

const APPLICATION = true;
require_once __DIR__ . '/../common.php';
$config['db']['connect'] = true;
$config['db']['transaction'] = false;

$zFormularza = isset($_POST['ok']);
$blad = 'Nie można się połączyć z serwerem bazy danych!';
if (!$zFormularza) {
    $blad = 'Nie jesteś zalogowany!';
}
[$out, $db] = createDocument('', 'Użytkownicy', $config);

if ($zFormularza && $db != null) {
    $wynik = $db->execute_query(
        <<<SQL
        SELECT id, `admin` FROM dane
        WHERE `login` = ?
        AND `haslo` = ?
        SQL,
        // login i zaszyfrowane hasło
        [$_POST['login'], $config['hashFunc']($_POST['haslo'])],
    );
    $html = [];
    if ($wynik->num_rows == 0) {
        $blad = 'Błędne dane logowania!';
    } else {
        [$userId, $isAdmin] = $wynik->fetch_all()[0];
        $html[] = <<<HTML
        <h1>Baza użytkowników</h1>
        <table border="1" style="border-collapse: collapse;">
            <tr>
                <th>Nazwa użytkownika</th>
                <th>Hash hasła</th>
            </tr>
        HTML;
        $dodatek = '';
        $tab = [];
        if (!$isAdmin) {
            $dodatek = 'WHERE id = ?';
            $tab = [$userId];
        }
        $wynik = $db->execute_query("SELECT `login`, `haslo` FROM dane $dodatek;", $tab);
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