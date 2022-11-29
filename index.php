<?php
// Armazenar os dados em cache
ob_start();
// Armazenar a sessão
session_start();
if ((isset($_SESSION['loginEmail'])) && (isset($_SESSION['loginSenha']))) {
  header("Location: pag/home.php?acao=principal");
  exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Agenda JMF | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <style>
    div.login-box {
      text-align: center;
    }
  </style>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b>Agenda</b>JMF</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Bem-vindo a Agenda JMF</p>

        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Senha" name="senha">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Lembrar-me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
            </div>
            <!-- /.col -->
          </div>
        </form>


        <p class="mb-1">
          <a href="forgot-password.html">Esqueci minha senha</a>
        </p>

        <?php
        include_once('config/conexao.php');
        if (isset($_GET['acao'])) {
          $acao = $_GET['acao'];
          if ($acao == "denied") {
            echo '<br><div style="margin-top: 10px" class="alert alert-warning" role="alert">
            <strong>Acesso negado!</strong> Você deve fazer login antes de acessar este serviço.
          </div>';
            header("Refresh: 5, index.php");
          } else if ($acao == "sair") {
            echo '<br><div style="margin-top: 10px" class="alert alert-primary" role="alert">
            <strong>Você saiu da agenda!</strong> Volte sempre :)
          </div>';
            header("Refresh: 5, index.php");
          }
        }
        if (isset($_POST['login'])) {
          $login = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
          $senha = base64_encode(md5(filter_input(INPUT_POST, 'senha', FILTER_DEFAULT)));

          $select = "SELECT * FROM agenda_user WHERE email_user=:emailLogin AND senha_user=:senhaLogin";

          try {
            $resultLogin = $conect->prepare($select);
            $resultLogin->bindParam(':emailLogin', $login, PDO::PARAM_STR);
            $resultLogin->bindParam(':senhaLogin', $senha, PDO::PARAM_STR);
            $resultLogin->execute();

            $obj = $resultLogin->FETCH(PDO::FETCH_OBJ);
            $id = $obj->id_user;

            $verificar = $resultLogin->rowCount();
            if ($verificar > 0) {

              $_SESSION['loginEmail'] = $login;
              $_SESSION['loginSenha'] = $senha;

              echo '<br><div style="margin-top: 10px" class="alert alert-primary" role="alert">
                      <strong>Logado com sucesso!</strong> Você será redirecionado para a agenda :)
                    </div>';
              header("Refresh: 5, pag/home.php?acao=principal&id=$id");
            } else {
              echo '<br><div class="alert alert-danger" role="alert">
                      Email ou senha incorretos.
                    </div>';
            }
          } catch (PDOException $e) {
            echo '<strong>ERRO NO LOGIN:</strong>' . $e->getMessage();
          }
        }
        ?>

        <p class="mb-0">
          <a href="registro.php" class="text-center">Novo por aqui? Cadastre-se!</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>