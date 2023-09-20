<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD - Controle de Funcionários</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        h1 {
            margin: 0;
        }

        .container {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-top: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

    
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="file"] {
            width: 100%;
            margin-bottom: 15px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        

        select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        img {
            width: 50px;
            height: 50px;
            margin-top: 10px;
        }

        hr {
            margin-top: 20px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <h1>CRUD - Controle de Funcionários</h1>
    </header>

    <div class="container">
        <h2>Edição de Funcionários</h2>
        <?php
        include("bd.php");

        if (!isset($_POST["cpf"])) {
            echo "<p>Selecione o funcionário a ser editado!</p>";
        } else {
            $cpf = $_POST["cpf"];

            try {
                $stmt = buscarEdicao($cpf);
                $nutricao = "";
                $administracao = "";
                $limpeza = "";
                $tia = "";

                while ($row = $stmt->fetch()) {
                    $foto = $row['foto'];
                    // Definir o valor correto para o departamento no menu suspenso
                    switch ($row['departamento']) {
                        case "Nutrição":
                            $nutricao = "selected";
                            break;
                        case "Administração":
                            $administracao = "selected";
                            break;
                        case "Limpeza":
                            $limpeza = "selected";
                            break;
                        case "Tia do Bandeco":
                            $tia = "selected";
                            break;
                    }

                    echo "<form method='post' action='altera.php' enctype='multipart/form-data'>\n";
                    echo "CPF:<br>\n";
                    echo "<input type='text' size='10' name='cpf' value='$row[cpf]' readonly><br><br>\n";
                    echo "Nome:<br>\n";
                    echo "<input type='text' size='30' name='nome' value='$row[nome]'><br><br>\n";
                    echo "Idade:<br>\n";
                    echo "<input type='text' size='30' name='idade' value='$row[idade]'><br><br>\n";
                    echo "Foto:<br>";

                    if ($foto == "") {
                        echo "-<br><br>";
                    } else {
                        echo "<img src='data:image;base64," . base64_encode($foto) . "' alt='Foto'><br><br>";
                    }

                    echo "<input type='file' name='foto'><br><br>\n";
                    echo "Departamento:<br>\n";
                    echo "<select name='departamento'>\n";
                    echo "<option></option>\n";
                    echo "<option value='Nutrição' $nutricao>Nutrição</option>\n";
                    echo "<option value='Administração' $administracao>Administração</option>\n";
                    echo "<option value='Limpeza' $limpeza>Limpeza</option>\n";
                    echo "<option value='Tia do Bandeco' $tia>Tia do Bandeco</option>\n";
                    echo "</select><br><br>\n";
                    echo "<input type='submit' value='Salvar Alterações'>\n";
                    echo "<hr>\n";
                    echo "</form>";
                }
            } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
        ?>
        <a href="consulta.php">Voltar para a consulta</a>
    </div>
</body>
</html>
