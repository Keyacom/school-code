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

    # really wished PHP had Perl/Raku array constructs
    # like qw{styczeń luty marzec}...
    $miesGen = explode(
        ' ',
        'stycznia lutego marca kwietnia maja czerwca lipca sierpnia września października listopada grudnia'
    );

    $pad = strlen($data['mday']) == 1 ? '0' : '';

    echo "$pad{$data['mday']} {$miesGen[$data['mon'] - 1]} {$data['year']}r.";
    ?>
</body>
</html>