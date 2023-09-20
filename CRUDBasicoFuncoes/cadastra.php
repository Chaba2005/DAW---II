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
            padding: 20px;
            text-align: center;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        h2 {
            margin-top: 20px;
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
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

        hr {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        #success {
            margin: 20px auto;
            max-width: 600px;
            color: green;
            font-weight: bold;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 15px;
        }

        /* Estilo para mensagens de erro */
        #error {
            margin: 20px auto;
            max-width: 600px;
            color: red;
            font-weight: bold;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <header>
        <h1>CRUD - Controle de Funcionários</h1>
        <a href="index.html">Home</a>
    </header>

    <div class="container">
        <h2>Cadastro de Funcionários</h2>
        <form method="post" enctype="multipart/form-data">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="idade">Idade:</label>
            <input type="text" id="idade" name="idade">

            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf">

            <label for="departamento">Departamento:</label>
            <select id="departamento" name="departamento">
                <option value="">Selecione</option>
                <option value="Nutrição">Nutrição</option>
                <option value="Administração">Administração</option>
                <option value="Limpeza">Limpeza</option>
                <option value="Tia do Bandeco">Tia do Bandeco</option>
            </select>

            <label for="foto">Foto:</label>
            <input type="file" name="foto" accept="image/gif, image/png, image/jpeg">

            <input type="submit" value="Cadastrar">
        </form>
    </div>

</body>

</html>

<?php
include("bd.php");

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    //inserindo dados
    define('TAMANHO_MAXIMO', (2 * 1024 * 1024));
    $nome = $_POST["nome"];
    $idade = (int) $_POST["idade"];
    $cpf = $_POST["cpf"];
    $departamento = $_POST["departamento"];
    $foto = $_FILES['foto'];
    $nomeFoto = $foto['name'];
    $tipoFoto = $foto['type'];
    $tamanhoFoto = $foto['size'];

    if (empty($nome) || empty($departamento) || empty($idade) || empty($cpf) || empty($foto)) {
        echo "<span id='warning'>Os campos são obrigatórios!</span>";
    } else if (($nomeFoto != "") && (!preg_match('/^image\/(jpeg|png|gif)$/', $tipoFoto))) { //validação tipo arquivo
        echo "<span id='error'>Não é uma imagem válida!</span>";
    } else if ($tamanhoFoto > TAMANHO_MAXIMO) { //validação tamanho arquivo
        echo "<span id='error'>A imagem deve possuir no máximo 2 MB</span>";
    } else {
        cadastrar($nome, $cpf, $departamento, $idade, $foto);
    }
}
?>