<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $data = getdate();

    $dzt = '';
    switch ($data['wday']) {
        case 0:
            $dzt = 'niedziela'; break;
        case 1:
            $dzt = 'poniedziałek'; break;
        case 2:
            $dzt = 'wtorek'; break;
        case 3:
            $dzt = 'środa'; break;
        case 4:
            $dzt = 'czwartek'; break;
        case 5:
            $dzt = 'piątek'; break;
        case 6:
            $dzt = 'sobota'; break;
    }

    echo "Dzisiaj jest $dzt.";
    ?>
</body>
</html>