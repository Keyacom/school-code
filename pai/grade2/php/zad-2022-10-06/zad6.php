<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pętle</title>
    <style>
        table {
            border-collapse: collapse;
        }
        table > * > tr > td, table > tr > td {
            border: 1px solid black;
            min-width: 3ch;
        }
    </style>
</head>
<body>
    <table>
    <?php
        $zakres = range(1, 10);
        $wyniki = [['X']];
        foreach ($zakres as $f) {
            $wyniki[0][] = $f;
        }
        foreach (array_fill(0, 11, 1) as $f) {
            $wyniki[] = [$f];
        }
        foreach ($zakres as $f) {
            foreach ($zakres as $g) {
                $wyniki[$f][] = $g;
            }
        }
        foreach ([0, ...$zakres] as $f) {
            echo "<tr>";
            foreach ($wyniki[$f] as $g) {
                if (gettype($g) !== "string" && $f !== 0) {
                    $h = $g * $f;
                } else {
                    $h = $g;
                }
                echo "<td>$h</td>";
            }
            echo "</tr>";
        }
    ?>
    </table>
</body>
</html>