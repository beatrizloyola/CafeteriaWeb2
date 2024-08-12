<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/CafeteriaWeb2/controle/usuarioControl.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/CafeteriaWeb2/modelo/dao/UsuarioDAO.php";

if(isset($_GET['idDel'])){
    UsuarioDAO::getInstance()->delete($_GET['idDel']);
    echo "<script>
    alert ('Usuário removido com sucesso!');
    window.location='../UsuarioList.php';
    </script>";
}

elseif (isset($_POST)){
$usuarioQueEuQueroSalvar = new Usuario();
$usuarioQueEuQueroSalvar->setNome($_POST['nome']);
$usuarioQueEuQueroSalvar->setLogin($_POST['login']);
$usuarioQueEuQueroSalvar->setEmail($_POST['email']);
$usuarioQueEuQueroSalvar->setSenha($_POST['senha']);
$usuarioQueEuQueroSalvar->setFoto($_POST['foto']);

print_r($usuarioQueEuQueroSalvar);
if($_POST['id']==0){
    UsuarioDAO::getInstance()->insert($usuarioQueEuQueroSalvar);
} else {
    $usuarioQueEuQueroSalvar->setId($_POST['id']);
    UsuarioDAO::getInstance()->update($usuarioQueEuQueroSalvar);
}
echo "<script>
    alert ('Usuário salvo com sucesso!');
    window.location='../UsuarioAddEdit.php';
</script>";
}
        