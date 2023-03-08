<?php
    if($_SERVER["REQUEST_METHOD" === 'GET']) {
        $msgN1 = "";
        $msgN2 = "";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ex016</title>
    <style>
            #reprovado {
                background-color: red;
                color: white;
                font-weight: bold;
            }

            #aprovado {
                background-color: green;
                color: white;
                font-weight: bold;
            }

            #warning {
                color: red;
            }
    </style>
</head>
<body>
    <h1>Cálculo de Média</h1>

    <form method="post"> <!--o method diz qual a forma do envio da informação pro script em php-->

        Nota 1: <br>
        <input type="text" name="nota1"><br>
        <span id="warning"><small><?= $msgN1; ?></small></span>

        <br><br>

        Nota 2: <br>
        <input type="text" name="nota2" id="">
        <span id="warning"><small><?= $msgN2; ?></small></span>

        <br><br>

        <input type="submit" value="Calcular">
    </form>
</body>
</html>

<?php

    if($_SERVER["REQUEST_METHOD"] === 'POST') {
        function calcMedia($n1, $n2){
            $media = ($n1+$n2)/2;
            return $media;
        }
        
        //ex013.php?nota1=8.0&nota2=7.0
        $n1 = $_POST["nota1"];//se colocar REQUEST tanto faz, pode get ou post no html
        $n2 = $_POST["nota2"];

        if(trim($n1) == ""){
            $msgN1 = "A nota 1 é obrigatória";
        } else if (trim($n2) == "") {
            $msgN2 = "A nota 2 é obrigatória";
        } else
            $media = calcMedia($n1,$n2);

        
        echo "Média = " . $media . "<br>";
        
        if($media >= 6.0) {
            echo "<span id='aprovado'>APROVADO!</span>";
        } else {
            echo "<span id='reprovado'>REPROVADO!</span>";
        }
    }
?>