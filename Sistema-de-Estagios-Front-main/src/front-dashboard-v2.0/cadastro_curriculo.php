<?php
    require_once 'global.php';
try{
    $curriculo = new Curriculo();
    $curriculo->setNome($_POST['nome']);
    $curriculo->setEmail($_POST['email']);
    $curriculo->setTelefone($_POST['telefone']);
    $curriculo->setCelular($_POST['celular']);
    $curriculo->setOrganizacao($_POST['organizacao']);
    $curriculo->setDepartamento($_POST['departamento']);
    $curriculo->setFormacoes($_POST['formacoes']);
    $curriculo->setEstado($_POST['estado']);
    $curriculo->setCidade($_POST['cidade']);
    $curriculo->setBairro($_POST['bairro']);
    $curriculo->setEndereco($_POST['endereco']);
    $curriculo->setCodpostal($_POST['codpostal']);
    echo $curriculo->cadastrar();
    header("Location: curriculo.php");
}
catch(Exception $e){
    echo '<pre>';
    print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
?>