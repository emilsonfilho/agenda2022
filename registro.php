<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <style>
    div.register-box {
      text-align: center;
    }

    div.input-group {
      text-align: left;
    }
  </style>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Agenda</b> Eletrônica</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Registrar-me como novo membro</p>

      <form action="" method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nome completo" name="nome">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email"  name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Senha"  name="senha">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="tel" class="form-control" placeholder="Seu telefone" name="fone">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="avatar" name="foto">
            <label class="custom-file-label" for="avatar">Selecione O Arquivo</label>
          </div>
        </div>
          <br>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               Autorizo <a href="#">o meu cadastro</a>
              </label>
            </div>
        </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="cadContato">Registrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      
      <?php
        include_once('config/conexao.php');
        if (isset($_POST['cadContato'])) {
          $nome = $_POST['nome'];
          $email = $_POST['email'];
          $senha = base64_encode(md5($_POST['senha']));
          $fone = $_POST['fone'];

          if (!empty($_FILES['foto']['name'])) {
            $formatP = array("png", "jpg", "jpeg", "gif");
            $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

            if (in_array($extensao, $formatP)) {
              $pasta = "img/user/";
              $temporario = $_FILES['foto']['tmp_name'];
              $novoNome = uniqid() . ".{$extensao}";

              if (move_uploaded_file($temporario, $pasta.$novoNome)) {

              } else {
                $mensagem = "Erro, não foi possível fazer o upload do arquivo";
              }  
            } else {
              echo '<br><div class="alert alert-danger" role="alert">
              Arquivo inválido.
            </div>
            ';
            }
          } else {
            $novoNome = "avatar.jpg";
          }

          $cadastro = "INSERT INTO agenda_user (nome_user, email_user, senha_user, telefone_user, avatar_user) VALUES (:nome, :email, :senha, :fone, :foto)";

          try {
            $result = $conect -> prepare($cadastro);
            $result -> bindParam(':nome', $nome, PDO::PARAM_STR);
            $result -> bindParam(':email', $email, PDO::PARAM_STR);
            $result -> bindParam(':senha', $senha, PDO::PARAM_STR);
            $result -> bindParam(':fone', $fone, PDO::PARAM_STR);
            $result -> bindParam(':foto', $novoNome, PDO::PARAM_STR);
            $result -> execute();

            $contar = $result -> rowCount();
            if ($contar > 0) {
              echo '<br><div class="alert alert-info" role="alert">
              Cadastro realizado com sucesso!!
            </div>
            ';
            } else {
              echo '<br><div class="alert alert-danger" role="alert">
              Cadastro falhou miseravelmente!!
            </div>
            ';
            }
          } catch (PDOException $e) {
            echo '<string>ERRO DE PDO = </string>' . $e -> getMessage();
          }
        }
      ?> 
      <a href="index.php" class="text-center">Já sou um membro</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
