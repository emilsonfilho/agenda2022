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
        <div class="col-lg-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Editar Contato</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="" method="post" id="formulario" enctype="multipart/form-data">
              <div class="card-body">
                <?php

                if (!isset($_GET['idUp'])) {
                }
                $select = "SELECT * FROM agenda_contato WHERE (id_contato = :id)";
                try {
                  $id = filter_input(INPUT_GET, 'idUp', FILTER_DEFAULT);
                  $result = $conect->prepare($select);
                  $result->bindParam(':id', $id, PDO::PARAM_INT);
                  $result->execute();

                  $contar = $result->rowCount();
                  // Contar todas as linhas da minha tabela

                  if ($contar > 0) {
                    while ($show = $result->FETCH(PDO::FETCH_OBJ)) {
                      $id_contato = $show->id_contato;
                      $nome = $show->nome_contato;
                      $email = $show->email_contato;
                      $fone = $show->telefone_contato;
                      $foto = $show->avatar_contato;
                ?>
                      <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite Seu Nome" value="<?php echo $nome; ?>">
                      </div>
                      <div class="form-group">
                        <label for="email">Endereço de E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digite Seu E-mail" value="<?php echo $email; ?>">
                      </div>
                      <div class="form-group">
                        <label for="fone">Telefone</label>
                        <input type="tel" class="form-control" id="fone" name="fone" placeholder="Digite o Telefone Para Contato" value="<?php echo $fone ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">Foto de Perfil</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="avatar" name="foto">
                            <label class="custom-file-label" for="avatar">Arquivo de imagem</label>
                          </div>
                        </div>
                      </div>
                <?php
                    }
                  } else {
                    echo '<br><div style="margin: 6px 8px" class="alert alert-info" role="alert">
                                          Nâo há dados registrados no banco de dados.
                                        </div>
                                        ';
                  }
                } catch (PDOException $e) {
                  echo '<strong>ERRO DE UPDATE = </strong>' . $e->getMessage();
                }
                ?>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="cadContato">Finalizar edição</button>
              </div>
            </form>
            <?php
            include_once('../config/conexao.php');
            if (isset($_POST['cadContato'])) {
              $id = $_GET['idUp'];
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
                    if ($foto !== "avatar.png") {
                      $arquivo = "../img/avatar/" . $foto;
                      unlink($arquivo);
                    }
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

              $update = "UPDATE agenda_contato SET nome_contato=:nome, email_contato=:email, telefone_contato=:fone, avatar_contato=:foto WHERE id_contato=:id";

              try {
                // Preparar a conexão para fazer o insert
                $result = $conect->prepare($update);
                $result->bindParam(':id', $id, PDO::PARAM_INT);
                $result->bindParam(':nome', $nome, PDO::PARAM_STR);
                $result->bindParam(':email', $email, PDO::PARAM_STR);
                $result->bindParam(':fone', $fone, PDO::PARAM_STR);
                $result->bindParam(':foto', $novoNome, PDO::PARAM_STR);
                $result->execute();

                // Resultado do cadastro
                $contar = $result->rowCount();
                if ($contar > 0) {
                  echo '<br><div style="margin: 6px 8px" class="alert alert-info" role="alert">
                                    Edição realizada realizado com sucesso!! Atualize a página para que a foto seja carregada.
                                  </div>
                                  ';
                } else {
                  echo '<br><div  style="margin: 6px 8px" class="alert alert-danger" role="alert">
                                    Edição falhou miseravelmente!!
                                  </div>
                                  '; 
                }
              } catch (PDOException $e) {
                echo '<string>ERRO DE PDO = </string>' . $e->getMessage();
              }
            }
            ?>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Dados do Contato</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0" style="text-align: center; margin-bottom: 98px">
              <?php
              $select = "SELECT * FROM agenda_contato WHERE (id_contato = :id)";
              try {
                $id = filter_input(INPUT_GET, 'idUp', FILTER_DEFAULT);
                $result = $conect->prepare($select);
                $result->bindParam(':id', $id, PDO::PARAM_INT);
                $result->execute();

                $contar = $result->rowCount();
                // Contar todas as linhas da minha tabela

                if ($contar > 0) {
                  while ($show = $result->FETCH(PDO::FETCH_OBJ)) {
                    if ($foto == "avatar.png") {
              ?>
                      <img src="../img/<?php echo $foto ?>" alt="" style="margin-top: 18px; width: 200px; height: 200px; border-radius: 50%;">
                    <?php
                    } else {
                    ?>
                      <img src="../img/avatar/<?php echo $foto ?>" alt="" style="margin-top: 18px; width: 200px; height: 200px; border-radius: 50%;">
              <?php
                    }
                  }
                }
              } catch (PDOException $e) {
                echo '<string>ERRO DE PDO = </string>' . $e->getMessage();
              }
              ?>
              <h2><?php echo $nome; ?></h2>
              <h5><strong><?php echo $fone; ?></strong></h5>
              <p><?php echo $email; ?></p>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
      <!-- Fim (Cadastro e Leitura de Contatos) -->
    </div>
  </section>
</div>