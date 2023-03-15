<?php

    $texto = " cotil - unicamp ";

    //trim - Retira espaço no inicio e final de uma string
    echo "-" . trim($texto) . "-" . "<br>";;

    //Retira espaço em branco (ou outros caracteres) do final da string
    echo "-" . ltrim($texto) . "-" . "<br>";

    ///ltrim - Retira espaços em branco (ou outros caracteres) do inicio da string
    echo "-" . rtrim($texto) . "-" . "<br>";

    //tudo maiuscula
    echo strtoupper($texto) . "<br>";

    //tudo minusculo
    echo strtolower($texto) . "<br>";

    //1a letra maiuscula
    echo "uc: " . ucfirst($test) . "<br>";

    //1as letras maiusculas 
    echo ucwords($texto) . "<br>";

    //retorna o tamanho da String
    echo strlen($texto) . "<br>";

    //reversao da String 
    echo strrev($texto) . "<br>";

    //quebra a string a cada 3 caracteres
    $str = str_split($texto, 3);
    print_r($str);//utilizamos para imprimir arrays 

    echo "<br>";

    //Encontra a posiçao da primeira ocorrencia de uma string 
    echo strpos($texto, "unicamp") . "<br>"; 

    $email = "rtromero.sp@gmail.com";

    //retrona a String a partir do caracter informado "@"
    echo strchr($email, "@") . "<br>";

    //retorna a String antes do caracter informado "@"
    echo strchr($email, "@", true) . "<br>";

    //Retorna uma parte de uma string 
    echo substr('abcdef', 1) . "<br>"; //bcdef
    echo substr('abcdef', 1, 3) . "<br>"; //bcd

    echo str_replace("i", "X", $texto) . "<br>"; 

    //casting 
    $foo = "0"; // $foo é string (ASCII 48)
    $foo += 2;  // $foo é agora um interio (2)
    $foo = $foo + 1.3; // $foo pe agora um float (3.3)
    echo $foo;
    echo "<br>";

    $senha = "minhasenha";

    /*
    md5 - gera uma copia criptografada - mao unica 
    ** algoritmo de um hash de 128bits - 32 caracteres
    ** -> problema: para a mesma string, sempre o mesmo resultado. Facil achaar na internet listas com resultados.
    ** -> solução: concatenar um salt 
    */
    echo "<br> *** md5 ***<br>";
    $x = md5($senha);
    echo($x);
    echo "<br>";

    if(md5($senha) == $x) {
        echo "Senha ok!<br><br>";
    }

    //com salt - Uma string de salt para base da encriptação 
    $salt = "c0tilUn1camp";
    $senha = $senha . $salt;
    echo "senha = " . $senha;
    echo "<br>";

    /*
     sha1 - gera uma copia criptografada - mao unica
     160bits - 40caracteres
     considerar a mesma regra de segurança do salt, abordada no md5
     */

     echo "<br> *** sha1 ***<br>";
     $x = sha1($senha);
     echo $x;
     echo "<br>";

     if(sha1($senha) == $x) {
        echo "Senha ok!<br><br>";
     }

     /*
      crypt - gera uma copia criptografada 
      ** retornara uma string criptografada usando o algoritmo de encriptação Unix
      Standard DES-based ou algoritmos alternatiso disponiveis do sistema.
     */
    echo "<br> *** crypt ***<br>";

    // o 2o parametro é o salt, que se nao fornecido, sera gerado randomicamente pelo PHP cada vez que chaamar esta funcao.
    $x = crypt($senha, "");
    //$x = crypt($senha, "c0tilUn1camp");
    echo $x;
    echo "<br>";

    if(crypt($senha, "") == $x) {
         echo "Senha ok!<br><br>";
    }

    /*
        BASE64
        É um método para codificação dos dados para transferencia na Internet. 
        Ela e uma codificacao de mao dupla, e usando uma segunda funcao voce pode
        descobrir a string original de uma string codificada.
    */

        $string = 'O rato roeu a ropa do rei de Roma';

        $codificado = base64_encode($string);

        echo "Resultado da codificação usando base64: " . $codificado;

        echo "<br><br>";

        $original = base64_decode($codificado);

        echo "Resultado da decodificação usando base64: " . $original;

        //Note que $original vai ser identica a $string

        
?>