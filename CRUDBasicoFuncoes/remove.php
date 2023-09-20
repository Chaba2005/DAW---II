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
        <h2>Exclusão de Funcionários</h2>
        <?php
        include("bd.php");

        if (!isset($_POST["cpf"])) {
            echo "<p>Selecione o funcionário a ser excluído!</p>";
        } else {
            $cpf = $_POST["cpf"];
            excluir($cpf);
            echo "<p>Funcionário excluído com sucesso!</p>";
        }
        ?>
        <a href="consulta.php">Voltar para a consulta</a>
    </div>
</body>
</html>
