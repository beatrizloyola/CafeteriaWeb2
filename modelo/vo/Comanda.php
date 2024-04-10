<?php

class Comanda {
    private $id;
    private $idVenda;
    
    function getId() {
        return $this->id;
    }

    function getIdVenda() {
        return $this->idVenda;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdVenda($idVenda) {
        $this->idVenda = $idVenda;
    }

    function toString(){
        return $this->id . " - " . $this->idVenda;
    }
}
