<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição</title>
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

        p {
            margin: 20px 0;
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
        <h2>Alteração de Funcionários</h2>
        <?php
        include("bd.php");

        if (!isset($_POST["cpf"])) {
            echo "<p>Selecione o funcionário a ser editado!</p>";
        } else {
            $cpf = $_POST['cpf'];
            $novoNome = $_POST['nome'];
            $novoDp = $_POST['departamento'];
            $idade = $_POST['idade'];
            $foto = $_FILES['foto'];
            alterar($cpf, $novoNome, $novoDp, $idade, $foto);
        }
        ?>
        <a href="consulta.php">Voltar para a consulta</a>
    </div>
</body>

</html>