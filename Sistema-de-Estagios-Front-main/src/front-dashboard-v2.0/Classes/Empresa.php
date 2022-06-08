<?php

Class Empresa{
    private $idEmpresa;
    private $Razaosocial;
    private $Nome;
    private $Estado;
    private $Cidade;
    private $Cnpj;
    private $Email;
    private $Senha;
    private $Confsenha;

    //GET
    public function getidEmpresa(){
        return $this->idEmpresa;
    }
    public function getRazaosocial(){
        return $this->Razaosocial;
    }
    public function getNome(){
        return $this->Nome;
    }
    public function getEstado(){
        return $this->Estado;
    }
    public function getCidade(){
        return $this->Cidade;
    }
    public function getCnpj(){
        return $this->Cnpj;
    }
    public function getEmail(){
        return $this->Email;
    }
    public function getSenha(){
        return $this->Senha;
    }
    public function getConfsenha(){
        return $this->Confsenha;
    }


    //SET
    public function setidEmpresa($id){
        $this->idEmpresa = $id;
    }
    public function setRazaosocial($Razaosocial){
        $this->Razaosocial = $Razaosocial;
    }
    public function setNome($Nome){
        $this->Nome = $Nome;
    }
    public function setEstado($Estado){
        $this->Estado = $Estado;
    }
    public function setCidade($Cidade){
        $this->Cidade = $Cidade;
    }
    public function setCnpj($Cnpj){
        $this->Cnpj = $Cnpj;
    }
    public function setEmail($Email){
        $this->Email = $Email;
    }
    public function setSenha($Senha){
        $this->Senha = $Senha;
    }
    public function setConfsenha($Confsenha){
        $this->Confsenha = $Confsenha;
    }
    public function cadastrar(){
        $conexao = Conexao::pegarConexao();
        $queryInsert = "insert into aluno (razaosocial, nome, estado, cidade, cnpj, email, senha, confsenha)
                        values (".$conexao->quote($this->getRazaosocial()).",
                        ".$conexao->quote($this->getNome()).",
                        ".$conexao->quote($this->getEstado()).",
                        ".$conexao->quote($this->getCidade()).",
                        ".$conexao->quote($this->getCnpj()).",
                        ".$conexao->quote($this->getEmail()).",
                        ".$conexao->quote($this->getSenha()).",
                        ".$conexao->quote($this->getConfsenha())."
                    );";
                        
        $conexao->exec($queryInsert);
        return 'true';
    }

    public function listar(){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idEmpresa, 
        razaosocial, nome, estado, cidade, cnpj, email, senha, confsenha";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }

    public static function get($id){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idEmpresa, 
        razaosocial, nome, estado, cidade, cnpj, email, senha, confsenha from empresa WHERE idEmpresa = ".((int)$id);
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetch();
        return $lista;   
    }

    public function listarPesquisa($campoPesquisa){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idEmpresa, 
        razaosocial, nome, estado, cidade, cnpj, email, senha, confsenha from empresa
                        where nome like '$campoPesquisa'";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }

    public function listarCurriculo($curriculo){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idEmpresa, 
        razaosocial, nome, estado, cidade, cnpj, email, senha, confsenha from empresa WHERE idEmpresa = ".$curriculo->getidCurriculo();
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        foreach ($lista as $linha){
            $curriculo->setidEmpresa($linha['idEmpresa']);
            $curriculo->setRazaosocial($linha['razaosocial']);
            $curriculo->setNome($linha['nome']);
            $curriculo->setEstado($linha['estado']);
            $curriculo->setCidade($linha['cidade']);
            $curriculo->setCnpj($linha['cnpj']);
            $curriculo->setEmail($linha['email']);
            $curriculo->setSenha($linha['senha']);
            $curriculo->setConfsenha($linha['confsenha']);
        }
        return $curriculo;   
    }

    public function editar(){
        $conexao = Conexao::pegarConexao();
        $queryUpdate = "update razaosocial
                        set razaosocial = '".$this->getRazaosocial()."'
                        ,nome = '".$this->getNome()."'
                        ,estado = '".$this->getEstado()."'
                        ,cidade = '".$this->getCidade()."'
                        ,cnpj = '".$this->getCnpj()."'
                        ,email = '".$this->getEmail()."'
                        ,senha = '".$this->getSenha()."'
                        ,confsenha = '".$this->getConfsenha()."'
                         where idEmpresa = ".$this->getidEmpresa();
        $conexao->exec($queryUpdate);
        return 'true';
    }
    public function excluir(){
        try {
            $conexao = Conexao::pegarConexao();
            $queryUpdate = "delete from empresa
                            where idEmpresa = ".$this->getidCurriculo();
            $conexao->exec($queryUpdate);
            return 'true';
        } catch (Exception $e) {
            return 'false';
        }
    }
}
?>