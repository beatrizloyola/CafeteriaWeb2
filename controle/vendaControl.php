<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/CafeteriaWeb2/controle/vendaControl.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/CafeteriaWeb2/modelo/dao/VendaDAO.php";

if(isset($_GET['idDel'])){
    VendaDAO::getInstance()->delete($_GET['idDel']);
    echo "<script>
    alert ('Venda removida com sucesso!');
    window.location='../VendaList.php';
    </script>";
}

elseif (isset($_POST)){
$vendaQueEuQueroSalvar = new Venda();
$vendaQueEuQueroSalvar->setData($_POST['data']);
$vendaQueEuQueroSalvar->setHora($_POST['hora']);
$vendaQueEuQueroSalvar->setIdUsuario($_POST['idUsuario']);
$vendaQueEuQueroSalvar->setComanda($_POST['comanda']);

print_r($vendaQueEuQueroSalvar);
if($_POST['id']==0){
    VendaDAO::getInstance()->insert($vendaQueEuQueroSalvar);
} else {
    $vendaQueEuQueroSalvar->setId($_POST['id']);
    VendaDAO::getInstance()->update($vendaQueEuQueroSalvar);
}
echo "<script>
    alert ('Venda salva com sucesso!');
    window.location='../VendaList.php';
</script>";
}
        