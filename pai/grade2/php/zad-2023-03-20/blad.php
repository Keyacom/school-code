<?php

$err = http_response_code();
if ($err >= 400) {
    // słowa 'const' można tylko używać w zakresie globalnym, więc muszę skorzystać
    // z funkcji define
    define('APPLICATION', true);
}
require_once __DIR__ . '/config.php';
$config['db']['connect'] = false;
$pageName = "Błąd $err";
require_once __DIR__ . '/common.php';

$text = [
    403 => ['zabronione', 'Nie masz uprawnień, aby uzyskać dostęp do tego zasobu.'],
    404 => ['nie znaleziono', 'Serwer nie mógł znaleźć żądanego zasobu.'],
];

$out = createDocument(<<<HTML
    <h1>HTTP {$err}: {$text[$err][0]}</h1>
    <p>{$text[$err][1]}</p>
    HTML, $pageName, $config)[0];

tryOutput($out);