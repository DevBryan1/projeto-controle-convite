<?php
session_start();
require 'config.php';

if(!empty($_GET['codigo'])){
    $codigo = addslashes($_GET['codigo']);

    $sql = "SELECT * FROM usuarios WHERE codigo = '$codigo'";
    $sql = $pdo->query($sql);

    if($sql->rowCount() == 0){
        header('Location: login.php');
        exit;
    }


} else {
    header('Location: login.php');
}



if(isset($_POST['email']) && !empty($_POST['email'])){ 
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));

    $sql = "SELECT * FROM usuarios WHERE email = 'email'";
    $sql = $pdo->query($sql);

    if($sql->rowCount() <= 0){

        $codigo = md5(rand(0,9999).rand(0,999));
        $sql = $pdo->prepare("INSERT INTO usuarios SET email = :email, senha = :senha, codigo = :codigo");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->bindValue(":codigo", $codigo);
        $sql->execute();

        unset($_SESSION['logado']);
        
        header("Location: index.php");
        exit;
        
    }


   
    header("Location: login.php");
}
?>

<form method="POST">

    Email:<br/>
    <input type="text" name="email"><br/><br/>

    Senha:<br/>
    <input type="password" name="senha"><br/><br/>

    <input type="submit" value="Cadastrar">

</form>

