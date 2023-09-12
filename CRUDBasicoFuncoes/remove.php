<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD - Controle de alunos</title>
</head>

<body>

<a href="index.html">Home</a> | <a href="consulta.php">Consulta</a>
<hr>

<h2>Exclusão de Funcionários</h2>

</body>
</html>

<?php

include("bd.php");

if (!isset($_POST["cpf"])) {
    echo "Selecione o funcionário a ser excluído!";
} else {
    $cpf = $_POST["cpf"];
    excluir($cpf);
}

?>