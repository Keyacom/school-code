<?php

# zaimportuj konfigurację
require_once __DIR__ . '/config.php';

/** Ta funkcja tworzy nowy dokument, nowe połączenie do bazy danych (jeśli `$localConfig['db']['connect']` ma wartość `false`, to jest to `null`) i zwraca je. */
function createDocument(string $content, string $pageName = '', array $localConfig = null) {
    global $config;
    if ($localConfig === null) {
        $localConfig = $config;
    }
    if (isset($localConfig['db']['connect']) && $localConfig['db']['connect']) {
        // Destrukturyzacja zmiennej $localConfig
        [
            'host' => $dbHost,
            'username' => $dbUsername,
            'password' => $dbPassword,
            'name' => $dbName,
            'port' => $dbPort,
        ] = $localConfig['db'];
        /** Połączenie z bazą danych. */
        $dbConnection = new mysqli(
            hostname: $dbHost,
            username: $dbUsername,
            password: $dbPassword,
            database: $dbName,
            port: $dbPort,
        );
        if (!$dbConnection) {
            trigger_error("Nie można się połączyć z serwerem bazy danych!", E_USER_ERROR);
        }
        if ($localConfig['db']['transaction']) {
            if (!$dbConnection?->begin_transaction()) {
                trigger_error("Nie można rozpocząć transakcji!", E_USER_ERROR);
            }
        }
    } else {
        $dbConnection = null;
    }
    $title = implode(" ", $pageName ? [$pageName, '|', $localConfig['siteName']] : [$localConfig['siteName']]);

    $out = new DOMDocument;
    // tagi takie jak header, footer, itd. powodują uwagi (niezdefiniowany element)
    // poniższe sprawi, że te uwagi znikną
    libxml_use_internal_errors(true);
    $out->loadHTMLFile(__DIR__ . "/szablony/baza.html");

    setInnerHTML($out->getElementsByTagName('main')->item(0), $content);
    setInnerHTML($out->getElementsByTagName('title')->item(0), $title);
    setInnerHTML($out->getElementsByTagName('footer')->item(0), <<<HTML
        Wykonał: Wojciech Marzec<br>
        Copyright (C) Eduszach 2023-2023. Wszelkie prawa zastrzeżone.
        HTML);

    return [$out, $dbConnection];
}

/**
 * Funkcję zrobiłem, eksperymentując z implementacjami na https://stackoverflow.com/questions/2778110.
 *
 * Notki na jej temat dostępne są na https://stackoverflow.com/questions/2087103/how-to-get-innerhtml-of-domnode.
 */
function setInnerHTML(DOMElement $element, string $content) {
    $DOMInnerHTML = new DOMDocument();
    $DOMInnerHTML->loadHTML(
        //mb_convert_encoding("<div>$content</div>", 'HTML-ENTITIES', 'UTF-8')
        <<<HTML
        <html>
            <head>
                <meta charset="utf-8">
            </head>
            <body>
                $content
            </body>
        </html>
        HTML,
    );
    foreach (
        $DOMInnerHTML->getElementsByTagName('body')->item(0)->childNodes
        as $contentNode
    ) {
        $contentNode = $element->ownerDocument->importNode($contentNode, true);
        $element->appendChild($contentNode);
    }
}

/**
 * Sprawdza, czy HTML został zapisany poprawnie, i go wypisuje na stronę, w przeciwnym razie wypisuje błąd.
 */
function tryOutput(DOMDocument $document) {
    if (($html = $document->saveHTML()) !== false) {
        echo $html;
    } else {
        trigger_error("HTML nie został zapisany poprawnie", E_USER_ERROR);
    }
}

/** Alternatywa dla trim, która poprawnie usuwa spacje Unicode z początku i końca tekstu (ponieważ nie ma funkcji `mb_trim`). */
function uTrim($e) {
    return preg_replace('/\A\s+|\s+\Z/u', '', $e);
}