<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/CafeteriaWeb2/controle/comandaControl.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/CafeteriaWeb2/modelo/dao/ComandaDAO.php";

if(isset($_GET['idDel'])){
    ComandaDAO::getInstance()->delete($_GET['idDel']);
    echo "<script>
    alert ('Comanda removida com sucesso!');
    window.location='../ComandaList.php';
    </script>";
}

elseif (isset($_POST)){
$comandaQueEuQueroSalvar = new Comanda();
$comandaQueEuQueroSalvar->setNome($_POST['nome']);

print_r($comandaQueEuQueroSalvar);
if($_POST['id']==0){
    ComandaDAO::getInstance()->insert($comandaQueEuQueroSalvar);
} else {
    $comandaQueEuQueroSalvar->setId($_POST['id']);
    ComandaDAO::getInstance()->update($comandaQueEuQueroSalvar);
}
echo "<script>
    alert ('Comanda salva com sucesso!');
    window.location='../ComandaList.php';
</script>";
}
        