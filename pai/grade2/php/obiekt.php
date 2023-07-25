<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programowanie obiektowe</title>
</head>
<body>
    <?php

    class Auto {
        private string $marka;
        private string $model;
        private int $przebieg;
        private string $kolor;
        private int $cena;
        private int $rokProdukcji;
        private int $bak = 10;
        private int $spalanie = 8;

        public function __construct($marka, $model, $przebieg) {
            $this->marka = $marka;
            $this->model = $model;
            $this->przebieg = $przebieg;
        }

        public function getMarka() {
            return $this->marka;
        }

        public function setMarka(string $value) {
            $this->marka = $value;
        }

        public function getModel() {
            return $this->model;
        }

        public function setModel(string $value) {
            $this->model = $value;
        }

        public function getPrzebieg() {
            return $this->przebieg;
        }

        public function setPrzebieg(int $value) {
            $this->przebieg = $value;
        }

        public function getKolor() {
            return $this->kolor;
        }

        public function setKolor(string $value) {
            $this->kolor = $value;
        }

        public function getCena() {
            return $this->cena;
        }

        public function setCena(int $value) {
            $this->cena = $value;
        }

        public function getRokProdukcji() {
            return $this->rokProdukcji;
        }

        public function setRokProdukcji(int $value) {
            $this->rokProdukcji = $value;
        }

        public function tankowanie($litry) {
            return $this->bak += $litry;
        }
        public function zasieg() {
            return $this->bak / $this->spalanie * 100;
        } 
    }

    $samochod = new Auto('Audi', 'A5', 100000);
    // $samochod->setMarka('Opel');
    // $samochod->model = 'Astra';
    // $samochod->przebieg = 99_000;
    // $samochod->kolor = 'szary';
    // $samochod->cena = 60_000;
    // $samochod->rokProdukcji = 2018;
    

    //echo "$samochod->marka<br>$samochod->model<br>$samochod->przebieg<br>$samochod->kolor<br>$samochod->cena<br>$samochod->rokProdukcji<br>";
    // echo $samochod->tankowanie(50);
    // echo "<br>Zasięg: {$samochod->zasieg()} km";
    echo "<pre>";
    // var_dump($samochod);
    echo $samochod->getModel() . "<br>";
    echo $samochod->getMarka() . "<br>";
    echo $samochod->getPrzebieg() . "<br>";
    echo "</pre>";

    // $auto2 = new Auto();
    // $auto2->marka = 'Peugeot';
    // $auto2->model = '5008';
    // $auto2->przebieg = 100_000;
    // $auto2->kolor = 'czarna';
    // $auto2->cena = 100_000;
    // $auto2->rokProdukcji = 2020;
    // $samochod->tankowanie(50);

    // echo "<pre>";
    // var_dump($auto2);
    // echo "</pre>";
    ?>
</body>
</html>
