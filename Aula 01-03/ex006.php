<?php

$n=1;
$tabuada=7;

while($n<=10) {
    echo $n. " x ". $tabuada . " = " . ($n * $tabuada) . "<br>";
    if($n==7) break;
    $n++;
} // do while é da mesma forma que as outras linguagens

do {
    $n++;
    if($n==7) continue;
    echo $n. " x ". $tabuada . " = " . ($n * $tabuada) . "<br>";   
}while($n<10)

?>