<?php

function conectarBD()
{
    try {
        $pdo = new PDO("mysql:host=143.106.241.3;dbname=cl201605;charset=utf8", "cl201605", "cl*20122005");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        $output = 'Impossível conectar BD : ' . $e . '<br>';
        echo $output;
    }
}

function cadastrar($nome, $cpf, $departamento, $idade, $foto)
{
    try {

        $pdo = conectarBD();

        $rows = verificarCadastro($cpf, $pdo);

        if ($rows <= 0) {

            if ($foto['name'] == "") {
                $fotoBinario = null;
            } else {
                // Lendo o conteudo do arq para uma var
                $fotoBinario = file_get_contents($foto['tmp_name']);
            }

            $stmt = $pdo->prepare("insert into bandeco (nome, idade, departamento, cpf, foto) values(:nome, :idade, :departamento, :cpf, :foto)");
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':departamento', $departamento);
            $stmt->bindParam(':idade', $idade);
            $stmt->bindParam(':foto', $fotoBinario);
            $stmt->execute();

            echo "<span id='sucess'>Funcionário Cadastrado!</span>";
        } else {
            echo "<span id='error'>Funcionário já existente!</span>";
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


function verificarCadastro($cpf, $pdo)
{
    //verificando se o RA informado já existe no BD para não dar exception
    $stmt = $pdo->prepare("select * from bandeco where cpf = :cpf");
    $stmt->bindParam(':cpf', $cpf);
    $stmt->execute();

    $rows = $stmt->rowCount();
    return $rows;
}

function consultar()
{
    $pdo = conectarBD();
    if (isset($_POST["cpf"]) && ($_POST["cpf"] != "")) {
        $cpf = $_POST["cpf"];
        $stmt = $pdo->prepare("select * from bandeco where cpf= :cpf order by departamento, nome");
        $stmt->bindParam(':cpf', $cpf);
    } else {
        $stmt = $pdo->prepare("select * from bandeco order by departamento, nome");
    }

    $stmt->execute();

    return $stmt;
}

function buscarEdicao($ra)
{
    $pdo = conectarBD();
    $stmt = $pdo->prepare('select * from cpf where cpf = :cpf');
    $stmt->bindParam(':cpf', $ra);
    $stmt->execute();
    return $stmt;
}

function alterar($ra, $novoNome, $novoCurso)
{
    try {
        $pdo = conectarBD();
        $stmt = $pdo->prepare('UPDATE alunos SET nome = :novoNome, curso = :novoCurso WHERE ra = :ra');
        $stmt->bindParam(':novoNome', $novoNome);
        $stmt->bindParam(':novoCurso', $novoCurso);
        $stmt->bindParam(':ra', $ra);
        $stmt->execute();

        echo "Os dados do aluno de RA $ra foram alterados!";
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

function excluir($ra)
{
    try {
        $pdo = conectarBD();
        $stmt = $pdo->prepare('DELETE FROM alunos WHERE ra = :ra');
        $stmt->bindParam(':ra', $ra);
        $stmt->execute();

        echo $stmt->rowCount() . " aluno de RA $ra removido!";
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
