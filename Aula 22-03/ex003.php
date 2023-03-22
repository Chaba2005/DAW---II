<?php
    $meuArray = array("Maçã", "Melão", "Uva");

    //echo($meuArray); não funciona, pq echo imprime string
    //echo($meuArray[0]; funciona, pq na posição 0 tem uma string)

    print_r($meuArray); //imprime o array

    unset($meuArray[1]); //remover um valor do meio
    echo "<br>";
    print_r($meuArray);

    $meuArray[1] = "Banana"; //adiciona um valor
    echo "<br>";
    print_r($meuArray);

    sort($meuArray); //Organiza valores
    echo "<br>";
    print_r($meuArray);

    echo count($meuArray); //Conta o número de posições
    echo "<br>";
    echo sizeof($meuArray); //Tamanho da array

    /*
        for ($i == 0; $i <= sizeof($meuArray); $i++) {
            echo $meuArray[$i] . ", ";
        }
    */

    foreach($meuArray as $fruta) {
        echo $fruta . ", ";
    }

    echo "<br>";

    array_push($meuArray, "Laranja");
    print_r($meuArray);

    echo "<br>";

    array_pop($meuArray); //remove o último elemento
    print_r($meuArray);

    echo "<br>";

    array_shift($meuArray); //Remove o primeiro elemento
    print_r($meuArray);

    echo "<br>";

    array_unshift($meuArray); //Adiciona na primeira posição
    print_r($meuArray);

    echo "<br>";

    $key = in_array("Melão", $meuArray); //Procura o item no array
    echo $key;
?>