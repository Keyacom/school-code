<?php

const APPLICATION = true;
require_once __DIR__ . '/common.php';

$zFormularza = isset($_POST['ok']);
if (!$zFormularza) {
    // strona główna nie łączy się z bazą danych, chyba że trafię na nią z formularza rejestracyjnego
    $config['db']['connect'] = false;
}

[$out, $db] = createDocument(file_get_contents(__DIR__ . '/szablony/glowna.html'));

if ($zFormularza && $db != null) {
    try {
        $formFields = array_map(fn ($e) => (
            // Jeśli pole jest niepuste, to zwróć jego zawartość, w przeciwnym razie null
            isset($_POST[$e]) && !empty(uTrim($_POST[$e])) ? uTrim($_POST[$e]) : null
        ), ['login', 'haslo', 'imie', 'nazwisko', 'email', 'tel']);
        // Wszystkie sprawdzenia pól zostały wykonane w przeglądarce, więc można już przejść do kwerendy

        // Bezpieczny sposób wykonywania kwerend z mysqli::execute_query (brak obaw o apostrofy)
        execQuery($db, <<<SQL
        INSERT INTO rejestracja
        (`login`, haslo, imie, nazwisko, email, tel, `data`)
        VALUES
        (?, ?, ?, ?, ?, ?, ?);
        SQL, array_merge($formFields, [date('Y-m-d H:i:s')]));
        // szyfrowanie hasła
        $formFields[1] = $config['hashFunc']($formFields[1]);
        // Dla kwerend bez wejść end usera po prostu korzystam z query
        $nrRejestracji = $db->query("SELECT MAX(id) FROM rejestracja;")->fetch_all()[0][0];

        execQuery($db, <<<SQL
        INSERT INTO dane
        (`login`, haslo, imie, nazwisko, email, tel, rejestracja_id)
        VALUES
        (?, ?, ?, ?, ?, ?, ?);
        SQL, array_merge($formFields, [$nrRejestracji]));
    } catch (Exception $exc) {
        // Transakcja pozwala na przywrócenie stanu poprzedniego w razie błędów
        // Bardzo się przydaje, jeśli mamy INSERT INTO w dwóch różnych tabelach
        $db->rollback();
        // usuń zmienną $exc
        unset($exc);
    } finally {
        // `commit` transakcji zamyka ją i zapisuje zmiany dokonane podczas niej
        $db->commit();
        $db->close();
    }
}
tryOutput($out);