<?php
    require_once 'global.php';
try{
    $empresa = new Empresa();
    $empresa->setRazaosocial($_POST['razaosocial']);
    $empresa->setNome($_POST['nome']);
    $empresa->setEstado($_POST['estado']);
    $empresa->setCidade($_POST['cidade']);
    $empresa->setCnpj($_POST['cnpj']);
    $empresa->setEmail($_POST['email']);
    $empresa->setSenha($_POST['senha']);
    $empresa->setConfsenha($_POST['confsenha']);
    echo $empresa->cadastrar();
    header("Location: register.php");
}
catch(Exception $e){
    echo '<pre>';
    print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
?>