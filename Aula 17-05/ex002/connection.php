<?php
    try {
        $db = 'mysql:host=146.106.241.3;dbname=cl201605;charset=utf8';
        $user = 'cl201605';
        $passwd = 'cl*20122005';
        $pdo = new PDO($db, $user, $passwd);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        $output = 'Impossível conect BD : ' . $e . '<br>';
        echo $output;
    }

?>