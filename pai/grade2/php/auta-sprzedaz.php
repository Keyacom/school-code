<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablice wielowymiarowe</title>
</head>
<body>
    <?php
    
    $auta = [
        ['Volvo', 22, 18],
        ['BMW', 15, 13],
        ['Saab', 5, 2],
        ['Land Rover', 17, 15]
    ]
    ?>
    <table>
        <tr>
            <th>Nazwa
            <th>Zbiory
            <th>Sprzedany
    <?php
        foreach ($auta as $m) {
            echo '<tr>';
            foreach ($m as $i) {
                echo "<td>$i";
            }
        }
    ?>
    </table>
</body>
</html>