<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/CafeteriaWeb2/modelo/dao/FluxoFinanceiroDAO.php';
$obj =  NULL;
if (isset($_GET['id'])){
     $obj = FluxoFinanceiroDAO::getInstance()->getById($_GET['id']);
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

    <title>Gerenciar Fluxos Financeiros</title>

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

                    <!-- Page Heading -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Adicionar Fluxo Financeiro</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form method="POST" action="controle/fluxoFinanceiroControl.php">
                                    <input type="hidden" name="id" value="<?php echo $obj==NULL?"0":$obj->getId(); ?>"/>
                                <div>
                                    Descrição:
                                    <input type="text" name="descricao" value="<?php echo $obj==NULL?"":$obj->getDescricao(); ?>" id="descricao" class="form-control mb-2"/>
                                </div>
                                <div>
                                    Data de Vencimento:
                                    <input type="date" name="dataVencimento" value="<?php echo $obj==NULL?"":$obj->getDataVencimento(); ?>" id="dataVencimento" class="form-control mb-2"/>
                                </div>
                                <div>
                                    Data de Pagamento:
                                    <input type="date" name="dataPagamento" value="<?php echo $obj==NULL?"":$obj->getDataPagamento(); ?>" id="dataPagamento" class="form-control mb-2"/>
                                </div>
                                <div>
                                    Valor:
                                    <input type="number" name="valor" value="<?php echo $obj==NULL?"":$obj->getValor(); ?>" id="valor" class="form-control mb-2"/>
                                </div>
                                <div>
                                    Fluxo:
                                    <input type="text" name="fluxo" value="<?php echo $obj==NULL?"":$obj->getFluxo(); ?>" id="fluxo" class="form-control mb-2"/>
                                </div>
                                <div>
                                    Situação:
                                    <input type="text" name="situacao" value="<?php echo $obj==NULL?"":$obj->getSituacao(); ?>" id="situacao" class="form-control mb-2"/>
                                </div>
                                <div>
                                    Id do Usuário:
                                    <input type="number" name="idUsuario" value="<?php echo $obj==NULL?"":$obj->getIdUsuario(); ?>" id="idUsuario" class="form-control mb-2"/>
                                </div>
                                <div>
                                    Id da Venda:
                                    <input type="number" name="idVenda" value="<?php echo $obj==NULL?"":$obj->getIdVenda(); ?>" id="idVenda" class="form-control mb-2"/>
                                </div>
                                    
                                    <button type="submit" value="Salvar" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-save"></i>
                                        </span>
                                        <span class="text">Salvar</span>
                                    </button>
                                </div>
                                </form>
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