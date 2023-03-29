<?php
    $arrayExemplo = array( "Linguagem1" => "Php", "Linguagem2" => "SQL", "Linguagem3" => 100, "Lingaugem4" => "Assembler");

    print_r($arrayExemplo);

    sort($arrayExemplo);

    echo "<hr>Após 'ordernar' com sort(array)<br> ";
    print_r($arrayExemplo);

    rsort($arrayExemplo);

    echo "<hr>Após 'ordenar ao contrário' com rsort(array)<br> ";
    
     print_r($arrayExemplo);

?>