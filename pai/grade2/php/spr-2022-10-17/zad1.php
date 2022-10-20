<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #main {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 1em;
        }
        #main > * {
            border: 1px solid black;
            border-radius: 1em;
            padding: 0.5em;
        }
    </style>
</head>
<body>
    <div id="main">
        <div>
            Za pomocą pętli for:<br>
            <?php
            for ( $i = 500; $i < 2000; $i += 50 ) {
                echo $i . "<br>";
            }
            ?>
        </div>
        <div>
            Za pomocą pętli while:<br>
            <?php
            $i = 500;
            while ( $i < 2000 ) {
                echo $i . "<br>";
                $i += 50;
            }
            ?>
        </div>
        <div>
            Za pomocą pętli do..while:<br>
            <?php
            $i = 500;
            do {
                echo $i . "<br>";
                $i += 50;
            } while ( $i < 2000 );
            ?>
        </div>
    </div>
</body>
</html>