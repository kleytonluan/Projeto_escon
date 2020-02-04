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
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Trocas</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="pages/escala/cadastro-escala.php">Solicitações</a>
        </div>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="../../inicio.php">Início</a>
          </li>
          <li class="breadcrumb-item active">Cadastrar militar</li>
        </ol>

        <div class="card mb-5">
          <div class="card-header">
            <i class="fas fa-file"></i>
            Informe os dados abaixo:</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-fixed table-bordered nowrap" id="dataTable" cellspacing="0">
                  
                  
                  <section class="content">
                      <div class="col-md-12 ">
                        <div class="box box-primary">
                          <div class="box-header with-border">
                      <!--     <h4 class="box-title">Informe os dados abaixo:</h4> -->
                          </div>
                                              
                              <?php
                              
                                $consulta_posto = "select idposto_grad, desc_posto_grad from posto_grad";
                                $consulta_cia = "select idcompanhia, desc_companhia from companhia";
                                $consulta_situacao = "select idsituacao, desc_situacao from situacao";
                                $consulta_tipo_sv = "select idtipo_servico, desc_tipo_servico from tipo_servico";


                                $resultado1 = mysqli_query($conexao,$consulta_posto);
                                $resultado2 = mysqli_query($conexao,$consulta_cia);
                                $resultado3 = mysqli_query($conexao,$consulta_situacao);
                                $resultado4 = mysqli_query($conexao,$consulta_tipo_sv);

                          ?>

                          <form method="POST" action="cadastrar.php" >
                            <div class="box-body">
                              <div class="row">
                              
                                <div class="form-group col-md-3">
                                  <label>Nome completo</label>
                                  <input name="nome_completo" type="text" required class="form-control campoDefault" placeholder="Nome completo">
                                </div>
                                
                                <div class="form-group col-md-3">
                                  <label>Nome de guerra</label>
                                  <input name="nome_guerra" type="text" required class="form-control campoDefault" placeholder="Nome de guerra">
                                </div>            

                                <div class="form-group col-md-2">
                                  <label>P/G</label>
                                    <p>
                                      <select name="posto_grad" class="form-control campoDefault">
                                        <?php 

                                          while ($linha1 = mysqli_fetch_array($resultado1)) { ?>
                                          
                                            <option value="<?php echo $linha1['idposto_grad'] ?>"><?php echo utf8_encode($linha1['desc_posto_grad']); ?></option>
                                
                                        <?php } ?>

                                      </select>
                                  </p>
                                </div> 

                                
                              <div class="form-group col-md-2">
                                  <label>Tipo de serviço</label>
                                    <p>
                                      <select name="tipo_servico" class="form-control campoDefault">
                                        <?php 

                                          while ($linha4 = mysqli_fetch_array($resultado4)) { ?>
                                          
                                            <option value="<?php echo $linha4['idtipo_servico'] ?>"><?php echo utf8_encode($linha4['desc_tipo_servico']); ?></option>
                                
                                        <?php } ?>

                                      </select>
                                  </p>
                                </div>        
                              </div>       
                              </div>

                              
                              <div class="row">

                                <div class="form-group col-md-3">
                                  <label>Data de praça</label>
                                    <input name="data_praca" type="date" required class="form-control">
                                </div>
                                              
                                <div class="form-group col-md-3">
                                  <label >Companhia</label>
                                    <p>
                                      <select name="companhia" class="form-control campoDefault" >
                                      <?php 

                                          while ($linha2 = mysqli_fetch_array($resultado2)) { ?>
                                            
                                            <option value="<?php echo $linha2['idcompanhia'] ?>"><?php echo utf8_encode($linha2['desc_companhia']); ?></option>
                                        
                                          <?php } ?>

                                      </select>
                                    </p>
                                </div> 


                                <div class="form-group col-md-2">
                                  <label >Status</label>
                                    <p>
                                      <select name="situacao" class="form-control campoDefault">
                                      <?php 

                                          while ($linha3 = mysqli_fetch_array($resultado3)) { ?>
                                          
                                            <option value="<?php echo $linha3['idsituacao'] ?>"><?php echo utf8_encode($linha3['desc_situacao']); ?></option>
                                          
                                          <?php } ?>

                                      </select>
                                    </p>
                                </div>
                                <div class="form-group col-md-2">
                                  <label>Folga</label>
                                  <input name="folga" type="text" required class="form-control campoDefault" value="0">
                                </div>          

                              </div>
                            <!--  <div id="imendaHTMLitem"></div> -->

                            </div>
                            
                              
                            
                              <div class="box-footer nao-flutuar">
                            <!--     <button type="submit" id="btnAdicionaItem" class="btn btn-secondary"><span class='fa fa-user-plus'></span> Novo</button> -->
                                <button onclick="#" type="submit" class="btn btn-success "><span class='fas fa-save'></span> Salvar</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </section>
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
