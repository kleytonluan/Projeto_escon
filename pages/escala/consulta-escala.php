<?php
  include('../../validar.php');
  include("../../conexao.php");

  session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
     <!-- <input type="text" class="form-control" placeholder="Procurar" aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>-->
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <!--    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger"></span>
        </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>-->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <h6>Olá, <?php echo $_SESSION['login'];?>
          <i class="fas fa-user-circle fa-fw"></i>
        </h6>

        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <!--<a class="dropdown-item" href="#">Configurações</a>-->
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
          <a class="dropdown-item" href="../militar/cadastro-militar.php">Cadastrar militar</a>
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
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Trocas</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="../troca/trocas-servico.php">Solicitações</a>
        </div>
      </li>
    </ul>
    <?php
          
          $id = intval($_GET['id']);

          $result_busca = "SELECT * FROM militar WHERE idmilitar = '$id'";

          $result_comando = mysqli_query($conexao, $result_busca);

          $linha = mysqli_fetch_assoc($result_comando);

        ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="../../inicio.php">Início</a>
          </li>
          <li class="breadcrumb-item active">Consulta Escalas</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Previsão das escalas</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered"  width="100%" cellspacing="0">

              <?php 

                    $consulta1 = "select 
                                    tipo_servico.desc_tipo_servico, 
                                    posto_grad.desc_posto_grad, 
                                    militar.nome_guerra, 
                                    data_escala 
                                from 
                                    escala, 
                                    militar, 
                                    tipo_servico, 
                                    posto_grad 
                                where 
                                    militar_idmilitar = idmilitar 
                                and 
                                    tipo_servico_idtipo_servico1 = idtipo_servico 
                                and 
                                    idposto_grad = posto_grad_idposto_grad 
                                and
                                    data_escala = ('2020-02-10');";

                    $consulta2 = "select 
                                    tipo_servico.desc_tipo_servico, 
                                    posto_grad.desc_posto_grad, 
                                    militar.nome_guerra, 
                                    data_escala 
                                from 
                                    escala, 
                                    militar, 
                                    tipo_servico, 
                                    posto_grad 
                                where 
                                    militar_idmilitar = idmilitar 
                                and 
                                    tipo_servico_idtipo_servico1 = idtipo_servico 
                                and 
                                    idposto_grad = posto_grad_idposto_grad 
                                and
                                    data_escala = ('2020-02-11');";

                    $resultado1 = mysqli_query($conexao,$consulta1);

                    $resultado2 = mysqli_query($conexao,$consulta2); ?>

        
              <thead>  
                    <tr>
                      <th>Escala</th>
                      <th>Segunda<br>10/02/2020</th>
                      <th>Terça<br>11/02/2020</th>
                      <th>Quarta<br>12/02/2020</th>
                      <th>Quinta<br>13/02/2020</th>
                      <th>Sexta<br>14/02/2020</th>
                      <th class="table-danger">Sábado<br>15/02/2020</th>
                      <th class="table-danger">Domingo<br>16/02/2020</th>
                      <th>Segunda<br>17/02/2020</th> 
                    </tr>
                    </thead>

              <tbody>
      
              <?php  
                 while ($linha1 = mysqli_fetch_assoc($resultado1)) { ?>
                                 
                      <tr>
                          <td><?php echo $linha1['desc_tipo_servico']; ?></td>
                          <td><?php echo utf8_encode($linha1['desc_posto_grad']); ?>  <?php echo $linha1['nome_guerra']; ?></td>
                          <td><?php echo utf8_encode($linha2['desc_posto_grad']); ?>  <?php echo $linha2['nome_guerra']; ?></td>
                          <td><?php echo utf8_encode($linha2['desc_posto_grad']); ?>  <?php echo $linha2['nome_guerra']; ?></td> 
                          <td><?php echo utf8_encode($linha2['desc_posto_grad']); ?>  <?php echo $linha2['nome_guerra']; ?></td> 
                          <td><?php echo utf8_encode($linha2['desc_posto_grad']); ?>  <?php echo $linha2['nome_guerra']; ?></td> 
                          <td><?php echo utf8_encode($linha2['desc_posto_grad']); ?>  <?php echo $linha2['nome_guerra']; ?></td> 
                          <td><?php echo utf8_encode($linha2['desc_posto_grad']); ?>  <?php echo $linha2['nome_guerra']; ?></td> 
                          <td><?php echo utf8_encode($linha2['desc_posto_grad']); ?>  <?php echo $linha2['nome_guerra']; ?></td> 

 
                      </tr>
                     
              <?php } ?>

                </tbody>                
              </table>
            </div>
            
          </div>

          <div class="form-group col-sm-2">
            <button type="submit" class="btn btn-success pull-right">Publicar</button>
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

</body>

</html>
