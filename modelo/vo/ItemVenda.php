<?php

class ItemVenda {
    private $id;
    private $precoProduto;
    private $quantidade;
    private $idProduto;
    private $idVenda;
    
    function getId() {
        return $this->id;
    }

    function getPrecoProduto() {
        return $this->precoProduto;
    }

    function getQuantidade() {
        return $this->quantidade;
    }

    function getIdProduto() {
        return $this->idProduto;
    }

    function getIdVenda() {
        return $this->idVenda;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPrecoProduto($precoProduto) {
        $this->precoProduto = $precoProduto;
    }

    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    function setIdProduto($idProduto) {
        $this->idProduto = $idProduto;
    }

    function setIdVenda($idVenda) {
        $this->idVenda = $idVenda;
    }

    function toString(){
        return $this->idProduto . " " . $this->idVenda;
    }
}
