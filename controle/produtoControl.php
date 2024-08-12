<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/CafeteriaWeb2/controle/produtoControl.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/CafeteriaWeb2/modelo/dao/ProdutoDAO.php";

if(isset($_GET['idDel'])){
    ProdutoDAO::getInstance()->delete($_GET['idDel']);
    echo "<script>
    alert ('Produto removido com sucesso!');
    window.location='../ProdutoList.php';
    </script>";
}

elseif (isset($_POST)){
$produtoQueEuQueroSalvar = new Produto();
$produtoQueEuQueroSalvar->setNome($_POST['nome']);
$produtoQueEuQueroSalvar->setDescricao($_POST['descricao']);
$produtoQueEuQueroSalvar->setPrecoVenda($_POST['precoVenda']);
$produtoQueEuQueroSalvar->setPrecoProducao($_POST['precoProducao']);
$produtoQueEuQueroSalvar->setQtdEstoque($_POST['qtdEstoque']);

print_r($produtoQueEuQueroSalvar);
if($_POST['id']==0){
    ProdutoDAO::getInstance()->insert($produtoQueEuQueroSalvar);
} else {
    $produtoQueEuQueroSalvar->setId($_POST['id']);
    ProdutoDAO::getInstance()->update($produtoQueEuQueroSalvar);
}
echo "<script>
    alert ('Produto salvo com sucesso!');
    window.location='../ProdutoList.php';
</script>";
}
        