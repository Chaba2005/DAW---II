<?php

$homepage = file_get_contents('https://www.mortalkombat.com/pt-br');

echo $homepage;
/*$filename = fopen('siteMK.html',  'w+');
fwrite($filename, $homepage);
fclose($filename);
echo 'Arquivo criado com sucesso!';
*/
?>