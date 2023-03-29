<?php
/**
 * Konfiguracja aplikacji.
 */

// Nie można tu wejść z przeglądarki bezpośrednio, ani do commonTemplate.php
if (!defined('APPLICATION')) {
    exit('Invalid Entry Point');
}

/** Konfiguracja globalna. */
$config = [
    /** Ustawienia bazy danych. */
    'db' => [
        /** Nazwa hosta serwera bazy danych. */
        'host' => 'localhost',
        /** Port serwera bazy danych. */
        //'port' => 3306,
        'port' => 3336,
        /** Nazwa użytkownika serwera bazy danych. */
        'username' => 'root',
        /** Hasło użytkownika serwera bazy danych. */
        'password' => null,
        /** Nazwa bazy danych. */
        'name' => 'php_marzec',
        /** Czy się ma łączyć? */
        'connect' => true,
        /** Czy ma rozpocząć transakcję? */
        'transaction' => false,
    ],
    /** Funkcja używana do szyfrowania haseł. */
    // wielokropek w nawiasie po nazwie funkcji: zwróć odwołanie do tej funkcji
    'hashFunc' => md5(...),
    /** Nazwa witryny. */
    'siteName' => 'Eduszach',
];