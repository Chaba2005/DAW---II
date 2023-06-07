<?php

    try{
        $ra = $_POST["ra"];
        $nome = $_POST["nome"];
        $curso = $_POST["curso"];

        if((trim($ra) == "") || (trim($nome == ""))){
            echo "<span id 'warning'>RA e nome são obrigatórios!</span>";

        } else 
        include("connection.php");

        $stmt = $pdo->prepare("select * from alunos where ra = :ra");
        $stmt->bindParam(':ra', $ra);
        $stmt->execute();

        $rows = $stmt->rowCount();

        if($rows <= 0){
            $stmt = $pdo->prepare("insert into alunos (ra, nome, curso) values (:ra,:nome,:curso)");
            $stmt->bindParam(':ra',$ra);
            $stmt->bindParam(':nome',$nome);
            $stmt->bindParam(':curso',$curso);

            echo "<span id='sucess'>Aluno Cadastrado!</span>";
        } else {
            echo "<span id='error'>Ra ja existente!</span>";
        }

    }catch(Error) {
        
    }
?>