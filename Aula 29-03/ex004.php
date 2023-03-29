<?php

    /*
    ver na documenação as varias formas de colocar a data
    */

    $atual = new DateTime();
    echo "<br>" . $atual->format('d-m-Y H:i:s');

    $especifica = new DateTime('1990-01-22');// ano mes dia
    echo "<br>" . $especifica->format('dmY H:i:s');

    $texto = new DateTime('+1 month');//acrescenta 1 ano 
    echo "<br>" . $texto->format('d-m-Y H:i:s');

?>