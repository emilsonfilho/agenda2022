<!-- Main Sidebar Container -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">

  </div>
  <section class="content">
    <div class="container-fluid">
      <!-- Cadastro e Leitura de Contatos -->
      <div class="row">
        <div class="col-lg-4">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Cadastro de Contatos</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <!-- enctype="multipart/form-data" -->
            <form method="post" action="" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="nome">Nome</label>
                  <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite Seu Nome">
                </div>
                <div class="form-group">
                  <label for="email">Endereço de E-mail</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Digite Seu E-mail">
                </div>
                <div class="form-group">
                  <label for="fone">Telefone</label>
                  <input type="tel" class="form-control" id="fone" name="fone" placeholder="Digite o Telefone Para Contato">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Foto de Perfil</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="avatar" name="foto">
                      <label class="custom-file-label" for="avatar">Selecione O Arquivo</label>
                    </div>
                  </div>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Autorizo o cadastro do meu contato</label>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="cadContato">Cadastrar Contato</button>
              </div>
            </form>
            <?php
            include_once('../config/conexao.php');
            if (isset($_POST['cadContato'])) {
              $nome = $_POST['nome'];
              $email = $_POST['email'];
              $fone = $_POST['fone'];
              // $foto = $_POST['foto'];

              if (!empty($_FILES['foto']['name'])) {
                $formatP = array("png", "jpg", "jpeg", "gif");
                $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

                if (in_array($extensao, $formatP)) {
                  $pasta = "../img/avatar/";
                  $temporario = $_FILES['foto']['tmp_name'];
                  $novoNome = uniqid() . ".{$extensao}";

                  if (move_uploaded_file($temporario, $pasta . $novoNome)) {
                  } else {
                    $mensagem = "Erro, não foi possṕivel fazer o upload do arquivo";
                  }
                } else {
                  echo '<br><div style="margin: 6px 8px" class="alert alert-danger" role="alert">
              Arquivo inválido.
            </div>
            ';
                }
              } else {
                $novoNome = "avatar.png";
              }

              $cadastro = "INSERT INTO agenda_contato (nome_contato, email_contato, telefone_contato, avatar_contato) VALUES (:nome, :email, :fone, :foto)";

              try {
                // Preparar a conexão para fazer o insert
                $result = $conect->prepare($cadastro);
                $result->bindParam(':nome', $nome, PDO::PARAM_STR);
                $result->bindParam(':email', $email, PDO::PARAM_STR);
                $result->bindParam(':fone', $fone, PDO::PARAM_STR);
                $result->bindParam(':foto', $novoNome, PDO::PARAM_STR);
                $result->execute();

                // Resultado do cadastro
                $contar = $result->rowCount();
                if ($contar > 0) {
                  echo '<br><div style="margin: 6px 8px" class="alert alert-info" role="alert">
                                  Cadastro realizado com sucesso!!
                                </div>
                                ';
                } else {
                  echo '<br><div  style="margin: 6px 8px" class="alert alert-danger" role="alert">
                                  Cadastro falhou miseravelmente!!
                                </div>
                                ';
                }
              } catch (PDOException $e) {
                echo '<string>ERRO DE PDO = </string>' . $e->getMessage();
              }

              // $foto = $_POST['foto'];

              // echo $nome . ' - ' . $email . ' - ' . $fone;
              // var_dump($_FILES['foto']);
            }
            ?>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Contatos Recentes</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>

                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th style="width: 40px">Ações</th>
                  </tr>
                </thead>
                  <?php
                  $select = "SELECT * FROM agenda_contato ORDER BY id_contato DESC LIMIT 6";
                  try {
                    $result = $conect->prepare($select);
                    $cont = 1;
                    $result->execute();

                    $contar = $result->rowCount();
                    // Contar todas as linhas da minha tabela

                    if ($contar > 0) {
                      while ($show = $result->FETCH(PDO::FETCH_OBJ)) {
                  ?>
                <tbody>
                        <tr>
                          <td><?php echo $cont++; ?></td>
                          <td><?php echo $show->nome_contato; ?></td>
                          <td><?php echo $show->email_contato; ?></td>
                          <td><?php echo $show->telefone_contato ?></td>
                          <td>
                            <div class="btn-group">
                              <a href="home.php?acao=editar&idUp=<?php echo $show->id_contato ?>" class="btn btn-success">
                                <i class="fas fa-user-edit"></i>
                              </a>
                              <a onclick="return confirm ('Deseja remover o contato?')" href="del-home.php?idDel=<?php echo $show->id_contato; ?>" class="btn btn-danger">
                                <i class="fas fa-user-times"></i>
                              </a>
                            </div>
                          </td>
                        </tr>
                  <?php
                      }
                    } else {
                      echo '<br><div style="margin: 6px 8px" class="alert alert-info" role="alert">
                                    Nâo há dados registrados no banco de dados.
                                  </div>
                                  ';
                    }
                  } catch (PDOException $e) {
                    echo '<strong>ERRO DE LEITURA = </strong>' . $e->getMessage();
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
      <!-- Fim (Cadastro e Leitura de Contatos) -->
    </div>
  </section>
</div>