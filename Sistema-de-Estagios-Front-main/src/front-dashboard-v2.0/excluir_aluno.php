<?php 

require_once 'global.php';

try{
    $aluno = new Aluno();
    $aluno->setIdAluno($_GET['id']);
    echo $aluno->excluir();
}
catch(Exception $e){
    echo '<pre>';
    print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
 ?>