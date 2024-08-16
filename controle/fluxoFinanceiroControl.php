<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/CafeteriaWeb2/controle/fluxoFinanceiroControl.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/CafeteriaWeb2/modelo/dao/FluxoFinanceiroDAO.php";

if(isset($_GET['idDel'])){
    FluxoFinanceiroDAO::getInstance()->delete($_GET['idDel']);
    echo "<script>
    alert ('Fluxo financeiro removido com sucesso!');
    window.location='../FluxoFinanceiroList.php';
    </script>";
}

elseif (isset($_POST)){
$fluxoQueEuQueroSalvar = new FluxoFinanceiro();
$fluxoQueEuQueroSalvar->setDescricao($_POST['descricao']);
$fluxoQueEuQueroSalvar->setDataVencimento($_POST['dataVencimento']);
$fluxoQueEuQueroSalvar->setDataPagamento($_POST['dataPagamento']);
$fluxoQueEuQueroSalvar->setValor($_POST['valor']);
$fluxoQueEuQueroSalvar->setFluxo($_POST['fluxo']);
$fluxoQueEuQueroSalvar->setSituacao($_POST['situacao']);
$fluxoQueEuQueroSalvar->setIdUsuario($_POST['idUsuario']);
$fluxoQueEuQueroSalvar->setIdVenda($_POST['idVenda']);

print_r($fluxoQueEuQueroSalvar);
if($_POST['id']==0){
    FluxoFinanceiroDAO::getInstance()->insert($fluxoQueEuQueroSalvar);
} else {
    $fluxoQueEuQueroSalvar->setId($_POST['id']);
    FluxoFinanceiroDAO::getInstance()->update($fluxoQueEuQueroSalvar);
}
echo "<script>
    alert ('Fluxo financeiro salvo com sucesso!');
    window.location='../FluxoFinanceiroList.php';
</script>";
}
        