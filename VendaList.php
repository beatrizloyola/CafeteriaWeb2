<?php
session_start();
if (! isset ($_SESSION['idUsuarioLogado'])){
    header("Location: login.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Listar Vendas</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
            include "./MenuLateral.php";
        ?> 
        <!-- End Of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                    <?php
                        include "./MenuTopo.php";
                    ?> 
                    <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Listar Venda</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Data</th>
                                            <th>Hora</th>
                                            <th>Usuário</th>
                                            <th>Comanda</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Data</th>
                                            <th>Hora</th>
                                            <th>Usuário</th>
                                            <th>Comanda</th>
                                            <th>Ações</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        require_once $_SERVER['DOCUMENT_ROOT'] . '/CafeteriaWeb2/modelo/dao/VendaDAO.php';
                                        $lista = VendaDAO::getInstance()->listAll();
                                        if (sizeof($lista)>0){
                                            foreach ($lista as $item) {
                                            echo "<tr>
                                                    <td>".$item->getId()."</td>
                                                    <td>".$item->getData()."</td>
                                                    <td>".$item->getHora()."</td>
                                                    <td>".$item->getIdUsuario()."</td>
                                                    <td>".$item->getComanda()."</td>
                                                    <td>
                                                        <a  href='./VendaAddEdit.php?id=".$item->getId()."'class='btn btn-warning btn-icon-split'>
                                                            <span class='icon text-white-50'>
                                                                <i class='fas fa-pen'></i>
                                                            </span>
                                                            <span class='text'>Editar</span>
                                                        </a>
                                                        <a  href='./controle/vendaControl.php?idDel=".$item->getId()."'class='btn btn-danger btn-icon-split'>
                                                            <span class='icon text-white-50'>
                                                                <i class='fas fa-trash'></i>
                                                            </span>
                                                            <span class='text'>Remover</span>
                                                        </a>
                                                    </td>
                                                </tr>";
                                            }
                                        };
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
                include "./Footer.php";
            ?> 
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>