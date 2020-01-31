<?php
  include('../../validar.php');
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
          <a class="dropdown-item" href="../escala/consultar-escala.php">Consultar escala</a>
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
          <li class="breadcrumb-item active">Consulta Escalas</li>
        </ol>

        <!-- DataTables Example 
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Tabela de militares cadastrados</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nome completo</th>
                    <th>Nome de guerra</th>
                    <th>P/G</th>
                    <th>Data de praça</th>
                    <th>Companhia</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Luan Kleyton Ramos de Brito Carvalho</td>
                    <td>Kleyton</td>
                    <td>3º Sgt</td>
                    <td>01/03/2015</td>
                    <td>CCAP</td>
                    <td>Pronto para o serviço</td>
                  </tr>
                  <tr>
                    <td>Fabiano Freire de Albuquerque</td>
                    <td>Albuquerque</td>
                    <td>1º Sgt</td>
                    <td>01/10/2007</td>
                    <td>CCAP</td>
                    <td>Pronto para o serviço</td>
                  </tr>
                  <tr>
                    <td>Samila Cristiany de Jesus Beserra</td>
                    <td>Samila</td>
                    <td>2º Ten</td>
                    <td>01/03/2017</td>
                    <td>EM</td>
                    <td>Pronto para o serviço</td>
                  </tr>
                  <tr>
                    <td>Anderson de Gomes Resende</td>
                    <td>Resende</td>
                    <td>2º Sgt</td>
                    <td>01/03/2010</td>
                    <td>CCAP</td>
                    <td>Pronto para o serviço</td>
                  </tr>
                  <tr>
                    <td>Alexandre Soares Cunha</td>
                    <td>Soares</td>
                    <td>2º Sgt</td>
                    <td>01/03/2009</td>
                    <td>CCAP</td>
                    <td>Pronto para o serviço</td>
                  </tr>
                  <tr>
                    <td>Taciso Leal Silva</td>
                    <td>Taciso</td>
                    <td>3º Sgt</td>
                    <td>01/03/2013</td>
                    <td>2ª Cia</td>
                    <td>Férias</td>
                  </tr>
                  <tr>
                    <td>Raimundo Nonato de Sousa</td>
                    <td>Sousa</td>
                    <td>3º Sgt</td>
                    <td>01/03/2015</td>
                    <td>CCAP</td>
                    <td>Pronto para o serviço</td>
                  </tr>
                  <tr>
                    <td>Rafael Cabral Franco</td>
                    <td>Cabral</td>
                    <td>3º Sgt</td>
                    <td>01/03/2017</td>
                    <td>CCAP</td>
                    <td>Pronto para o serviço</td>
                  </tr>
                  <tr>
                    <td>Naíce Vanessa de Sousa Bezerra</td>
                    <td>Vanessa</td>
                    <td>3º Sgt</td>
                    <td>01/03/2015</td>
                    <td>CCAP</td>
                    <td>Pronto para o serviço</td>
                  </tr>
                  <tr>
                    <td>João Lennon de Moura Gomes</td>
                    <td>Lennon</td>
                    <td>Cb</td>
                    <td>01/08/2015</td>
                    <td>CCAP</td>
                    <td>Pronto para o serviço</td>
                  </tr>
                  <tr>
                    <td>Rubens de Moura Leal</td>
                    <td>Rubens</td>
                    <td>Cb</td>
                    <td>01/03/2014</td>
                    <td>CCAP</td>
                    <td>Pronto para o serviço</td>
                  </tr>
                  <tr>
                    <td>Marcus Delano Pinheiro Maia</td>
                    <td>Delano</td>
                    <td>2º Ten</td>
                    <td>01/03/2015</td>
                    <td>EM</td>
                    <td>Pronto para o serviço</td>
                  </tr>
                  <tr>
                    <td>Roberto Pereira da Silva</td>
                    <td>Roberto</td>
                    <td>1º Ten</td>
                    <td>01/03/2015</td>
                    <td>2ª Cia</td>
                    <td>Pronto para o serviço</td>
                  </tr>
                  <tr>
                    <td>Eduardo Gomes dos Santos</td>
                    <td>Santos</td>
                    <td>1º Ten</td>
                    <td>01/03/2016</td>
                    <td>CEEM</td>
                    <td>Pronto para o serviço</td>
                  </tr>
                  <tr>
                    <td>Francisco Heles do Nascimento</td>
                    <td>Heles</td>
                    <td>1º Sgt</td>
                    <td>01/03/2006</td>
                    <td>CCAP</td>
                    <td>Férias</td>
                  </tr>
                  <tr>
                    <td>Eduardo Chaves Alfonso</td>
                    <td>Alfonso</td>
                    <td>1º Sgt</td>
                    <td>01/09/2005</td>
                    <td>CCAP</td>
                    <td>Férias</td>
                  </tr>
                  <tr>
                    <td>Edilson Ferreira Miranda</td>
                    <td>Miranda</td>
                    <td>2º Sgt</td>
                    <td>01/08/1992</td>
                    <td>2º Cia</td>
                    <td>Pronto para o serviço</td>
                  </tr>
                  <tr>
                    <td>Jordão Bezerra de Araújo</td>
                    <td>Jordão</td>
                    <td>2º Sgt</td>
                    <td>01/03/2008</td>
                    <td>CEEM</td>
                    <td>Pronto para o serviço</td>
                  </tr>
                  <tr>
                    <td>Celestimar Ribeiro de Araújo</td>
                    <td>Celestimar</td>
                    <td>2º Sgt</td>
                    <td>01/03/2009</td>
                    <td>CCAP</td>
                    <td>Pronto para o serviço</td>
                  </tr>
                  <tr>
                    <td>Gabriel Fernandes Cabral</td>
                    <td>Gabriel Fernandes</td>
                    <td>2º Sgt</td>
                    <td>01/03/2004</td>
                    <td>CCAP</td>
                    <td>Pronto para o serviço</td>
                  </tr>
                  <tr>
                    <td>Bruno Richelle de Brito Batista</td>
                    <td>Bruno</td>
                    <td>1º Ten</td>
                    <td>01/03/2016</td>
                    <td>EM</td>
                    <td>Pronto para o serviço</td>
                  </tr>
                  <tr>
                    <td>Fernando Lucas Borges Rufino</td>
                    <td>Lucas</td>
                    <td>2º Ten</td>
                    <td>01/03/2017</td>
                    <td>EM</td>
                    <td>Pronto para o serviço</td>
                  </tr>  
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>-->
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
