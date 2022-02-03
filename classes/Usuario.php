<?php

class Usuario {
    private $id;
    private $nome;
    private $razao;
    private $contato;
    private $cep;
    private $cidade;
    private $estado;

    public function getId(){
        return $this -> id;
    }
    public function setId($id){
        $this -> id = $id;
    }

    
    public function getNome(){
        return $this -> nome;
    }
    public function setNome($nome){
        $this -> nome = ucwords(strtolower($nome));
    }


    public function getRazao(){
        return $this -> razao;
    }
    public function setRazao($razao){
        $this -> razao = ucfirst(strtolower($razao));
    }


    public function getContato(){
        return $this -> contato;
    }
    public function setContato($contato){
        $this -> contato = $contato;
    }


    public function getCep(){
        return $this -> cep;
    }
    public function setCep($cep){
        $this -> cep = $cep;
    }


    public function getCidade(){
        return $this -> cidade;
    }
    public function setCidade($cidade){
        $this -> cidade = ucwords(strtolower($cidade));
    }


    public function getEstado(){
        return $this -> estado;
    }
    public function setEstado($estado){
        $this -> estado = strtoupper($estado);
    }
}