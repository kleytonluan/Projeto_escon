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
        <h6>Logado como, <?php echo $_SESSION['login'];?>
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
              <table class="table table-hover table-fixed table-bordered nowrap" id="example" cellspacing="0">
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

                  $consulta = "select * from militar";
                
                  $resultado = mysqli_query($conexao,$consulta);
                
                ?>
                 
                <?php
                 while ($linha = mysqli_fetch_assoc($resultado)) { ?>

                      <tr>
                        <td><?php echo $linha['idmilitar']; ?></td>
                        <td><?php echo $linha['nome_completo']; ?></td>
                        <td><?php echo $linha['nome_guerra']; ?></td>
                        <td><?php echo $linha['posto_grad']; ?></td>
                        <td><?php echo $linha['data_praca']; ?></td>
                        <td><?php echo $linha['companhia']; ?></td>
                        <td><?php echo $linha['situacao']; ?></td>
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
   <!--            <tbody>
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
                </tbody>-->
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

  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="../../js/jquery-3.3.1.js"></script>
  <script src="../../js/jquery.dataTables.min.js"></script>
  <script src="../../js/dataTables.bootstrap.min.js"></script>
  <script src="../../js/dataTables.fixedHeader.min.js"></script>
  <script src="../../js/dataTables.responsive.min.js"></script>
  <script src="../../js/responsive.bootstrap.min.js"></script>


  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <!--  <script src="../../vendor/datatables/jquery.dataTables.js"></script
<script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>>-->

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page
  <script src="../../js/demo/datatables-demo.js"></script>-->
  <script>
      $(document).ready(function() {
        var table = $('#example').DataTable( {
            
        } );
      } );
  </script>

</body>

</html>
