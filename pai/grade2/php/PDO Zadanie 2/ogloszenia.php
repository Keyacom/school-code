<html>
  <head>
   <meta charset="UTF-8" />
    <title>
      Portal ogłoszeniowy
    </title>
    <link rel="stylesheet" href="styl1.css" type="text/css" />
  </head>
  <body>    
 <div id="ramka">
<header id="naglowek"><h1>Portal ogłoszeniowy</h1>
</header>
<section class="kolumny" id="kol1"> <h2><b>Kategorie ogłoszeń</b></h2>
<br>
<ol>
	<li>Książki</li>
	<li>Muzyka</li>
	<li>Filmy</li>
</ol>
<br>
<br>
<img src="ksiazki2.jpg" alt="Kupię/sprzedam książkę" id="obrazek"/>
<br>
<br>
<br>
<table id="tabelka">
<tr>
	<td class="wiersz">Liczba ogłoszeń</td> <td  class="wiersz">Cena ogłoszenia</td> <td class="wiersz">Bonus</td>
</tr>
<tr>
	<td>1-10</td> <td>1 PLN</td> <td rowspan="3">Subskrypcja newslettera to upust 0,20 PLN na ogłoszenie</td>
</tr>
<tr>
	<td>11-50</td> <td>0,80 PLN</td> 
</tr>
<tr>
	<td>51 i więcej</td> <td>0,60 PLN</td >
</tr>
</table>

</section>
<section class="kolumny" id="kol2"> <h2><b>Ogłoszenia kategorii książki</b></h2>
<br>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=pdo_marzec', 'root', null);
$wynik = $pdo->query('SELECT ogloszenie.id, tytul, tresc, telefon FROM ogloszenie JOIN uzytkownik ON uzytkownik.id=uzytkownik_id WHERE kategoria=1;');
foreach ($wynik as $wiersz) {
  echo <<<HTML
  <h1>{$wiersz['id']} {$wiersz['tytul']}</h1>
  <p>{$wiersz['tresc']}</p>
  <p>telefon kontaktowy: {$wiersz['telefon']}</p>
  HTML;
}

?>

</section>
<footer id="stopka"><p>Portal ogłoszeniowy opracował:XXXXXXXXX</p>
 </footer>

</div>
</body>
</html>