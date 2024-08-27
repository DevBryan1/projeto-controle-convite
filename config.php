<?php
   $dns = "mysql:dbname=projeto_convite;host=localhost;";
   $dbuser = "root";
   $dbpass = "";
try{
    $pdo = new PDO($dns, $dbuser, $dbpass);
}catch(PDOException $e){
    echo "ERRO: ".$e->getMessage();
    exit;
}    
?>