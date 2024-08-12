<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/CafeteriaWeb2/modelo/dao/BDPDO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/CafeteriaWeb2/modelo/vo/Produto.php';

class ProdutoDAO {

    public static $instance;

    private function __construct() {
        
    }

    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new ProdutoDAO();

        return self::$instance;
    }

    public function insert(Produto $produto) {
        try {
            $sql = "INSERT INTO produto (nome,descricao,precoVenda,precoProducao,qtdEstoque)"
                    . "VALUES (:nome,:descricao,:precoVenda,:precoProducao,:qtdEstoque)";
            //perceba que na linha abaixo vai precisar de um import
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", $produto->getNome());
            $p_sql->bindValue(":descricao", $produto->getDescricao());
            $p_sql->bindValue(":precoVenda", $produto->getPrecoVenda());
            $p_sql->bindValue(":precoProducao", $produto->getPrecoProducao());
            $p_sql->bindValue(":qtdEstoque", $produto->getQtdEstoque());
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao executar a função de salvar" . $e->getMessage();
        }
    }

    public function update($produto) {
        try {
            $sql = "UPDATE produto SET nome=:nome, descricao=:descricao,"
                    . "precoVenda=:precoVenda, precoProducao=:precoProducao, qtdEstoque=:qtdEstoque "
                    . "where id=:id";
            //perceba que na linha abaixo vai precisar de um import
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", $produto->getNome());
            $p_sql->bindValue(":descricao", $produto->getDescricao());
            $p_sql->bindValue(":precoVenda", $produto->getPrecoVenda());
            $p_sql->bindValue(":precoProducao", $produto->getPrecoProducao());
            $p_sql->bindValue(":qtdEstoque", $produto->getQtdEstoque());
            $p_sql->bindValue(":id", $produto->getId());
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao executar a função de atualizar" . $e->getMessage();
        }
    }

    public function delete($id) {
        try {
            $sql = "delete from produto where id = :id";
            //perceba que na linha abaixo vai precisar de um import
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao executar a função de deletar --" . $e->getMessage();
        }
    }

    public function getById($id) {
        try {
            $sql = "SELECT * FROM produto WHERE id = :id";
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
        $obj = new Produto();
        $obj->setId($row['id']);
        $obj->setNome($row['nome']);
        $obj->setDescricao($row['descricao']);
        $obj->setPrecoVenda($row['precoVenda']);
        $obj->setPrecoProducao($row['precoProducao']);
        $obj->setQtdEstoque($row['qtdEstoque']);
        return $obj;
    }

    public function listAll() {
        try {
            $sql = "SELECT * FROM produto ";
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
            $sql = "SELECT * FROM produto " . $restanteDoSQL;
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

