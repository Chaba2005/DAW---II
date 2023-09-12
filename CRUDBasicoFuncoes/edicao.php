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

</body>
</html>

<?php

include("bd.php");

if (!isset($_POST["cpf"])) {
    echo "Selecione o funcionário a ser editado!";
} else {
    $cpf = $_POST["cpf"];

    try {

        $stmt = buscarEdicao($cpf);

        $nutricao = "";
        $administracao = "";
        $limpeza = "";
        $tia = "";

        while ($row = $stmt->fetch()) {

            //para setar o curso correto no combo
            if ($row['departamento'] == "Nutrição") {
                $nutricao = "selected";
            } else if ($row['departamento'] == "Administração") {
                $administracao = "selected";
            } else if ($row['departamento'] == "Limpeza") {
                $limpeza = "selected";
            } else if ($row['departamento'] == "Tia do Bandeco") {
                $tia = "selected";
            }

            echo "<form method='post' action='altera.php'>\n
            CPF:<br>\n
            <input type='text' size='10' name='cpf' value='$row[cpf]' readonly><br><br>\n
            Nome:<br>\n
            <input type='text' size='30' name='nome' value='$row[nome]'><br><br>\n
            Idade:<br>\n
            <input type='text' size='30' name='idade' value='$row[idade]'><br><br>\n
            Nome:<br>\n
            <input type='file' name='foto' accept='image/gif, image/png, image/jpeg' ><br>

            Departamento:<br>\n
            <select name='departamento'>\n
                <option></option>\n
                 <option value='Edificações' $nutricao>Nutrição</option>\n
                <option value='Enfermagem' $administracao>Administracão</option>\n
                <option value='GeoCart' $limpeza>Limpeza</option>\n
                <option value='Informática' $tia>Tia do Bandeco</option>\n
             </select><br><br>\n        
             <input type='submit' value='Salvar Alterações'>\n        
             <hr>\n
            </form>";
        }

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }

}

?>