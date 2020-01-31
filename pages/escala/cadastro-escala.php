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
         <!--   <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="../../inicio.php">Início</a>
          </li>
          <li class="breadcrumb-item active">Cadastro de previsões</li>
        </ol>

      <section class="content">
          <div class="col-md-12 ">
            <div class="box box-primary">
              <div class="box-header with-border">
                <!--<h3 class="box-title">Informe os dados abaixo:</h3>-->
              </div>

              <form role="form">

                  <div class="row">
  
                        <div class="form-group col-sm-3" id="datetimepicker1">
                            <label for="name">Previsão do dia:</label>
                            <input type="date" class="form-control">
                        </div>

                        <div class="form-group col-sm-3 lado" id="datetimepicker1">
                          <label for="name">para o dia:</label>
                          <input type="date" class="form-control lado">
                        </div>
                        
                        <div class="form-group col-sm-3 lado" >
                          <label for="name">Tipo de serviço:</label>
                          <p>
                            <select name="servico"  class="form-control campoDefault">
                              <option value="Oficial de dia">Oficial de dia</option>
                              <option value="Adjunto ao oficial de dia">Adjunto ao oficial de dia</option>
                              <option value="Comandante da guarda do Paiol">Comandante da guarda do Paiol</option>
                              <option value="Sargento de dia CEEM">Sargento de dia CEEM</option>
                              <option value="Sargento de dia CCAP">Sargento de dia CCAP</option>
                              <option value="Comandante da guarda do quartel">Comandante da guarda do quartel</option>
                            </select>
                          </p>
                        </div>

                  </div>

                  <div class="row">
                      <div class="form-group col-sm-2">
                        <button onclick="#" type="submit" class="btn btn-success pull-right" id="btnSalvar">Gerar previsão</button>
                      </div>
                  </div>

                   
              <!--     <div class="box-footer nao-flutuar">
                     <button onclick="#" type="submit" class="btn btn-success pull-right lado" id="btnSalvar">Salvar</button>

                   </div> -->

             </form>
                   <div class="card mb-5">
                    <div class="card-header">
                      <i class="fas fa-table"></i>
                      Tabela de militares disponíveis para escalar</div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-hover table-fixed table-bordered nowrap" id="example" cellspacing="0">
                        <thead>
                          
                            <tr>
                              <th>ID</th>
                              <th>Posto/Grad</th>
                              <th>Nome de guerra</th>
                              <th>Data de praça</th>
                              <th>Companhia</th>
                              <th>Status</th>
                              <th>Folga</th>

                              <!-- <th>Ação</th> -->
                            </tr>

                          </thead>
                      
                          <?php 

                            $consulta = "select * from militar where situacao in ('PRONTO')";
                          
                            $resultado = mysqli_query($conexao,$consulta);
                          
                          ?>
                          
                          <?php
                          while ($linha = mysqli_fetch_assoc($resultado)) { ?>

                                <tr>
              
                                  <td><?php echo $linha['idmilitar']; ?></td>
                                 <!-- <td><?php echo $linha['nome_completo']; ?></td> -->
                                  <td><?php echo $linha['posto_grad']; ?></td>
                                  <td><?php echo $linha['nome_guerra']; ?></td>
                                  <td><?php echo $linha['data_praca']; ?></td>
                                  <td><?php echo $linha['companhia']; ?></td>
                                  <td><?php echo $linha['situacao']; ?></td>
                                  <td><?php echo $linha['situacao']; ?></td>

                   
                             <!--     <td>
                                      <a class="btn btn-success pull-right" href="editar-militar.php?id=<?php echo $linha["idmilitar"]; ?>"><span class='fa fa-edit'></span></a>
                                      <a class="btn btn-danger pull-right" href="deletar-militar.php?id=<?php echo $linha["idmilitar"]; ?>"><span class='fa fa-trash'></span></a> -->

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
                    
            </div>
          </div>
      </section>
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
  <script src="../../vendor/chart.js/Chart.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../../js/demo/chart-area-demo.js"></script>
  <script src="../../js/demo/chart-bar-demo.js"></script>
  <script src="../../js/demo/chart-pie-demo.js"></script>
  <script src="../../js/script.js"></script>
  <script type="text/javascript">
    $(function() {
      $('#datetimepicker1').datetimepicker();
    });
  </script>

</body>

</html>
