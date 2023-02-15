<?php

    $nome = "Cotil";
    echo $nome;
    echo "<br><br>";

    var_dump($nome); //exibe o tipo de dado, tamanho usado e valor
    echo "<br><br>";

    $outroNome = "Unicamp";

    echo $nome . " " . $outroNome;
    echo "<br> <br>";

    unset($nome); //Remove a variável. Se quiser limpar várias, basta separar por ","

    if(isset($nome)) {
        echo $nome;
        echo "<br> <br>";
    } else {
        echo "a variável está vazia";
    }

    $valor = 50.15;
    echo $valor;
    echo "<br> <br>";

    $aprovado = true;
    echo $aprovado;
    echo "<br> <br>";

    $disciplinas = array("BD", "LP", "DAW");
    echo $disciplinas[2];
    echo "<br> <br>";


    //===================CONSTANTES====================


    define("PI", 3.14);
    define("NOME_ALUNO", "Maria");

    //https://secure.php.net/manual/pt_BR/reserves_constants.php - constantes pre definidas do PHP

    $resultado = 3 * PI;
    echo $resultado . "<br> <br>";
    echo "Nome do aluno: " . NOME_ALUNO . "<br> <br>";
?>