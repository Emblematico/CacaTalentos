<?php
    require_once 'global.php';
try{
    $aluno = new Aluno();
    $aluno->setNome($_POST['nome']);
    $aluno->setCpf($_POST['cpf']);
    $aluno->setSexo($_POST['sexo']);
    $aluno->setCurso($_POST['curso']);
    $aluno->setRA($_POST['ra']);
    $aluno->setEmail($_POST['email']);
    $aluno->setSenha($_POST['senha']);
    $aluno->setConfSenha($_POST['confsenha']);
    echo $aluno->cadastrar();
    header("Location: register.php");
}
catch(Exception $e){
    echo '<pre>';
    print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
?>