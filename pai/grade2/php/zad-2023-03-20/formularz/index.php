<?php

const APPLICATION = true;
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../common.php';

$config['db']['connect'] = false;
[$out, $db] = createDocument(file_get_contents(__DIR__ . '/../szablony/formularz.html'), 'Użytkownicy', $config);
tryOutput($out);

// Rzecz z formularzem rejestracyjnym dzieje się w ../index.php
