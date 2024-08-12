<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/CafeteriaWeb2/modelo/dao/BDPDO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/CafeteriaWeb2/modelo/vo/Venda.php';

class VendaDAO {

    public static $instance;

    private function __construct() {
        
    }

    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new VendaDAO();

        return self::$instance;
    }

    public function insert(Venda $venda) {
        try {
            $sql = "INSERT INTO venda (data,hora,idUsuario,comanda)"
                    . "VALUES (:data,:hora,:idUsuario,:comanda)";
            //perceba que na linha abaixo vai precisar de um import
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":data", $venda->getData());
            $p_sql->bindValue(":hora", $venda->getHora());
            $p_sql->bindValue(":idUsuario", $venda->getIdUsuario());
            $p_sql->bindValue(":comanda", $venda->getComanda());
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao executar a função de salvar" . $e->getMessage();
        }
    }

    public function update($venda) {
        try {
            $sql = "UPDATE venda SET data=:data, hora=:hora,"
                    . "idUsuario=:idUsuario, comanda=:comanda "
                    . "where id=:id";
            //perceba que na linha abaixo vai precisar de um import
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $venda->getId());
            $p_sql->bindValue(":data", $venda->getData());
            $p_sql->bindValue(":hora", $venda->getHora());
            $p_sql->bindValue(":idUsuario", $venda->getIdUsuario());
            $p_sql->bindValue(":comanda", $venda->getComanda());
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao executar a função de atualizar" . $e->getMessage();
        }
    }

    public function delete($id) {
        try {
            $sql = "delete from venda where id = :id";
            //perceba que na linha abaixo vai precisar de um import
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao executar a função de deletar" . $e->getMessage();
        }
    }

    public function getById($id) {
        try {
            $sql = "SELECT * FROM venda WHERE id = :id";
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            $p_sql->execute();
            return $this->converterLinhaDaBaseDeDadosParaObjeto($p_sql->fetch(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde.";
        }
    }

    private function converterLinhaDaBaseDeDadosParaObjeto($row) {
        $obj = new Venda();
        $obj->setId($row['id']);
        $obj->setData($row['data']);
        $obj->setHora($row['hora']);
        $obj->setIdUsuario($row['idUsuario']);
        $obj->setComanda($row['comanda']);
        return $obj;
    }

    public function listAll() {
        try {
            $sql = "SELECT * FROM venda ";
            $p_sql = BDPDO::getInstance()->prepare($sql);

            $p_sql->execute();

            $lista = array();
            $row = $p_sql->fetch(PDO::FETCH_ASSOC);
            while ($row) {
                $lista[] = $this->converterLinhaDaBaseDeDadosParaObjeto($row);
                $row = $p_sql->fetch(PDO::FETCH_ASSOC);
            }
            return $lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde.".$e;
        }
    }

    public function listWhere($restanteDoSQL, $arrayDeParametros, $arrayDeValores) {
        try {
            $sql = "SELECT * FROM venda " . $restanteDoSQL;
            $p_sql = BDPDO::getInstance()->prepare($sql);
            for ($i = 0; $i < sizeof($arrayDeParametros); $i++) {
                $p_sql->bindValue($arrayDeParametros[$i], $arrayDeValores [$i]);
            }
            $p_sql->execute();
            $lista = array();
            $row = $p_sql->fetch(PDO::FETCH_ASSOC);
            while ($row) {
                $lista[] = $this->converterLinhaDaBaseDeDadosParaObjeto($row);
                $row = $p_sql->fetch(PDO::FETCH_ASSOC);
            }
            return $lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde.".$e->getMessage();
        }
    }

}

?><?php

