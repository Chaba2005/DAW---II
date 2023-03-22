<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogo Acerta Num</title>
</head>
<body>
    <h1>Em qual número estou pensando?</h1>

    <form method="post">
        Numero:<br>
        <input type="number" name="numero">
        <br><br>
        <input type="submit" value="Acertei">
        <br><br>
    </form>
</body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"] === 'POST') {
        $v_numero = $_POST['numero'];
        $varArray = array(8,3,4,6,2,7,1,0);

        if(in_array($v_numero, $varArray)) {
            echo "<span style='color:green;font-weight:bold;'>Acertou!</span>";
        } else {
            echo "<span style='color:red;font-weight:bold;'>Errou! Tente de novo!</span>";
        }
    }
?>