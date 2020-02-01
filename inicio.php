<?php
  include('validar.php');
  include('conexao.php');

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
  <meta name="theme-color" content="grey">

  <title>EscOn - Escalas Online</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>



<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="inicio.php">EscOn</a>

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
          </button>
        </div>-->
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
      <!--<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

         
          
          <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">Sair</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="inicio.php">
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
          <a class="dropdown-item" href="pages/militar/cadastro-militar.php">Cadastrar militar</a>
          <a class="dropdown-item" href="pages/militar/consulta-militar.php">Consultar militar</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Escalas</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="pages/escala/cadastro-escala.php">Cadastrar escala</a>
          <a class="dropdown-item" href="pages/escala/consulta-escala.php">Consultar escala</a>
        </div>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">
       
      <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="inicio.php">Início</a>
          </li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Gráfico de militares escalados</div>
          <div class="card-body">
          
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
          </div>
          <div class="card-footer small text-muted">Atualizado ontem às 11:59 PM</div>
        </div>
<!--
        <div class="col-lg-5">
            <div class="card mb-5">
              <div class="card-header">
                <i class="fas fa-chart-pie"></i>
                Gráfico por posto/Graduação</div>
              <div class="card-body">
              
              <div id="piechart" style="width: 470px; height: 350px;"></div>
              </div>
              <div class="card-footer small text-muted">
                <div class="card-footer small text-muted">Atualizado ontem às 11:59 PM</div>
            </div>
          </div>
        </div>    -->
  
     

      <!-- DataTables Example -->
       <!-- <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Previsão da escala</div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="example" class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Escala</th>
                    <th>Segunda</th>
                    <th>Terça</th>
                    <th>Quarta</th>
                    <th>Quinta</th>
                    <th>Sexta</th>
                    <th>Sábado</th>
                    <th>Domingo</th>
                    <th>Segunda</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Oficial de dia</td>
                    <td>1º Ten Flávio</td>
                    <td>2º Ten Lucas</td>
                    <td>1º Ten Michel</td>
                    <td>1º Ten Bruno</td>
                    <td>2º Ten Carlos</td>
                    <td>1º Ten Wilker</td>
                    <td>2º Ten Rogério</td>
                    <td>1º Ten Avelino</td>
                  </tr>
                  <tr>
                    <td>Adjunto</td>
                    <td>1º Sgt Alfonso</td>
                    <td>2º Sgt Paulo Cesar</td>
                    <td>1º Sgt Heldon</td>
                    <td>1º Sgt Heles</td>
                    <td>2º Sgt Cavalcante</td>
                    <td>2º Sgt Valmar</td>
                    <td>2º Sgt Wemberg</td>
                    <td>1º Sgt Veloso</td>
                  </tr>
                  <tr>
                    <tr>
                    <td>Sgt Paiol</td>
                    <td>2º Sgt Clésio</td>
                    <td>2º Sgt Soaresr</td>
                    <td>2º Sgt Celestimar</td>
                    <td>2º Sgt Jackson</td>
                    <td>2º Sgt Algusto</td>
                    <td>2º Sgt Willames</td>
                    <td>2º Sgt R. Sousa</td>
                    <td>2º Sgt Jordão</td>
                  </tr>
                  <tr>
                    <tr>
                    <td>Sgt Ceem</td>
                    <td>3º Sgt Gaspar</td>
                    <td>3º Sgt Karlos</td>
                    <td>3º Sgt Luz</td>
                    <td>3º Sgt Gladerson</td>
                    <td>3º Sgt Sousa</td>
                    <td>3º Sgt James</td>
                    <td>3º Sgt De Andrade</td>
                    <td>3º Sgt Victor</td>
                  </tr>
                  <tr>
                    <tr>
                    <td>Sgt Ccap</td>
                    <td>3º Sgt Kleyton</td>
                    <td>3º Sgt Misael</td>
                    <td>3º Sgt Flávio</td>
                    <td>3º Sgt Franco</td>
                    <td>3º Sgt Da Silva</td>
                    <td>3º Sgt Sena</td>
                    <td>3º Sgt Pacheco</td>
                    <td>3º Sgt Batista</td>
                  </tr>
                  <tr>
                    <tr>
                    <td>Sgt Guarda</td>
                    <td>3º Sgt Bruno</td>
                    <td>3º Sgt Leiane</td>
                    <td>3º Sgt Kelicio</td>
                    <td>3º Sgt Lima</td>
                    <td>3º Sgt Silva Ramos</td>
                    <td>3º Sgt Geciana</td>
                    <td>3º Sgt Fortaleza</td>
                    <td>3º Sgt Adolfo</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
       /.container-fluid -->

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
          <a class="btn btn-primary" href="logout.php">Sair</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

 <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Posto/Graduação', 'Quantidade'],
          ['1º Ten', 11], /*<?php echo $cont_1ten; ?>],*/
          ['2º Ten', 23], //<?php echo $cont_2ten; ?>],
         // ['Asp Of', <?php echo $cont_asp;  ?>],
         // ['1º Sgt', <?php echo $cont_1sgt; ?>],
         // ['2º Sgt', <?php echo $cont_2sgt; ?>],
         // ['3º Sgt', <?php echo $cont_3sgt; ?>],

        ]);

        var options = {
          title: 'Quantidade de militares por posto/Graduação'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script> -->

</body>

<script src="js/script.js"></script>

</html>
