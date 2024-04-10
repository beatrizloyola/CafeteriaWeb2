<?php

class Produto {
    private $id;
    private $nome;
    private $descricao;
    private $precoVenda;
    private $precoProducao;
    private $qtdEstoque;
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getPrecoVenda() {
        return $this->precoVenda;
    }

    function getPrecoProducao() {
        return $this->precoProducao;
    }

    function getQtdEstoque() {
        return $this->qtdEstoque;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setPrecoVenda($precoVenda) {
        $this->precoVenda = $precoVenda;
    }

    function setPrecoProducao($precoProducao) {
        $this->precoProducao = $precoProducao;
    }

    function setQtdEstoque($qtdEstoque) {
        $this->qtdEstoque = $qtdEstoque;
    }

    function toString(){
        return $this->nome . " - R$ " .  $this->precoVenda;
    }
}
