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
            echo "<div id='success'>Funcionário cadastrado com sucesso!</div>";
        } else {
            echo "<div id='error'>Funcionário com o mesmo CPF já está cadastrado.</div>";
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

function buscar()
{
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {

        try {
            $stmt = consultar();

            echo "<form method='post' enctype='multipart/form-data'><table id='tabela' border='1px'>";

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
                 <div class='alinhar'>
                    <button type='submit' formaction='remove.php'>Excluir</button>
                    <button type='submit' formaction='edicao.php'>Editar</button>
                </div>
                 </form>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}

function consultar()
{
    $pdo = conectarBD();
    if (isset($_POST["cpf"]) && ($_POST["cpf"] != "")) {
        $cpf = $_POST["cpf"];
        if (isset($_POST['op'])) {
            if ($_POST['op'] == 'alf') $stmt = $pdo->prepare("select * from bandeco where cpf= :cpf order by idade");
            else $stmt = $pdo->prepare("select * from bandeco where cpf= :cpf order by nome");
        } else {
            $stmt = $pdo->prepare("select * from bandeco where cpf= :cpf order by departamento");
            $stmt->bindParam(':cpf', $cpf);
        }
    } else {
        if (isset($_POST['op'])) {
            if ($_POST['op'] == 'alf') $stmt = $pdo->prepare("select * from bandeco order by idade");
            else $stmt = $pdo->prepare("select * from bandeco order by nome");
        } else {
            $stmt = $pdo->prepare("select * from bandeco order by departamento");
        }
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
        echo "<div class=container>
        <p>Os dados do funcionário foram alterados!</p>
        </div>";
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

        $stmt->rowCount() . "Funcionário removido!";
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
