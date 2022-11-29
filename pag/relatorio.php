<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">

  </div>
  <section class="content">
    <div class="container-fluid">
      <!-- Cadastro e Leitura de Contatos -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Relatório</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include_once('../config/conexao.php');
                  $select = "SELECT * FROM agenda_contato ORDER BY id_contato DESC";
                  try {
                    $result = $conect->prepare($select);
                    $cont = 1;
                    $result->execute();

                    $contar = $result->rowCount();
                    // Contar todas as linhas da minha tabela

                    if ($contar > 0) {
                      while ($show = $result->FETCH(PDO::FETCH_OBJ)) {
                  ?>
                        <tr>
                          <?php
                          $foto = $show->avatar_contato;
                          if ($foto == "avatar.png") {
                          ?>
                            <td><img src="../img/avatar.png" alt="Imagem do Contato" style="width: 80px; display: block; margin: auto; border-radius: 50px;"></td>
                          <?php
                          } else {
                          ?>
                            <td><img src="../img/avatar/<?php echo $show->avatar_contato; ?>" alt="Imagem do Contato" style="width: 80px; display: block; margin: auto; border-radius: 50px;"></td>
                          <?php
                          }
                          ?>
                          <td><?php echo $show->nome_contato; ?></td>
                          <td><?php echo $show->email_contato; ?></td>
                          <td><?php echo $show->telefone_contato; ?></td>
                          <td>
                            <div class="btn-group">
                              <a href="home.php?acao=editar&idUp=<?php echo $show->id_contato ?>" class="btn btn-success">
                                <i class="fas fa-user-edit"></i>
                              </a>
                              <a onclick="return confirm('Deseja remover o contato selecionado?')" href="del-relatorio.php?idDel=<?php echo $show->id_contato ?>" class="btn btn-danger">
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
                <tfoot>
                  <tr>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- Fim (Cadastro e Leitura de Contatos) -->
      </div>
  </section>
</div>