<?php

class Venda {
    private $id;
    private $data;
    private $hora;
    private $idUsuario;
    private $comanda;
    
    function getId() {
        return $this->id;
    }

    function getData() {
        return $this->data;
    }

    function getHora() {
        return $this->hora;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getComanda() {
        return $this->comanda;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setComanda($comanda) {
        $this->comanda = $comanda;
    }

    function toString(){
        return $this->id . " - " . $this->data . " " . $this->hora;
    }
}
