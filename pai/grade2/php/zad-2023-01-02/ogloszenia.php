<!DOCTYPE html>
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
<section class="kolumny" id="kol1"> <h2>Kategorie ogłoszeń</h2>
<ol>
	<li>Książki</li>
	<li>Muzyka</li>
	<li>Filmy</li>
</ol>
<img src="ksiazki2.jpg" alt="Kupię/sprzedam książkę" id="obrazek"/>
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
<?php

$db = [
  'host' => 'localhost',
  'user' => 'root',
  'password' => null,
  'base' => 'pierwsza'
];

$conn = mysqli_connect($db['host'], $db['user'], $db['password'], $db['base']);
if ($conn) {
  try {
    $sql = 
    "select ogloszenie.id, tytul, tresc, telefon
    from uzytkownik, ogloszenie
    where uzytkownik_id=uzytkownik.id and kategoria=1;";
    $wynik = mysqli_query($conn, $sql);

    while ($wiersz = mysqli_fetch_array($wynik, MYSQLI_ASSOC)) {
      $wyjscie = ["<h3>{$wiersz['id']}. {$wiersz['tytul']}</h3>"];
      $wyjscie[] = "<p>{$wiersz['tresc']}</p>";
      $wyjscie[] = "<p>telefon kontaktowy: {$wiersz['telefon']}</p>";
      echo implode("", $wyjscie);
    }
  } finally {
    mysqli_close($conn);
  }
} else {
  echo "<strong>Nie mogę się połączyć z bazą danych!</strong>";
}

?>

</section>
<footer id="stopka"><p>Portal ogłoszeniowy opracował:XXXXXXXXX</p>
 </footer>

</div>
</body>
</html>