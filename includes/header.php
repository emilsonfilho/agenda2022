<?php
ob_start();
session_start();
if ((!isset($_SESSION['loginEmail'])) && (!isset($_SESSION['loginSenha']))) {
  header("Location: ../index.php?acao=denied");
  exit;
}
include_once('../includes/sair.php');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Agenda JMF | 2022</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <style>
    .card-primary:not(.card-outline)>.card-header,
    .btn-primary {
      background-color: #2A9D8F !important;
      border: #2A9D8F !important;
    }

    .btn-primary:hover {
      background-color: #2A9D8F !important;
    }

    form#formulario input:focus-within {
      border: 1px solid #2A9D8F !important;
    }

    [class*="sidebar-dark-"],
    [class*="sidebar-dark-"]::before {
      background-color: #264653 !important;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-users mr-2"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <div class="dropdown-divider"></div>
            <a href="home.php?acao=editar" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> Editar Contato
            </a>
            <div class="dropdown-divider"></div>
            <a href="?sair" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> Sair
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Agenda JMF</span>
      </a>
      <?php
        include_once('../config/conexao.php');
        $usuarioLogado = $_SESSION['loginEmail'];
        $senhaDoUsuario = $_SESSION['loginSenha'];

        $selectUser = "SELECT * FROM agenda_user WHERE email_user=:emailUserLogado AND senha_user=:senhaUserLogado";

        try {
          $result = $conect->prepare($selectUser);

          $result->bindParam(':emailUserLogado', $usuarioLogado, PDO::PARAM_STR);
          $result->bindParam(':senhaUserLogado', $senhaDoUsuario, PDO::PARAM_STR);
          $result->execute();

          $contar = $result->rowCount();

          if ($contar > 0) {
            while ($show = $result->FETCH(PDO::FETCH_OBJ)) {
              $id_user = $show->id_user;
              $avatar_user = $show->avatar_user;
              $nome_user = $show->nome_user;
              $email_user = $show->email_user;
              $fone_user = $show->telefone_user;
              $senha_user = $show->senha_user;
            }
          } else {
            echo "Não há dados do perfil";
          }
        } catch (PDOException $e) {
          echo "<strong>ERRO DE PDO USER LOGIN = </strong>".$e->getMessage();
        }
      ?>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../img/user/<?php echo $avatar_user; ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="home.php?acao=perfil" class="d-block"><?php echo $nome_user ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="home.php?acao=principal" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Principal
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="home.php?acao=relatorio" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Relatório
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>