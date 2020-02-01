<?php
 
  include("../../validar.php");
  include("../../conexao.php");
  session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>EscOn - Escalas Online</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin.css" rel="stylesheet">

 <!--   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />

-->

</head>

<body id="page-top">
  
  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="../../inicio.php">EscOn</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
 
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <h6>Olá, <?php echo $_SESSION['login'];?>
          <i class="fas fa-user-circle fa-fw"></i>
        </h6>

        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Sair</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../../inicio.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Painel principal</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Militares</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="../militar/cadastro-militar.php">Cadastra militar</a>
          <a class="dropdown-item" href="../militar/consulta-militar.php">Consultar militar</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Escalas</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="../escala/cadastro-escala.php">Cadastrar escala</a>
          <a class="dropdown-item" href="../escala/consulta-escala.php">Consultar escala</a>
        </div>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="../../inicio.php">Início</a>
          </li>
          <li class="breadcrumb-item active">Consulta de militares</li>
        </ol>
   
        <!-- DataTables Example -->
        <div class="card mb-5">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Tabela de militares cadastrados</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-fixed table-bordered nowrap" id="dataTable" cellspacing="0">
               <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome completo</th>
                    <th>Nome de guerra</th>
                    <th>Posto/Grad</th>
                    <th>Data de praça</th>
                    <th>Companhia</th>
                    <th>Status</th>
                    <th>Ação</th>

                  </tr>
                </thead>
             
                <?php 

                  $consulta = "select militar.idmilitar, militar.nome_completo, militar.nome_guerra, militar.data_praca, posto_grad.desc_posto_grad, situacao.desc_situacao, companhia.desc_companhia from militar, posto_grad, situacao, companhia where idsituacao = situacao_idsituacao1 and idposto_grad = posto_grad_idposto_grad and idcompanhia = companhia_idcompanhia; ";

                 /* $consulta_posto = "select desc_posto_grad from posto_grad where exists (select  posto_grad_idposto_grad from militar where posto_grad_idposto_grad = idposto_grad)";
                  $consulta_cia = "select desc_companhia from companhia where exists (select companhia_idcompanhia from militar where companhia_idcompanhia = idcompanhia)";
                  $consulta_situacao = "select desc_situacao from situacao where exists (select situacao_idsituacao1 from militar where situacao_idsituacao1 = idsituacao)"; */

                  $resultado1 = mysqli_query($conexao,$consulta);
                  
           /*       $resultado2 = mysqli_query($conexao,$consulta_posto);
                  $resultado3 = mysqli_query($conexao,$consulta_cia);
                  $resultado4 = mysqli_query($conexao,$consulta_situacao); */
                
                ?>
                 
                <?php
                  
                 // while ($linha2 = mysqli_fetch_assoc($resultado2))
                 while ($linha = mysqli_fetch_assoc($resultado1))
             /*    while ($linha2 = mysqli_fetch_assoc($resultado2))
                 while ($linha3 = mysqli_fetch_assoc($resultado3))
                 while ($linha4 = mysqli_fetch_assoc($resultado4))*/ { ?>

                      <tr>
                        <td><?php echo $linha['idmilitar']; ?></td>
                        <td><?php echo $linha['nome_completo']; ?></td>
                        <td><?php echo $linha['nome_guerra']; ?></td>
                        <td><?php echo utf8_encode($linha['desc_posto_grad']); ?></td>
                        <td><?php echo $linha['data_praca']; ?></td>
                        <td><?php echo utf8_encode($linha['desc_companhia']); ?></td>
                        <td><?php echo utf8_encode($linha['desc_situacao']); ?></td>
                        <td>
                            <a class="btn btn-success pull-right" href="editar-militar.php?id=<?php echo $linha["idmilitar"]; ?>"><span class='fa fa-edit'></span></a>
                            <a class="btn btn-danger pull-right" href="deletar-militar.php?id=<?php echo $linha["idmilitar"]; ?>"><span class='fa fa-trash'></span></a>

                      </tr>
                <?php } ?>
                
<!--

        echo '<tr>';
          echo '<td>'. $linha['idmilitar'] .'</td>';
          echo '<td>'. $linha['nome_completo'] .'</td>';
          echo '<td>'. $linha['nome_guerra'] .'</td>';
          echo '<td>'. $linha['posto_grad'] .'</td>';
          echo '<td>'. $linha['data_praca'] .'</td>';
          echo '<td>'. $linha['companhia'] .'</td>';
          echo '<td>'. $linha['situacao'] .'</td>';

        echo '</tr>';
                -->

              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © EscOn 2020</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Deseja realmente sair?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Clique em sair para encerrar a sessão.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="../../logout.php">Sair</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="../../js/jquery-3.3.1.js"></script>
  <script src="../../js/jquery.dataTables.min.js"></script>
  <script src="../../js/dataTables.bootstrap.min.js"></script>
  <script src="../../js/dataTables.fixedHeader.min.js"></script>
  <script src="../../js/dataTables.responsive.min.js"></script>
  <script src="../../js/responsive.bootstrap.min.js"></script>-->

<!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../../js/demo/datatables-demo.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <!--  <script src="../../vendor/datatables/jquery.dataTables.js"></script
<script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>>-->

  <!-- Page level plugin JavaScript-->
  <script src="../../vendor/chart.js/Chart.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../../js/demo/chart-area-demo.js"></script>
  <script src="../../js/demo/chart-bar-demo.js"></script>
  <script src="../../js/demo/chart-pie-demo.js"></script>
  <script src="../../js/script.js"></script>

  <!-- Demo scripts for this page
  <script src="../../js/demo/datatables-demo.js"></script>
  <script>
      $(document).ready(function() {
        var table = $('#example').DataTable( {
            
        } );
      } );
  </script>-->

</body>

</html>
