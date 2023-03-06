<?php
if (isset($_POST['ok'])) {
    if ($conn = mysqli_connect('localhost', 'root', null, 'baza_restauracja_2tamz2')) {
        try {
            $data = $_POST['data'];
            $osoby = $_POST['osoby'];
            $tel = $_POST['tel'];
            $do = isset($_POST['do']);

            $sql = <<<SQL
            INSERT INTO rezerwacje
            SET
            data_rez='$data',
            liczba_osob=$osoby,
            telefon='$tel';
            SQL;
            mysqli_query($conn, $sql);
        } finally {
            echo 'Dodano rezerwację do bazy';
            mysqli_close($conn);
        }
    } else {
        echo "Nie można się połączyć z serwerem bazy danych!";
    }
}