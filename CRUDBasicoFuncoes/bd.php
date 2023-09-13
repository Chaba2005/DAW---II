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

function buscarEdicao($cpf)
{
    $pdo = conectarBD();
    $stmt = $pdo->prepare('select * from bandeco where cpf = :cpf');
    $stmt->bindParam(':cpf', $cpf);
    $stmt->execute();
    return $stmt;
}

function alterar($cpf, $novoNome, $novoDp, $idade, $foto)
{
    $foto = $_FILES['foto'];
    $nomeFoto = $foto['name'];
    $tipoFoto = $foto['type'];
    $tamanhoFoto = $foto['size'];
    $pdo = conectarBD();
    if ($nomeFoto != "") {
        $fotoBinario = file_get_contents($foto['tmp_name']);
        $stmt = $pdo->prepare('UPDATE bandeco SET nome = :novoNome, departamento = :novoDp, idade = :idade, foto = :foto  WHERE cpf = :cpf');
        $stmt->bindParam(':novoNome', $novoNome);
        $stmt->bindParam(':novoDp', $novoDp);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':idade', $idade);
        $stmt->bindParam(':foto', $fotoBinario);
    } else {
        $stmt = $pdo->prepare('UPDATE bandeco SET nome = :novoNome, departamento = :novoDp, idade = :idade WHERE cpf = :cpf');
        $stmt->bindParam(':novoNome', $novoNome);
        $stmt->bindParam(':novoDp', $novoDp);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':idade', $idade);
    }
    try {
        $stmt->execute();
        echo "Os dados do funcionário foram alterados!";
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

function excluir($cpf)
{
    try {
        $pdo = conectarBD();
        $stmt = $pdo->prepare('DELETE FROM bandeco WHERE cpf = :cpf');
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();

        echo $stmt->rowCount() . "Funcionário removido!";
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
