<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Log{
    
    public $codlog;
    public $dtcadastro;
    public $codfuncionario;
    public $codproduto;
    public $observacao;
    private $conexao;
    
    public function __construct($conn, $observacao = '', $codproduto = '') {
        $this->conexao = $conn;
        if($observacao != ""){
            $this->observacao = $observacao;
            $this->codproduto = $codproduto;
            $this->inserir();
        }
    }
    
    public function __destruct() {
        unset($this);
    }    
    
    public function inserir(){
        if(!isset($this->dtcadastro) || $this->dtcadastro == NULL || $this->dtcadastro == ""){
            $this->dtcadastro = date("Y-m-d H:i:s");
        }         
        if(!isset($this->codfuncionario) || $this->codfuncionario == NULL || $this->codfuncionario == ""){
            $this->codfuncionario = $_SESSION["codpessoa"];
        }      
        return $this->conexao->inserir('log', $this);
    }

    public function atualizar(){
        return $this->conexao->atualizar('log', $this);
    }

    public function procurarCodigo(){
        return $this->conexao->procurarCodigo('log', $this);
    }
    
    public function excluir(){
        return $this->conexao->excluir('log', $this);
    }

}