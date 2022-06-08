<?php
    require_once 'global.php';
try{
    $aluno = new Aluno();
    if(!empty($_GET['pesquisa'])){
        $campoPesquisa = $_GET['pesquisa']."%";
        $lista = $aluno->listarPesquisa($campoPesquisa);
    } else {
        $lista = $aluno->listar();
    }
    foreach ($lista as $linha){
    echo "<tr id=\"linha-aluno".$linha['idAluno']."\">
            <td> ". $linha['idAluno'] ."</td>
            <td> ". $linha['nome'] ."</td>
            <td> ". $linha['cpf'] ."</td>
            <td> ". $linha['sexo'] ."</td>
            <td> ". $linha['curso'] ."</td>
            <td> ". $linha['ra'] ."</td>
            <td> ". $linha['email'] ."</td>
            <td> ". $linha['senha'] ."</td>
            <td> ". $linha['confsenha'] ."</td>
            <td> <a href='home.php?action=editar&id=". $linha['idAluno'] ."'>Editar</a></td>
            <td> <a href='javascript:void(0)' onclick='(async() => { if(await ajax(\"excluir_aluno.php?id=". $linha['idAluno'] . "\")) {deleteId(\"linha-aluno".$linha['idAluno']."\");alertDialog(\"Usuário excluído com sucesso.\", \"Usuário Excluído\");} else {alertDialog(\"Ocorreu um erro ao excluir o usuário.\", \"Ocorreu um erro ao excluir o usuário\");}})()'>Excluir</a></td>
        </tr>";
    }
}
catch(Exception $e){
    echo '<pre>';
        print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
 ?>