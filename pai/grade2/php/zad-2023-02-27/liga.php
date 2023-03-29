<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>piłka nożna</title>
	<link rel="stylesheet" href="styl2.css">
</head>
<body>

	<section id="baner">
		<h3>Reprezentacja Polski w piłce nożnej</h3>
		<img src="obraz1.jpg" alt="reprezentacja">
	</section>

	<section id="lewy">
		<form>
			<select name="pozycja">
				<option>Bramkarze</option>
				<option>Obrońcy</option>
				<option>Pomocnicy</option>
				<option>Napastnicy</option>
			</select>
			<input type="submit" name="submit" value="zobacz">
		</form>
		<img src="zad2.png" alt="piłka">
		<p>Autor: XXXXXXXXXX</p>
	</section>

	<section id="prawy">
		<ol>
		<?php
		$conn = mysqli_connect('localhost', 'root', null, 'baza_2tamz2');
		if ($conn) {
			if (isset($_GET['submit'])) {
				$poz = match ($_GET['pozycja']) {
					'Bramkarze' => 1,
					'Obrońcy' => 2,
					'Pomocnicy' => 3,
					'Napastnicy' => 4,
				};
				$sql = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id=$poz";
				$wynik = mysqli_query($conn, $sql);
				foreach ($wynik as $wiersz) {
					echo <<<HTML
					<li><p>{$wiersz['imie']} {$wiersz['nazwisko']}</p></li>
					HTML;
				}
			}
		} else {
			echo '<strong>Nie można się połączyć z serwerem bazy danych!</strong>';
		}
		?>
		</ol>
	</section>

	<section id="glowny">
		<h3>Liga mistrzów</h3>
	</section>

	<section id="liga">
		<?php
		try {
			$sql = "SELECT zespol, punkty, grupa FROM liga ORDER BY punkty DESC;";
			$wynik = mysqli_query($conn, $sql);
			foreach ($wynik as $wiersz) {
				echo <<<HTML
				<div class="info"><h2>{$wiersz['zespol']}</h2><h1>{$wiersz['punkty']}</h1><p>grupa: {$wiersz['grupa']}</p></div>
				HTML;
			}
		} finally {
			mysqli_close($conn);
		}
		?>
	</section>

</body>
</html>