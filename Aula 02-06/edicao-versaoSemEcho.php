<?php

if (!isset($_POST["raAluno"])) {
    echo "Selecione o aluno a ser editado!";
} else {
    $ra = $_POST["raAluno"];

    try {
        include("conexaoBD.php");
        $stmt = $pdo->prepare('select * from alunos where ra = :ra');
        $stmt->bindParam(':ra', $ra);
        $stmt->execute();

        $edificacoes = "";
        $enfermagem = "";
        $geodesia = "";
        $informatica = "";
        $mecanica = "";
        $qualidade = "";        

        while ($row = $stmt->fetch()) {
            $nome = $row['nome'];
            $curso = $row['curso'];

            //para setar o curso correto no combo
            if ($row['curso'] == "Edificações") {
                $edificacoes = "selected";
            } else if ($row['curso'] == "Enfermagem") {
                $enfermagem = "selected";
            } else if ($row['curso'] == "GeoCart") {
                $geodesia = "selected";
            } else if ($row['curso'] == "Informática") {
                $informatica = "selected";
            } else if ($row['curso'] == "Mecânica") {
                $mecanica = "selected";
            } else if ($row['curso'] == "Qualidade") {
                $qualidade = "selected";
            }            
        }

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }

    $pdo = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD - Controle de alunos</title>
</head>

<body>
    <a href="index.html">Home</a> | <a href="consulta.php">Consulta</a>
    <hr>
    <h2>Edição de Alunos</h2>

    <form method="post" action="altera.php">
        RA:<br>
        <input type='text' size='10' name='ra' value='<?= $ra ?>' readonly><br><br>
        Nome:<br>
        <input type='text' size='30' name='nome' value='<?= $nome ?>'><br><br>
        Curso:<br>
        <select name='curso'>
            <option></option>
            <option value='Edificações' <?= $edificacoes ?>>Edificações</option>
            <option value='Enfermagem' <?= $enfermagem ?>>Enfermagem</option>
            <option value='GeoCart' <?= $geodesia ?>>Geodésia e Cartografia</option>
            <option value='Informática' <?= $informatica ?>>Informática</option>
            <option value='Mecânica' <?= $mecanica ?>>Mecânica</option>
            <option value='Qualidade' <?= $qualidade ?>>Qualidade</option>
         </select><br><br>       
         <input type='submit' value='Salvar Alterações'>        
    </form>   
    <hr>
</body>
</html>