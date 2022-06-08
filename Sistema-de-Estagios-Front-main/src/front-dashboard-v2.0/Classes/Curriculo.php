<?php

Class Curriculo{
    private $idCurriculo;
    private $Nome;
    private $Email;
    private $Telefone;
    private $Celular;
    private $Organizacao;
    private $Departamento;
    private $Formacoes;
    private $Estado;
    private $Cidade;
    private $Bairro;
    private $Endereco;
    private $Codpostal;

    //GET
    public function getidCurriculo(){
        return $this->idCurriculo;
    }
    public function getNome(){
        return $this->Nome;
    }
    public function getEmail(){
        return $this->Email;
    }
    public function getTelefone(){
        return $this->Telefone;
    }
    public function getCelular(){
        return $this->Celular;
    }
    public function getOrganizacao(){
        return $this->Organizacao;
    }
    public function getDepartamento(){
        return $this->Departamento;
    }
    public function getFormacoes(){
        return $this->Formacoes;
    }
    public function getEstado(){
        return $this->Estado;
    }
    public function getCidade(){
        return $this->Cidade;
    }
    public function getBairro(){
        return $this->Bairro;
    }
    public function getEndereco(){
        return $this->Endereco;
    }
    public function getCodpostal(){
        return $this->Codpostal;
    }

    //SET
    public function setidCurriculo($id){
        $this->idCurriculo = $id;
    }
    public function setNome($Nome){
        $this->Nome = $Nome;
    }
    public function setEmail($Email){
        $this->Email = $Email;
    }
    public function setTelefone($Telefone){
        $this->Telefone = $Telefone;
    }
    public function setCelular($Celular){
        $this->Celular = $Celular;
    }
    public function setOrganizacao($Organizacao){
        $this->Organizacao = $Organizacao;
    }
    public function setDepartamento($Departamento){
        $this->Departamento = $Departamento;
    }
    public function setFormacoes($Formacoes){
        $this->Formacoes = $Formacoes;
    }
    public function setEstado($Estado){
        $this->Estado = $Estado;
    }
    public function setCidade($Cidade){
        $this->Cidade = $Cidade;
    }
    public function setBairro($Bairro){
        $this->Bairro = $Bairro;
    }
    public function setEndereco($Endereco){
        $this->Endereco = $Endereco;
    }
    public function setCodpostal($Codpostal){
        $this->Codpostal = $Codpostal;
    }
    public function cadastrar(){
        $conexao = Conexao::pegarConexao();
        $queryInsert = "insert into aluno (nome, email, telefone, celular, organizacao, departamento, formacoes, estado, cidade, bairro, endereco, codpostal)
                        values (".$conexao->quote($this->getNome()).",
                        ".$conexao->quote($this->getEmail()).",
                        ".$conexao->quote($this->getTelefone()).",
                        ".$conexao->quote($this->getCelular()).",
                        ".$conexao->quote($this->getOrganizacao()).",
                        ".$conexao->quote($this->getDepartamento()).",
                        ".$conexao->quote($this->getFormacoes()).",
                        ".$conexao->quote($this->getEstado()).",
                        ".$conexao->quote($this->getCidade()).",
                        ".$conexao->quote($this->getBairro()).",
                        ".$conexao->quote($this->getEndereco()).",
                        ".$conexao->quote($this->getCodpostal())."
                    );";
                        
        $conexao->exec($queryInsert);
        return 'true';
    }

    public function listar(){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idCurriculo, 
        nome, email, telefone, celular, organizacao, departamento, formacoes, estado, cidade, bairro, endereco, codpostal";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }

    public static function get($id){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idCurriculo, 
        nome, email, telefone, celular, organizacao, departamento, formacoes, estado, cidade, bairro, endereco, codpostal from curriculo WHERE idCurriculo = ".((int)$id);
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetch();
        return $lista;   
    }

    public function listarPesquisa($campoPesquisa){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idCurriculo, nome, email, telefone, celular, organizacao, departamento, formacoes, estado, cidade, bairro, endereco, codpostal from curriculo
                        where nome like '$campoPesquisa'";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }

    public function listarCurriculo($curriculo){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idCurriculo, 
        nome, email, telefone, celular, organizacao, departamento, formacoes, estado, cidade, bairro, endereco, codpostal from curriculo WHERE idCurriculo = ".$curriculo->getidCurriculo();
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        foreach ($lista as $linha){
            $curriculo->setidCurriculo($linha['idCurriculo']);
            $curriculo->setNome($linha['nome']);
            $curriculo->setEmail($linha['email']);
            $curriculo->setTelefone($linha['telefone']);
            $curriculo->setCelular($linha['celular']);
            $curriculo->setOrganizacao($linha['organizacao']);
            $curriculo->setDepartamento($linha['departamento']);
            $curriculo->setFormacoes($linha['formacoes']);
            $curriculo->setEstado($linha['estado']);
            $curriculo->setCidade($linha['cidade']);
            $curriculo->setBairro($linha['bairro']);
            $curriculo->setEndereco($linha['endereco']);
            $curriculo->setCodpostal($linha['codpostal']);
        }
        return $curriculo;   
    }

    public function editar(){
        $conexao = Conexao::pegarConexao();
        $queryUpdate = "update nome
                        set nome = '".$this->getNome()."'
                        ,email = '".$this->getEmail()."'
                        ,telefone = '".$this->getTelefone()."'
                        ,celular = '".$this->getCelular()."'
                        ,organizacao = '".$this->getOrganizacao()."'
                        ,departamento = '".$this->getDepartamento()."'
                        ,formacoes = '".$this->getFormacoes()."'
                        ,estado = '".$this->getEstado()."'
                        ,cidade = '".$this->getCidade()."'
                        ,bairro = '".$this->getBairro()."'
                        ,endereco = '".$this->getEndereco()."'
                        ,codpostal = '".$this->getCodpostal()."'
                         where idCurriculo = ".$this->getidCurriculo();
        $conexao->exec($queryUpdate);
        return 'true';
    }
    public function excluir(){
        try {
            $conexao = Conexao::pegarConexao();
            $queryUpdate = "delete from curriculo
                            where idCurriculo = ".$this->getidCurriculo();
            $conexao->exec($queryUpdate);
            return 'true';
        } catch (Exception $e) {
            return 'false';
        }
    }
}
?>