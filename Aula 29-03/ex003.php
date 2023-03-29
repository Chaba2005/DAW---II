<?php

    $turmas = array(
        "3DSD"=>array("201282"=>"Matheus Figueiredo",
                        "201605"=>"Ricardo Tadei Romero",
                        "201171"=>"Catarina Fagotti Bonifácio"),
        "2DSD"=>array("201111"=>"Marcos Mesquita",
                        "222222"=>"Cauã Homossexual",
                        "333333"=>"Parra Gay"),
        "2GEO"=>array("111111"=>"Lary Costa",
                        "444444"=>"Bia Salmento",
                        "666666"=>"Malu Marins")
    );

    if(!isset($_GET["turma"]) || (trim($_GET["turma"]) == "")) {
        echo"Informe a Turma";
    } else {
        $turma = strtoupper($_GET["turma"]); //POR ENQUANTO VIA URL
        echo "<h1>Alunos da turma " . $turma . "</h1>";
        echo"<table border='1px'>";

        foreach($turmas[$turma] as $aluno) {
            echo "<tr><td>" . $aluno . "</td></tr>";
        }

        echo "</table>";
    }
    
?>