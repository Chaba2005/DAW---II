<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ex011</title>
</head>
<body>
    <?php
    
    include("ex010.php");
    //require("ex010.php"); a diferença é que o require caso de erro ele vai mostrar na tela

    $media = calcMedia(9.0, 10.0);
    echo $media;

    echo "<br><br>";

    soma(1,2,3);
    
    ?>
</body>
</html>