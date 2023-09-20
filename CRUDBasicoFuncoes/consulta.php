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
            align-items: center;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px 0;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-family: Arial, sans-serif;
        }

        table {
            max-width: 400px;
            margin: 20px auto;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        button[type='submit'] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
            /* Espaçamento entre os botões */
            transition: background-color 0.3s ease;
        }

        button[type='submit']:hover {
            background-color: #0056b3;
        }

        /* Alinhe os botões lado a lado */
        button[type='submit'] {
            display: inline-block;
        }

        /* Limpe qualquer estilo padrão de botão */
        button[type='submit'] {
            border: none;
            outline: none;
        }

        .alinhar {
            display: flex;
            flex-direction: row;
        }
    </style>
</head>

<body>
    <header>
        <h1>CRUD - Controle de Funcionários</h1>
        <a href="index.html">Home</a>
    </header>

    <div class="container">
        <h2>Consulta de Funcionários</h2>
        <form method="post">
            <input type="text" size="10" name="cpf" placeholder="CPF">
            <input type="submit" value="Consultar">
        </form>

    </div>
</body>

</html>

<?php
include("bd.php");
buscar();
?>