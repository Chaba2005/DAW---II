<?php

    $str = "curso1=Informática&curso2=Edificações&curso3=Enfermagem";
    parse_str($str,$curso);
    print_r($curso);

    $str2 = "Informática Edificações Enfermagem";
    $cursos = explode(" ", $str2);
    print_r($cursos);

    $cursos2 = array("29", "03", "2023");
    $str3 = implode("/",$cursos2);
    echo($str3);
?>