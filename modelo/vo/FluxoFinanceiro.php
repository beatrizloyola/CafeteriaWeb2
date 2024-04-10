<?php

class FluxoFinanceiro {
    private $id;
    private $descricao;
    private $dataVencimento;
    private $dataPagamento;
    private $valor;
    private $fluxo;
    private $situacao;
    private $idUsuario;
    private $idVenda;
    
    function getId() {
        return $this->id;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getDataVencimento() {
        return $this->dataVencimento;
    }

    function getDataPagamento() {
        return $this->dataPagamento;
    }

    function getValor() {
        return $this->valor;
    }

    function getFluxo() {
        return $this->fluxo;
    }

    function getSituacao() {
        return $this->situacao;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getIdVenda() {
        return $this->idVenda;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setDataVencimento($dataVencimento) {
        $this->dataVencimento = $dataVencimento;
    }

    function setDataPagamento($dataPagamento) {
        $this->dataPagamento = $dataPagamento;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setFluxo($fluxo) {
        $this->fluxo = $fluxo;
    }

    function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setIdVenda($idVenda) {
        $this->idVenda = $idVenda;
    }

    function toString(){
        return $this->id . " - " . $this->descricao . " - " . $this->valor;
    }
}

