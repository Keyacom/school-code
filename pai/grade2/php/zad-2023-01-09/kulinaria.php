<?php

$conn = new mysqli('localhost', 'root', null, 'baza');

?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset='utf8'>
	<title>Restauracja Kulinaria.pl</title>
	<link rel='stylesheet' href='styl4.css'/>
	</head>
	<body>
	<header id='baner'>
	<h2>Restauracja Kulinaria.pl Zaprasza!</h2>
	</header>
	<section id='kol1'>
	<p>Danie mięsne zamówisz już od 
	<?php
	if ($conn->connect_error) {
		?>
		<strong>Nie mogę się połączyć z bazą danych!</strong>
		<?php
	} else {
		try {
			$sql = 'SELECT MIN(cena) AS min_cena FROM dania WHERE typ=2;';
			$wynik = $conn->query($sql);
			while ($wiersz = $wynik->fetch_assoc()) {
				echo $wiersz['min_cena'];
			}
	?>
	złotych
	</p>
	<img src='menu.jpg' alt='Pyszne spaghetti' width="400"/><br>
	<a href='menu.jpg'>Pobierz obraz</a>
	
	</section>
	<section id='kol2'>
	<h2>Przekąski</h2>
	<?php
		$sql = 'SELECT id, nazwa, cena FROM dania WHERE typ=3;';
		$wynik = $conn->query($sql);
		while ($wiersz = $wynik->fetch_assoc()) {
			echo "<p>{$wiersz['id']} {$wiersz['nazwa']} {$wiersz['cena']}</p>";
		}
	?>
	</section>
	<section id='kol3'>
	<h2>Napoje</h2>
	<?php
		$sql = 'SELECT id, nazwa, cena FROM dania WHERE typ=4;';
		$wynik = $conn->query($sql);
		while ($wiersz = $wynik->fetch_assoc()) {
			echo "<p>{$wiersz['id']} {$wiersz['nazwa']} {$wiersz['cena']}</p>";
		}
	?>
	</section>
	<footer id='stopka'>
	Stronę internetową opracował <i>Jakiś gość z OKE</i>
	</footer> 
	</body>
</html>
<?php
	} finally {
		$conn->close();
	}
}