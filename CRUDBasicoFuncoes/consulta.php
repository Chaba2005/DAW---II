<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CRUD - Controle de alunos</title>
</head>

<style>
    td {
        text-align: center;
    }
</style>

<body>

    <a href="index.html">Home</a>
    <hr>

    <h2>Consulta de Alunos</h2>
    <div>
        <form method="post">

            RA:<br>
            <input type="text" size="10" name="ra">
            <input type="submit" value="Consultar">
            <hr>
        </form>
    </div>

</body>

</html>

<?php
include("bd.php");

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    try {

        $stmt = consultar();

        echo "<form method='post'><table border='1px'>";
        echo "<tr><th></th><th>CPF</th><th>Nome</th><th>Idade</th><th>Departamento</th><th>Foto</th></tr>";

        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td><input type='radio' name='cpf' value='" . $row['cpf'] . "'>";
            echo "<td>" . $row['cpf'] . "</td>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['idade'] . "</td>";
            echo "<td>" . $row['departamento'] . "</td>";
            if ($row["foto"] == null) {
                echo "<td align='center'>-</td>";
            } else {
                echo "<td align='center'><img src='data:image;base64," . base64_encode($row["foto"]) . "' width='50px' height='50px'></td>";
                //base64 - Maneira de codificar dados binários em texto ASCII, informando ao navegador que os dados estão embutidos em uma imagem.
            }
            echo "</tr>";
            echo "</tr>";
        }

        echo "</table><br>
             
             <button type='submit' formaction='remove.php'>Excluir Aluno</button>
             <button type='submit' formaction='edicao.php'>Editar Aluno</button>
             
             </form>";
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>