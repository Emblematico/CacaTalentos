<?php

Class Aluno{
    private $idAluno;
    private $Nome;
    private $Cpf;
    private $Sexo;
    private $Curso;
    private $RA;
    private $Email;
    private $Senha;
    private $ConfSenha;

    //GET
    public function getIdAluno(){
        return $this->idAluno;
    }
    public function getNome(){
        return $this->Nome;
    }
    public function getCpf(){
        return $this->Cpf;
    }
    public function getSexo(){
        return $this->Sexo;
    }
    public function getCurso(){
        return $this->Curso;
    }
    public function getRa(){
        return $this->RA;
    }
    public function getEmail(){
        return $this->Email;
    }
    public function getSenha(){
        return $this->Senha;
    }
    public function getConfSenha(){
        return $this->ConfSenha;
    }

    //SET
    public function setIdAluno($id){
        $this->idAluno = $id;
    }
    public function setNome($Nome){
        $this->Nome = $Nome;
    }
    public function setCpf($Cpf){
        $this->Cpf = $Cpf;
    }
    public function setSexo($Sexo){
        $this->Sexo = $Sexo;
    }
    public function setCurso($Curso){
        $this->Curso = $Curso;
    }
    public function setRA($RA){
        $this->RA = $RA;
    }
    public function setEmail($Email){
        $this->Email = $Email;
    }
    public function setSenha($Senha){
        $this->Senha = $Senha;
    }
    public function setConfSenha($ConfSenha){
        $this->ConfSenha = $ConfSenha;
    }
    public function cadastrar(){
        $conexao = Conexao::pegarConexao();
        $queryInsert = "insert into aluno (nome, cpf, sexo, curso, ra, email, senha, confsenha)
                        values (".$conexao->quote($this->getNome()).",
                        ".$conexao->quote($this->getCpf()).",
                        ".$conexao->quote($this->getSexo()).",
                        ".$conexao->quote($this->getCurso()).",
                        ".$conexao->quote($this->getRa()).",
                        ".$conexao->quote($this->getEmail()).",
                        ".$conexao->quote($this->getSenha()).",
                        ".$conexao->quote($this->getConfSenha())."
                    );";
                        
        $conexao->exec($queryInsert);
        return 'true';
    }

    public function listar(){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idAluno, 
        nome, cpf, sexo, curso, ra, email, senha, confsenha from aluno";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }

    public static function get($id){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idAluno, 
        nome, cpf, sexo, curso, ra, email, senha, confsenha from aluno WHERE idAluno = ".((int)$id);
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetch();
        return $lista;   
    }

    public function listarPesquisa($campoPesquisa){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idAluno, nome, cpf, sexo, curso, ra, email, senha, confsenha from aluno
                        where nome like '$campoPesquisa'";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }

    public function listarAluno($aluno){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idAluno, nome, cpf, sexo, curso, ra, email, senha, confsenha from aluno
                        where idAluno = ".$aluno->getIdAluno();
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        foreach ($lista as $linha){
            $aluno->setIdAluno($linha['idAluno']);
            $aluno->setNome($linha['nome']);
            $aluno->setCpf($linha['cpf']);
            $aluno->setSexo($linha['sexo']);
            $aluno->setCurso($linha['curso']);
            $aluno->setRA($linha['ra']);
            $aluno->setEmail($linha['email']);
            $aluno->setSenha($linha['senha']);
            $aluno->setConfSenha($linha['confsenha']);
        }
        return $aluno;   
    }

    public function editar(){
        $conexao = Conexao::pegarConexao();
        $queryUpdate = "update nome
                        set nome = '".$this->getNome()."'
                        ,cpf = '".$this->getCpf()."'
                        ,sexo = '".$this->getSexo()."'
                        ,curso = '".$this->getCurso()."'
                        ,ra = '".$this->getRa()."'
                        ,email = '".$this->getEmail()."'
                        ,senha = '".$this->getSenha()."'
                        ,confsenha = '".$this->getConfSenha()."'
                         where idAluno = ".$this->getIdAluno();
        $conexao->exec($queryUpdate);
        return 'true';
    }
    public function excluir(){
        try {
            $conexao = Conexao::pegarConexao();
            $queryUpdate = "delete from aluno
                            where idAluno = ".$this->getIdAluno();
            $conexao->exec($queryUpdate);
            return 'true';
        } catch (Exception $e) {
            return 'false';
        }
    }

    public function login(){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idAluno, nome, cpf, sexo, curso, ra, email, senha, confsenha from aluno
        where email LIKE ".($conexao->quote($this->getEmail()))." AND senha = ".($conexao->quote($this->getSenha()))." LIMIT 1";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetch();
        if($lista) {
            $this->setIdAluno($lista["idAluno"]);
            $this->setNome($lista["nome"]);
            $this->setCpf($lista["cpf"]);
            $this->setSenha($lista["sexo"]);
            $this->setCurso($lista["curso"]);
            $this->setRA($lista["ra"]);
            $this->setEmail($lista["email"]);
            $this->setSenha($lista["senha"]);
            $this->setConfSenha($lista["confsenha"]);
            return true;
        }
        return false;
    }
}
?>