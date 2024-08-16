<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/CafeteriaWeb2/modelo/dao/BDPDO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/CafeteriaWeb2/modelo/vo/FluxoFinanceiro.php';

class FluxoFinanceiroDAO {

    public static $instance;

    private function __construct() {
        
    }

    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new FluxoFinanceiroDAO();

        return self::$instance;
    }

    public function insert(FluxoFinanceiro $fluxo) {
        try {
            $sql = "INSERT INTO fluxofinanceiro (descricao, dataVencimento, dataPagamento, valor, fluxo, situacao, idUSuario, idVenda)"
                    . "VALUES (:descricao,:dataVencimento,:dataPagamento,:valor,:fluxo,:situacao,:idUsuario,:idVenda)";
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":descricao", $fluxo->getDescricao());
            $p_sql->bindValue(":dataVencimento", $fluxo->getDataVencimento());
            $p_sql->bindValue(":dataPagamento", $fluxo->getDataPagamento());
            $p_sql->bindValue(":valor", $fluxo->getValor());
            $p_sql->bindValue(":fluxo", $fluxo->getFluxo());
            $p_sql->bindValue(":situacao", $fluxo->getSituacao());
            $p_sql->bindValue(":idUsuario", $fluxo->getIdUsuario());
            $p_sql->bindValue(":idVenda", $fluxo->getIdVenda());
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao executar a função de salvar" . $e->getMessage();
        }
    }

    public function update($fluxo) {
        try {
            $sql = "UPDATE fluxofinanceiro SET descricao=:descricao, dataVencimento=:dataVencimento, dataPagamento=:dataPagamento, valor=:valor, fluxo=:fluxo, situacao=:situacao, idUsuario=:idUsuario, idVenda=:idVenda "
                    . "where id=:id";
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":descricao", $fluxo->getDescricao());
            $p_sql->bindValue(":dataVencimento", $fluxo->getDataVencimento());
            $p_sql->bindValue(":dataPagamento", $fluxo->getDataPagamento());
            $p_sql->bindValue(":valor", $fluxo->getValor());
            $p_sql->bindValue(":fluxo", $fluxo->getFluxo());
            $p_sql->bindValue(":situacao", $fluxo->getSituacao());
            $p_sql->bindValue(":idUsuario", $fluxo->getIdUsuario());
            $p_sql->bindValue(":idVenda", $fluxo->getIdVenda());
            $p_sql->bindValue(":id", $fluxo->getId());
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao executar a função de atualizar" . $e->getMessage();
        }
    }

    public function delete($id) {
        try {
            $sql = "delete from fluxofinanceiro where id = :id";
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao executar a função de deletar --" . $e->getMessage();
        }
    }

    public function getById($id) {
        try {
            $sql = "SELECT * FROM fluxofinanceiro WHERE id = :id";
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
        $obj = new FluxoFinanceiro();
        $obj->setId($row['id']);
        $obj->setDescricao($row['descricao']);
        $obj->setDataVencimento($row['dataVencimento']);
        $obj->setDataPagamento($row['dataPagamento']);
        $obj->setValor($row['valor']);
        $obj->setFluxo($row['fluxo']);
        $obj->setSituacao($row['situacao']);
        $obj->setIdUsuario($row['idUsuario']);
        $obj->setIdVenda($row['idVenda']);
        return $obj;
    }

    public function listAll() {
        try {
            $sql = "SELECT * FROM fluxofinanceiro ";
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
            $sql = "SELECT * FROM fluxofinanceiro " . $restanteDoSQL;
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

